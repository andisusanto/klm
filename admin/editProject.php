<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Edit Project</h4>
				</div>
				<div class="panel-body">	
					<?php
						include_once('../classes/Project.php');
						$Conn = Connection::get_DefaultConnection();
						$Project = Project::GetObjectByKey($Conn, $_GET['Id']);
					?>

					<form role="form" class="form-horizontal validate" action="processEditProject.php" method="POST" id="frmEditProject" name="frmEditProject" enctype="multipart/form-data">
						<input type="hidden" name="Id" value="<?php echo $Project->get_Id();?>">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-2">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="field-2" placeholder="Name" data-validate="required" data-message-required="Name must not be empty" name="Name" value="<?php echo $Project->Name ?>">
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-5">Description</label>
							<div class="col-sm-10">
								<textarea class="form-control" cols="10" rows="10" id="field-5" name="Description"><?php echo $Project->Description ?></textarea>
							</div>
						</div>

						<div class="form-group-separator"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-5">Active</label>
							<div class="form-block col-sm-4">
								<input type="checkbox" <?php if ($Project->Active == 1) echo 'checked' ?> class="iswitch-lg iswitch-purple" name="Active" value="1">
							</div>
						</div>

						<div class="form-group-separator"></div>

						<a class="btn btn-primary btn-icon btn-icon-standalone" href="project.php">
							<i class="fa-arrow-left"></i>
							<span>Cancel / Back</span>
						</a>

						<button class="btn btn-secondary btn-icon btn-icon-standalone pull-right" type="submit" form="frmEditProject">
							<i class="fa-save"></i>
							<span>Save</span>
						</button>
					</form>
					
				</div>
			</div>	

			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#ProjectPhoto" data-toggle="tab">
								<span class="visible-xs"><i class="fa-file-image-o"></i></span>
								<span class="hidden-xs">Project Photo</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="ProjectPhoto">
							<div>
								<a href="addProjectPhoto.php?Pid=<?php echo $Project->get_Id(); ?>" class="btn btn-secondary btn-icon btn-icon-standalone">
									<i class="fa-plus"></i>
									<span>New Project Photo</span>
								</a>

								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										$("#viewdataactivityimage").dataTable({
											aLengthMenu: [
												[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]
											],
										});
									});
								</script>
										
								<table id="viewdataactivityimage" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Photo</th>
											<th>Title</th>
											<th>Active</th>
											<th>Action</th>
										</tr>
									</thead>
										
									<tbody>
										<?php
								           include_once('../classes/ProjectPhoto.php');
								           $Conn = Connection::get_DefaultConnection();
								           $ProjectPhotos = ProjectPhoto::LoadCollection($Conn, "Project = ".$_GET['Id']);
								           foreach($ProjectPhotos as $ProjectPhoto){ ?>
										<tr>
											<td><img src="../images/projectphoto/<?php echo $ProjectPhoto->Photo; ?>" width="150"></td>
					                		<td><?php echo $ProjectPhoto->Title; ?></td>
					                		<td><?php echo $ProjectPhoto->Active == 1 ? 'Active' : 'InActive' ; ?></td>
					                		<td>
														
												<a href="processDeleteProjectPhoto.php?Pid=<?php echo $Project->get_Id(); ?>&Id=<?php echo $ProjectPhoto->get_Id(); ?>" class="btn btn-danger btn-sm btn-icon icon-left fa-close">
													Delete
												</a>
												
					                		</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php include('footer.php'); ?>
		</div>
		
	</div>
	<?php include_once('script.php') ?>

</body>
</html>