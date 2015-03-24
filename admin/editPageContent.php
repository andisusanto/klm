<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Edit PageContent</h4>
				</div>
				<div class="panel-body">	
					<?php
						include_once('../classes/PageContent.php');
						$Conn = Connection::get_DefaultConnection();
						$PageContent = PageContent::GetObjectByKey($Conn, $_GET['Id']);
					?>

					<form role="form" class="form-horizontal validate" action="processEditPageContent.php" method="POST" id="frmEditPageContent" name="frmEditPageContent" enctype="multipart/form-data">
						<input type="hidden" name="Id" value="<?php echo $PageContent->get_Id();?>">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Page Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Page Name" name="PageName" disabled value="<?php echo $PageContent->PageName ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-5">Content</label>
							<div class="col-sm-10">
								<textarea class="form-control" cols="10" rows="10" id="field-5" name="Content"><?php echo $PageContent->Content ?></textarea>
							</div>
						</div>

						<div class="form-group-separator"></div>

						<a class="btn btn-primary btn-icon btn-icon-standalone" href="pageContent.php">
							<i class="fa-arrow-left"></i>
							<span>Cancel / Back</span>
						</a>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmEditPageContent">
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