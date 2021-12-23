@extends('layouts.ui')

@section('content')
	<div class="col-md-12" style="padding-top:30px;padding-bottom:10px; padding-left: 0px; padding-right: 0px;">


		<form action="<?= url('/')?>/dashboard1" method="get">
			<input type="hidden" value="<?= $_GET['id'] ?>" name="id">
			<div class="row" style="padding-top: 30px; padding-bottom: 30px;">
				<div class="col-md-6">
					<h4>UPM Serdang</h4>
				</div>
				<div class="col-md-6" style="float: right;">
					<div class="row">
						<div class="col-4">
							<input type="date" class="form-control" name="start_date" value="<?= $date1_selected ?>" required>
						</div>
						<div class="col-4">
							<input type="date" class="form-control" name="end_date" value="<?= $date2_selected ?>" required>
						</div>
						<div class="col-4" style="padding-top: 2px;">
							<button class="btn btn-sm btn-primary btn-block">Search</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-12" style="padding-bottom: 10px; font-size: 20px; font-weight: 700;">
								Soil : Current Condition
							</div>
						</div>

						<div class="row">
							<div class="col-6" style="padding-bottom: 10px;">
								Nitrogen
								<br>
								<small><?= $data["soil_n"]; ?> ppm</small>
							</div>
							<div class="col-6" style="padding-bottom: 10px;">
								Potassium
								<br>
								<small><?= $data["soil_k"]; ?> ppm</small>
							</div>
						</div>
						<div class="row">
							<div class="col-6" style="padding-bottom: 10px;">
								Phosphorus
								<br>
								<small><?= $data["soil_p"]; ?> ppm</small>
							</div>
							<div class="col-6" style="padding-bottom: 10px;">
								Moisture
								<br>
								<small><?= $data["soil_moist"]; ?> ppm</small>
							</div>
						</div>
						<div class="row">
							<div class="col-6" style="padding-bottom: 10px;">
								pH
								<br>
								<small><?= $data["soil_ph"]; ?> ppm</small>
							</div>
							<div class="col-6" style="padding-bottom: 10px;">
								Conductivity
								<br>
								<small><?= $data["soil_conductivity"]; ?> ppm</small>
							</div>
						</div>
						<div class="row">
							<div class="col-6" style="padding-bottom: 10px;">
								Temperature
								<br>
								<small><?= $data["soil_temp"]; ?> C</small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil Nitrogen (N)

								<figure class="highcharts-figure">
									<div id="time1"></div>
								</figure>

							</div>
						</div>
					</div>
					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil Phosphorus (P)

								<figure class="highcharts-figure">
									<div id="time2"></div>
								</figure>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil Potassium (K)

								<figure class="highcharts-figure">
									<div id="time3"></div>
								</figure>
							</div>
						</div>
					</div>

					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil Moisture

								<figure class="highcharts-figure">
									<div id="time4"></div>
								</figure>
							</div>
						</div>
					</div>


					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil pH

								<figure class="highcharts-figure">
									<div id="time5"></div>
								</figure>
							</div>
						</div>
					</div>





					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil Temperature

								<figure class="highcharts-figure">
									<div id="time6"></div>
								</figure>
							</div>
						</div>
					</div>




					<div class="col-md-12" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								Soil EC

								<figure class="highcharts-figure">
									<div id="time7"></div>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div> <span style="font-size: 9px;">
										UV Radiation : </span><span id="preview-textfield" style="font-size: 9px;"></span> 
										<span style="font-size: 8px;"> Ppm</span>
									</div>
	  								<canvas id="demo" style="width: 110px; height: 100px;"></canvas>
	  							</div>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div> <span style="font-size: 9px;">
										Radiation Power : </span><span id="preview-textfield2" style="font-size: 9px;"></span> 
										<span style="font-size: 8px;">Ppm</span>
									</div>
	  								<canvas id="demo2" style="width: 110px; height: 100px;"></canvas>
	  							</div>
							</div>
						</div>
					</div>



					<div class="col-md-6" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div> <span style="font-size: 9px;">
										Temperature : </span><span id="preview-textfield3" style="font-size: 9px;"></span> 
										<span style="font-size: 8px;">C</span>
									</div>
	  								<canvas id="demo3" style="width: 110px; height: 100px;"></canvas>
	  							</div>
							</div>
						</div>
					</div>



					<div class="col-md-6" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div> <span style="font-size: 9px;">
										Solar Radiation : </span><span id="preview-textfield4" style="font-size: 9px;"></span> 
										<span style="font-size: 8px;">Ppm</span>
									</div>
	  								<canvas id="demo4" style="width: 110px; height: 100px;"></canvas>
	  							</div>
							</div>
						</div>
					</div>


					<div class="col-md-6" style="padding-bottom: 30px;">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div> <span style="font-size: 9px;">
										Humidity : </span><span id="preview-textfield5" style="font-size: 9px;"></span> 
										<span style="font-size: 8px;">Ppm</span>
									</div>
	  								<canvas id="demo5" style="width: 110px; height: 100px;"></canvas>
	  							</div>
							</div>
						</div>
					</div>


					

				</div>
			</div>
		</div>
	</div>


