<?php include_once('top.php') ?>
<div id="wrapper">
  
  <div class="tp-banner-container" style="height:500px;">
    <div class="tp-banner">
      <ul style="display:none;">
        <?php
          include_once('classes/BannerPhoto.php');
          
          $BannerPhotos = BannerPhoto::LoadCollection($Conn, "Active = 1");
          foreach ($BannerPhotos as $BannerPhoto) {
        ?>
        <li data-transition="fade" data-slotamount="7" data-masterspeed="700">
          <img src="img.php?src=bannerphoto/<?php echo $BannerPhoto->Photo;?>&w=1350" alt="<?php echo $BannerPhoto->Title;?>" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
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
            <?php 
              include_once('classes/PageContent.php');
              echo PageContent::GetObjectByKey($Conn, 4)->Content; ?>
          </p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="promo-block">
          <div class="promo-text">Recent Projects</div>
          <div class="center-line"></div>
        </div>
        <div class="row marg50">

          <?php 
            include_once('classes/Project.php');
            include_once('classes/ProjectPhoto.php');
            $Projects = Project::LoadCollection($Conn, "Active = 1", "Id Desc", 1, 2);
            foreach ($Projects as $Project) {
          ?>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-ms-12">
            <div class="blog-main">
              <div class="blog-images">
                <div class="view view-fifth">
                  <?php 
                    $ProjectPhotos = ProjectPhoto::LoadCollection($Conn, "Project = ".$Project->get_Id(), "", 1,1);
                    foreach ($ProjectPhotos as $ProjectPhoto) {                     
                  ?>
                  <img src="img.php?src=projectphoto/<?php echo $ProjectPhoto->Photo ?>&w=300" alt="" />
                  <?php } ?>
                  <div class="mask"><a href="projectDetail.php?Id=<?php echo $Project->get_Id()?>" class="btn-blog">Read More</a></div>
                </div>
              </div>
              <div class="blog-name"><a href="projectDetail.php?Id=<?php echo $Project->get_Id()?>"><?php echo $Project->Name ?></a></div>
            </div>
          </div>
          <?php } ?>
          
        </div>
      </div>
    </div>
  </div>
<?php include_once('bottom.php') ?>