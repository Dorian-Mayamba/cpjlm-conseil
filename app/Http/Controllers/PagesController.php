<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;
use Illuminate\Http\Response;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('https');
    }
    
    /**
     * @return Illuminate\Http\Response
     */
    public function index(){
        return view('Pages.index');
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function about(){
        return view('Pages.about');
    }
    /**
     * @return Illuminate\Http\Response
     */
    public function formation(){
        return view('Pages.formations');
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function mission(){
        return view('Pages.missions');
    }

      /**
     * @return Illuminate\Http\Response
     */
    public function partners(){
        $partners = Partners::all();
        return view('Pages.partners',['partners'=>$partners]);
    }

    /**
     * @return Illminate\Contracts\View\View
     */

    public function mines(): \Illuminate\Contracts\View\View{
        return view('Pages.mines');
    }
}
