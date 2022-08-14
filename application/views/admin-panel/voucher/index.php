<?php 
  // echo base_url();
$this->documentFolder = "resources/img/voucher";

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
								<h2>Update Voucher</h2>
                  <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNotice">
                    New Ads
                  </button>
                  </div>
								<div class="clearfix"></div>
							</div>
							<div class="x_content"></div>


                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="datatable" class="table table-striped table-hover table-responsive" style="width:100%">
                      <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Money</th>
                                <th>Details</th>
                                <th>URL Link</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Expiry</th>
                                <th>Remarks</th>
                                <th>File</th>
                                <th colspan="2" class="text-center">Action</th>
                              </tr>
                      </thead>

                            <tbody>
                              <tr>
                                <?php foreach ($ads as $value) { 
                           $path = $this->documentFolder.'/'.$value->id.".jpg"; 
                           // $filepathname = pathinfo($path, PATHINFO_FILENAME  );
                           $filestatus = file_exists($path);  
                                  ?>

                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->money; ?></td>
                                <td><?php echo $value->caption; ?></td>
                                <td><?php echo $value->url; ?></td>
                                <td><?php echo $value->type; ?></td>
                                <td><?php echo $value->startDate; ?></td>
                                <td><?php echo $value->endDate; ?></td>
                                <td><?php echo $value->remarks; ?></td>
                                <td>
                                        <?php  echo  getstatus($filestatus) ;
                                        // if (strlen($filestatus) == 1) {
                                        //     unset($value->id);
                                        //  } ?>
                                          
                                       </td>
                                <td style="width: 7%"><a href="<?php echo base_url("update_voucher/edit_ads/");echo $value->id;?>" class="btn btn-warning btn-sm" >Edit</a></td>
                                <td style="width: 7%"><a href="<?php echo base_url("update_voucher/delete_ads/");echo $value->id; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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
                            <?php echo form_open_multipart('update_voucher/add_ads');?>

                    <!---  form opening  --->
                 <?php echo form_open_multipart("update_voucher/update_ads/".$value->id);?> 
                                  <!-- <h6 class="mb-0 text-danger"><?php echo $this->session->flashdata('error'); ?></h6> -->
             <div class="row px-4 pt-4">

                <div class="form-group col-md-2">
                  <label for="sr">Sr No.</label>
                  <input type="text" class="form-control" name="id"  value="">
                </div>
                <div class="form-group col-md-7">
                  <label for="file">File JPG</label>
                  <input type="file" class="form-control p-0 form-control-file border" name="upl_file">
                </div>
                <div class="form-group col-md-3">
                  <label for="pwd">Money</label>
                  <input type="text" class="form-control"  name="money" value="">
                </div>
              </div>
              <div class="row px-4">
                <div class="form-group col-md-6">
                  <label for="type">Type</label>
                            <select name="type"class="form-control" style="border-radius: 3px;">
                                <?php 
                                    $uploadfor_values = array(
                                        "Voucher"=>'Voucher',
                                        "Coupon"=>'Coupon',
                                        "Refferal"=>'Refferal',
                                    );
                                    foreach($uploadfor_values as $value => $display_text)
                                    {
                                        $selected = ($value == $this->input->post('gender')) ? ' selected="selected"' : "";

                                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                    } 
                                    ?>
                            </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="pwd">Remark</label>
                  <input type="text" class="form-control"  name="remarks" value="">
                </div>
              </div>
              <div class="row px-4">
                <div class="form-group col-md-6">
                  <label for="pwd">Issue Date</label>
                  <input type="text" class="form-control"  name="startDate" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="pwd">Expiry Date</label>
                  <input type="text" class="form-control"  name="endDate" value="">
                </div>
              </div>
                <div class="form-group px-4">
                  <label for="usr">Name</label>
                  <textarea type="text" class="form-control" rows="1" name="name"></textarea>
                </div>
                <div class="form-group px-4">
                  <label for="usr">URL Link</label>
                  <textarea type="text" class="form-control" rows="1" name="url"></textarea>
                </div>
                <div class="form-group px-4">
                  <label for="usr">Caption</label>
                  <textarea type="text" class="form-control" rows="4" name="caption"></textarea>
                </div>
                <div align="center"><button type="submit" class="btn btn-primary mx-auto">Submit</button>
            </div>
            <?php echo form_close(); ?>
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
