<style type="text/css">
    .nav-pills .nav-item a{
        border-radius: 0px;
    }
    .col-md-6 .container .account{
        border: 1px solid #305082;
    }
</style>
<div class="col-md-6 offset-md-3">
    <div class="container mb-0" style="margin-top: 90px">
        <div class="account">
          <!-- Nav pills -->
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item" style="width: 50%">
              <a class="nav-link text-center active" data-toggle="pill" href="#home">Sign In</a>
            </li>
            <li class="nav-item" style="width: 50%">
              <a class="nav-link text-center" data-toggle="pill" href="#menu1">Sign Up</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
              <h3 class="text-center mt-0">Sign In</h3>
                     <?php echo form_open('login/verify'); ?>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                  </div>
                           <span class="text-danger"><?php echo form_error('name');?></span>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" name="dob" class="form-control" placeholder="Enter Date of Birth (dd-mm-yyyy)" required>
                  </div>
                           <span class="text-danger"><?php echo form_error('name');?></span>
                  <button class="btn btn-success btn px-3 mb-3" style="display: block; margin: auto;" type="submit">Submit</button>
                </form>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
              <h3 class="text-center">Create Your Account</h3>
                     <?php echo form_open('signup/verify'); ?>
                         <?php echo $this->session->flashdata('error'); ?>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $this->input->post('name'); ?>">
                  </div>
                           <span class="text-danger"><?php echo form_error('name');?></span>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-child" aria-hidden="true"></i></span>
                    </div>
                            <select name="gender"class="form-control" style="border-radius: 3px;">
                                <option value="" selected disabled >select</option>
                                <?php 
                                    $uploadfor_values = array(
                                        "MALE"=>'Male',
                                        "FEMALE"=>'Female',
                                    );
                                    foreach($uploadfor_values as $value => $display_text)
                                    {
                                        $selected = ($value == $this->input->post('gender')) ? ' selected="selected"' : "";

                                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                    } 
                                    ?>
                            </select>
                  </div>
                           <span class="text-danger"><?php echo form_error('gender');?></span>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter Date of Birth (dd-mm-yyyy)" name="dob" value="<?php echo $this->input->post('dob'); ?>">
                  </div>
                           <span class="text-danger"><?php echo form_error('dob');?></span>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter Whatsapp Number" name="phone" value="<?php echo $this->input->post('phone'); ?>">
                  </div>
                           <span class="text-danger"><?php echo form_error('phone');?></span>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $this->input->post('email'); ?>">
                  </div>
                           <span class="text-danger"><?php echo form_error('email');?></span>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-gift" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter Refferal Id" name="refferal" value="<?php echo $this->input->post('refferal'); ?>">
                  </div>
                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">I agree and accept the <a href="<?php echo base_url('dashboard/terms') ?>">Terms and Condition.</a> 
                      </label>
                    </div>
                  <button class="btn btn-success px-3 mb-3" style="display: block; margin: auto;" type="submit">Submit</button>
                </form>
            </div>
          </div>
    </div>
</div></div>