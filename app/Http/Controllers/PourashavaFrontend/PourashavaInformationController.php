<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Helpers\Facades\FileStorageHelper;
use App\Http\Requests\PourashavaInformationRequest;
use Auth;
use Illuminate\Http\Request;

class PourashavaInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['informations'] = Information::where("admin_id",Auth::guard('admin')->user()->id)->latest('id')->get();
      return view('pourashava_frontend.information.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pourashava_frontend.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PourashavaInformationRequest $request)
    {
      $information =new Information();

      $information->admin_id            = auth()->user()->id;
      // upload logo
      $path = FileStorageHelper::upload($request->file('logo'), 'logo', null, 300, 300);
      $path && $information->logo = $path;

      $information->name            = $request->name;
      $information->youtube_url            = $request->youtube_url;
      $information->facebook_url          = $request->facebook_url;



      $information->save();
      $request->session()->flash( 'message', ' information তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.pourashava_informations.index' );
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

      $this->data['information']=Information::find($id);
      return view('pourashava_frontend.information.edit',  $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PourashavaInformationRequest $request,Information $information)
    {

      //logo
      $path = FileStorageHelper::upload($request->file('logo'), 'logo', $information->logo, 300, 300);
      $path && $information->logo = $path;


      $information->admin_id            = auth()->user()->id;

      $information->name            = $request->name;
      $information->youtube_url            = $request->youtube_url;
      $information->facebook_url          = $request->facebook_url;


    
      $information->save();
      $request->session()->flash( 'message', ' information তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.pourashava_informations.index' );
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
