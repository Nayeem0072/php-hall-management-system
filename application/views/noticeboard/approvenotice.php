<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- BASICS -->
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Notice Board</title>
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

            
            <?php if($type=="Provost"){
            
            echo "<li><a href='".base_url("index.php/register/student")."'>Register Student</a></li>";
            echo "<li><a href='".base_url("index.php/register/staff")."'>Register Staff</a></li>";

            echo "<li><a href='".base_url("index.php/approvenotice/view")."'>Approve Notices</a></li>";
          }
            ?>

            <?php if($type=="Staff")
            echo "<li class='active'><a href='".base_url("index.php/submitnotice/view")."'>Post Notices</a></li>";?>

            <li><a href="<?php echo base_url("index.php/noticeboard/view"); ?>">Notice Board</a></li>
            <?php if($type=="Student")
            echo "<li><a href='".base_url("index.php/submitcomplain/view")."'>Submit a Complain</a></li>";?>
            <li><a href="<?php echo base_url("index.php/complainbox/view"); ?>">View Complains</a></li>
            <?php if($type=="Student")
            echo "<li><a href='".base_url("index.php/room/view")."'>Room Maintanence</a></li>";?>
            <?php if($type=="Staff")
            echo "<li class='active'><a href='".base_url("index.php/serviceview/view")."'>Services</a></li>";?>
      
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
              
              <h3 class="slogan">Pending Notices</h3>
              <p>
              Displaying notices waiting for approval. </p>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br><br>

    <div class="container">
    <div class="col-md-10">
          <table class="table table-striped">
            <thead>
             <?php
            if($approvenotice){
              echo "<tr>
                <th>#</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Posted By</th>
              </tr>
            </thead>
            <tbody>";
                $count = 1;
            foreach ($approvenotice->result() as $row)
            {
              echo "<tr>";
               echo ("<td> $count </td>");
               echo ("<td> <a href='". base_url("index.php/approvenotice/show")."?id=".$row->noticeid."'>$row->subject </a></td>");
               echo ("<td> $row->publishdate </td>");
               echo ("<td> $row->name </td>");
               
              echo "</tr>";

              $count++;
            }
          }
            ?>
            
            </tbody>
          </table>
        </div>
        






      </div>


    </div>

    <br><br><br><br><br><br>
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







