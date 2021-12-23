@extends('layouts.ui')

@section('content')
	<div class="col-md-9" style="padding-top:30px;padding-bottom:30px; padding-left: 0px; padding-right: 0px;">

		<div class="card">
			<div class="card-header">
				<h5 id="title_label">Create New Customer</h5>
			</div>
			<div class="card-body" style="padding-top: 0px;">

				<form action="<?= url('/')?>/create_new_user" method="post" enctype="multipart/form-data">
					@csrf

					<input type="hidden" name="id_plant" value="<?php if(!empty($_GET['id'])){echo $_GET['id']; } else { echo rand(); } ?> ">

					<div class="row">
						<div class="col-md-12" style="padding-bottom: 10px;">
							<hr> 
							<legend style="font-size: 15px;">Details User</legend>
						</div>

						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>Fullname</label>
							<input type="text" class="form-control" name="fullname" required>
						</div>	
						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>Email</label>
							<input type="email" class="form-control" name="email" required>
						</div>	
						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>Status Customer</label>
							<select class="form-control" name="status" required>
								<option value="">-- Select Status --</option>
								<option value="Active">Active</option>
								<option value="Pending IOT">Pending IOT</option>
								<option value="Deactive">Deactive</option>
							</select>
						</div>	

					</div>


					<div class="row">
						
						<div class="col-md-12" style="padding-bottom: 10px;">
							<hr>
							<legend style="font-size: 15px;">Details Plant</legend>
						</div> 

						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>Plant</label>
							<select class="form-control" name="plant" required>
								<option value="">-- Select Plant --</option>
								<?= $option_plant ?>
							</select>
						</div>	
						<div class="col-md-6" style="padding-bottom: 10px;">
							<label>Farm Location</label>
							<input type="text" class="form-control" name="location" required>
						</div>

						<div class="col-md-3">
							<label>Image</label>
							<input type="file" class="form-control" name="file[]">
						</div>

					</div>




					<div class="row">
						
						<div class="col-md-12" style="padding-bottom: 10px;">
							<hr>
							<legend style="font-size: 15px;">Details Measurements</legend>
						</div> 

						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>NPK Sensor</label>
							<select class="form-control" name="npk" required>
								<option value="">-- Select Sensor --</option>
								<?= $option_npk ?>
								
							</select>
						</div>	
						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>Weather Sensor</label>
							<select class="form-control" name="weather" required>
								<option value="">-- Select Sensor --</option>
								<?= $option_weather ?>
								
							</select>
						</div>
						<div class="col-md-3" style="padding-bottom: 10px;">
							<label>Advance Sensor</label>
							<select class="form-control" name="adv" required>
								<option value="">-- Select Sensor --</option>
								<?= $option_adv ?>
							</select>
						</div>

					</div>


					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-sm" style="float: right" id="btn">Create</button>
						</div>
					</div>
				</form>


			</div>
		</div>

	</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function (){

		<?php 
			$fullname = '';
			$email = '';
			$status = '';

			$location = '';
			$m_npk = '';
			$m_weather = '';
			$m_adv = '';
			$plant = '';
		?>

		<?php if(!empty($_GET['id'])){ ?>
			<?php 
				$customers = DB::table('customers')->where('id_plant',$_GET['id'])->get();
				if(count($customers)>0){
					
					foreach($customers as $c){
						$fullname = $c->fullname;
						$email = $c->email;
						$status = $c->status_customer;
					}
				}


				$customers_details = DB::table('customers_details')->where('id_plant',$_GET['id'])->get();

				if(count($customers_details)>0){
					
					foreach($customers_details as $cd){
						$location = $cd->location;
						$m_npk = $cd->m_npk;
						$m_weather = $cd->m_weather;
						$m_adv = $cd->m_adv;
						$plant = $cd->plant;
					}
				}
			?>
		<?php } ?>

		$("input[name='fullname']").val("<?= $fullname ?>");
		$("input[name='email']").val("<?= $email ?>");
		$("select[name='status']").val("<?= $status ?>");

		<?php if(!empty($_GET['id'])){ ?>
			$("input[name='email']").prop('readonly',true);
			$("#title_label").html('Update Customer');
			$("#btn").html('Save');
		<?php } ?>



		$("select[name='plant']").val("<?= $plant ?>");
		$("select[name='npk']").val("<?= $m_npk ?>");
		$("select[name='weather']").val("<?= $m_weather ?>");
		$("select[name='adv']").val("<?= $m_adv ?>");

		$("input[name='location']").val("<?= $location ?>");


	});
</script>


@endsection

