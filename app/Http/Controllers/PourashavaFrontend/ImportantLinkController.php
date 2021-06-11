<?php

namespace App\Http\Controllers\PourashavaFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportantLink;
use Auth;

class ImportantLinkController extends Controller
{
    /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
        $this->data['important_links'] = ImportantLink::where("admin_id",Auth::guard('admin')->user()->id)->get();;
        return view( 'pourashava_frontend.important_link.index', $this->data );
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('pourashava_frontend.important_link.create');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        $important_link          = new ImportantLink();
        $important_link->admin_id            = auth()->user()->id;



        $important_link->name          = $request->input('name');
        $important_link->url          = $request->input('url');

        $important_link->save();

        $request->session()->flash( 'message', ' গুরুত্বপূর্ণ লিঙ্ক তথ্য সংরক্ষণ করা হয়েছে ' );
        $request->session()->flash( 'alert-type', 'success' );
        return redirect()->route( 'admin.settings.important_links.index' );
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
        $this->data['important_link']=ImportantLink::find($id);
        return view('pourashava_frontend.important_link.create',  $this->data);
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, ImportantLink $important_link)
      {


        $important_link->admin_id            = auth()->user()->id;


        $important_link->name          = $request->input('name');
        $important_link->name          = $request->input('url');

        $important_link->save();

        $request->session()->flash( 'message', ' গুরুত্বপূর্ণ লিঙ্ক তথ্য সংরক্ষণ করা হয়েছে ' );
        $request->session()->flash( 'alert-type', 'success' );
        return redirect()->route( 'admin.settings.important_links.index' );
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
