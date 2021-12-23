<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth:admin');
    }


    public function home()
    {
    	return view('welcome');
    }


    //
    public function dashboard()
    {
        //return dd(Auth::user());
        return view('welcome');
    }
}
