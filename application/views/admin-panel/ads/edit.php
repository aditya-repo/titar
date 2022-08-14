      <div class="right_col" role="main">
        <div class="page-title">
        </div>
        <div class="clearfix"></div>

            <div class="clearfix">
          <div class="col-md-6 offset-md-3">
            <div class="x_panel">
              <div class="x_title">
                <h2>Edit Ads</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content"></div>
              <div class="col-md-12">
                    <!---  form opening  --->
                 <?php echo form_open_multipart("update_ads/update_ads/".$singleads->sid);?> 
                                  <!-- <h6 class="mb-0 text-danger"><?php echo $this->session->flashdata('error'); ?></h6> -->
             <div class="row">

                <div class="form-group col-md-2">
                  <label for="sr">Sr No.</label>
                  <input type="text" class="form-control" name="sid"  value="<?php echo $singleads->sid; ?>">
                </div>
                <div class="form-group col-md-7">
                  <label for="file">File JPG</label>
                  <input type="file" class="form-control p-0 form-control-file border" name="upl_file">
                </div>
                <div class="form-group col-md-3">
                  <label for="pwd">Date</label>
                  <input type="text" class="form-control"  name="date" value="<?php echo $singleads->date;?>">
                </div>
              </div>
                <div class="form-group">
                  <label for="usr">URL Link</label>
                  <textarea type="text" class="form-control" rows="1" name="url"><?php echo $singleads->url; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="usr">Caption</label>
                  <textarea type="text" class="form-control" rows="4" name="caption"><?php echo $singleads->caption; ?></textarea>
                </div>
                <div align="center"><button type="submit" class="btn btn-primary mx-auto">Submit</button>
            </div>
            <?php echo form_close(); ?>
            </div>

            </div>         
          </div>
        </div>
      </div>


SELECT `filenumber`, `desknumber` FROM `file` WHERE `filenumber` = 'FILE0001' GROUP BY `filenumber`,`desknumber` ORDER BY `desknumber` DESC;
