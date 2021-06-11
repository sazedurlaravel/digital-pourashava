<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SebaList;
use Auth;
use App\Helpers\Facades\FileStorageHelper;


class SebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['sebas'] = SebaList::where("admin_id",Auth::guard('admin')->user()->id)->latest('id')->get();
      return view('admin.seba.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $seba =new SebaList();

      $seba->admin_id            = auth()->user()->id;
      // upload logo
      $path = FileStorageHelper::upload($request->file('image'), 'seba', null, 300, 300);
      $path && $seba->image = $path;




      $seba->title            = $request->title;




      $seba->save();
      $request->session()->flash( 'message', ' সেবা তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.sebas.index' );
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
      $this->data['seba']=SebaList::find($id);
      return view('admin.seba.create',  $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SebaList $seba)
    {
      $seba->admin_id            = auth()->user()->id;
      // upload logo
      $path = FileStorageHelper::upload($request->file('image'), 'seba', null, 300, 300);
      $path && $seba->image = $path;




      $seba->title            = $request->title;




      $seba->save();
      $request->session()->flash( 'message', ' সেবা তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.sebas.index' );
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
