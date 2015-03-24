<?php include('header.php'); ?>

<body class="page-body">

	<div class="page-container">

		<?php include('sidenav.php'); ?>

		<div class="main-content">
				
			<?php include('nav.php'); ?>

			<h4><b>Banner</b></h4>

			<div class="panel panel-default">
				<div class="panel-body">	
					
					<a href="addBanner.php" class="btn btn-secondary btn-icon btn-icon-standalone">
						<i class="fa-plus"></i>
						<span>Add New Banner</span>
					</a>

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
								<th>Title</th>
								<th>Active</th>
								<th>Action</th>
							</tr>
						</thead>
							
						<tbody>
							<?php
					           include_once('../classes/BannerPhoto.php');
					           $Conn = Connection::get_DefaultConnection();
					           $Banners = BannerPhoto::LoadCollection($Conn);
					           foreach($Banners as $BannerPhoto){ ?>
							<tr>
		                		<td><?php echo $BannerPhoto->Title; ?></td>
		                		<td><?php echo $BannerPhoto->Active == 1 ? 'Active' : 'InActive' ; ?></td>
		                		<td>
		                			<a href="editBanner.php?Id=<?php echo $BannerPhoto->get_Id(); ?>" class="btn btn-secondary btn-sm btn-icon icon-left fa-edit">
										Edit
									</a>
											
									<a href="processDeleteBannerPhoto.php?Id=<?php echo $BannerPhoto->get_Id(); ?>" class="btn btn-danger btn-sm btn-icon icon-left fa-close">
										Delete
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