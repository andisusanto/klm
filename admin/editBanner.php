<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Edit Banner Photo</h4>
				</div>
				<div class="panel-body">	
					<?php
						include_once('../classes/BannerPhoto.php');
						$Conn = Connection::get_DefaultConnection();
						$BannerPhoto = BannerPhoto::GetObjectByKey($Conn, $_GET['Id']);
					?>

					<form role="form" class="form-horizontal validate" action="processEditBannerPhoto.php" method="POST" id="frmEditBannerPhoto" name="frmEditBannerPhoto" enctype="multipart/form-data">
						<input type="hidden" name="Id" value="<?php echo $BannerPhoto->get_Id();?>">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Title" data-validate="required" data-message-required="Title must not be empty" name="Title" value="<?php echo $BannerPhoto->Title ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-4">Image</label>
							<div class="col-sm-10">
								<div style="margin-bottom:5px;">
									<img src="../images/bannerphoto/<?php echo $BannerPhoto->Photo ?>" width="200">
								</div>
								<input type="file" class="form-control" name="Photo" id="field-4" value= "<?php echo $BannerPhoto->Photo ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-5">Active</label>
							<div class="form-block col-sm-4">
								<input type="checkbox" <?php if ($BannerPhoto->Active == 1) echo 'checked' ?> class="iswitch-lg iswitch-purple" name="Active" value="1">
							</div>
						</div>
						
						<div class="form-group-separator"></div>

						<a class="btn btn-primary btn-icon btn-icon-standalone" href="banner.php">
							<i class="fa-arrow-left"></i>
							<span>Cancel / Back</span>
						</a>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmEditBannerPhoto">
							<i class="fa-save"></i>
							<span>Save</span>
						</button>
					</form>
					
				</div>
			</div>	

			
			<?php include('footer.php'); ?>
		</div>
		
	</div>
	<?php include_once('script.php') ?>

</body>
</html>