<div id="wrapper">
  
  <div class="tp-banner-container" style="height:500px;">
    <div class="tp-banner">
      <ul style="display:none;">
        <?php
          $banners = BannerPhoto::model()->findAllByAttributes(array('Active'=>'1'));
          $banner = $banners[0];
          for ($x=1; $x<=count($banners)-1; $x++) {
            $banner = $banners[$x];
        ?>
        <li data-transition="fade" data-slotamount="7" data-masterspeed="700">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/bannerphoto/<?php echo $banner->Photo;?>" alt="<?php echo $banner->Title;?>" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
        </li>
        <?php
          }
        ?>
      </ul>
    </div>
  </div>
  <script type="text/javascript">
    var revapi;
    jQuery(document).ready(function() {
      revapi = jQuery('.tp-banner').revolution({
        delay:9000,
        startwidth:1170,
        startheight:500,
        hideThumbs:10,
        forceFullWidth:"off",
      });
    }); //ready
  </script>
  <div class="container marg75">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="promo-block">
          <div class="promo-text">About Company</div>
          <div class="center-line"></div>
        </div>
        <div class="marg50">
          <p class="about-text">
            <?php echo PageContent::model()->findByAttributes(array('PageName'=>'ShortAboutUs'))->Content; ?>
          </p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="promo-block">
          <div class="promo-text">Recent Projects</div>
          <div class="center-line"></div>
        </div>
        <div class="row marg50">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-ms-12">
            <div class="blog-main">
              <div class="blog-images">
                <div class="view view-fifth">
                  <img src="./assets/images/blog1.jpg" alt="" />
                  <div class="mask"><a href="#" class="btn-blog">Read More</a></div>
                </div>
              </div>
              <div class="blog-icon"><i class="icon-music"></i></div>
              <div class="blog-name"><a href="#">Taresent very bear</a></div>
              <div class="blog-desc">Fabruary 17, 2014 by <a href="#">Dankov</a>, in <a href="#">Envato</a></div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-ms-12">
            <div class="blog-main">
              <div class="blog-images">
                <div class="view view-fifth">
                  <img src="./assets/images/blog2.jpg" alt="" />
                  <div class="mask"><a href="#" class="btn-blog">Read More</a></div>
                </div>
              </div>
              <div class="blog-icon"><i class="icon-pencil"></i></div>
              <div class="blog-name"><a href="#">Premium fermentum</a></div>
              <div class="blog-desc">March 17, 2014 by <a href="#">Admin</a>, in <a href="#">Envato</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>