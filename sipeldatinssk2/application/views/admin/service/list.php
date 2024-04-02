<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php } else if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php } else if ($this->session->flashdata('warning')) { ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
					</div>
				<?php } else if ($this->session->flashdata('info')) { ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
					</div>
				<?php } ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/services/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Photo</th>
										<th>Keterangan</th>
										<th>Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($services as $service) : ?>
										<tr>
											<td>
												<?php echo $no++; ?>
											</td>
											<td width="150">
												<?php echo $service->name ?>
											</td>
											<td>
												<img src="<?php echo base_url('upload/' . $service->image) ?>" width="64" />
											</td>
											<td width="250" class="small">
												<?php echo substr($service->description, 0, 120) ?>...
											</td>

											<td>
												<?php echo $service->price ?>
											</td>

											<td width="250">
												<a href="<?php echo site_url('admin/services/edit/' . $service->service_id) ?>" class="btn btn-success btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/services/delete/' . $service->service_id) ?>')" href="javascript:void(0)" class="btn btn-danger btn-small"><i class="fas fa-trash"></i> Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		function deleteConfirm(url) {
			console.log(url);
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>

	<script type="application/javascript">
		/** After windod Load */
		$(window).bind("load", function() {
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function() {
					$(this).remove();
				});
			}, 500);
		});
	</script>

</body>

</html>