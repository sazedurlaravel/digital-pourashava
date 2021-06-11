<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Facades\WalletHelper;
use App\Http\Controllers\Controller;
use App\Models\UserLicense;
use Illuminate\Http\Request;

class UserLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('pourashava_admin') || auth()->user()->hasRole('digital_center_admin')) {
            $pourashavaAdmin     = auth()->user()->hasRole('pourashava_admin') ? auth()->user() : auth()->user()->parentAdmin;
          
            $this->data['license_request'] = UserLicense::query()->whereHas('user',function($query)use($pourashavaAdmin){
                $query->where('pourashava_admin_id', $pourashavaAdmin->id);
            })->orderBy('status')->get();
          
        }

        return view('admin.user-license.index', $this->data);  
    }

    /**
     * Approve User License By Admin.
     *
     * 
     */
  public function approve(Request $request, $id)
    {
      $data = UserLicense::find($id);
      $current_admin_balance = WalletHelper::get_balance($guard = 'user',  $data->user);
    
      if ($current_admin_balance >= intval($data->payable_amount)) {
          $data->update(['status'=>1]);

         //update last license issued year 
         
          $data->user->businessHolderUser->update(['last_license_issued'=>$data->end_year]);

          $request->session()->flash('message', 'আপনার  আবেদনটি পাঠানো হয়েছে।');
          $request->session()->flash('alert-type', 'success');
      }else{
        $request->session()->flash('message', 'আবেদনকারীর ওয়ালেটে পর্যাপ্ত টাকা নাই।');
        $request->session()->flash('alert-type', 'warning');  
      }
      return redirect()->route('admin.user_license.index');
    }

   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
