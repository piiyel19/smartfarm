<?php

namespace App\Http\Controllers;

// use InfluxDB2\Client;
// use InfluxDB2\Model\WritePrecision;
// use InfluxDB2\Point;

use InfluxDB;
use InfluxDB\Client as InfluxClient;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Auth;

use DateTime;
use DateTimeZone;

use Session;


class InfluxController extends Controller
{
    //
    public function __construct()
    {
    	$client = new InfluxClient(
                '211.24.120.150',
                '8086',
                '',
                '',
                false,
                false,
                0
            );


    	$this->client = $client;


    	$this->middleware('auth:user');
    }




    public function test_connection()
    {
    	# First, let's make use of Composer so that we can access the Library
		require "vendor/autoload.php";

		// use influxdata/influxdb-client-php/InfluxDB2;


		# You can generate a Token from the "Tokens Tab" in the UI
		// $token = '...';
		// $org = 'influx';
		// $bucket = 'Weather_sensor';

		// # Next, we will instantiate the client and establish a connection
		// $client = new Client([
		// 	"url" => "http://211.24.120.150:8086", // url and port of your instance
		// 	"token" => $token,
		// 	"bucket" => $bucket,
		// 	"org" => $org
		// ]);

		// $writeApi = $client->createWriteApi();


		// $queryApi = $client->createQueryApi();
		// $query = "from(bucket: \"{$bucket}\") |> range(start: -1h)";
		// $tables = $queryApi->query($query);

		// dd($tables);


		//$result = InfluxDB::query('select * from nict_weather LIMIT 5');
		//$result = InfluxDB2::query('select * from soil_0095690e00001029 LIMIT 5');

		//$result = InfluxDB2::query('select * from soil_0095690e00001988 LIMIT 5');

		//dd($result);


		

		$db = $this->client->selectDB('Weather_sensor');

		$result = $db->query("select * from nict_weather LIMIT 5");

		$points = $result->getPoints();

		



		dd($points);




    	return 'Sufian';
    }



    public function NPK_sensor()
    {
    	$db = $this->client->selectDB('NPK_sensor');

		$result = $db->query("select * from soil_0095690e00001029 LIMIT 5");

		$points = $result->getPoints();

		



		dd($points);




    	return 'Sufian';
    }


    function create_item_configuration(request $request)
    {
        $id_no = $request->id_no;
        $name_plant = $request->name_plant;
        $iot_sensor = $request->iot_sensor;
        $parameter = $request->parameter;
        $range_start = $request->range_start;
        $range_end = $request->range_end;
        $analysis = $request->analysis;
        $effect = $request->effect;
        $correction = $request->correction;
        $additional_text = $request->additional_text;
        $id_plant = $request->id_plant;



        $file = $request->file;

        //dd($file);
        $path = '';
        $extension = '';
        $filename = '';

        if(!empty($file)){
            $this->validate($request, [
                    'file' => 'required',
                    // 'file.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,txt,csv,xlsx,xls,docx,ppt,odt,ods,odp'
                    'file.*' => 'mimes:jpeg,png,jpg'
            ]);

            //dd($request->file('file'));

            if($request->hasfile('file'))
            {
                $i = '1';
                
                foreach($request->file('file') as $file)
                {
                    $uid = Auth::id();
                    $name = $uid.'_'.time().$i.'.'.$file->getClientOriginalExtension();


                    $file->move(public_path().'/files/', $name);  
                    $data[] = $name;  

                    $path = url('/').'/public/files/'.$name; 
                    $extension = $file->getClientOriginalExtension();

                    //dd($path);

                }
            }
        }


        //dd($path);


        if(!empty($id_no)){

            if(!empty($path)){
                DB::table('data_conf_item')
                ->where('id',$id_no)
                ->update([
                    'iot_sensor'=>$iot_sensor,
                    'parameter'=>$parameter,
                    'range_start'=>$range_start,
                    'range_end'=>$range_end,
                    'analysis'=>$analysis,
                    'effect'=>$effect,
                    'correction'=>$correction,
                    'id_plant'=>$id_plant,
                    'additional_text'=>$additional_text,
                    'filename'=>$path,
                    'extension'=>$extension
                ]);
            } else {
                DB::table('data_conf_item')
                ->where('id',$id_no)
                ->update([
                    'iot_sensor'=>$iot_sensor,
                    'parameter'=>$parameter,
                    'range_start'=>$range_start,
                    'range_end'=>$range_end,
                    'analysis'=>$analysis,
                    'effect'=>$effect,
                    'correction'=>$correction,
                    'id_plant'=>$id_plant,
                    'additional_text'=>$additional_text
                ]);
            }

        } else {


            $check = DB::table('data_conf_register')->where('id_plant',$id_plant)->get();
            if(count($check)>0){



            } else {
                $date = date('Y-m-d H:i:s');

                DB::table('data_conf_register')->insert([
                    'id_plant'=>$id_plant,
                    'name_plant'=>$name_plant,
                    'created_date'=>$date
                ]);
            }


            DB::table('data_conf_item')
            ->insert([
                'iot_sensor'=>$iot_sensor,
                'parameter'=>$parameter,
                'range_start'=>$range_start,
                'range_end'=>$range_end,
                'analysis'=>$analysis,
                'effect'=>$effect,
                'correction'=>$correction,
                'id_plant'=>$id_plant,
                'additional_text'=>$additional_text,
                'filename'=>$path,
                'extension'=>$extension
            ]);


        }
    }


