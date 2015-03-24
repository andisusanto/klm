<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Add Project Photo</h4>
				</div>
				<div class="panel-body">	
					
					<form role="form" class="form-horizontal" action="processAddProjectPhoto.php" method="POST" id="frmAddProjectPhoto" name="frmAddProjectPhoto" enctype="multipart/form-data">
						
						<input type="hidden" name="Pid" value="<?php echo $_GET['Pid'] ?>">
						<div class="form-group">
							<label class="col-sm-2 control-label">Project Photo</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="Photo" id="field-4">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Title" name="Title">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-5">Active</label>
							<div class="form-block col-sm-4">
								<input type="checkbox" class="iswitch-lg iswitch-purple" name="Active" value="1">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<a class="btn btn-primary btn-icon btn-icon-standalone" href="editProject.php?Id=<?php echo $_GET['Pid'] ?>">
							<i class="fa-arrow-left"></i>
							<span>Cancel / Back</span>
						</a>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmAddProjectPhoto">
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