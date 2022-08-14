<!DOCTYPE html>
<html>

<head>
    <title>Online Admission Facilitation Portal | OAF Portal</title>
    <!-- Latest compiled and minified CSS & JS -->
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=1'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("resources/css/custom.css") ?>">
    <script src="//code.jquery.com/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url("resources/img/favicon.ico")  ?>" />
</head>

<body>
       <div id="main" class="container-fluid" style="background:#12BB91; height:150px; ">
        <div class="row">

            <div class="col-md-12 text-center">
                
                <div class="modal fade" id="modalid">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Admission Instructions</h4>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item">Admission is based on merit list published by Patliputra University, Patna<br/>Admission is based on merit list published by Patliputra University, Patna</li>
                                    
                                    <li class="list-group-item">Any editing/updating of data must be done on Patliputra University website.</li>
                                    <li class="list-group-item">Incase documents required are not fulfilled, the admission can/would be revoked. Student cannot claim for any refund of college fees.</li>
                                    <li class="list-group-item">Incase of any payment error, the student are requested not to make multiple paymentss, unless advised to do so.</li>
                                </ul>
                            </div>
                            <div class="modal-footer bg-danger">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url("resources/img/header-logo.png") ?>" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Begin page content -->
    <div class="row-fluid">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">Admission Portal </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url("common/search"); ?>">Document Download </a></li>
                      <li><a href="<?php echo base_url("common/help"); ?>">College & HelpLine </a></li>
                        <li><a data-toggle="modal" href='#modalid'>Instructions</a></li>
                        <li><a data-toggle="modal" href="<?php echo base_url("common/about"); ?>">About Us</a></li>
                        <li><a data-toggle="modal" href="<?php echo base_url("common/contact"); ?>">Contact Us</a></li>
                  <!--       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Candidate</a></li>
                                <li><a href="#">College</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
<div class="container">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>College List & Admission Helpline Number </strong></div>
            <div class="panel-body">
                <div class="row">
                    
                       <div class="table-responsive">
                           <table class="table table-condensed table-hover">
                               <thead>
                                   <tr>
                                       <th>Sl</th>
                                       <th>College Name</th>
                                       <th>Address</th>
                                       <th>Helipline No.</th>
                                       <th>Email</th>
                                   </tr>
                               </thead>
                               <tbody>
                                <?php $counter = 1;foreach ($allColleges as $key => $value) { ?>
                                   
                               
                                   <tr>
                                       <td width="5%"><?php echo $counter; ?></td>
                                       <td width="35%"><?php echo $value['collegename']; ?></td>
                                       <td width="35%"><?php echo $value['address']; ?></td>
                                       <td width="10%"><?php echo $value['admissionHelpline']; ?></td>
                                       <td width="15%"><?php echo $value['email']; ?></td>
                                      
                                   </tr>

                                   <?php $counter++;} ?>
                               </tbody>
                           </table>
                       </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

  <footer class="footer">
        <section class="copyright-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-col text-center">
                            <p>Copyrights 2020 OFA PORTAL. All Rights Reserved. <a href="<?php echo base_url("common/policy") ?>">Admission Policy | </a> <a href="<?php echo base_url("common/terms") ?>">Terms & Conditions |</a> <a href="<?php echo base_url("common/privacy") ?>">Privacy Policy</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
</body>
</html>