    function get_details_item(Request $request)
    {
        $id = $request->id;
        $data = DB::table('data_conf_item')->where('id',$id)->first();
        if(!empty($data)){
            echo json_encode($data);
        }

        echo '';
    }


    function get_list_item(request $request)
    {
        $id_plant = $request->id_plant;

        $check = DB::table('data_conf_item')->where('id_plant',$id_plant)->get();
        if(count($check)>0){
            foreach($check as $data)
            {
                $img = $data->filename;
                if(!empty($img)){
                    $img = '<img src="'.$img.'" style="width:100px;"></img>';
                }
                echo '
                        <tr>
                            <td><a style="cursor:pointer;" onclick="editItem('.$data->id.')">Edit</a></td>
                            <td>'.$img.'</td>
                            <td>'.$data->iot_sensor.'</td>
                            <td>'.$data->parameter.'</td>
                            <td>'.$data->range_start.'</td>
                            <td>'.$data->range_end.'</td>
                            <td>'.$data->analysis.'</td>
                            <td>'.$data->effect.'</td>
                            <td>'.$data->correction.'</td>
                            <td>'.$data->additional_text.'</td>
                            <td><a style="cursor:pointer;" onclick="deleteItem('.$data->id.')">Delete</a></td>
                        </tr>
                     ';
            }
        } 
    }


    function get_list_plant(request $request)
    {
        $id_plant = $request->id_plant;

        $check = DB::table('data_conf_register')->get();
        if(count($check)>0){
            foreach($check as $data)
            {
                echo '
                        <tr>
                            <td>'.$data->name_plant.'</td>
                            <td>'.date('d M Y H:i', strtotime($data->created_date)).'</td>
                            <td><a style="cursor:pointer;" onclick="deletePlant('.$data->id_plant.')">Delete</a></td>
                            <td><a href="'.url('/').'/data_configuration_edit/'.$data->id_plant.'">Edit</a></td>

                        </tr>
                     ';
            }
        } 
    }



    function delete_item(request $request)
    {
        $id_plant = $request->id_plant;
        $id = $request->id;

        DB::table('data_conf_item')->where('id_plant',$id_plant)->where('id',$id)->delete();
    }   


    function select_farm()
    {

        $active_farm = DB::table('customers')
                        ->join('customers_details','customers.id_plant','=','customers_details.id_plant')
                        ->select('customers_details.id','customers_details.location','customers.fullname','customers_details.id_plant','customers_details.plant','customers_details.filename','customers.status_customer')
                        ->get();

        //dd($active_farm);



        //return 'ok';
        return view('farm.select_farm')->with(array('active_farm'=>$active_farm));
    }


