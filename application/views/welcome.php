<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Project Name</title>
      <!-- Bootstrap CSS File -->
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/style.css");?>">
</head>
<body>
    <nav class="header">
        <a href="#" class="logo">Titar</a>
        <input type="checkbox" name="breadcrumb" id="breadcrumb">
        <label class="menu-icon" for="breadcrumb"><div class="menu-icon-z"><span class="nav-icon"></span></div></label>
        <ul class="menu">
            <li><a href="<?php echo base_url('dashboard/career') ?>">Plans</a></li>
            <li><a href="<?php echo base_url('dashboard/about') ?>">How it works?</a></li>
            <li><a href="<?php echo base_url('dashboard/privacy') ?>">FAQs</a></li>
            <li><a href="<?php echo base_url('dashboard/contact') ?>">Contact Us</a></li>
            <li><a href="#">Sign In</a></li>
        </ul>
    </nav>
        <br><br>
        <?php                    
                if(isset($_view) && $_view)
                    $this->load->view($_view);
        ?>
            </section>
    <!--==========================
      Services Section
    ============================-->
<br>
<br>
<br>
<br>
<br>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer" style="background-color: #152237">
    <div class="footer-top" style="background-color: #2a446f">
      <div class="container p-3">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Titar</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>


          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet .</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Iraade</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
        Designed by <a href="https://bootstrapmade.com/">AdityaDesk</a>
      </div>
    </div>
  </footer><!-- #footer -->


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> 

  <script src="<?php echo base_url('lib/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?php echo base_url('lib/mobile-nav/mobile-nav.js');?>"></script>

  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


</body>
</html>
