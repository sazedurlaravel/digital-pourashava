<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Helpers\Facades\WalletHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserLicense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserLicenseController extends Controller {
    public function license($pourashava_slug) {
        if (Admin::role('pourashava_admin')->where('pourashava_url', $pourashava_slug)->exists()) {

            $userId   = session('userInfo')['userId'];
            $licenses = UserLicense::query()->where('user_id', $userId)->get();

            return view('user.license.index', compact('pourashava_slug', 'licenses'));
        }
        return abort(404);
    }

    public function licenseRenew($pourashava_slug) {
        if (Admin::role('pourashava_admin')->where('pourashava_url', $pourashava_slug)->exists()) {

            $userId     = session('userInfo')['userId'];
            $user       = User::query()->where('id', $userId)->first();
            $start_year = $user->businessHolderUser ? $user->businessHolderUser->last_license_issued + 1 : Carbon::now()->format('Y');

            $licenses = UserLicense::query()->where('user_id', $userId)->get();

            return view('user.license.license_renew', compact('pourashava_slug', 'licenses', 'start_year'));
        }
        return abort(404);
    }

    public function licenseApply(Request $request, $pourashava_slug) {
        if (Admin::role('pourashava_admin')->where('pourashava_url', $pourashava_slug)->exists()) {

            $userInfo = session('userInfo');

            $user       = User::query()->where('id', $userInfo['userId'])->first();
            $start_year = $request->start_year;
            $end_year   = $request->end_year;
            $total_year = abs($end_year - $start_year)+1;

            //calculate Payable Amount
            $total_payable_amount = $this->calculate_payable_amount($total_year,$user);
            //get current user balance
            $current_balance = WalletHelper::get_balance($guard = 'user', $user);

            if ($current_balance >= intval($total_payable_amount)) {

                $request['user_id'] = $user->id;
                $request['total_year'] = $total_year;
                $request['payable_amount'] = $total_payable_amount;
                UserLicense::query()->create($request->all());
               
                $request->session()->flash('message', 'আপনার  আবেদনটি পাঠানো হয়েছে।');
                $request->session()->flash('alert-type', 'success');

            } else {
                $request->session()->flash('message', 'আপনার ওয়ালেটে পর্যাপ্ত টাকা নাই।');
                $request->session()->flash('alert-type', 'warning');

            }

            return redirect()->route( 'pourashava_frontend.user.license', $pourashava_slug );
        }
        return abort(404);
    }

    
    public function getAmount(Request $request){ 
        $userInfo = session('userInfo');
        $user       = User::query()->where('id', $userInfo['userId'])->first();
        
        $start_year = intval($request['start_year']);
        $end_year   = intval($request['end_year']);
        $total_year = abs($end_year - $start_year)+1;
      
        //calculate Payable Amount
        $total_payable_amount = $this->calculate_payable_amount($total_year,$user);
        

        return $total_payable_amount;
      }

      public function calculate_payable_amount($total_year,$user){
        
        $capitalRange = $user->businessHolderUser->capitalRange;
       
        $licenseFee    = $capitalRange->licence_fee;
        $businessTax   = $capitalRange->business_tax;
        $signboardTax  = $capitalRange->signboard_tax;
        $serviceCharge = $capitalRange->service_charge;
        // need to collect vat from business_holder_capital_ranges table
         $vat = 0;
        $amount        = $licenseFee + $businessTax + $signboardTax + $serviceCharge + $vat;

        $total_payable_amount  = $amount * $total_year;
        return $total_payable_amount;
        
    }


}