    function dashboard1()
    {
        $id_plant = $_GET['id'];
        $db_npk = $this->db_npk($id_plant);
        $npk = $this->get_npk($id_plant);

        $db_weather = $this->db_weather($id_plant);
        $weather = $this->get_weather($id_plant);

        $db_adv = $this->db_adv($id_plant);
        $adv = $this->get_adv($id_plant);
        


        // $date1 = '2021-12-20 00:00:00';
        // $date2 = '2020-12-21 00:00:00';
        $date1 = '';
        $date2 = '';

        if(!empty($_GET['start_date'])){
            $date1 = $_GET['start_date'];
            $date1 = date('Y-m-d',strtotime($date1));
        } 


        if(!empty($_GET['end_date'])){
            $date2 = $_GET['end_date'];
            
            $date2 = date('Y-m-d',strtotime($date2.'+1 day'));
            //dd($date2);
        } 


        //  dd($date1);

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $db = $this->client->selectDB($db_npk);

        if(empty($_GET['start_date'])){

            $date1 = date('Y-m-d',strtotime($date2.'-1 day'));
            $date2 = date('Y-m-d',strtotime($date2.'+1 day'));

            // $result = $db->query("select * from ".$npk." ORDER BY time DESC LIMIT 1");
            $sql = "select * from ".$npk." WHERE time> '".$date1."' and time< '".$date2."' ORDER BY time DESC LIMIT 1";
            $result = $db->query($sql);
            $result_more = $db->query("select * from ".$npk." ORDER BY time ASC LIMIT 1000");
        } else {
            $sql = "select * from ".$npk." WHERE time> '".$date1."' and time< '".$date2."' ORDER BY time DESC LIMIT 1";
            $sql_more = "select * from ".$npk." WHERE time> '".$date1."' and time< '".$date2."' ORDER BY time ASC LIMIT 100000";
            $result = $db->query($sql);
            $result_more = $db->query($sql_more);
        }

        
        //$result = $db->query("select * from ".$npk." WHERE time> '2021-11-26' and time<'2021-11-27' ORDER BY time DESC LIMIT 1000");
        //$result = $db->query("select * from ".$npk." WHERE time> ".$date1." and time< ".$date2." ORDER BY time DESC LIMIT 1000");
        $points = $result->getPoints();
        $points_more = $result_more->getPoints();

        //dd($points);

        $data = array(
                        "time"=>"",
                        "soil_conductivity"=>"0",
                        "soil_k"=>"0",
                        "soil_moist"=>"0",
                        "soil_n"=>"0",
                        "soil_p"=>"0",
                        "soil_ph"=>"0",
                        "soil_temp"=>"0"
                    );


        

        foreach($points as $key => $val)
        {
            //dd($val);
            $influTime = $val["time"];
            $soil_conductivity = $val["soil_conductivity"];
            $soil_k = $val["soil_k"];
            $soil_moist = $val["soil_moist"];
            $soil_n = $val["soil_n"];
            $soil_p = $val["soil_p"];
            $soil_ph = $val["soil_ph"];
            $soil_temp = $val["soil_temp"];
            
            $time = $this->get_format_time($influTime);



            $data = array(
                        "time"=>$time,
                        "soil_conductivity"=>$soil_conductivity,
                        "soil_k"=>$soil_k,
                        "soil_moist"=>$soil_moist,
                        "soil_n"=>$soil_n,
                        "soil_p"=>$soil_p,
                        "soil_ph"=>$soil_ph,
                        "soil_temp"=>$soil_temp
                    );
            
            //echo $time;
            //echo '<br>';
        }   


        $timeSeries = array();
        $timeSeries_n = array();
        $timeSeries_p = array();
        $timeSeries_k = array();
        $timeSeries_moisture = array();
        $timeSeries_pH = array();
        $timeSeries_temp = array();
        $timeSeries_ec = array();

        foreach($points_more as $key => $val)
        {
            //dd($val);
            $influTime = $val["time"];
            $soil_conductivity = $val["soil_conductivity"];
            $soil_k = $val["soil_k"];
            $soil_moist = $val["soil_moist"];
            $soil_n = $val["soil_n"];
            $soil_p = $val["soil_p"];
            $soil_ph = $val["soil_ph"];
            $soil_temp = $val["soil_temp"];
            
            $time = $this->get_format_time($influTime);


            array_push($timeSeries,$time);
            array_push($timeSeries_n,$soil_n);
            array_push($timeSeries_p,$soil_p);
            array_push($timeSeries_k,$soil_k);


            array_push($timeSeries_moisture,$soil_moist);
            array_push($timeSeries_pH,$soil_ph);
            array_push($timeSeries_temp,$soil_temp);
            array_push($timeSeries_ec,$soil_conductivity);
            
            //echo $time;
            //echo '<br>';
        }   





        $ts = array();
        $ts = [
                'time'=>$timeSeries,
                'n'=>$timeSeries_n,
                'p'=>$timeSeries_p,
                'k'=>$timeSeries_k,
                'soil_moist'=>$timeSeries_moisture,
                'soil_ph'=>$timeSeries_pH,
                'soil_temp'=>$timeSeries_temp,
                'soil_conductivity'=>$timeSeries_ec
            ];

        




        // adv sensor
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $db_weather = $this->client->selectDB($db_weather);

        if(empty($_GET['start_date'])){
            $result_weather = $db_weather->query("select * from ".$weather." ORDER BY time DESC LIMIT 1");
        } else {
            $sql = "select * from ".$weather." WHERE time> '".$date1."' and time< '".$date2."' ORDER BY time DESC LIMIT 1";
            $result_weather = $db_weather->query($sql);
        }

        
        //$result = $db->query("select * from ".$npk." WHERE time> '2021-11-26' and time<'2021-11-27' ORDER BY time DESC LIMIT 1000");
        //$result = $db->query("select * from ".$npk." WHERE time> ".$date1." and time< ".$date2." ORDER BY time DESC LIMIT 1000");
        $points_weather = $result_weather->getPoints();


        $data_adv = array(
                        "time"=>"",
                        "Humidity"=>"0",
                        "Temperature"=>"0",
                        "UVRadiation"=>"0",
                        "SolarRadiationPower"=>"0",
                        "AccumulatedSolarRadiation"=>"0",
                        "UVRadiation"=>"0"
                    );

        foreach($points_weather as $key => $val)
        {
            //dd($val);
            $influTime = $val["time"];
            $Humidity = $val["Humidity"];
            $Temperature = $val["Temperature"];
            $UVRadiation = $val["UVRadiation"];
            $SolarRadiationPower = $val["SolarRadiationPower"];
            $AccumulatedSolarRadiation = $val["AccumulatedSolarRadiation"];
            $UVRadiation = $val["UVRadiation"];



            $data_adv = array(
                        "Humidity"=>$Humidity,
                        "Temperature"=>$Temperature,
                        "SolarRadiationPower"=>$SolarRadiationPower,
                        "AccumulatedSolarRadiation"=>$AccumulatedSolarRadiation,
                        "UVRadiation"=>$UVRadiation
                    );


        }

        //dd($data_adv);




        if(empty($_GET['start_date'])){
            $date1_selected = date('Y-m-d',strtotime($time));
            $date2_selected = date('Y-m-d',strtotime($time));
        } else {
            $date1_selected = $_GET['start_date'];
            $date2_selected = $_GET['end_date'];
        }


        //dd($data);

        //dd($points);


        //return 'ok';
        return view('farm.dashboard')->with(array("data"=>$data,"date1_selected"=>$date1,"date2_selected"=>$date2,"data_adv"=>$data_adv,'ts'=>$ts));
    }



