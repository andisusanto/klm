<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Edit User</h4>
				</div>
				<div class="panel-body">	
					<?php
						include_once('../classes/Admin.php');
						$Conn = Connection::get_DefaultConnection();
						$Admin = Admin::GetObjectByKey($Conn, $_GET['Id']);
					?>

					<form role="form" class="form-horizontal validate" action="processEditUser.php" method="POST" id="frmEditUser" name="frmEditUser" enctype="multipart/form-data">
						<input type="hidden" name="Id" value="<?php echo $Admin->get_Id();?>">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Username" name="Username" value="<?php echo $Admin->Username ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Stored Password</label>
							<div class="col-sm-10">
								<input type="Password" class="form-control" id="field-2" placeholder="Password" name="Password">
								* input this field to change user password.
							</div>
						</div>

						<div class="form-group-separator"></div>

						<a class="btn btn-primary btn-icon btn-icon-standalone" href="user.php">
							<i class="fa-arrow-left"></i>
							<span>Cancel / Back</span>
						</a>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmEditUser">
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