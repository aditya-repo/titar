<style type="text/css">
	.hr{
		border-bottom: 2px solid #e6e6e6;
	}
	.btn-sharp{
	border-radius: 0px;
}
</style>
<?php $documentFolder = base_url()."resources/img/voucher/";
 ?>
			<div class="right_col" role="main">
					<div class="page-title">
						<div class="title_left">
						<div class="d-flex justify-content-between">
							<h3>Coupon & Deals</h3>
						</div></div>

					</div>
					<div class="clearfix"></div>

          			<div class="clearfix">
	           				<?php foreach ($allcoupon as $key => $value) {
          				 ?> 
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title" style="display: flex;justify-content: space-between;">
									<h2><?php echo $value->name; ?><small><span class="badge badge-pill badge-danger text-white"><?php echo $value->remarks; ?></span></small></h2>
									<h2 class="text-dark">Rs. <?php echo $value->money; ?></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo $documentFolder.$value->id.'.jpg' ?>" style="width:100%">
									</div>
									<div class="hr mb-3"></div>
									<div class="d-flex">
									<button class="flex-fill btn btn-sm btn-primary btn-sharp" data-toggle="collapse" data-target="#demo<?php echo $value->id ?>">
									<i class="fa fa-exclamation-circle"> Details </i>
									</button>
									<button class="flex-fill btn btn-sm btn-info btn-sharp">
									<i class="fa fa-copy"> Copy Link</i>
									</button>
									<button class="flex-fill btn btn-sm btn-success btn-sharp">
									<i class="fa fa-whatsapp"> Share </i>
									</button></div>
									<div class="collapse" id="demo<?php echo $value->id ?>"><?php echo $value->caption; ?><br> <br><span class="text-dark"> <strong>Voucher Issue Date</strong></span><span class="text-success"><?php echo $value->startDate; ?></span><br> <span class="text-dark"><strong>Voucher Expiry date is </strong></span><span class="text-danger"><?php echo $value->endDate; ?></span></div>
								</div>
							</div>
						</div>

					<?php } ?>

					</div>
					<div class="page-title">
						<div class="title_left">
						<div class="d-flex justify-content-between">
							<h3>Voucher & Deals</h3>
						</div></div>

					</div>
					<div class="clearfix"></div>

          			<div class="clearfix">
	           				<?php foreach ($allvoucher as $key => $value) {
          				 ?> 
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title" style="display: flex;justify-content: space-between;">
									<h2><?php echo $value->name; ?><small><span class="badge badge-pill badge-danger text-white"><?php echo $value->remarks; ?></span></small></h2>
									<h2 class="text-dark">Rs. <?php echo $value->money; ?></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo $documentFolder.$value->id.'.jpg' ?>" style="width:100%">
									</div>
									<div class="hr mb-3"></div>
									<div class="d-flex">
									<button class="flex-fill btn btn-sm btn-primary btn-sharp" data-toggle="collapse" data-target="#demo<?php echo $value->id ?>">
									<i class="fa fa-exclamation-circle"> Details </i>
									</button>
									<button class="flex-fill btn btn-sm btn-info btn-sharp">
									<i class="fa fa-copy"> Copy Link</i>
									</button>
									<button class="flex-fill btn btn-sm btn-success btn-sharp">
									<i class="fa fa-whatsapp"> Share </i>
									</button></div>
									<div class="collapse" id="demo<?php echo $value->id ?>"><?php echo $value->caption; ?><br> <br><span class="text-dark"> <strong>Voucher Issue Date</strong></span><span class="text-success"><?php echo $value->startDate; ?></span><br> <span class="text-dark"><strong>Voucher Expiry date is </strong></span><span class="text-danger"><?php echo $value->endDate; ?></span></div>
								</div>
							</div>
						</div>

					<?php } ?>

					</div>

					<div class="page-title">
						<div class="title_left">
						<div class="d-flex justify-content-between">
							<h3>Download & Earn</h3>
						</div></div>

					</div>
					<div class="clearfix"></div>

          			<div class="clearfix">
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Name<small><span class="badge badge-pill badge-danger text-white">Trending</span></small></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo base_url('resources/img/landscape.jpg') ?>">
									</div>
									<div class="hr mb-3"></div>
									<div class="d-flex">
									<button class="flex-fill btn btn-sm btn-primary btn-sharp" data-toggle="collapse" data-target="#demo">
									<i class="fa fa-exclamation-circle"> Details </i>
									</button>
									<button class="flex-fill btn btn-sm btn-info btn-sharp">
									<i class="fa fa-copy"> Copy Link</i>
									</button>
									<button class="flex-fill btn btn-sm btn-success btn-sharp">
									<i class="fa fa-whatsapp"> Share </i>
									</button></div>
									<div class="collapse" id="demo">nionefwoe<br>wcoeo<br>iohio nionefwoe<br>wcoeo<br>iohio nionefwoe<br>wcoeo<br>iohio </div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Name<small><span class="badge badge-pill badge-success text-white">New</span></small></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo base_url('resources/img/landscape.jpg') ?>">
									</div>
									<div class="hr mb-3"></div>
									<div class="d-flex">
									<button class="flex-fill btn btn-sm btn-primary btn-sharp" data-toggle="collapse" data-target="#demo2">
									<i class="fa fa-exclamation-circle"> Details </i>
									</button>
									<button class="flex-fill btn btn-sm btn-info btn-sharp">
									<i class="fa fa-copy"> Copy Link</i>
									</button>
									<button class="flex-fill btn btn-sm btn-success btn-sharp">
									<i class="fa fa-whatsapp"> Share </i>
									</button></div>
									<div class="collapse" id="demo2">nionefwoe<br>wcoeo<br>iohio </div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Name</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo base_url('resources/img/landscape.jpg') ?>">
									</div>
									<div class="hr mb-3"></div>
									<div class="d-flex">
									<button class="flex-fill btn btn-sm btn-primary btn-sharp" data-toggle="collapse" data-target="#demo3">
									<i class="fa fa-exclamation-circle"> Details </i>
									</button>
									<button class="flex-fill btn btn-sm btn-info btn-sharp">
									<i class="fa fa-copy"> Copy Link</i>
									</button>
									<button class="flex-fill btn btn-sm btn-success btn-sharp">
									<i class="fa fa-whatsapp"> Share </i>
									</button></div>
									<div class="collapse" id="demo3">nionefwoe<br>wcoeo<br>iohio </div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Name</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo base_url('resources/img/landscape.jpg') ?>">
									</div>
									<div class="hr mb-3"></div>
									<div class="d-flex">
									<button class="flex-fill btn btn-sm btn-primary btn-sharp" data-toggle="collapse" data-target="#demo3">
									<i class="fa fa-exclamation-circle"> Details </i>
									</button>
									<button class="flex-fill btn btn-sm btn-info btn-sharp">
									<i class="fa fa-copy"> Copy Link</i>
									</button>
									<button class="flex-fill btn btn-sm btn-success btn-sharp">
									<i class="fa fa-whatsapp"> Share </i>
									</button></div>
									<div class="collapse" id="demo3">nionefwoe<br>wcoeo<br>iohio <br>wcoeo<br>iohio <br>wcoeo<br>iohio </div>
								</div>
							</div>
						</div>

					</div>
			</div>


