<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- BASICS -->
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Room Maintanence</title>
        <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/isotope.css"); ?>" media="screen" /> 
    <link rel="stylesheet" href="<?php echo base_url("assets/js/fancybox/jquery.fancybox.css"); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <!-- skin -->
    <link rel="stylesheet" href="<?php echo base_url("assets/skin/default.css"); ?>">
    </head>
   
    <body>
    <section id="header" class="appear"></section>
    <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
       <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="fa fa-bars color-white"></span>
          </button>
          <h1><a class="navbar-brand" href="#" data-0="line-height:90px;" data-300="line-height:50px;">      DNbCb
          </a></h1>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
             <li ><a href="<?php echo base_url("index.php/userhome/view"); ?>">Home</a></li>

            <?php 
            if($type == "Provost")
            echo "<li>
            <ul class='nav navbar-nav'>
              <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Registration<b class='caret'></b></a>
                  <ul class='dropdown-menu'>
                    <li><a href='". base_url("index.php/register/student") ."'>Student</a></li>
                    <li><a href='". base_url("index.php/register/staff") ."'>Staff</a></li>
                  </ul>
              </li>
            </ul>
          </li>"
          ?>
            <?php if($type=="Provost")
            echo "<li><a href='".base_url("index.php/approvenotice/view")."'>Approve Notices</a></li>";?>

            <li><a href="<?php echo base_url("index.php/noticeboard/view"); ?>">Notice Board</a></li>
            <?php if($type=="Student")
            echo "<li><a href='".base_url("index.php/submitcomplain/view")."'>Submit a Complain</a></li>";?>
            <li ><a href="<?php echo base_url("index.php/complainbox/view"); ?>">View Complains</a></li>
            <?php if($type=="Student")
            echo "<li class='active'><a href='".base_url("index.php/room/view")."'>Room Maintanence</a></li>";?>
            <?php if($type=="Staff")
            echo "<li><a href='".base_url("index.php/serviceview/view")."'>Services</a></li>";?>

            <li><a href="<?php echo base_url("index.php/userhome/logout"); ?>">Sign Out</a></li>
      
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <section class="featured2">
      <div class="container"> 
        <div class="row mar-bot40">
          <div class="col-md-20 col-md-offset-0">
            
            <div class="align-left">
              
              <h3 class="slogan">Room Maintanence and Others</h3>
              <p>
              
              </p>  
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br><br>

    <div class="container">
    <p class="lead">Ask for hall facilities</p> 
      
      <hr>
      <div align="center">
      <?php
      //echo $help;
      if ($help)
        echo "<strong>You have asked for Medical Assistance </strong><br>";
      if ($laundry)
        echo "<strong>You have asked for Hall Laundry Service</strong>";

      ?>
      </div>

      <div align="center">
      <br>
      <a class="btn btn-lg btn-danger <?php if($help == 1) echo "disabled"?>" href="<?php echo base_url("index.php/room/gethelp"); ?>" role="button">Ask for Medical Assistance</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="btn btn-lg btn-info <?php if($laundry == 1) echo "disabled"?>" href="<?php echo base_url("index.php/room/getlaundry"); ?>" role="button">Ask for Hall Laundry Service</a>
      <?php 
      if ($help || $laundry ){
        echo ("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        echo ("<a class='btn btn-lg btn-theme' href='". base_url("index.php/room/getclear"). "' role='button'>Cancel Services</a>");  
      }

      ?>
      </div>
      <br><br><hr><br><br><br>
      <p class="lead">Or, let us know your opinion about hall and room maintanance system</p>
      <hr><br>
<form role="form" action='<?php echo base_url();?>index.php/submitfeedback' method='post'>
        <div class="form-group">
          <input type="name" class="form-control" name = "name" placeholder="Name"><br>
          <input type="name" class="form-control" name = "subject" placeholder="Subject" ><br>
          <input type="date" class="form-control" name = "date" placeholder="Date (yyyy/mm/dd)" ><br>
    
    <textarea class="form-control" rows="4" name = "feedback" placeholder="Write your opinion here"></textarea><br>
  </div>


<button type="submit" class="btn btn-theme">Submit</button>
</form>
      </div>

<br><br><br>
      
        </div>
      </div>
      <br><br><br><br><br><br><br><br><br>

    </div>

    
   <section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
        <div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>       
        </div>
      </div>

      <div class="row align-center copyright">
          <div class="col-sm-12"><p>Copyright &copy; 2014 </a></p></div>
      </div>
    </div>

  </section> 
  <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a> 

  <script src="<?php echo base_url("assets/js/modernizr-2.6.2-respond-1.1.0.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery.easing.1.3.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
  <script src="<?php echo base_url("assets/js/jquery.isotope.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery.nicescroll.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/fancybox/jquery.fancybox.pack.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/skrollr.min.js"); ?>"></script>   
  <script src="<?php echo base_url("assets/js/jquery.scrollTo-1.4.3.1-min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery.localscroll-1.2.7-min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/stellar.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery.appear.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validate.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/main.js"); ?>"></script>
       
  </body>
</html>







