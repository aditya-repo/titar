<?php 
  // echo base_url();
$this->documentFolder = "resources/img/ads";


function getstatus($status){
    if ((strlen($status) == 1 ) && ($status == 1)){
        return "<i class='fa fa-check-circle' style='color:#15B41C'> </i> Uploaded";
    }else{
        return "<i class='fa fa-times-circle' style='color:#B42815'> </i> Not Uploaded";
    }
}
?>
			<div class="right_col" role="main">
				<div class="page-title">
					<div class="title_left">
						<h3>Dashboard</h3>
					</div>
				</div>
				<div class="clearfix"></div>

      			<div class="clearfix">
					<div class="col-sm-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Update Advertisement</h2>
                  <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNotice">
                    New Ads
                  </button>
                  </div>
								<div class="clearfix"></div>
							</div>
							<div class="x_content"></div>


                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="datatable" class="table table-striped table-hover" style="width:100%">
                      <thead>
                              <tr>
                                <th>ADS ID</th>
                                <th>Description</th>
                                <th>URL Link</th>
                                <th>JPG File</th>
                                <th>Date</th>
                                <th colspan="2" class="text-center">Action</th>
                              </tr>
                      </thead>

                            <tbody>
                              <tr>
                                <?php foreach ($ads as $value) { 
                           $path = $this->documentFolder.'/'.$value->sid.".jpg"; 
                           $filestatus = file_exists($path);  
                                  ?>

                                <td><?php echo $value->sid; ?></td>
                                <td><?php echo $value->caption; ?></td>
                                <td><?php echo $value->url; ?></td>
                                <td>
                                        <?php  echo  getstatus($filestatus) ;
                                        // if (strlen($filestatus) == 1) {
                                        //     unset($value->id);
                                        //  } ?>
                                          
                                       </td>
                                <td><?php echo $value->date; ?></td>
                                <td style="width: 7%"><a href="<?php echo base_url("update_ads/edit_ads/");echo $value->sid;?>" class="btn btn-warning btn-sm" >Edit</a></td>
                                <td style="width: 7%"><a href="<?php echo base_url("update_ads/delete_ads/");echo $value->sid; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                    </table>
          							</div>
          						</div>         
          					</div>
          				</div>
          			</div>

                <!-- The Modal -->
                <div class="modal fade" id="addNotice">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                            <?php echo form_open_multipart('update_ads/add_ads');?>
                      <div class="modal-body px-5">
                        <div class="form-group">
                          <label for="#">Caption</label>
                          <textarea type="text" name="caption" class="form-control" rows="3" value="<?php echo $this->input->post('caption'); ?>"></textarea>
                          <span class="text-danger"><?php echo form_error('caption');?></span>
                        </div>
                        <div class="form-group">
                          <label for="#">Url Link</label>
                          <textarea type="text" name="url" class="form-control" rows="2" value="<?php echo $this->input->post('url'); ?>"></textarea>
                          <span class="text-danger"><?php echo form_error('url');?></span>
                        </div>
                        <div class="form-group">
                          <label for="#">Date</label>
                          <input type="text" name="date" class="form-control" value="<?php echo $this->input->post('date'); ?>">
                          <span class="text-danger"><?php echo form_error('date');?></span>
                        </div>
                        <div class="form-group">
                          <label for="#">Upload Document</label>
                          <input type="file" class="form-control form-control-file border" name="upl_file">
                          <span class="text-danger"></span>
                        </div>
                        <div class="text-center">
                        	<input type="submit" class="btn btn-primary p-auto">
                        </div>
                      </div>
                            <?php echo form_close(); ?>

                      <!-- </form> -->
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
</div>
