<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use DateTime;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $email = $request->email;
        $password = $request->password;
        //$password = Hash::make($password);

        $checkUser = User::where('email', '=', $email)->where('original_password', '=', $password)->count();
        $User = User::where('email', '=', $email)->where('original_password', '=', $password)->get();

        
        
        
        return [
            'check' => $checkUser,
            'info' => $User,
            'email'=> $email,
            'password'=> $password,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }




    public function ns()
    {
        // $nanotime = system('date +%s%N');

        //echo hrtime(true), PHP_EOL;
        //print_r(hrtime());
        //$now = DateTime::createFromFormat('U.u', microtime(true));

        //dd($now);
        //echo $now->format("m-d-Y H:i:s.u");

        // NANOSECONDS
        // $currentNanoSecond = (int) (microtime(true) * 1000000000);

        // dd($currentNanoSecond);
        #echo 'CUR NANOSECONDS:'.$currentNanoSecond.PHP_EOL;
        #echo 'DATE:'.date('d/m/Y H:i:s', intval($currentNanoSecond/1000000000)).PHP_EOL;



        // MILLISECONDS
        // $currentMilliSecond = (int) (microtime(true) * 1000);
        // echo 'CUR MILLISECONDS:'.$currentMilliSecond.PHP_EOL;
        // echo 'DATE:'.date('d/m/Y H:i:s', intval($currentMilliSecond/1000)).PHP_EOL;
        

        // echo '<br><br>';

        // // MICROSECONDS
        // $currentMicroSecond = (int) (microtime(true) * 1000000);
        // echo 'CUR MICROSECONDS:'.$currentMicroSecond.PHP_EOL;
        // echo 'DATE:'.date('d/m/Y H:i:s', intval($currentMicroSecond/1000000)).PHP_EOL;
        
        // echo '<br><br>';
        // // NANOSECONDS
        // $currentNanoSecond = (int) (microtime(true) * 1000000000);
        // echo 'CUR NANOSECONDS:'.$currentNanoSecond.PHP_EOL;
        // echo 'DATE:'.date('d/m/Y H:i:s', intval($currentNanoSecond/1000000000)).PHP_EOL;


        $date = "2020-11-03 00:00:00";
        $new_date = strtotime($date);
        $ns1 = $new_date * 1000000000;


        $date = "2022-11-03 00:00:00";
        $new_date = strtotime($date);
        $ns2 = $new_date * 1000000000;
        
        echo $ns1;
        echo '<br>';
        echo $ns2;
        //dd($ns);

    }
}
