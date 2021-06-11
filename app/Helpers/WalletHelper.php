<?php

namespace App\Helpers;

use App\Models\AdminWallet;
use App\Models\AdminWalletTransaction;
use App\Models\UserWallet;
use App\Models\UserWalletTransaction;
use DateTime;

class WalletHelper {
    public function request($guard, $user_id, $amount) {
        //Check User Role to Wallet Request Into UserWallet or AdminWallet

        if ($guard == 'admin') {
            $wallet = new AdminWallet;
            $column = 'admin_id';
        } elseif ($guard == 'user') {
            $wallet = new UserWallet;
            $column = 'user_id';
            // $data['pourashava_id'] = session('userInfo')['pourashavaId'] ? session('userInfo')['pourashavaId'] : null;
        }

        $data[$column]  = $user_id;
        $data['amount'] = $amount;
        $data['date']   = new DateTime();

        $wallet->create($data);

    }
    /**
     * check_balance
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed $user      Authentic User
     * @param  mixed $amount  User request amount
     */
    public function get_balance($guard, $user) {


        if($guard =='admin'){
        if ($user->hasRole('pourashava_admin') ) {
            $total_amount          = AdminWallet::query()->where('admin_id', $user->id)->where('status', 1)->sum('amount');
            
            $balance_transfer      = UserWallet::query()->where('admin_id', $user->id)->where('status', 1)->sum('amount');
            $current_admin_balance = $total_amount - $balance_transfer;
           
            return  $current_admin_balance;

        }
       } else {

        $total_amount         = UserWallet::query()->where('user_id', $user->id)->where('status', 1)->sum('amount');
        $total_paid           = UserWalletTransaction::query()->where('user_id', $user['userId'])->sum('amount');
        $current_user_balance = $total_amount - $total_paid;

      
        return $current_user_balance;
    }

}
        

   

    public function deposit($guard, $user_id, $id) {
        //Check User role to deposit Into UserWallet or AdminWallet

        if ($guard == 'admin') {
            $wallet         = new AdminWallet;
            $data['status'] = 1;

        } elseif ($guard == 'user') {
            $wallet           = new UserWallet;
            $data['status']   = 1;
            $data['admin_id'] = $user_id;
        }
        $wallet->query()->findOrFail($id)->update($data);

    }
    public function payment($guard, $user, $service, $amount) {
        //Check User role to create transaction for  UserWalletTransaction or AdminWalletTransactionor

        if ($guard == 'admin') {
            $wallet             = new AdminWallet;
            $wallet_transaction = new AdminWalletTransaction;
            $column             = 'admin_id';
        } elseif ($guard == 'user') {
            $wallet             = new UserWallet;
            $column             = 'user_id';
            $wallet_transaction = new UserWalletTransaction;
        }

        // check Sufficient Balance
       
            // generate random transaction  id
            $transaction_id         = rand(10000000, 99999999);
            $data['user_id']      =   $user->id;
            $data['transaction_id'] = $transaction_id;
            $data['amount']         = $amount;
            $data['service_name']   = $service;
            $wallet_transaction->create($data);
        

    }
}