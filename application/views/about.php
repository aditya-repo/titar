<?php

if($this->session->userdata('admissionID')){
            redirect('dashboard');}
?>
<!DOCTYPE html>
<html>

<head>
   
    <title>Online Admission Facilitation Portal | OAF Portal</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=1'/>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("resources/css/font-awesome.min.css") ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("resources/css/custom.css") ?>">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url("resources/img/favicon.ico")  ?>" />

    
</head>

<body>
 <script type="text/javascript">
        $.LoadingOverlay("show");
    </script>
    <style type="text/css">
        
        .copyright-col a {
            color : #FFFFFF;
        }
    </style>
    <div id="main" class="container-fluid" style="background:#12BB91; height:150px; ">
        <div class="row">

            <div class="col-md-12 text-center">
                
         
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
                    <a class="navbar-brand" href="#">Admission Portal </a>
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
        <div class="col-xs-12">
             <!-- <marquee>This is basic example of marquee</marquee> -->
         
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">About</h3>
                </div>
                <div class="panel-body">
                    <h2>OAFPORTAL</h2>
                    <p>It is a admission portal built to facilitate the admission of colleges. As of now, all the college belong to <a href="https://ppup.ac.in">Patliputra University, Patna</a> </p>
                    <p>The portal facilitate the admission for the <a href="<?php echo site_url('common/help') ?>">these</a> colleges. </p>
                    <p>This is to clarify that this website is NOT a part of Patliputra University, Patna </p>
                    <p>Mr. Pankaj Kumar is the admininstrator of the website. Email : pankaj7894@gmail.com</p>
                    <p>Mr. Rajeev Ranjan Arya manages the team. Email: aryarajeev72@gmail.com</p>
                  </div>
                </div>
            </div>
        </div>



        <div class="clearfix"></div>
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
    <script>
    $(function() {
        // $("#dob").datepicker({
        //     dateFormat: 'dd/mm/yy',
        //     maxDate: "-12y",
        //     minDate: new Date(1985, 1 - 1, 1),
        //     navigationAsDateFormat: true,
        //     showButtonPanel: true,
        //     showOptions: { direction: "up" },
        //     changeYear: true,
        //     changeMonth: true,
        // });


        $("#dob").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-40:-13",
            dateFormat: "dd/mm/yy",
            maxDate: "-13Y"
        }).attr("readonly", "readonly");
    });
    </script>
    <script type="text/javascript">
        
   $(window).on('load', function() {
    $.LoadingOverlay("hide");

   });

      
    </script>
</body>

</html>