<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CounselorList;
use App\Helpers\Facades\FileStorageHelper;
use Auth;

class CounselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['counselors'] = CounselorList::where("admin_id",Auth::guard('admin')->user()->id)->get();;
      return view( 'pourashava_frontend.counselor.index', $this->data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pourashava_frontend.counselor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $counselor          = new CounselorList();
      $counselor->admin_id            = auth()->user()->id;

      // upload picture
      $path = FileStorageHelper::upload($request->file('image'), 'counselor_image', null, 300, 300);
      $path && $counselor->image = $path;

      $counselor->name          = $request->input('name');

      $counselor->save();

      $request->session()->flash( 'message', ' মেয়র তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.counselor_lists.index' );
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
      $this->data['counselor']=CounselorList::find($id);
      return view('pourashava_frontend.counselor.create',  $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CounselorList $counselor)
    {


      $counselor->admin_id            = auth()->user()->id;

      // upload picture
      $path = FileStorageHelper::upload($request->file('image'), 'counselor_image', null, 300, 300);
      $path && $counselor->image = $path;

      $counselor->name          = $request->input('name');

      $counselor->save();

      $request->session()->flash( 'message', ' মেয়র তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.counselor_lists.index' );
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