    function dashboard2()
    {

        $month = '';
        $year = '';

        if(!empty($_GET['month'])){
            $month = $_GET['month'];
            if($month<10){
                $month = '0'.$month;
            }
            $year = $_GET['year'];
            $start_date = $year."-".$month."-01";
            $end_date = date("Y-m-t", strtotime($start_date));
            $compare_start_date = date('Y-m-d',strtotime($start_date.'-1 month'));
            $compare_end_date = date("Y-m-t", strtotime($compare_start_date));
        } else {
            $date = date('Y-m-d');
            $month = date('m',strtotime($date));
            $year = date('Y',strtotime($date));
            $start_date = $year."-".$month."-01";
            $end_date = date("Y-m-t", strtotime($start_date));
            $compare_start_date = date('Y-m-d',strtotime($start_date.'-1 month'));
            $compare_end_date = date("Y-m-t", strtotime($compare_start_date));
        }



        $id_plant = $_GET['id'];
        $db_npk = $this->db_npk($id_plant);
        $npk = $this->get_npk($id_plant);

        $db_weather = $this->db_weather($id_plant);
        $weather = $this->get_weather($id_plant);

        $db_adv = $this->db_adv($id_plant);
        $adv = $this->get_adv($id_plant);
        

        // initiliaze user farm
        $data_farm = DB::table('customers_details')->where('id_plant',$id_plant)->first();

        $plant = $data_farm->plant;

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $db_weather = $this->client->selectDB($db_weather);
        $sql = "select * from ".$weather." WHERE time> '".$start_date."' and time< '".$end_date."' ORDER BY time DESC LIMIT 1";
        $result_weather = $db_weather->query($sql);
        $points_weather = $result_weather->getPoints();

        $data = array();


        $high_state = '';
        $low_state = '';


        if(!empty($points_weather)){
            foreach($points_weather as $key => $val)
            {
                //dd($val);
                $influTime = $val["time"];
                $Humidity = $val["Humidity"];
                $Temperature = $val["Temperature"];
                $UVRadiation = $val["UVRadiation"];
                $SolarRadiationPower = $val["SolarRadiationPower"];
                $AccumulatedSolarRadiation = $val["AccumulatedSolarRadiation"];
                $UVRadiation = $val["UVRadiation"];
                $data['Humidity'] = $this->check_state('Humidity',$Humidity,$plant);
                $data['Outside Temperature'] = $this->check_state('Outside Temperature',$Temperature,$plant);

                if($data['Humidity']["state"]=='High'){
                    $high_state .= '<tr><td>Humidity</td><td><a onclick="getDetails('.$data['Humidity']["id_state"].')">High</a></td></tr>';
                }


                if($data['Humidity']["state"]=='Low'){
                    $low_state .= '<tr><td>Humidity</td><td><a onclick="getDetails('.$data['Humidity']["id_state"].')">Low</a></td></tr>';
                }




                if($data['Outside Temperature']["state"]=='High'){
                    $high_state .= '<tr><td>Outside Temperature</td><td><a onclick="getDetails('.$data['Outside Temperature']["id_state"].')">High</a></td></tr>';
                }


                if($data['Outside Temperature']["state"]=='Low'){
                    $low_state .= '<tr><td>Outside Temperature</td><td><a onclick="getDetails('.$data['Outside Temperature']["id_state"].')">Low</a></td></tr>';
                }
            }
        }




        $sql2 = "select * from ".$weather." WHERE time> '".$compare_start_date."' and time< '".$compare_end_date."' ORDER BY time DESC LIMIT 1";
        $result_weather2 = $db_weather->query($sql2);
        $points_weather2 = $result_weather2->getPoints();

        if(!empty($points_weather2)){
            foreach($points_weather2 as $key2 => $val2)
            {
                //dd($val);
                $influTime = $val2["time"];
                $Humidity = $val2["Humidity"];
                $Temperature = $val2["Temperature"];
                $UVRadiation = $val2["UVRadiation"];
                $SolarRadiationPower = $val2["SolarRadiationPower"];
                $AccumulatedSolarRadiation = $val2["AccumulatedSolarRadiation"];
                $UVRadiation = $val2["UVRadiation"];
                $data['Humidity Old'] = $this->check_state('Humidity',$Humidity,$plant);
                $data['Outside Temperature Old'] = $this->check_state('Outside Temperature',$Temperature,$plant);
            }
        }






        $db_npk = $this->client->selectDB($db_npk);
        $sql = "select * from ".$npk." WHERE time> '".$start_date."' and time< '".$end_date."' ORDER BY time DESC LIMIT 1";
        $result = $db_npk->query($sql);
        $points = $result->getPoints();

        //dd($points);

        if(!empty($points)){
            foreach($points as $key => $val)
            {
                //dd($val);
                $influTime = $val["time"];
                $soil_conductivity = $val["soil_conductivity"];
                $soil_k = $val["soil_k"];
                $soil_moist = $val["soil_moist"];
                $soil_n = $val["soil_n"];
                $soil_p = $val["soil_p"];
                $soil_ph = $val["soil_ph"];
                $soil_temp = $val["soil_temp"];


                
                $time = $this->get_format_time($influTime);

                $data['EC'] = $this->check_state('Electrical Conductivity',$soil_conductivity,$plant);
                $data['Soil Moisture'] = $this->check_state('Soil Moisture',$soil_moist,$plant);
                $data['pH'] = $this->check_state('pH',$soil_ph,$plant);
                $data['Soil Temperature'] = $this->check_state('Soil Temperature',$soil_temp,$plant);
                $data['Phosphorus'] = $this->check_state('Phosphorus',$soil_p,$plant);
                $data['Potassium'] = $this->check_state('Potassium',$soil_k,$plant);
                $data['Nitrogen'] = $this->check_state('Nitrogen',$soil_n,$plant);
                //echo $time;
                //echo '<br>';


                if($data['EC']["state"]=='High'){
                    $high_state .= '<tr><td>EC</td><td><a onclick="getDetails('.$data['EC']["id_state"].')">High</a></td></tr>';
                }


                if($data['EC']["state"]=='Low'){
                    $low_state .= '<tr><td>EC</td><td><a onclick="getDetails('.$data['EC']["id_state"].')">Low</a></td></tr>';
                }




                if($data['Soil Moisture']["state"]=='High'){
                    $high_state .= '<tr><td>Soil Moisture</td><td><a onclick="getDetails('.$data['OSoil Moisture']["id_state"].')">High</a></td></tr>';
                }


                if($data['Soil Moisture']["state"]=='Low'){
                    $low_state .= '<tr><td>Soil Moisture</td><td><a onclick="getDetails('.$data['Soil Moisture']["id_state"].')">Low</a></td></tr>';
                }



                if($data['pH']["state"]=='High'){
                    $high_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['pH']["id_state"].')">High</a></td></tr>';
                }


                if($data['pH']["state"]=='Low'){
                    $low_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['pH']["id_state"].')">Low</a></td></tr>';
                }


                if($data['Soil Temperature']["state"]=='High'){
                    $high_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['Soil Temperature']["id_state"].')">High</a></td></tr>';
                }


                if($data['Soil Temperature']["state"]=='Low'){
                    $low_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['Soil Temperature']["id_state"].')">Low</a></td></tr>';
                }



                if($data['Phosphorus']["state"]=='High'){
                    $high_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['Phosphorus']["id_state"].')">High</a></td></tr>';
                }


                if($data['Phosphorus']["state"]=='Low'){
                    $low_state .= '<tr><td>Phosphorus</td><td><a onclick="getDetails('.$data['Phosphorus']["id_state"].')">Low</a></td></tr>';
                }




                if($data['Potassium']["state"]=='High'){
                    $high_state .= '<tr><td>Potassium</td><td><a onclick="getDetails('.$data['Potassium']["id_state"].')">High</a></td></tr>';
                }


                if($data['Potassium']["state"]=='Low'){
                    $low_state .= '<tr><td>Potassium</td><td><a onclick="getDetails('.$data['Potassium']["id_state"].')">Low</a></td></tr>';
                }



                if($data['Nitrogen']["state"]=='High'){
                    $high_state .= '<tr><td>Nitrogen</td><td><a onclick="getDetails('.$data['Nitrogen']["id_state"].')">High</a></td></tr>';
                }


                if($data['Nitrogen']["state"]=='Low'){
                    $low_state .= '<tr><td>Nitrogen</td><td><a onclick="getDetails('.$data['Nitrogen']["id_state"].')">Low</a></td></tr>';
                }


            }   
        } else {
            $data['EC'] = $this->check_state('Electrical Conductivity',0,$plant);
            $data['Soil Moisture'] = $this->check_state('Soil Moisture',0,$plant);
            $data['pH'] = $this->check_state('pH',0,$plant);
            $data['Soil Temperature'] = $this->check_state('Soil Temperature',0,$plant);
            $data['Phosphorus'] = $this->check_state('Phosphorus',0,$plant);
            $data['Potassium'] = $this->check_state('Potassium',0,$plant);
            $data['Nitrogen'] = $this->check_state('Nitrogen',0,$plant);


            if($data['EC']["state"]=='High'){
                $high_state .= '<tr><td>EC</td><td><a onclick="getDetails('.$data['EC']["id_state"].')">High</a></td></tr>';
            }


            if($data['EC']["state"]=='Low'){
                $low_state .= '<tr><td>EC</td><td><a onclick="getDetails('.$data['EC']["id_state"].')">Low</a></td></tr>';
            }




            if($data['Soil Moisture']["state"]=='High'){
                $high_state .= '<tr><td>Soil Moisture</td><td><a onclick="getDetails('.$data['OSoil Moisture']["id_state"].')">High</a></td></tr>';
            }


            if($data['Soil Moisture']["state"]=='Low'){
                $low_state .= '<tr><td>Soil Moisture</td><td><a onclick="getDetails('.$data['Soil Moisture']["id_state"].')">Low</a></td></tr>';
            }



            if($data['pH']["state"]=='High'){
                $high_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['pH']["id_state"].')">High</a></td></tr>';
            }


            if($data['pH']["state"]=='Low'){
                $low_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['pH']["id_state"].')">Low</a></td></tr>';
            }


            if($data['Soil Temperature']["state"]=='High'){
                $high_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['Soil Temperature']["id_state"].')">High</a></td></tr>';
            }


            if($data['Soil Temperature']["state"]=='Low'){
                $low_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['Soil Temperature']["id_state"].')">Low</a></td></tr>';
            }



            if($data['Phosphorus']["state"]=='High'){
                $high_state .= '<tr><td>pH</td><td><a onclick="getDetails('.$data['Phosphorus']["id_state"].')">High</a></td></tr>';
            }


            if($data['Phosphorus']["state"]=='Low'){
                $low_state .= '<tr><td>Phosphorus</td><td><a onclick="getDetails('.$data['Phosphorus']["id_state"].')">Low</a></td></tr>';
            }




            if($data['Potassium']["state"]=='High'){
                $high_state .= '<tr><td>Potassium</td><td><a onclick="getDetails('.$data['Potassium']["id_state"].')">High</a></td></tr>';
            }


            if($data['Potassium']["state"]=='Low'){
                $low_state .= '<tr><td>Potassium</td><td><a onclick="getDetails('.$data['Potassium']["id_state"].')">Low</a></td></tr>';
            }



            if($data['Nitrogen']["state"]=='High'){
                $high_state .= '<tr><td>Nitrogen</td><td><a onclick="getDetails('.$data['Nitrogen']["id_state"].')">High</a></td></tr>';
            }


            if($data['Nitrogen']["state"]=='Low'){
                $low_state .= '<tr><td>Nitrogen</td><td><a onclick="getDetails('.$data['Nitrogen']["id_state"].')">Low</a></td></tr>';
            }

        }




        $sql2 = "select * from ".$npk." WHERE time> '".$compare_start_date."' and time< '".$compare_end_date."' ORDER BY time DESC LIMIT 1";
        $result2 = $db_npk->query($sql2);
        $points2 = $result2->getPoints();

        //dd($points);

        if(!empty($points2)){
            foreach($points2 as $key => $val)
            {
                //dd($val);
                $influTime = $val["time"];
                $soil_conductivity = $val["soil_conductivity"];
                $soil_k = $val["soil_k"];
                $soil_moist = $val["soil_moist"];
                $soil_n = $val["soil_n"];
                $soil_p = $val["soil_p"];
                $soil_ph = $val["soil_ph"];
                $soil_temp = $val["soil_temp"];
                
                $time = $this->get_format_time($influTime);

                $data['EC Old'] = $this->check_state('Electrical Conductivity',$soil_conductivity,$plant);
                $data['Soil Moisture Old'] = $this->check_state('Soil Moisture',$soil_moist,$plant);
                $data['pH Old'] = $this->check_state('pH',$soil_ph,$plant);
                $data['Soil Temperature Old'] = $this->check_state('Soil Temperature',$soil_temp,$plant);
                $data['Potassium Old'] = $this->check_state('Potassium',$soil_k,$plant);
                $data['Phosphorus Old'] = $this->check_state('Phosphorus',$soil_p,$plant);
                $data['Nitrogen Old'] = $this->check_state('Nitrogen',$soil_n,$plant);
                //echo $time;
                //echo '<br>';
            }   
        } else {
            $data['EC Old'] = $this->check_state('Electrical Conductivity',0,$plant);
            $data['Soil Moisture Old'] = $this->check_state('Soil Moisture',0,$plant);
            $data['pH Old'] = $this->check_state('pH',0,$plant);
            $data['Soil Temperature Old'] = $this->check_state('Soil Temperature',0,$plant);
            $data['Potassium Old'] = $this->check_state('Potassium',0,$plant);
            $data['Phosphorus Old'] = $this->check_state('Phosphorus',0,$plant);
            $data['Nitrogen Old'] = $this->check_state('Nitrogen',0,$plant);
        }




        //dd($data);
        //return 'ok';
        if(!empty($_GET['month'])){
            $month = $_GET['month'];
            $year = $_GET['year'];
        } else {
            $month = '';
            $year = '';
        }
        

        return view('farm.dashboard2')->with(array('data'=>$data,'month'=>$month,'year'=>$year,'high_state'=>$high_state,'low_state'=>$low_state));
    }



