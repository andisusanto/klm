<?php include_once('top.php') ?>
<div class="page-in">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pull-left"><div class="page-in-name">About Our Company</div></div>
    </div>
  </div>
</div>

<div class="container marg75">
  <div class="row">
    <div class="col-lg-12">
      <div class="promo-block">
        <div class="promo-text">Kailin Marine</div>
        <div class="center-line"></div>
      </div>
      <div>&nbsp;</div>
      <div>
        <?php 
          include_once('classes/PageContent.php');
        ?>
        
        <p><?php echo PageContent::GetObjectByKey($Conn, 1)->Content; ?></p>
        
      </div>
      <div>&nbsp;</div>
      <div class="promo-block">
        <div class="promo-text">Our Vision</div>
        <div class="center-line"></div>
      </div>
      <div>&nbsp;</div>
      <div>
        <?php 
          include_once('classes/PageContent.php');
        ?>
        
        <p><?php echo PageContent::GetObjectByKey($Conn, 2)->Content; ?></p>
        
      </div>
      <div>&nbsp;</div>
      <div class="promo-block">
        <div class="promo-text">Our Mission</div>
        <div class="center-line"></div>
      </div>
      <div>&nbsp;</div>
      <div>
        <?php 
          include_once('classes/PageContent.php');
        ?>
        
        <p><?php echo PageContent::GetObjectByKey($Conn, 3)->Content; ?></p>
        
      </div>
    </div>
  </div>
</div> 
<?php include_once('bottom.php') ?>