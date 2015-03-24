<?php include_once('top.php') ?>
<?php 
  include_once('classes/Project.php');
  include_once('classes/ProjectPhoto.php');
  $Project = Project::getObjectByKey($Conn, $_GET['Id']);
?>
<div class="page-in">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pull-left"><div class="page-in-name"><?php echo $Project->Name ?></div></div>
    </div>
  </div>
</div>

<div class="container marg75">
  <div class="row">
    <div class="col-lg-12">
      <div>
        <p><?php echo $Project->Description; ?></p>  
      </div>
    </div>
  </div>
</div> 

<div class="container marg50">
  <div class="grid hover-3">
    <div class="cbp-l-grid-projects" id="grid-container-portfolio-4">
      <ul>
        <?php 
          $ProjectPhotos = ProjectPhoto::LoadCollection($Conn, "Project = ".$Project->get_Id());
          foreach ($ProjectPhotos as $ProjectPhoto) {                     
        ?>
            <li class="cbp-item wordpress design html">
              <div class="portfolio-main">
                <figure>
                  <img src="img.php?src=projectphoto/<?php echo $ProjectPhoto->Photo ?>&w=400" alt="" />
                  <figcaption>
                    <h3><?php echo $Project->Name ?></h3>
                    <a href="images/projectphoto/<?php echo $ProjectPhoto->Photo ?>" class="portfolio-attach cbp-lightbox" data-title="<?php echo $Project->Name ?>"><i class="icon-search"></i></a>
                  </figcaption>
                </figure>
              </div>
            </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</div>
          

<script type="text/javascript" src="js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="js/portfolio-4.js"></script>

<?php include_once('bottom.php') ?>