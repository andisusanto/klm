<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<h4><b>Page Content</b></h4>

			<div class="panel panel-default">
				<div class="panel-body">	
					
					<script type="text/javascript">
						jQuery(document).ready(function($)
						{
							$("#viewdata").dataTable({
								aLengthMenu: [
									[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]
								],
							});
						});
					</script>
							
					<table id="viewdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Page Name</th>
								<th>Action</th>
							</tr>
						</thead>
							
						<tbody>
							<?php
					           include_once('../classes/PageContent.php');
					           $Conn = Connection::get_DefaultConnection();
					           $PageContents = PageContent::LoadCollection($Conn);
					           foreach($PageContents as $PageContent){ ?>
							<tr>
		                		<td><?php echo $PageContent->PageName; ?></td>
		                		<td>
		                			<a href="editPageContent.php?Id=<?php echo $PageContent->get_Id(); ?>" class="btn btn-secondary btn-sm btn-icon icon-left fa-edit">
										Edit
									</a>
									
		                		</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>	

			<?php include('footer.php'); ?>
		</div>
		
	</div>
	
	<?php include_once('script.php') ?>

</body>
</html>