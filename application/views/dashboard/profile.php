			<div class="right_col" role="main">
					<div class="page-title">
						<div class="title_left">
							<h3>Profile</h3>
						</div>
					</div>
					<div class="clearfix"></div>

          			<div class="clearfix">
						<div class="col-sm-3 float-md-right float-lg-right">
							<div class="x_panel">
								<div class="x_title">
									<h2>Photo</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-4">
										<img class="mx-auto d-block" src="<?php echo base_url('resources/img/avatar.jpg') ?>">
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-9 float-md-left float-lg-left">
							<div class="x_panel">
								<div class="x_title">
									<h2>Personal Details :-</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="col-md-6 pl-0 ml-0">
					                    <table id="datatable" class="table table-bordered pb-0 mb-0" style="width:100%">
					                      <thead>
					                      </thead>
					                      <tbody>
					                        <tr>
					                          <th>Name</th>
					                          <td><?php echo $this->session->userdata('name'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>Gender</th>
					                          <td><?php echo $this->session->userdata('gender'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>Date of Birth</th>
					                          <td><?php echo $this->session->userdata('dob'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>Phone</th>
					                          <td><?php echo $this->session->userdata('phone'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>Email</th>
					                          <td><?php echo $this->session->userdata('email'); ?></td>
					                        </tr>
					                      </tbody>
					                    </table>
									</div>
									<div class="col-md-6 pl-0 ml-0">
					                    <table id="datatable2" class="table table-bordered" style="width:100%">
					                      <thead>
					                      </thead>
					                      <tbody>
					                        <tr>
					                          <th>Partner ID</th>
					                          <td><?php echo $this->session->userdata('id'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>Address</th>
					                          <td><?php echo $this->session->userdata('cname'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>City</th>
					                          <td><?php echo $this->session->userdata('city'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>Pin Code</th>
					                          <td><?php echo $this->session->userdata('pincode'); ?></td>
					                        </tr>
					                        <tr>
					                          <th>State</th>
					                          <td><?php echo $this->session->userdata('state'); ?></td>
					                        </tr>
					                      </tbody>
					                    </table>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>


