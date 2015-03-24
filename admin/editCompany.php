<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Edit Company</h4>
				</div>
				<div class="panel-body">	
					<?php
						include_once('../classes/Company.php');
						$Conn = Connection::get_DefaultConnection();
						$Company = Company::GetObjectByKey($Conn, 1);
					?>

					<form role="form" class="form-horizontal validate" action="processEditCompany.php" method="POST" id="frmEditCompany" name="frmEditCompany" enctype="multipart/form-data">
						<input type="hidden" name="Id" value="<?php echo $Company->get_Id();?>">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Name" data-validate="required" data-message-required="Name must not be empty" name="Name" value="<?php echo $Company->Name ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Address" name="Address" value="<?php echo $Company->Address ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Contact Number</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="ContactNumber" name="ContactNumber" value="<?php echo $Company->ContactNumber ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Email" name="Email" value="<?php echo $Company->Email ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Skype</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Skype" name="Skype" value="<?php echo $Company->Skype ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Facebook</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Facebook" name="Facebook" value="<?php echo $Company->Facebook ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Working Time</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="WorkingTime" name="WorkingTime" value="<?php echo $Company->WorkingTime ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-4">Logo</label>
							<div class="col-sm-10">
								<div style="margin-bottom:5px;">
									<img src="../images/company/<?php echo $Company->Logo ?>" width="200">
								</div>
								<input type="file" class="form-control" name="Logo" id="field-4" value= "<?php echo $Company->Logo ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmEditCompany">
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