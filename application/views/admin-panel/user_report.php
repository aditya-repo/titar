<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="right_col" role="main">
     <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    User Report
                </h3>
            </div>
         </div>
        <div class="clearfix"></div>
 
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Customer Id</th>
                          <th>Name</th>
                          <th>Phone Number</th>
                          <th>Date Of Birth</th>
                          <th>Referral Count</th>
                          <th>Earning</th>
                          <th>Attendence</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                          foreach ($all_user as $key => $value) { ?>
                            <tr>
                              <td><?php echo $value['id']?></td>
                              <td><?php echo $value['name']?></td>
                              <td><?php echo $value['phone']?></td>
                              <td><?php echo $value['dob']?></td>
                              <td><?php echo $value['id']?></td>
                              <td><?php echo $value['name']?></td>
                              <td><?php echo $value['name']?></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>