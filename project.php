<?php include_once('top.php') ?>

<div class="container marg50">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <?php 
          include_once('classes/Project.php');
          include_once('classes/ProjectPhoto.php');
          $Projects = Project::LoadCollection($Conn, "Active = 1");
          foreach ($Projects as $Project) {
        ?>
        <div class="medium-blog">
          <div class="col-lg-5">
            <div class="cl-blog-img">
              <?php 
                $ProjectPhotos = ProjectPhoto::LoadCollection($Conn, "Project = ".$Project->get_Id(), "", 1,1);
                foreach ($ProjectPhotos as $ProjectPhoto) {                     
              ?>
              <img src="img.php?src=projectphoto/<?php echo $ProjectPhoto->Photo ?>&w=500" alt="" />
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="med-blog-naz">
              <div class="cl-blog-name"><a href="projectDetail.php?Id=<?php echo $Project->get_Id()?>"><?php echo $Project->Name?></a></div>
              <div class="cl-blog-text"><?php echo $Project->Description?></div>
            </div>
            <div class="cl-blog-read"><a href="projectDetail.php?Id=<?php echo $Project->get_Id()?>">Read More</a></div>
          </div>
          <div class="cl-blog-line"></div>
        </div>
        <?php } ?>
      </div>
    </div> 
  </div>
</div>

<?php include_once('bottom.php') ?>