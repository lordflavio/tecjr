<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Model\Noticias;
use App\Model\Patrocinio;
use App\Model\Admin;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Admin';
        $patrocinio = Patrocinio::all();
        $noticias = Noticias::all();

        if(!isset($admin)){
            return redirect('/');
        }else{
            return view('system/home',compact('title','admin','patrocinio','noticias'));

        }
    }
}
