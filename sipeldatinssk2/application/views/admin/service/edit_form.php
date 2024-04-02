<!--<?php
	$id 				= $services->service_id;
	if ($this->input->post('is_submitted')) {
		$name			= set_value('name');
		$description	= set_value('description');
		$price			= set_value('price');
	} else {
		$name			= $services->name;
		$description	= $services->description;
		$price			= $services->price;
	}
	?> -->
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('pesan')) : ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $this->session->flashdata('pesan'); ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/services/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
							<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat view ini digunakan. Yakni index.php/admin/services/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $services->service_id ?>" />

							<div class="form-group">
								<label for="name">Nama Layanan*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="service name" value="<?php echo $services->name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Foto Layanan</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" onchange="readURL(this);" name="image" value="<?php echo $services->image ?>" />

								<div class="form-group">
									<script type="text/javascript">
										function readURL(input) {
											if (input.files && input.files[0]) {
												var reader = new FileReader();
												reader.onload = function(e) {
													$('#blah').attr('src', e.target.result);
												}
												reader.readAsDataURL(input.files[0]);
											}
										}
									</script>
									<img id="blah" width="496px" height="320px" src="<?php echo base_url("upload/$services->image") ?>" alt="..." />
								</div>

								<p><?php echo base_url("upload/$services->image") ?></p>

								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Deskripsi</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" name="description" placeholder="description"><?php echo $services->description ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Harga Layanan</label>
								<input id="rupiah" class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="text" name="price" placeholder="service price" value="<?php echo $services->price ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

</body>

<script>
	var rupiah = document.getElementById("rupiah");
	rupiah.addEventListener("keyup", function(e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, "Rp. ");
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}
</script>

</html>