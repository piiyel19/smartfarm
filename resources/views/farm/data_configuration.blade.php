@extends('layouts.ui_select_farm')

@section('content')
	<div class="col-md-12" style="padding-top:10px;padding-bottom:10px; padding-left: 0px; padding-right: 0px;">


		<div class="row">
			<div class="col-md-12" style="padding-bottom: 10px;">
				<div class="card" >
					<div class="card-header">

						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Configuration</a>
						  </li>
						  <li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">List</a>
						  </li>
						</ul>
						
					</div>	
					<div class="card-body">

						<div class="tab-content" id="myTabContent">



						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

						  	<?php if(Request::segment(1)!='data_configuration'){ ?>
							  	<div class="row">
							  		<div class="col-md-12">
							  			<button class="btn btn-success" style="float: right" onclick="window.location.href='../data_configuration'">Add New </button>
							  		</div>
							  	</div>
						  	<?php } ?>

							<form method="post" action="" enctype="multipart/form-data" id="myform">
								@csrf
								<div class="row">
									<div class="col-md-12" style="font-size: 15px; padding-bottom: 10px;">
										
										<input type="hidden" name="id_plant" value="<?= rand(); ?>">
										<div class="row">
											<div class="col-md-4" style="padding-bottom: 10px;">
												<label>Name Of Plant</label>
												<input type="text" class="form-control" name="name_plant">
												
											</div>

											<div class="col-md-4" style="padding-bottom: 10px;">
												<label>IOT Sensor</label>
												<select class="form-control" name="iot_sensor">
													<option value="">-- Select Sensor --</option>
													<option value="Nitrogen">Nitrogen (N)</option>
													<option value="Phosphorus">Phosphorus (P)</option>
													<option value="Potassium">Potassium (K)</option>
													<option value="Soil Moisture">Soil Moisture</option>
													<option value="Soil Temperature">Soil Temperature</option>
													<option value="Electrical Conductivity">Electrical Conductivity (EC)</option>
													<option value="pH">pH</option>
													<option value="Outside Temperature">Outside Temperature</option>
													<option value="Humidity">Humidity</option>
												</select>
											</div>
											<div class="col-md-4" style="padding-bottom: 10px;">
												<label>Parameter</label>
												<select class="form-control" name="parameter">
													<option value="">-- Select Parameter --</option>
													<option value="High">High</option>
													<option value="Normal">Normal</option>
													<option value="Low">Low</option>
												</select>
											</div>

											<div class="col-md-4" style="padding-bottom: 10px;">
												<label>Range Start</label>
												<input type="text" class="form-control" name="range_start">
											</div>
											<div class="col-md-4" style="padding-bottom: 10px;">
												<label>Range End</label>
												<input type="text" class="form-control" name="range_end">
											</div>

											<div class="col-md-4" style="padding-bottom: 10px;">
												<label>Image</label>
												<input type="file" class="form-control" id="file" name="file" />
											</div>

										</div>


										<div class="row">
											<div class="col-md-12">



												<div class="row">
													<div class="col-md-3" style="padding-bottom: 10px;">
														<label>Analysis</label>
														<textarea class="form-control" name="analysis" cols="3" rows="5"></textarea>
													</div>

													<div class="col-md-3" style="padding-bottom: 10px;">
														<label>Effect</label>
														<textarea class="form-control" name="effect" cols="3" rows="5"></textarea>
													</div>


													<div class="col-md-3" style="padding-bottom: 10px;">
														<label>Precsciption/Correction</label>
														<textarea class="form-control" name="correction" cols="3" rows="5"></textarea>
													</div>


													<div class="col-md-3" style="padding-bottom: 10px;">
														<label>Additional Comment</label>
														<textarea class="form-control" name="additional_text" cols="3" rows="5"></textarea>
													</div>

												</div>

											</div>


											



											<div class="col-md-12">

												<div class="row">
													


													


													<div class="col-md-12">
														<?php if(Request::segment(1)=='data_configuration'){ ?>
															<button type="button" onclick="addItem();" class="btn btn-primary btn-sm" style="float: right"><i class="fa fa-plus"></i></button>
														<?php } else { ?>

														<?php } ?>
													</div>

												</div>

											</div>


											

										</div>


										








									</div>

									

									<div class="col-md-12">

										<div class="row">

											<div class="col-md-12">
												<br>
												
												<?php if(Request::segment(1)=='data_configuration'){ ?>
												<button class="btn btn-success" style="float: right;" onclick="saveData();">Submit</button>
												<?php } else { ?>
												<button class="btn btn-success" style="float: right;" onclick="addItemEdit();">Save Edit</button>
												<?php } ?>
											</div>

										</div>
									</div>



									<?php //if(Request::segment(1)=='data_configuration'){ ?>
										<div class="col-md-12">
											<br><br>
											<div class="row">

												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
															<th>Edit</th>
															<th>Image</th>
															<th>IOT Sensor</th>
															<th>Parameter</th>
															<th>Start</th>
															<th>End</th>
															<th>Analysis</th>
															<th>Effect</th>
															<th>Precsciption/Correction</th>
															<th>Additional Comment</th>
															<th>Delete</th>
															</tr>
														</thead>
														<tbody id="list_item">
															
														</tbody>
													</table>
												</div>

											</div>
										</div>
									<?php //} ?>

								</div>
							</form>
						  </div>
						  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="home-tab">
							<div class="row">
								<div class="col-12" style="font-size: 15px; padding-bottom: 10px;">
									
									<table class="table" style="width: 100%">
										<thead>
											<tr>
											<th>Name Of Plant</th>
											<th>Created At</th>
											<th>Delete</th>
											<th>Edit</th>
											</tr>
										</thead>
										<tbody id="list_plant">
											
										</tbody>
									</table>

								</div>

							</div>
						  </div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>


	<style type="text/css">
		label {
    		font-size: 12px;
    	}

    	.table thead th {
    		font-size: 12px;
    		vertical-align: top;
    	}

    	.table td, .table th {
		    font-size: 12px;
		    padding: 0.75rem;
		}
	</style>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript">




		$(function() {
			get_list_plant();


			<?php 
				if(!empty($id_plant)){
			?>
				$("input[name='id_plant']").val("<?= $id_plant ?>");
				get_list_item();
				$("input[name='name_plant']").prop('readonly',true);
			<?php
				}
			?>

			<?php

				if(!empty($hdrs)){
					if(count($hdrs)>0){

						foreach($hdrs as $hd){
							$name_plant = $hd->name_plant;
						}

					} else {
						$name_plant = '';
					}
				} else {
					$name_plant ='';
				}

			?>

			var name_plant = $("input[name='name_plant']").val("<?= $name_plant ?>");
			


			

		});

		function addItem()
		{
			var name_plant = $("input[name='name_plant']").val();
			var iot_sensor = $("select[name='iot_sensor']").val();
			var parameter = $("select[name='parameter']").val();
			var range_start = $("input[name='range_start']").val();
			var range_end = $("input[name='range_end']").val();
			var analysis = $("textarea[name='analysis']").val();
			var effect = $("textarea[name='effect']").val();
			var correction = $("textarea[name='correction']").val();
			var additional_text = $("textarea[name='additional_text']").val();

			
        	var files = $('#file')[0].files;




			var id_plant = $("input[name='id_plant']").val();

			if(
				(name_plant=='')||
				(iot_sensor=='')||
				(parameter=='')||
				(range_start=='')||
				(range_end=='')||
				(analysis=='')||
				(effect=='')||
				(correction=='')||
				(id_plant=='')
			  )
			{
				alert('Please fill in the form !');
			} else {

				var data = new FormData();
				// var data = {
				// 	'name_plant':name_plant,
				// 	'iot_sensor':iot_sensor,
				// 	'parameter':parameter,
				// 	'range_start':range_start,
				// 	'range_end':range_end,
				// 	'analysis':analysis,
				// 	'effect':effect,
				// 	'correction':correction,
				// 	'id_plant':id_plant,
				// 	'additional_text':additional_text,
				// 	"_token": "{{ csrf_token() }}"
				// }

				data.append('file[]',files[0]);
				data.append('name_plant',name_plant);
				data.append('iot_sensor',iot_sensor);
				data.append('parameter',parameter);
				data.append('range_start',range_start);
				data.append('range_end',range_end);
				data.append('analysis',analysis);
				data.append('effect',effect);
				data.append('correction',correction);
				data.append('id_plant',id_plant);
				data.append('additional_text',additional_text);
				data.append('_token',"{{ csrf_token() }}");


				$.ajax({
	                url: "<?= url('/')?>/create_item_configuration",
	                type: "POST",
	                data: data,
	                contentType: false,
              		processData: false,
	                success:function(data) {

	                	$("select[name='iot_sensor']").val('');
						$("select[name='parameter']").val('');
						$("input[name='range_start']").val('');
						$("input[name='range_end']").val('');
						$("textarea[name='analysis']").val('');
						$("textarea[name='effect']").val('');
						$("textarea[name='correction']").val('');
						$("textarea[name='additional_text']").val('');
						$("input[name='file[]']").val('');


						get_list_item();

	                }
	            });

			}

		}


		function addItemEdit()
		{
			var name_plant = $("input[name='name_plant']").val();
			var iot_sensor = $("select[name='iot_sensor']").val();
			var parameter = $("select[name='parameter']").val();
			var range_start = $("input[name='range_start']").val();
			var range_end = $("input[name='range_end']").val();
			var analysis = $("textarea[name='analysis']").val();
			var effect = $("textarea[name='effect']").val();
			var correction = $("textarea[name='correction']").val();
			var additional_text = $("textarea[name='additional_text']").val();

			
        	var files = $('#file')[0].files;




			var id_plant = $("input[name='id_plant']").val();

			if(
				(name_plant=='')||
				(iot_sensor=='')||
				(parameter=='')||
				(range_start=='')||
				(range_end=='')||
				(analysis=='')||
				(effect=='')||
				(correction=='')||
				(id_plant=='')
			  )
			{
				alert('Please fill in the form !');
			} else {

				var data = new FormData();
				// var data = {
				// 	'name_plant':name_plant,
				// 	'iot_sensor':iot_sensor,
				// 	'parameter':parameter,
				// 	'range_start':range_start,
				// 	'range_end':range_end,
				// 	'analysis':analysis,
				// 	'effect':effect,
				// 	'correction':correction,
				// 	'id_plant':id_plant,
				// 	'additional_text':additional_text,
				// 	"_token": "{{ csrf_token() }}"
				// }

				data.append('file[]',files[0]);
				data.append('name_plant',name_plant);
				data.append('iot_sensor',iot_sensor);
				data.append('parameter',parameter);
				data.append('range_start',range_start);
				data.append('range_end',range_end);
				data.append('analysis',analysis);
				data.append('effect',effect);
				data.append('correction',correction);
				data.append('id_plant',id_plant);
				data.append('additional_text',additional_text);
				data.append('_token',"{{ csrf_token() }}");


				$.ajax({
	                url: "<?= url('/')?>/create_item_configuration",
	                type: "POST",
	                data: data,
	                contentType: false,
              		processData: false,
	                success:function(data) {

	                	$("select[name='iot_sensor']").val('');
						$("select[name='parameter']").val('');
						$("input[name='range_start']").val('');
						$("input[name='range_end']").val('');
						$("textarea[name='analysis']").val('');
						$("textarea[name='effect']").val('');
						$("textarea[name='correction']").val('');
						$("textarea[name='additional_text']").val('');
						$("input[name='file[]']").val('');


						get_list_item();

						alert('Success');
						location.reload();

	                }
	            });

			}

		}


		function get_list_item()
		{
			var id_plant = $("input[name='id_plant']").val();


			var data = {
					'id_plant':id_plant,
					"_token": "{{ csrf_token() }}"
				}

				$.ajax({
	                url: "<?= url('/')?>/get_list_item",
	                type: "POST",
	                data: data,
	                success:function(data) {

	                	$("#list_item").html(data);
	                }
	            });

		}


		function deleteItem(id)
		{
			let text;
			if (confirm("Are you sure to delete ?") == true) {
			  
			  var id_plant = $("input[name='id_plant']").val();


				var data = {
						'id':id,
						'id_plant':id_plant,
						"_token": "{{ csrf_token() }}"
					}

					$.ajax({
		                url: "<?= url('/')?>/delete_item",
		                type: "POST",
		                data: data,
		                success:function(data) {

		                	get_list_item();
		                }
		            });

			}
		}



		function get_list_plant()
		{
			var data = {
					"_token": "{{ csrf_token() }}"
				}

				$.ajax({
	                url: "<?= url('/')?>/get_list_plant",
	                type: "POST",
	                data: data,
	                success:function(data) {

	                	$("#list_plant").html(data);
	                }
	            });

		}


		
	</script>

@endsection