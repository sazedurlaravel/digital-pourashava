<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\SebaList;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $superAdmin = Admin::role('super_admin')->first();
        $this->data['information']=Information::where("admin_id",$superAdmin->id)->first();
        $this->data['sebas']=SebaList::where("admin_id",$superAdmin->id)->get()->all();
    
        return view("frontend.index", $this->data);
    }
}
