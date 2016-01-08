<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Submit a Complain</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DNBCB</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
         <li><a href="<?php echo base_url("index.php/userhome/view"); ?>">Home</a></li>
            <li><a href="<?php echo base_url("index.php/noticeboard/view"); ?>">Notice Board</a></li>
            <li class="active"><a href="<?php echo base_url("index.php/submitcomplain/view"); ?>">Submit a Complain</a></li>
            <li><a href="<?php echo base_url("index.php/complainbox/view"); ?>">View Complains</a></li>
            <li><a href="<?php echo base_url("index.php/room/view"); ?>">Room Maintanance</a></li>
      
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url("index.php/userhome/logout"); ?>">Sign Out</a></li>
            </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">

      <div class="starter-template">
      <br><br><br><br><br>
        <h1>Complain</h1>
        <p class="lead">
        <?php 
        echo("<hr>");
        if($fbsuccess = "yes"){ 
          echo ("<div class='alert alert-success' role='alert'><strong>Success</strong>
            Complain submitted successfully! </div>");
        }
        else
          echo ("<div class='alert alert-danger' role='alert'><strong>Failed</strong>
            Complain is not submitted. </div>");

                              //   echo "Complain submitted successfully!"; 
                              // else 
                              //   echo "Complain is not submitted";
                              ?>
                                </p> 

        <p> <?php //echo $complainee ?></p><br>
        <p> <?php //echo $sid ?></p>
      </div>
      

<br><br><br><br><br><br><br><br>
<!-- <h4>Previous Complains</h4>
<a href="#">Reviewed <span class="badge"><?php //echo $reviewed;?></span></a><br>
<a href="<?php//echo base_url("index.php/complainbox/view"); ?>">Not Reviewed <span class="badge"><?php //echo $notreviewed;?></span></a>
 -->

      
    </div><!-- /.container -->

    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>