    function multispectra(Request $request)
    {
        $file = $request->file;

        //dd($file);
        $path = '';
        $extension = '';
        $filename = '';

        if(!empty($file)){
            $this->validate($request, [
                    'file' => 'required',
                    // 'file.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,txt,csv,xlsx,xls,docx,ppt,odt,ods,odp'
                    'file.*' => 'mimes:jpeg,png,jpg'
            ]);

            //dd($request->file('file'));

            if($request->hasfile('file'))
            {
                $i = '1';
                
                foreach($request->file('file') as $file)
                {
                    $uid = Auth::id();
                    $name = $uid.'_'.time().$i.'.'.$file->getClientOriginalExtension();


                    $file->move(public_path().'/files/', $name);  
                    $data[] = $name;  

                    $path = url('/').'/public/files/'.$name; 
                    $extension = $file->getClientOriginalExtension();

                    //dd($path);

                }
            }
        }


        if(!empty($path)){
            $id = $request->id;
            DB::table('multispectra_history')->insert([
                'filename'=>$path,
                'extension'=>$extension,
                'id_plant'=>$id,
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Auth::id()
            ]);
        }


        return redirect('/dashboard3?id='.$id)->with(array('filename'=>$path));
    }



    function check_state($iot_sensor,$val,$plant)
    {
        $val = number_format((float)$val, 2, '.', '');
        // echo $val;
        // echo '<br>';
        // echo $plant;

        $real_val = $val;

        $check_condition = DB::table('data_conf_item')
                            ->where('id_plant',$plant)
                            ->where('iot_sensor',$iot_sensor)
                            ->whereRaw("'".$val."' BETWEEN range_start AND range_end")
                            ->first();

        //dd($check_Humidity);
        if(!empty($check_condition)){
                
            $val = $check_condition->parameter;
            $id_state = $check_condition->id;

        } else {
            $check_condition = DB::table('data_conf_item')
                            ->where('id_plant',$plant)
                            ->where('iot_sensor',$iot_sensor)
                            ->orderBy('range_end','desc')
                            ->first();

            $range_end = $check_condition->range_end;
            if($val>$range_end){
                $val = 'Max : Out Of Range';
            }


            $check_condition = DB::table('data_conf_item')
                            ->where('id_plant',$plant)
                            ->where('iot_sensor',$iot_sensor)
                            ->orderBy('range_start','asc')
                            ->first();

            $range_start = $check_condition->range_start;
            if($val<$range_end){
                $val = 'Min : Out Of Range';
            }

            $id_state = '0';



            
        }

        $data = array('state'=>$val,'id_state'=>$id_state,'real_val'=>$real_val);
        return $data;
        //dd($Humidity);
    }



