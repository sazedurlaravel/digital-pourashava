<?php

namespace App\Http\Controllers\Admin;
use PDF;
use App\Helpers\Facades\MdlSmsHelper;
use App\Helpers\Facades\WalletHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessHolderRequest;
use App\Models\BusinessHolderCapitalRange;
use App\Models\BusinessHolderUser;
use App\Models\BusinessType;
use App\Models\OwnershipType;
use App\Models\User;
use App\Models\UserCard;
use App\Models\UserLicense;
use App\Models\UserWallet;
use App\Models\UserWalletTransaction;
use App\Models\Village;
use App\Models\WardNumber;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class BusinessHolderUserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (auth()->user()->hasRole('pourashava_admin') || auth()->user()->hasRole('digital_center_admin')) {
            $pourashavaAdmin     = auth()->user()->hasRole('pourashava_admin') ? auth()->user() : auth()->user()->parentAdmin;
            $this->data['users'] = User::where('pourashava_admin_id', $pourashavaAdmin->id)->latest('id')->get();
        } else {
            $this->data['users'] = User::latest('id')->get();
        }

        return view('admin.business-holders.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {


        $user = Auth::user();

        $pourashavaAdmin           = $user->hasRole('pourashava_admin') ? $user : $user->parentAdmin;

        $get_balance = WalletHelper::get_balance($guard = 'admin', $pourashavaAdmin );

        $user_registration_fee = $user->user_registration_fee ?  $user->user_registration_fee :  $user->parentAdmin->user_registration_fee;
       
        if ($get_balance >= $user_registration_fee) {
            $this->data['wards'] = WardNumber::query()->where('admin_id', $user->id)->pluck('number', 'id');

            $this->data['ownership_types'] = OwnershipType::where('admin_id', $user->id)->orWhere('admin_id',$user->parentAdmin->id)->pluck('name', 'id');
            $this->data['business_types']  = BusinessType::where('admin_id', $user->id)->orWhere('admin_id',$user->parentAdmin->id)->pluck('name', 'id');
            $this->data['user']            = new User;
            $this->data['wards']           = WardNumber::query()->where('admin_id', $user->id)->orWhere('admin_id',$user->parentAdmin->id)->pluck('number', 'id');

    
            return view('admin.business-holders.create', $this->data);

        } else {
            $request->session()->flash('message', 'আপনার ওয়ালেটে পর্যাপ্ত টাকা নাই।');
            $request->session()->flash('alert-type', 'warning');
            return redirect()->route('admin.business_holders.index');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessHolderRequest $request) {

        // dd($request->all());
        // check permission
        if (auth()->user()->cannot('create_user')) {
            return abort(403);
        }

        


        /**
         * get pourashavaAdmin
         * if pourashava admin , get direct auth
         * elseif digital uddogta admin, get auth parentAdmin
         */
        $pourashavaAdmin           = auth()->user()->hasRole('pourashava_admin') ? auth()->user() : auth()->user()->parentAdmin;
        $validTo                   = date('m') > 6 ? now()->addYear()->month(6)->day(30) : now()->month(6)->day(30);
        $user                      = new User();
        $user->admin_id            = auth()->user()->id;
        $user->pourashava_admin_id = $pourashavaAdmin->id;
        $user->pourashava_id       = $pourashavaAdmin->pourashava_id;

        // picture is exist
        if ($request->hasFile('picture')) {
            $path          = $request->file('picture')->store('business_holder_user');
            $user->picture = $path;
        }

        $user->name                   = $request->input('name');
        $user->email                  = $request->input('email');
        $user->mobile                 = $request->input('mobile');
        $user->father_or_husband_name = $request->input('father_or_husband_name');
        $user->mother_name            = $request->input('mother_name');
        $user->gender                 = $request->input('mother_name');
        $user->ward_id   = $request->input('ward_id');
        $user->birth_day = $request->input('birth_day');
        $user->nid_no    = $request->input('nid_no');
        // $user->post_code              = $request->input( 'post_code' );
        $user->permanent_address = $request->input('permanent_address');
        $user->present_address   = $request->input('present_address');
        $user->valid_to          = $validTo;

        $user->save();

       //Balance transfer to User Wallet
        $user_wallet                      = new UserWallet();
        $user_wallet->user_id  = $user->id;
        $user_wallet->admin_id  = auth()->user()->id;
        $user_wallet->amount  = auth()->user()->user_registration_fee;
        $user_wallet->date  = new DateTime();
        $user_wallet->status  = 1;
        $user_wallet->save();
       
       
        //create transaction  History
        $service = "User Registration Fee";
       
        $get_balance = WalletHelper::payment($guard = 'user', $user, $service, $user_wallet->amount);
        

        $business_holder                      = new BusinessHolderUser();
        $business_holder->user_id             = $user->id;
        $business_holder->business_name       = $request->input('business_name');
        $business_holder->owner_name          = $request->input('owner_name');
        $business_holder->business_address    = $request->input('business_address');
        $business_holder->business_tin_no     = $request->input('business_tin_no');
        $business_holder->owner_tin_no        = $request->input('owner_tin_no');
        $business_holder->last_license_issued = $request->input('last_license_issued');
        $business_holder->capital_range_id    = $request->input('capital_range_id');

        // $business_holder->ownership_type      = $request->input('ownership_type');
        // $business_holder->business_type       = $request->input('business_type');
        // $business_holder->business_capital    = $request->input('business_capital');

        // $business_holder->license_fees        = $request->input('license_fees');
        // $business_holder->singboard_tax       = $request->input('singboard_tax');
        // $business_holder->due                 = $request->input('due');
        // $business_holder->service_charge      = $request->input('service_charge');
        // $business_holder->others_charge       = $request->input('others_charge');
        $business_holder->save();

        // store business_holder_user_capital_range  table
        $data                          = new BusinessHolderCapitalRange();
        $data->business_holder_user_id = $business_holder->id;
        $data->capital_range_id        = $request->input('capital_range_id');
        $data->vat                     = $request->input('vat');
        $data->save();

        $request->session()->flash('message', ' সেবা ব্যবহারকারীর তথ্য সংরক্ষণ করা হয়েছে ');
        $request->session()->flash('alert-type', 'success');
        return redirect()->route('admin.business_holders.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $this->data['user'] = User::query()->findOrFail($id);
        return view('admin.business-holders.show', $this->data);
    }

    public function cardPrint($id){

        $this->data['user'] = User::query()->findOrFail($id);
        // return view('admin.business-holders.print-card', $this->data);
        $pdf = PDF::loadView('admin.business-holders.print-card',$this->data)->setPaper(326.4,227.6);
        return $pdf->stream($this->data['user']->card_no . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $this->data['wards']    = WardNumber::pluck('number', 'id');
        $this->data['villages'] = Village::pluck('name', 'id');
        $this->data['cards']    = UserCard::whereNull('user_id')->pluck('card_no', 'id');

        $this->data['user'] = User::findOrFail($id);

        return view('admin.business-holders.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'card_id' => 'required|unique:user_cards,user_id',
        ]
        );

        if (auth()->user()->hasRole('super_admin')) {
            $user      = User::query()->findOrFail($id);
            $user_card = UserCard::query()->findOrFail($request->card_id);

            $user->update([
                'card_no' => $user_card->card_no,
                'pin_no'  => $user_card->pin_no,
            ]);
            $card_no = $user_card->card_no;
            $pin_no  = $user_card->pin_no;

            $user_card->update([
                'user_id' => $user->id,
            ]);

            $message = "{$user->name}  Your Card Number: {$card_no} And Pin Number {$pin_no}";
            // send sms on mobile
            $contact = "88{$user->mobile}";
            MdlSmsHelper::send($contact, $message);

            // send sms on mobile

            //   $contacts = "88{$user->mobile}";
            // $this->mdlSmsSend($contacts, $message);

            $request->session()->flash('message', ' সেবা ব্যবহারকারীর তথ্য আপডেট  হয়েছে ');
            $request->session()->flash('alert-type', 'success');
            return redirect()->route('admin.business_holders.index');

        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }


}
