<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Http\Requests\InformationRequest;
use App\Helpers\Facades\FileStorageHelper;
use Illuminate\Support\Facades\Storage;
use Auth;


class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['informations'] = Information::where("admin_id",Auth::guard('admin')->user()->id)->latest('id')->get();
      return view('admin.information.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformationRequest $request)
    {
        $information =new Information();

        $information->admin_id            = auth()->user()->id;
        // upload logo
        $path = FileStorageHelper::upload($request->file('logo'), 'logo', null, 300, 300);
        $path && $information->logo = $path;

        // upload banner
        $path = FileStorageHelper::upload($request->file('banner'), 'banner', null, 300, 400);
        $path && $information->banner = $path;


        $information->name            = $request->name;
        $information->service_email            = $request->service_email;
        $information->service_phone           = $request->service_phone;



        $information->save();
        $request->session()->flash( 'message', ' information তথ্য সংরক্ষণ করা হয়েছে ' );
        $request->session()->flash( 'alert-type', 'success' );
        return redirect()->route( 'admin.information.index' );
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
          return view('admin.information.create',  $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InformationRequest $request, $id)
    {
        $information = Information::query()->findOrFail( $id );
        //logo
        $path = FileStorageHelper::upload($request->file('logo'), 'logo', $information->logo, 300, 300);
        $path && $information->logo = $path;

      //banner
      $path = FileStorageHelper::upload($request->file('banner'), 'banner', $information->banner, 300, 300);
      $path && $information->banner = $path;

        $information->admin_id            = auth()->user()->id;
        $information->name=$request->input('name');
        $information->service_email=$request->input('service_email');
        $information->service_phone=$request->input('service_phone');

        $information->save();

        $request->session()->flash( 'message', ' information তথ্য সংরক্ষণ করা হয়েছে ' );
        $request->session()->flash( 'alert-type', 'success' );
        return redirect()->route( 'admin.information.index' );
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
