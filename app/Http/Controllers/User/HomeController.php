<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth:user');
    }
    //
    function dashboard()
    {
        //return dd(Auth::user());
        return view('welcome');
    }


    
}
