@extends('layouts.ui')

@section('content')
	<div class="col-md-12" style="padding-top:30px;padding-bottom:10px; padding-left: 0px; padding-right: 0px;">

		<form action="<?= url('/')?>/dashboard2" method="get">
			<input type="hidden" value="<?= $_GET['id'] ?>" name="id">
			<div class="row" style="padding-top: 30px; padding-bottom: 30px;">
				<div class="col-md-6">
					<h4>UPM Serdang</h4>
				</div>
				<div class="col-md-6" style="float: right;">
					<div class="row">
						<div class="col-4">
							<select class="form-control" name="month" required>
								<option value="">--Select Month --</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">Jun</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="col-4">
							<select class="form-control" name="year" required>
								<option value="">--Select Year --</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
							</select>
						</div>
						<div class="col-4" style="padding-top: 2px;">
							<button type="submit" class="btn btn-sm btn-primary btn-block">Search</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<div class="row">
			<div class="col-md-6" style="padding-bottom: 30px;">
				<div class="card" >
					<div class="card-header">

						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
						  </li>
						  <li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">High</a>
						  </li>
						  <li class="nav-item" role="presentation">
						    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Low</a>
						  </li>
						</ul>

					</div>
					<div class="card-body" style="padding-top: 0px;">
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						  	
						  	<table class="table" >
						  		<thead>
						  			<tr>
										<th style="font-size: 12px;">
											IOT Sensor
										</th>
										<th style="font-size: 12px;">
											Latest Data
										</th>
										<th style="font-size: 12px;">
											Last Month
										</th>
									</tr>
						  		</thead>
						  		<tbody>
						  			<tr>
						  				<td style="font-size: 12px;">Nitrogen (N) </td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Nitrogen']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Nitrogen']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Nitrogen Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Nitrogen Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Phosphorus (P)</td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Phosphorus']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Phosphorus']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Phosphorus Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Phosphorus Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Potassium (K) </td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Potassium']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Potassium']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Potassium Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Potassium Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Soil Moisture</td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Soil Moisture']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Soil Moisture']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Soil Moisture Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Soil Moisture Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Soil Temperature</td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Soil Temperature']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Soil Temperature']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Soil Temperature Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Soil Temperature Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Electrical Conductivity (EC)	 </td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['EC']['id_state']; ?>)" style="cursor: pointer;"><?= $data['EC']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['EC Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['EC Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">pH</td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['pH']['id_state']; ?>)" style="cursor: pointer;"><?= $data['pH']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['pH Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['pH Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Outside Temperature	</td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Outside Temperature']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Outside Temperature']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Outside Temperature Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Outside Temperature Old']['state']; ?></a></td>
						  			</tr>
						  			<tr>
						  				<td style="font-size: 12px;">Humidity </td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Humidity']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Humidity']['state']; ?></a></td>
						  				<td style="font-size: 12px;"><a onclick="getDetails(<?= $data['Humidity Old']['id_state']; ?>)" style="cursor: pointer;"><?= $data['Humidity Old']['state']; ?></a></td>
						  			</tr>
						  		</tbody>
						  	</table>

						  </div>
						  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						  	<table class="table" >
						  		<thead>
						  			<tr>
										<th style="font-size: 12px;">
											IOT Sensor
										</th>
										<th style="font-size: 12px;">
											Latest Data
										</th>
									</tr>
						  		</thead>
						  		<tbody>
						  			<?= $high_state ?>
						  		</tbody>
						  	</table>
						  </div>
						  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						  	<table class="table" >
						  		<thead>
						  			<tr>
										<th style="font-size: 12px;">
											IOT Sensor
										</th>
										<th style="font-size: 12px;">
											Latest Data
										</th>
									</tr>
						  		</thead>
						  		<tbody>
						  			<?= $low_state ?>
						  		</tbody>
						  	</table>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="padding-bottom: 30px;">

				<h5>Please Choose either one from list of sensor :</h5>

				<div class="card">
					<div class="card-header">
						Analytic
					</div>
					<div class="card-body" style="padding-top: 0px; font-size: 12px;" id="data_analytic">
						
					</div>
				</div>


				<br>

				<div class="card">
					<div class="card-header">
						Effect
					</div>
					<div class="card-body" style="padding-top: 0px; font-size: 12px;" id="data_effect">
						
					</div>
				</div>

				<br>

				<div class="card">
					<div class="card-header">
						Presciption / Correction
					</div>
					<div class="card-body" style="padding-top: 0px; font-size: 12px;" id="data_correction">
						
					</div>
				</div>

			</div>
		</div>

	</div>

<style type="text/css">
	a{
		cursor: pointer;
	}

	.table td, .table th {
		font-size: 12px;
	} 
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function (){
		var month = "<?= $month ?>";
		$("select[name='month']").val(month);

		

		var year = "<?= $year ?>";
		$("select[name='year']").val(year);
	});

	function getDetails(id)
	{
		if(id==0){
			alert('Your sensor not meet your data configuration.');
		} else {

			var data = {
					'id':id,
					"_token": "{{ csrf_token() }}"
				}

				$.ajax({
	                url: "<?= url('/')?>/getDetails_configuration",
	                type: "POST",
	                data: data,
	                dataType: "json",
	                success:function(data) {
	                	if(data){
	                		var analysis = data.analysis;
	                		analysis.replace(/(\r\n|\n\r|\r|\n)/g, "<br>");
	                		$("#data_analytic").html(analysis);

	                		var effect = data.effect;
	                		effect.replace(/(\r\n|\n\r|\r|\n)/g, "<br>");
	                		$("#data_effect").html(effect);


	                		var correction = data.correction;
	                		correction.replace(/(\r\n|\n\r|\r|\n)/g, "<br>");
	                		$("#data_correction").html(correction);
	                	}
	                }
	            });

		}
	}
</script>

@endsection