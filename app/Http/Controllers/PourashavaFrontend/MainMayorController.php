<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainMayor;
use App\Helpers\Facades\FileStorageHelper;
use App\Http\Requests\MainMayorRequest;
use Auth;

class MainMayorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['main_mayors'] = MainMayor::where("admin_id",Auth::guard('admin')->user()->id)->latest('id')->get();
      return view('pourashava_frontend.mainmayor.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pourashava_frontend.mainmayor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainMayorRequest $request)
    {

      $main_mayor =new MainMayor();

      $main_mayor->admin_id            = auth()->user()->id;
      // upload logo
      $path = FileStorageHelper::upload($request->file('image'), 'main_mayor', null, 300, 300);
      $path && $main_mayor->image = $path;

      $main_mayor->name            = $request->name;
      $main_mayor->title            = $request->title;
      $main_mayor->paurashava_name            = $request->paurashava_name;
      $main_mayor->address            = $request->address;
      $main_mayor->welcome_message            = $request->welcome_message;


      $main_mayor->save();
      $request->session()->flash( 'message', ' প্রধান মেয়র তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.main_mayors.index' );
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
    public function edit(MainMayor $main_mayor)
    {

      return view('pourashava_frontend.mainmayor.create',compact('main_mayor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainMayorRequest $request, MainMayor $main_mayor)
    {
      dd('ok');
    
      //logo
      $path = FileStorageHelper::upload($request->file('image'), 'main_mayor', $main_mayor->image, 300, 300);
      $path && $main_mayor->image = $path;


      $main_mayor->admin_id            = auth()->user()->id;
      $main_mayor->name=$request->input('name');
      $main_mayor->title=$request->input('title');
      $main_mayor->paurashava_name=$request->input('paurashava_name');
      $main_mayor->address=$request->input('address');
      $main_mayor->welcome_message=$request->input('welcome_message');

      $main_mayor->save();

      $request->session()->flash( 'message', ' প্রধান মেয়র তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.main_mayors.index' );
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
