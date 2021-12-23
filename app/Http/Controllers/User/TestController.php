<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Auth;
use DB;

class TestController extends Controller
{
    //
    //
    public function __construct()
    {
    $this->middleware('auth:user');
    }
    //
    function masuk(Request $request)
    {
        //dd($request->all());
        if(!empty($request->all())){
            $item = $request->item;
            $userId = Auth::id();
            //dd($userId);
            
            $query = DB::table('test_data')->insert([
                'item' => $item,
                'userId' => $userId,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
            

            if ($query) {
                return redirect('test/senarai');
            } else {
                return view('test.form');
            }

            
        } else {
            return view('test.form');
        }
        
    }


    function senarai()
    {
        return view('test.list');
    }


    function kemaskini()
    {
        return view('test.form');
    }
}
