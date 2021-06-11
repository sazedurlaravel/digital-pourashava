<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notic;
use Auth;
use App\Helpers\Facades\FileStorageHelper;


class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['notices'] = Notic::where("admin_id",Auth::guard('admin')->user()->id)->get();;
      return view( 'pourashava_frontend.notice.index', $this->data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pourashava_frontend.notice.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $notice          = new Notic();
      $notice->admin_id            = auth()->user()->id;

      // upload picture
      $path = FileStorageHelper::upload($request->file('file'), 'notice', null, 300, 300);
      $path && $notice->file = $path;

      $notice->name          = $request->input('name');
      $notice->details          = $request->input('details');

      $notice->save();

      $request->session()->flash( 'message', ' নোটিশ তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.notics.index' );
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
      $this->data['notice']=Notic::findOrFail($id);
      return view('pourashava_frontend.notice.create',  $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Notic $notic)
    {

      $notice->admin_id            = auth()->user()->id;

      // upload picture
      $path = FileStorageHelper::upload($request->file('file'), 'notice', null, 300, 300);
      $path && $notice->file = $path;

      $notice->name          = $request->input('name');
      $notice->details          = $request->input('details');

      $notice->save();

      $request->session()->flash( 'message', ' নোটিশ তথ্য সংরক্ষণ করা হয়েছে ' );
      $request->session()->flash( 'alert-type', 'success' );
      return redirect()->route( 'admin.settings.notics.index' );
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
