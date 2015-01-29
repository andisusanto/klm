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
      <div >
        <p><?php echo PageContent::model()->findByAttributes(array('PageName'=>'AboutUs'))->Content; ?></p>
        <p><?php echo PageContent::model()->findByAttributes(array('PageName'=>'Vision'))->Content; ?></p>
        <p><?php echo PageContent::model()->findByAttributes(array('PageName'=>'Mission'))->Content; ?></p>
      </div>
    </div>
  </div>
</div> 