<?php 
  include_once('classes/Company.php');
  $Conn = Connection::get_DefaultConnection();
  $Company = Company::GetObjectByKey($Conn, 1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kailin Marine - KLM Official Website" />
    <meta name="keywords" content="Shipyard, KLM, Kailin" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />

    <link href="images/favicon.ico" rel="shortcut icon" />
    
    <title>Kailin Marine - Official Company Website</title>
    
    <!-- JS FILES -->
    <script type="text/javascript" src="js/jquery-1.20.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/sticky.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/retina.js"></script>
    <script type="text/javascript" src="js/testimonialrotator.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="js/portfolio-0.js"></script>
    
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="js/switch.class.js"></script>
    <script type="text/javascript" src="js/jquery.dlmenu.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <!-- CSS FILES -->
    <link href="css/cubeportfolio-4.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/settings.css" media="screen" rel="stylesheet" type="text/css" />
    <!--<link href="css/navstylechange.css" media="screen" rel="stylesheet" type="text/css" />-->
    <link href="css/cubeportfolio.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/testimonialrotator.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="#" media="screen" rel="stylesheet" type="text/css" id="style-schem-color" /> 
    <link href="#" media="screen" rel="stylesheet" type="text/css" id="style-schem" /> 
    <link href="css/custom.css" media="screen" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header>
      <div class="top_line">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 pull-left">
              <ul class="contact-top">
                <li><i class="icon-location"></i><?php echo $Company->Address ?></li>
                <li><i class="icon-mobile"></i><?php echo $Company->ContactNumber ?></li>
                <li><i class="icon-mail"></i><?php echo $Company->Email ?></li>
              </ul>
            </div>
            <div class="col-lg-5 col-md-4 pull-right hidden-phone">
              <ul class="social-links">
                <li><a href="<?php echo $Company->Facebook ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $Company->Skype ?>"><i class="fa fa-skype"></i></a></li>
              </ul>
            </div> 
          </div>
        </div>
      </div>
    </header>
    <div class="page_head">
      <div class="nav-container" style="height: auto;">
        <nav>
          <div class="container">
            <div class="row">
              <div class="col-lg-3 pull-left">
                <div class="logo c-logo">
                  <a href="index.php"><img src="images/company/<?php echo $Company->Logo ?> " alt="Kailin-Marine"></a>
                </div>
              </div>
              <div class="col-lg-9 pull-right">
                <div class="menu">
                  <div id="dl-menu" class="dl-menuwrapper">
                    <button class="dl-trigger">Open Menu</button>
                    <ul class="dl-menu">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="aboutus.php">About Us </a></li>
                      <li><a href="project.php">Project</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                  </div> 
                </div>        
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div>&nbsp;</div>