<link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
<script src="https://www.cssscript.com/demo/customizable-gauge-canvas/dist/gauge.js"></script>


<script>

	<?php 
			$uv = $data_adv["UVRadiation"]; 
			
	?>

  	var opts = {
	   angle: -0.25,
	      lineWidth: 0.1,
	      radiusScale:0.9,
	      pointer: {
	        length: 0.6,
	        strokeWidth: 0.05,
	        color: '#000000'
	      },
	      staticLabels: {
	        font: "10px sans-serif",
	        labels: [0, 20, 40, 60, 80,100],
	        fractionDigits: 0
	      },
	      staticZones: [
	         {strokeStyle: "#F03E3E", min: 0, max: 20},
	         {strokeStyle: "#FFDD00", min: 20, max: 40},
	         {strokeStyle: "#30B32D", min: 40, max: 60},
	         {strokeStyle: "#FFDD00", min: 60, max: 80},
	         {strokeStyle: "#F03E3E", min: 80, max: 100}
	      ],
	      limitMax: false,
	      limitMin: false,
	      highDpiSupport: true
	};
	var target = document.getElementById('demo'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	document.getElementById("preview-textfield").className = "preview-textfield";
	gauge.setTextField(document.getElementById("preview-textfield"));
	gauge.maxValue = 100; // set max gauge value
	gauge.setMinValue(0);  // set min value
	gauge.set(<?= $uv ?>); // set actual value

</script>


<script>

	<?php 
			$radiation = $data_adv["SolarRadiationPower"]; 
			
	?>

	
  	var opts = {
	   angle: -0.25,
	      lineWidth: 0.1,
	      radiusScale:0.9,
	      pointer: {
	        length: 0.6,
	        strokeWidth: 0.05,
	        color: '#000000'
	      },
	      staticLabels: {
	        font: "10px sans-serif",
	        labels: [0, 100, 200, 300,400,500],
	        fractionDigits: 0
	      },
	      staticZones: [
	         {strokeStyle: "#F03E3E", min: 0, max: 100},
	         {strokeStyle: "#FFDD00", min: 100, max: 200},
	         {strokeStyle: "#30B32D", min: 200, max: 300},
	         {strokeStyle: "#FFDD00", min: 300, max: 400},
	         {strokeStyle: "#F03E3E", min: 400, max: 500}
	      ],
	      limitMax: false,
	      limitMin: false,
	      highDpiSupport: true
	};
	var target = document.getElementById('demo2'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	document.getElementById("preview-textfield2").className = "preview-textfield2";
	gauge.setTextField(document.getElementById("preview-textfield2"));
	gauge.maxValue = 500; // set max gauge value
	gauge.setMinValue(0);  // set min value
	gauge.set('<?= $radiation ?>'); // set actual value
</script>


<script>

	<?php 
			$temp = $data_adv["Temperature"]; 
			
	?>

  	var opts = {
	   angle: -0.25,
	      lineWidth: 0.1,
	      radiusScale:0.9,
	      pointer: {
	        length: 0.6,
	        strokeWidth: 0.05,
	        color: '#000000'
	      },
	      staticLabels: {
	        font: "10px sans-serif",
	        labels: [0, 30, 50, 100],
	        fractionDigits: 0
	      },
	      staticZones: [
	         {strokeStyle: "#F03E3E", min: 0, max: 20},
	         {strokeStyle: "#FFDD00", min: 20, max: 40},
	         {strokeStyle: "#30B32D", min: 40, max: 60},
	         {strokeStyle: "#FFDD00", min: 60, max: 80},
	         {strokeStyle: "#F03E3E", min: 80, max: 100}
	      ],
	      limitMax: false,
	      limitMin: false,
	      highDpiSupport: true
	};
	var target = document.getElementById('demo3'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	document.getElementById("preview-textfield3").className = "preview-textfield3";
	gauge.setTextField(document.getElementById("preview-textfield3"));
	gauge.maxValue = 100; // set max gauge value
	gauge.setMinValue(0);  // set min value
	gauge.set('<?= $temp ?>'); // set actual value
</script>


<script>

	<?php 
			$solar = $data_adv["AccumulatedSolarRadiation"]; 
			
	?>

  	var opts = {
	   angle: -0.25,
	      lineWidth: 0.1,
	      radiusScale:0.9,
	      pointer: {
	        length: 0.6,
	        strokeWidth: 0.05,
	        color: '#000000'
	      },
	      staticLabels: {
	        font: "10px sans-serif",
	        labels: [500, 10000, 20000, 30000, 40000],
	        fractionDigits: 0
	      },
	      staticZones: [
	         {strokeStyle: "#F03E3E", min: 0, max: 5000},
	         {strokeStyle: "#FFDD00", min: 5000, max: 10000},
	         {strokeStyle: "#30B32D", min: 10000, max: 20000},
	         {strokeStyle: "#FFDD00", min: 20000, max: 30000},
	         {strokeStyle: "#F03E3E", min: 30000, max: 50000}
	      ],
	      limitMax: false,
	      limitMin: false,
	      highDpiSupport: true
	};
	var target = document.getElementById('demo4'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	document.getElementById("preview-textfield4").className = "preview-textfield4";
	gauge.setTextField(document.getElementById("preview-textfield4"));
	gauge.maxValue = 50000; // set max gauge value
	gauge.setMinValue(500);  // set min value
	gauge.set('<?= $solar ?>'); // set actual value

	console.log('<?= $solar ?>');

</script>



<script>

	<?php 
			$humidity = $data_adv["Humidity"]; 
			
	?>

  	var opts = {
	   angle: -0.25,
	      lineWidth: 0.1,
	      radiusScale:0.9,
	      pointer: {
	        length: 0.6,
	        strokeWidth: 0.05,
	        color: '#000000'
	      },
	      staticLabels: {
	        font: "10px sans-serif",
	        labels: [0, 30, 50, 100],
	        fractionDigits: 0
	      },
	      staticZones: [
	         {strokeStyle: "#F03E3E", min: 0, max: 20},
	         {strokeStyle: "#FFDD00", min: 20, max: 40},
	         {strokeStyle: "#30B32D", min: 40, max: 60},
	         {strokeStyle: "#FFDD00", min: 60, max: 80},
	         {strokeStyle: "#F03E3E", min: 80, max: 100}
	      ],
	      limitMax: false,
	      limitMin: false,
	      highDpiSupport: true
	};
	var target = document.getElementById('demo5'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	document.getElementById("preview-textfield5").className = "preview-textfield5";
	gauge.setTextField(document.getElementById("preview-textfield5"));
	gauge.maxValue = 100; // set max gauge value
	gauge.setMinValue(0);  // set min value
	gauge.set('<?= $humidity ?>'); // set actual value
</script> 




<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_n = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_n = $ts["n"][$i];
				$ts_p = $ts["p"][$i];
				$ts_k = $ts["k"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_n .= '['.$milliseconds.','.$ts_n.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_n ?>
	];


	Highcharts.chart('time1', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil Nitrogen (N)'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>


<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_p = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_n = $ts["n"][$i];
				$ts_p = $ts["p"][$i];
				$ts_k = $ts["k"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_p .= '['.$milliseconds.','.$ts_p.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_p ?>
	];


	Highcharts.chart('time2', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil Phosphorus (P)'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>




<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_k = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_n = $ts["n"][$i];
				$ts_p = $ts["p"][$i];
				$ts_k = $ts["k"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_k .= '['.$milliseconds.','.$ts_k.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_k ?>
	];


	Highcharts.chart('time3', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil Potassium (K)'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>




<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_moist = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_moist = $ts["soil_moist"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_moist .= '['.$milliseconds.','.$ts_moist.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_moist ?>
	];


	Highcharts.chart('time4', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil Mosture'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>


<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_pH = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_pH = $ts["soil_ph"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_pH .= '['.$milliseconds.','.$ts_pH.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_pH ?>
	];


	Highcharts.chart('time5', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil pH'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>



<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_temp = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_temp = $ts["soil_temp"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_temp .= '['.$milliseconds.','.$ts_temp.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_temp ?>
	];


	Highcharts.chart('time6', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil Temperature'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>


<script type="text/javascript">


	<?php 
		if(count($ts)>0){

			$data_ec = '';
			$limit = count($ts["time"]);
			for($i=0;$i<$limit; $i++){
				$time = $ts["time"][$i];
				$ts_ec = $ts["soil_conductivity"][$i];

				$time = strtotime($time);
				$milliseconds = round($time * 1000);


				$data_ec .= '['.$milliseconds.','.$ts_ec.'],';
				
			}
		} 
	?>


	var data = [
		<?= $data_ec ?>
	];


	Highcharts.chart('time7', {
        chart: {
            zoomType: 'x'
        },
        credits: {
                    enabled: false
                },
        title: {
            text: 'Soil Conductivity'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'ppm'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'PPM',
            data: data
        }]
    });
</script>

<style type="text/css">
	#demo{
		width: 100%;
		height: 100%;
	}
</style>

@endsection



