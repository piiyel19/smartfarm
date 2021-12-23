@extends('layouts.ui')

@section('content')
	<div class="col-md-12" style="padding-top:30px;padding-bottom:10px; padding-left: 0px; padding-right: 0px;">

		<div class="row">
			<div class="col-md-12" style="padding-bottom: 30px;">
				<div class="card" >
					<div class="card-header">

						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Analysis</a>
						  </li>
						  <li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">History</a>
						  </li>
						</ul>
						
					</div>	
					<div class="card-body">

						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						  		<form action="<?= url('/')?>/multispectra" method="post" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
									<div class="row">
										<div class="col-12" style="font-size: 15px; padding-bottom: 10px;">
											Upload Image To Analyze
										</div>
										<div class="col-md-6 col-sm-8 col-xs-8">
											<input type="file" class="form-control" name="file[]">
											<br>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2">
											<button class="btn btn-primary btn-block">Search</button>
											<br>
										</div>
									</div>	
								</form>

							<br>
							<?php if(!empty($filename)){ ?>
								<div class="row">
									<div class="col-md-12 xstyle"><span style="float:right; cursor: pointer;"><a onclick="guideline();">Guideline</a></span></div>
									<div class="col-md-12">
										<table class="table">
											<thead>
												<tr>
													<th>Image</th>
													<th>Symptom</th>
													<th>Deficiency</th>
													<th>Effect</th>
													<th>Correction</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php if(!empty($filename)){  
														$filename_large = "'img1'";
														echo '<a onclick="imageLarger('.$filename_large.');"><img id="img1" src="'.$filename.'" style="width:300px;"></a>'; }?>
															

													</td>

													<td><?php if(!empty($filename)){ ?> Scorching and yellowing of leaf. If this symptom persist, leaf will eventually become brown and die. This symptom usually appear on older leaves first <?php } ?></td>
													<td><?php if(!empty($filename)){ ?> Potassium <?php } ?></td>
													<td>
														<?php if(!empty($filename)){ ?> 
															<ul>
																<li>Poor crop yield</li>
																<li>Poor yield quality – size, uniformity, sugar content protein content</li>
																<li>The crop might be more susceptible to diseases.</li>
															</ul>

														<?php } ?>
														
													</td>
													<td><?php if(!empty($filename)){ ?> To correct for low Potassium, apply fertilizer that include Potassium Nutrient with K+ ion<?php } ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							<?php } ?>
						  </div>



						  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="home-tab">


						  	<div class="row">
								<div class="col-md-12">
									<table class="table">
										<thead>
											<tr>
												<th>Date</th>
												<th>Image</th>
												<th>Symptom</th>
												<th>Deficiency</th>
												<th>Effect</th>
												<th>Correction</th>
											</tr>
										</thead>
										<tbody>

											<?php 
												$data = DB::table('multispectra_history')->where('id_plant',$_GET['id'])->get();
												if(count($data)>0){
													$i=2;
													foreach($data as $dt){
														$filename = $dt->filename;
														$date = $dt->created_at;
														$date = date('d M Y',strtotime($date));
														$i++;
											?>


													<tr>
														<td><?= $date ?></td>
														<td><?php if(!empty($filename)){  
															$filename_large = "'img".$i."'";
															echo '<a onclick="imageLarger('.$filename_large.');"><img id="img'.$i.'" src="'.$filename.'" style="width:300px;"></a>'; }?>
																

														</td>

														<td><?php if(!empty($filename)){ ?> Scorching and yellowing of leaf. If this symptom persist, leaf will eventually become brown and die. This symptom usually appear on older leaves first <?php } ?></td>
														<td><?php if(!empty($filename)){ ?> Potassium <?php } ?></td>
														<td>
															<?php if(!empty($filename)){ ?> 
																<ul>
																	<li>Poor crop yield</li>
																	<li>Poor yield quality – size, uniformity, sugar content protein content</li>
																	<li>The crop might be more susceptible to diseases.</li>
																</ul>

															<?php } ?>
															
														</td>
														<td><?php if(!empty($filename)){ ?> To correct for low Potassium, apply fertilizer that include Potassium Nutrient with K+ ion<?php } ?></td>
													</tr>


											<?php 
													}
												}
											?>
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

<script>
  function guideline()
  {
    $("#myModal").modal('show');
  }

  function imageLarger(id_img)
  {
    console.log(id_img);
    var source = $("#"+id_img).attr('src');
    console.log(source);
    $("#replace_img").attr('src',source);
    $("#myModal_Image").modal('show');
    //alert(source);
  }
</script>


<div class="modal" id="myModal_Image">
	<div class="modal-dialog modal-md">
		<div class="modal-content" style="background-color: rgb(90 97 105 / 10%);">
			<div class="col-md-12">
			<img id="replace_img" src="" width="100%">
			</div>
		</div>
	</div>
</div>


<div class="modal" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
				<div class="modal-header">
				<p class="modal-title" style="font-size: 15px;">Guide</p>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-6">
							<img src="<?= url('/')?>/asset/guide1.jpeg" width="100%">
							<p style="text-align: center;"><a href="<?= url('/')?>/asset/guide1.jpeg" download>Download</a></p>
						</div>
						<div class="col-md-6">
							<img src="<?= url('/')?>/asset/guide2.jpeg" width="100%">
							<p style="text-align: center;"><a href="<?= url('/')?>/asset/guide2.jpeg" download>Download</a></p>
						</div>
					</div>

				</div>
		</div>
	</div>
</div>

@endsection