    function getDetails_configuration(Request $request)
    {
        $id = $request->id;
        $data = DB::table('data_conf_item')->select('analysis','effect','correction')->where('id',$id)->first();
        if(!empty($data)){
            echo json_encode($data);
        }

        echo '';
        
    }


    function get_format_time($time){
        $outformat = '%F %T'; //equivalent of 'Y-m-d H:i:s' or you could get just date with 'Y-m-d' and so on...
        $datePortions = explode('.', $time);
        $remadeTime = $datePortions[0] . '.' . substr(explode('Z', $datePortions[1])[0], 0, 6) . 'Z';
        $dateTime = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $remadeTime, new DateTimeZone('Z'));
        if ($dateTime)
          $result = strftime($outformat, $dateTime->getTimestamp());
        else
        //$result = $remadeTime . ' is not InfluxDb timeformat';
        $result = '';

        return $result;
    }




    function db_npk()
    {
        return "NPK_sensor";
    }


    function db_weather()
    {
        return "Weather_sensor";
    }


    function db_adv()
    {
        return "adv_sensor";
    }


    function get_npk($id_plant)
    {
        $dt = DB::table('customers_details')->where('id_plant',$id_plant)->first();
        return $dt->m_npk;
    }


    function get_weather($id_plant)
    {
        $dt = DB::table('customers_details')->where('id_plant',$id_plant)->first();
        return $dt->m_weather;
    }


    function get_adv($id_plant)
    {
        $dt = DB::table('customers_details')->where('id_plant',$id_plant)->first();
        return $dt->m_adv;
    }








    function dashboard3()
    {
        $filename = Session::get('filename');
        if(!empty($filename)){
            //dd($filename);
        }
        
        //return 'ok';
        return view('farm.dashboard3')->with(array('filename'=>$filename));
    }


    function data_configuration()
    {
        //return 'ok';
        $id_plant = '';
        $hdrs ='';
        $dtls = '';
        return view('farm.data_configuration')->with(array('id_plant'=>$id_plant,'hdrs'=>$hdrs,'dtls'=>$dtls));
    }


    function data_configuration_edit($id_plant)
    {
        $hdrs = DB::table('data_conf_register')->where('id_plant',$id_plant)->get();
        $dtls = DB::table('data_conf_item')->where('id_plant',$id_plant)->get();

        return view('farm.data_configuration')->with(array('id_plant'=>$id_plant,'hdrs'=>$hdrs,'dtls'=>$dtls));
    }


    function create_user()
    {

        $db = $this->client->selectDB('NPK_sensor');

        $result = $db->query("show measurements");
        $points = $result->getPoints();

        $option_npk = '';
        if(count($points)>0){
            foreach($points as $key => $val)
            {
                $option_npk .= '<option value="'.$val["name"].'">'.$val["name"].'</option>';
            }
        }


        

        $db = $this->client->selectDB('Weather_sensor');

        $result = $db->query("show measurements");
        $points = $result->getPoints();

        $option_weather = '';
        if(count($points)>0){
            foreach($points as $key => $val)
            {
                $option_weather .= '<option value="'.$val["name"].'">'.$val["name"].'</option>';
            }
        }





        $db = $this->client->selectDB('adv_sensor');

        $result = $db->query("show measurements");
        $points = $result->getPoints();



        $option_adv = '';
        if(count($points)>0){
            foreach($points as $key => $val)
            {
                $option_adv .= '<option value="'.$val["name"].'">'.$val["name"].'</option>';
            }
        }

        //dd($option_adv);


        $option_plant = '';
        $plant = DB::table('data_conf_register')->get();
        //dd($plant);
        if(count($plant)>0){
            foreach($plant as $p){
                $option_plant .= '<option value="'.$p->id_plant.'">'.$p->name_plant.'</option>';
            }
        }


        //dd($option_plant);
        

        //return 'ok';
        return view('farm.create_user')->with(array('option_weather'=>$option_weather,'option_npk'=>$option_npk,'option_adv'=>$option_adv,'option_plant'=>$option_plant,'data'=>''));
    }
    

    function create_new_user(Request $request)
    {
        $fullname = $request->fullname;
        $email = $request->email;
        $status = $request->status;
        $plant = $request->plant;
        $location = $request->location;
        $npk = $request->npk;
        $weather = $request->weather;
        $adv = $request->adv;
        $id_plant = $request->id_plant;


        $file = $request->file;

        //dd($file);
        $path = '';
        $extension = '';

        if(!empty($file)){
            $this->validate($request, [
                    'file' => 'required',
                    // 'file.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,txt,csv,xlsx,xls,docx,ppt,odt,ods,odp'
                    'file.*' => 'mimes:jpeg,png,jpg'
            ]);

            //dd($request->file('file'));

            if($request->hasfile('file'))
            {
                $i = '1';
                
                foreach($request->file('file') as $file)
                {
                    $uid = Auth::id();
                    $name = $uid.'_'.time().$i.'.'.$file->getClientOriginalExtension();


                    $file->move(public_path().'/files/', $name);  
                    $data[] = $name;  

                    $path = url('/').'/public/files/'.$name; 
                    $extension = $file->getClientOriginalExtension();

                    //dd($path);

                }
            }
        }



        //$password = '12345678';

        $check = DB::table('customers')->where('id_plant',$id_plant)->get();
        if(count($check)>0){

            DB::table('customers')->where('id_plant',$id_plant)->update([
                'fullname'=>$fullname,
                'status_customer'=>$status
            ]);

            //$dt = DB::table('data_conf_register')->where('id_plant',$plant)->first();

            //$plant_name = $dt->name_plant;

            if(!empty($path)) {

                DB::table('customers_details')->where('id_plant',$id_plant)->update([
                    'plant'=>$plant,
                    'location'=>$location,
                    'location'=>$location,
                    'm_npk'=>$npk,
                    'm_weather'=>$weather,
                    'm_adv'=>$adv,
                    'id_plant'=>$id_plant,
                    'created_date'=>date('Y-m-d H:i:s'),
                    'id_user'=>Auth::id(),
                    'filename'=>$path,
                    'extension'=>$extension
                ]);
            } else {
                DB::table('customers_details')->where('id_plant',$id_plant)->update([
                    'plant'=>$plant,
                    'location'=>$location,
                    'location'=>$location,
                    'm_npk'=>$npk,
                    'm_weather'=>$weather,
                    'm_adv'=>$adv,
                    'id_plant'=>$id_plant,
                    'created_date'=>date('Y-m-d H:i:s'),
                    'id_user'=>Auth::id()
                ]);
            }

            return redirect('home');

        } else {

            DB::table('customers')->insert([
                'fullname'=>$fullname,
                'status_customer'=>$status,
                'id_plant'=>$id_plant,
                'email'=>$email
            ]);

            //$dt = DB::table('data_conf_register')->where('id_plant',$plant)->first();

            //$plant_name = $dt->name_plant;

            DB::table('customers_details')->insert([
                'plant'=>$plant,
                'location'=>$location,
                'location'=>$location,
                'm_npk'=>$npk,
                'm_weather'=>$weather,
                'm_adv'=>$adv,
                'id_plant'=>$id_plant,
                'created_date'=>date('Y-m-d H:i:s'),
                'id_user'=>Auth::id(),
                'filename'=>$path,
                'extension'=>$extension
            ]);

            return redirect('home');

        }
    }       

    function edit_new_user(Request $request)
    {

    }


    function edit_user()
    {

        $db = $this->client->selectDB('NPK_sensor');

        $result = $db->query("show measurements");
        $points = $result->getPoints();

        $option_npk = '';
        if(count($points)>0){
            foreach($points as $key => $val)
            {
                $option_npk .= '<option value="'.$val["name"].'">'.$val["name"].'</option>';
            }
        }


        

        $db = $this->client->selectDB('Weather_sensor');

        $result = $db->query("show measurements");
        $points = $result->getPoints();

        $option_weather = '';
        if(count($points)>0){
            foreach($points as $key => $val)
            {
                $option_weather .= '<option value="'.$val["name"].'">'.$val["name"].'</option>';
            }
        }





        $db = $this->client->selectDB('adv_sensor');

        $result = $db->query("show measurements");
        $points = $result->getPoints();



        $option_adv = '';
        if(count($points)>0){
            foreach($points as $key => $val)
            {
                $option_adv .= '<option value="'.$val["name"].'">'.$val["name"].'</option>';
            }
        }

        //dd($option_adv);


        $option_plant = '';
        $plant = DB::table('data_conf_register')->get();
        //dd($plant);
        if(count($plant)>0){
            foreach($plant as $p){
                $option_plant .= '<option value="'.$p->id_plant.'">'.$p->name_plant.'</option>';
            }
        }


        //dd($option_plant);
        
        $data = '';
        //return 'ok';
        return view('farm.create_user')->with(array('option_weather'=>$option_weather,'option_npk'=>$option_npk,'option_adv'=>$option_adv,'option_plant'=>$option_plant,'data'=>$data));
    }




    function preview($path,$type)
    {
        try {

            if (ctype_xdigit($path) && strlen($path) % 2 == 0) {

                $path = hex2bin($path);

                $base = url('');

                $type=strtolower($type);

                if($type=='pdf'){
                    header('content-type:application/pdf');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='docx'){
                    header('content-type:application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='xlsx'){
                    header('content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='xl'){
                    header('content-type:application/excel');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='word'){
                    header('content-type:application//msword');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='xls'){
                    header('content-type:application//excel');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='psd'){
                    header('content-type:application//x-photoshop');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='html'){
                    header('content-type:text/html');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='txt'){
                    header('content-type:text/plain');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='text'){
                    header('content-type:text/plain');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='gif'){
                    header('content-type:image/gif');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='jpeg'){
                    header('content-type:image/jpeg');
                    $path = str_replace($base,"",$path);
                    echo file_get_contents($path);
                } else if($type=='jpg'){
                    header('content-type:image/jpeg');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='png'){
                    header('content-type:image/png');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } else if($type=='json'){
                    header('content-type:application/json');
                    $path = str_replace($base,"",$path);
                    $path = substr($path, 1);
                    echo file_get_contents($path);
                } 

            } else {
                die('Permission Denied !');
            }

        } catch (Exception $e) {
            die('Permission Denied !');
        }
        // https://itqna.net/questions/1458/what-content-type-suitable-files-such-doc-docx-xls
        
    }
}
