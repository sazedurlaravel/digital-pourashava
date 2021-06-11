<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Facades\WalletHelper;
use App\Http\Controllers\Controller;
use App\Models\AdminWallet;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PourashavaAdminWalletController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $this->data['wallets'] = AdminWallet::query()->where('admin_id', Auth::user()->id)->get();
        return view('admin.pourashava_admin_wallet.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = Auth::user();

        $guard = 'admin';
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        WalletHelper::request($guard, $user->id, $request->amount);

        $request->session()->flash('message', ' ওয়ালেট  রিকুয়েস্ট  এডমিনের কাছে পাঠানো হয়েছে। ');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    public function get_wallet_request() {

       
      
        $poura_admin = auth()->user()->hasRole('pourashava_admin') ? auth()->user() : auth()->user()->parentAdmin;
       

        $this->data['wallets'] = UserWallet::query()->whereHas('user', function ($query) use ($poura_admin) {
            $query->where('pourashava_id', $poura_admin->pourashava_id);
        })->get();
        return view('admin.pourashava_admin_wallet.get_wallet_request', $this->data);
    }

    /**
     * approve
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed $id      User Wallet Id
     * @param  mixed $amount  User request amount
     */

    public function approve(Request $request, $id, $amount) {

        $user  = Auth::user();
      
        $pourashavaAdmin           = $user->hasRole('pourashava_admin') ? $user : $user->parentAdmin;

        $current_admin_balance = WalletHelper::get_balance($guard='admin', $pourashavaAdmin);
        
        if ($current_admin_balance >= intval($amount)) {
         
            WalletHelper::deposit($guard='user', $pourashavaAdmin->id, $id);
            $request->session()->flash('message', 'ওয়ালেট সফালভাবে এ্যাপ্রুভ হয়েছে।');
            $request->session()->flash('alert-type', 'success');

        } else {
            $request->session()->flash('message', 'আপনার ওয়ালেটে পর্যাপ্ত টাকা নাই।');
            $request->session()->flash('alert-type', 'warning');

        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        AdminWallet::query()->findOrFail($id)->update([
            'amount' => $request->amount,
        ]);

        $request->session()->flash('message', 'ওয়ালেট  রিকুয়েস্ট  এডমিনের কাছে পাঠানো হয়েছে। ');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();

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
