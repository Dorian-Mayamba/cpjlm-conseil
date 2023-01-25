<?php

namespace App\Http\Controllers;
use App\Models\Partners;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function dashboard(){
        $partners = Partners::all();
        return view('admin.dashboard',compact('partners'));
    }

    /**
     * @param int $id
     * @return Illuminate\Http\Response
     */

    public function show($id){
        $partner = Partners::find($id);
        return view('admin.show',['partner'=>$partner]);
    }
}
