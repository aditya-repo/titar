<?php 
$mab = $result['mAdsBalance'];
$mrb = $result['mRefferalBalance'];
$mcb = $result['mCouponBalance'];

$tab = $result['tAdsBalance'];
$trb = $result['tRefferalBalance'];
$tcb = $result['tCouponBalance'];


 ?>
			<div class="right_col" role="main">
					<div class="page-title">
						<div class="title_left">
							<h3>Balance (This Month) </h3>
						</div>
					</div>
					<div class="clearfix"></div>

          			<div class="clearfix">
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Ads Balance</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-dark">₹<?php echo $mab; ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Refferal Balance</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-dark">₹<?php echo $mrb ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Coupon Balance</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-dark">₹<?php echo $mcb ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Total Balance</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-dark">₹<?php echo $mab + $mrb + $mcb; ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>

					</div>
			
					<div class="page-title">
						<div class="title_left">
							<h3>Total Balance</h3>
						</div>
					</div>
					<div class="clearfix"></div>

          			<div class="clearfix">
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Ads Balance</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-success">₹<?php echo $tab; ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Total Refferal</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-success">₹<?php echo $trb; ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Coupon Earned</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-warning">₹<?php echo $tcb; ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="x_panel">
								<div class="x_title">
									<h2>Total Earned</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="a"><h1 class="text-center text-warning">₹<?php echo $tab + $trb + $tcb; ?></h1></div>
									<div class="img img-responsive">
									</div>
								</div>
							</div>
						</div>

					</div>
			</div>


