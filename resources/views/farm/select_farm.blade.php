@extends('layouts.ui_select_farm')

@section('content')
	<div class="main-content-container" style="padding-top: 10px;">
		<!-- <div class="row">
			<div class="col-md-4">
				Test
			</div>
			<div class="col-md-4">
				Test
			</div>
		</div> -->


		<div class="container py-5">
			<div class="jumbotron text-white jumbotron-image shadow" style="background-image: url(https://images.unsplash.com/photo-1552152974-19b9caf99137?fit=crop&w=1350&q=80);">
			  <h2 class="mb-4" style="color:#fff">
			    Welcome to Smart Farm Intelligent Dashboard
			  </h2>
			  <p class="mb-4">
			    Hey, check this out.
			  </p>
			  <div class="row">
				  <div class="col-md-2 col-xs-12 col-sm-12" style="padding-bottom: 10px;">
				  	<a href="<?= url('/')?>/data_configuration" class="btn btn-primary  btn-block">Data Configuration</a>
				  </div>
				  <div class="col-md-2 col-xs-12 col-sm-12" style="padding-bottom: 10px;">
				  	<a href="<?= url('/')?>/create_user" class="btn btn-primary btn-block">Add Customer</a>
				  </div>
				  <div class="col-md-2 col-xs-12 col-sm-12" style="padding-bottom: 10px;">
				  	<a href="<?= url('/')?>/logout" class="btn btn-primary  btn-block">Logout</a>
				  </div>
			  </div>

			  
			  
			  
			</div>


			<div class="col-md-12" style="padding-top:10px;padding-bottom:10px; padding-left: 0px; padding-right: 0px;">
				
				<div class="row">
					<?php if(count($active_farm)>0){ ?>
					<?php foreach($active_farm as $farm){ ?>
						<div class="col-md-3 col-sm-12 col-xs-12" style="padding-bottom: 30px;">
							<div class="card" style="width:100%">

							  <?php if(!empty($farm->filename)){ ?>
							  	<img class="card-img-top" src="<?= $farm->filename ?>" style="width: 100%; height: 150px;" alt="Card image">
							  <?php } else { ?>
							  	<img class="card-img-top" src="https://dkt6rvnu67rqj.cloudfront.net/sites/default/files/styles/600x400/public/media/int_files/1012343_edited-1.jpg?h=f452ebb1&itok=OjAEUXwX" style="width: 100%; height: 150px;" alt="Card image">
							  <?php } ?>

							  


							  <div class="card-body" >
							    <p class="card-title">
							    	<?= $farm->location; ?>
							    	<br>
							    	<label style="font-size: 12px;"><?= $farm->fullname; ?></label>
							    	<br>
							    	<label style="font-size: 12px;">
							    		<?php 
							    			$plant = DB::table('data_conf_register')->where('id_plant',$farm->plant)->first();
							    			//dd($farm->id_plant);
							    			if(!empty($plant)){
							    				echo $plant->name_plant; 
							    			}
							    			//echo $farm->plant; 
							    		?>
							    				
							    	</label>
							    </p>
							    <div class="row">
							    	<div class="col-6">
							    		<a href="<?= url('/')?>/edit_user?id=<?= $farm->id_plant; ?>" class="btn btn-primary btn-sm">Edit Farm</a> 
							    	</div>
							    	<div class="col-6">
							    		<?php if($farm->status_customer=='Active'){ ?>
							    			<a href="<?= url('/')?>/dashboard1?id=<?= $farm->id_plant; ?>" class="btn btn-success btn-sm">Visit Farm</a> 
							    		<?php } else { ?>
							    			<a onclick="alert('Your status customer is not active ! Please update your information.')" class="btn btn-danger btn-sm" style="color: #fff">Visit Farm</a>
							    		<?php } ?>
							    	</div>
							    </div>
							    
							  </div>
							</div>
						</div>
					<?php } }?>
				</div>

			</div>

		</div>
		
	</div>
@endsection

<style type="text/css">
	.jumbotron-image {
	  background-position: center center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}

</style>