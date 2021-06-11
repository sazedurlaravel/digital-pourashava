<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportantApplication;
use App\Helpers\Facades\FileStorageHelper;
use Auth;

class ImportantApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['important_applicaions'] = ImportantApplication::where("admin_id",Auth::guard('admin')->user()->id)->get();;
        return view( 'pourashava_frontend.important_application.index', $this->data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('pourashava_frontend.important_application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $important_application          = new ImportantApplication();
      $important_application->admin_id            = auth()->user()->id;

      // upload picture
      $path = FileStorageHelper::upload($request->file('file'), 'important_application',null, 300, 300);
      $path && $important_application->file = $path;

      $important_application->name          = $request->input('name');

      $important_application->save();

      $request->session()->flash( 'message', ' গুরুত্বপূর্ণ প্রয়োগ তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.important_applications.index' );
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
      $this->data['important_application']=ImportantApplication::find($id);
      return view('pourashava_frontend.important_application.create',  $this->data);
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
      $important_application          =ImportantApplication::query()->findOrFail( $id );
      $important_application->admin_id            = auth()->user()->id;

      // upload picture
      $path = FileStorageHelper::upload($request->file('file'), 'important_application',null, 300, 300);
      $path && $important_application->file = $path;

      $important_application->name          = $request->input('name');

      $important_application->save();

      $request->session()->flash( 'message', ' গুরুত্বপূর্ণ প্রয়োগ তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.important_applications.index' );
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
