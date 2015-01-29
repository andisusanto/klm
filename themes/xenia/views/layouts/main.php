
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kailin Marine - KLM Official Website" />
    <meta name="keywords" content="Shipyard, KLM, Kailin" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" rel="shortcut icon" />
    
    <title>Kailin Marine - Official Company Website</title>
    
    <!-- JS FILES -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.20.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sticky.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/retina.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/testimonialrotator.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/portfolio-0.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/switch.class.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dlmenu.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>

    <!-- CSS FILES -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/settings.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/navstylechange.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/cubeportfolio.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/testimonialrotator.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="#" media="screen" rel="stylesheet" type="text/css" id="style-schem-color" /> 
    <link href="#" media="screen" rel="stylesheet" type="text/css" id="style-schem" /> 
  </head>
  <body>
    <header>
      <div class="top_line">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 pull-left">
              <ul class="contact-top">
                <li><i class="icon-location"></i>Address</li>
                <li><i class="icon-mobile"></i>ContactNumber</li>
                <li><i class="icon-mail"></i>Email</li>
              </ul>
            </div>
            <div class="col-lg-6 col-md-5 pull-right hidden-phone">
              <ul class="social-links">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
                <div class="logo">
                  <?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/logo.jpg" alt="Kailin-Marine">',array('site/index')); ?>
                </div>
              </div>
              <div class="col-lg-9 pull-right">
                <div class="menu">
                  <div id="dl-menu" class="dl-menuwrapper">
                    <button class="dl-trigger">Open Menu</button>
                    <ul class="dl-menu">
                      <li><?php echo CHtml::link('Home',array('site/index')); ?></li>
                      <li><?php echo CHtml::link('About Us',array('site/aboutus')); ?></li>
                      <li><?php echo CHtml::link('Our Project',array('site/project')); ?></li>
                      <li><?php echo CHtml::link('Contact Us',array('site/contact')); ?></li>
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
    
    <?php echo $content; ?>

    <div class="footer">
    <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="promo-text-footer">Get in Touch</div>
              <ul class="contact-footer">
                <li><i class="icon-location"></i>Address</li>
                <li><i class="icon-mobile"></i>Contact Number</li>
                <li><i class="icon-mail"></i>Email Address</li>
                <li><i class="icon-key"></i> Weekend: from 9 am to 6 pm</li>
              </ul> 
               <ul class="soc-footer">
                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
              </ul>       
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
            
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
            
            </div>
          </div>
        </div>
        <div class="container">
          <div class="footer-bottom">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-ms-12 pull-left">
                <div class="copyright">Copyright © 2014 Kailin Marine Powered By </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-ms-12 pull-right">
                <div class="foot_menu">
                  <ul>
                    <li><?php echo CHtml::link('Home',array('site/index')); ?></li>
                    <li><?php echo CHtml::link('About Us',array('site/aboutus')); ?></li>
                    <li><?php echo CHtml::link('Our Project',array('site/project')); ?></li>
                    <li><?php echo CHtml::link('Contact Us',array('site/contact')); ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>