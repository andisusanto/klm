<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Add User</h4>
				</div>
				<div class="panel-body">	
					
					<form role="form" class="form-horizontal validate" action="processAddUser.php" method="POST" id="frmAddUser" name="frmAddUser" enctype="multipart/form-data">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Username" data-validate="required" data-message-required="Username must not be empty" name="Username">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="field-2" placeholder="Password" data-validate="required" data-message-required="Password must not be empty" name="Password">
							</div>
						</div>

						<div class="form-group-separator"></div>
					
						<a class="btn btn-primary btn-icon btn-icon-standalone" href="user.php">
							<i class="fa-arrow-left"></i>
							<span>Cancel / Back</span>
						</a>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmAddUser">
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