<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- BASICS -->
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DNBCB</title>
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
            <li class="active"><a href="<?php echo base_url();?>index.php/home/view">Home</a></li>
            <li><a href="#section-about">About</a></li>
            <li><a href="#section-contact">Contact</a></li>
            <li><form class="navbar-form navbar-right" action='<?php echo base_url();?>index.php/verifylogin' method='post' >
          
            <div class="form-group">
              <input type="text" placeholder="Username" name="username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name = "password" class="form-control">
            </div>
            <button type="submit" value = "login" class="btn btn-theme ">Log In</button>
          </form></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <section class="featured">
      <div class="container"> 
        <div class="row mar-bot40">
          <div class="col-md-6 col-md-offset-3">
            
            <div class="align-center">
              
              <h2 class="slogan">Welcome to DNbCb</h2>
              <p>
              A digital approach to access Notice Board and Complain Box of an efficient Hall Management System
              </p>  
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- services -->
    <section id="section-services" class="section pad-bot30 bg-white">
    <div class="container" align = "center"> 
    
      <div class="row mar-bot40">
        <div class="col-lg-20" >
          <div class="align-center">
            <!-- <i class="fa fa-code fa-5x mar-bot20"></i> -->
            <h4 class="text-bold">It's Easy and Convenient!</h4>
            <p>Gain access to all the important notices and other facilities with only one account.
            </p>
          </div>
        </div>
          
        
      
      </div>  

    </div>
    </section>
      
    <!-- spacer section:testimonial -->
    <section id="testimonials" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">       
          <div class="col-lg-12">
              <div class="align-center">
                    <div class="testimonial pad-top40 pad-bot40 clearfix">
                      <h5>
                        SUHRAWARDY HALL<br>
                      </h5>
                      <h6>Established: 1986</h6>
                      <br/>
                    </div>

                </div>
              </div>
          </div>
        
      </div>  
    </div>  
    </section>
      
    <!-- about -->
    <section id="section-about" class="section appear clearfix">
    <div class="container"><br><br><br><br>

        <div class="row mar-bot40">
          <div class="col-md-offset-3 col-md-6">
            <div class="section-header">
              <h2 class="section-heading animated" data-animation="bounceInUp">Our Developer Team</h2>
              <div class="team-detail">
              <br><br><h4>Supervisor: Md Iftekharul Islam Sakib</h4>
              <span>Lecturer<br>Dept. of Computer Science and Engineering</span>
              </div>
            </div>
          </div>
        </div>

          <div class="row align-center mar-bot40">
            <div class="col-md-6">
              <div class="team-member">
                <figure class="member-photo"><img src="img/team/member1.jpg" alt="" /></figure>
                <div class="team-detail">
                  <h4>Nayeem Islam</h4>
                  <span>Std. ID: 1005060<br>Level 3 Term 2</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="team-member">
                <figure class="member-photo"><img src="img/team/member2.jpg" alt="" /></figure>
                <div class="team-detail">
                  <h4>Ishmam Sharif</h4>
                  <span>Std. ID: 1005048<br>Level 3 Term 2</span>
                </div>
              </div>
            </div>
            

          </div>
            
    </div>
    </section>
    
    <!-- contact -->
    <section id="section-contact" class="section appear clearfix">
      <div class="container"><br><br>
        
        <div class="row mar-bot40">
          <div class="col-md-offset-3 col-md-6">
            <div class="section-header">
              <h2 class="section-heading animated" data-animation="bounceInUp">Contact us</h2>
              <p>Let us know what you think about this system.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="cform" id="contact-form">
              <div id="sendmessage">
                 Your message has been sent. Thank you!
              </div>
              <form action="contact/contact.php" method="post" role="form" class="contactForm">
                <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="maxlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validation"></div>
                </div>
                
                <button type="submit" class="btn btn-theme pull-left">SEND MESSAGE</button>
              </form>
              <br><br><br><br>
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        
      </div>
    </section>
    <!-- map -->
    <!-- <section id="section-map" class="clearfix">
      <div id="map"></div>
    </section>
     -->
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