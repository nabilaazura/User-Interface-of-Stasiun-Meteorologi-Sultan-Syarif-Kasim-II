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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover align-middle" id="dataTable" width="relative" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
										<th>Instansi</th>
										<th>Jabatan</th>
										<th>Alamat</th>
										<th>Nomor WA</th>
										<th>Email</th>
										<th>Jenis Info/ Keperluan</th>
										<th>Tanggal</th>
										<th>lokasi</th>
										<th>Surat Permohonan (Khusus Mahasiswa)</th>
										<th>Proposal Penelitian (khusus Mahasiswa)</th>
										<th>KTP</th>
										<th>Jenis Permohonan</th>
										<th>Aksi</th>
										<th>Status Layanan<th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
                                    foreach ($form_booking as $service) : ?>
									<tr>
										<td class="align-middle">
											<?php echo $no++; ?>
										</td>

										<td class="align-middle">
											<?php echo $service->nama ?>
										</td>

										<td class="align-middle">
											<?php echo $service->instansi ?>
										</td>

										<td class="align-middle">
											<?php echo $service->jabatan ?>
										</td>
										
										<td class="align-middle">
											<?php echo $service->alamat ?>
										</td>
										
										<td class="align-middle">
											<?php echo $service->whatsapp ?>
										</td>
										
										<td class="align-middle">
											<?php echo $service->email ?>
										</td>
										
										<td class="align-middle">
											<?php echo $service->jasa ?><br>
										</td>

										<td class="align-middle">
											<?php echo $service->tanggal1  ." Sampai ". $service->tanggal2?>
										</td>

										<td class="align-middle">
											<?php echo $service->lokasi ?>
										</td>

										<td class="align-middle">
											<?php 
                                                    if($service->surat != "0"){
                                                ?>
											<a href="<?php echo base_url('upload/' . $service->surat) ?>"
												target="_blank" class="btn btn-warning" width="max">Buka</a>
											<?php    
                                                    }else{
                                                ?>
											Tidak Ada
											<?php
                                                    }
                                                ?>
										</td>
										
										<td class="align-middle">
											<?php 
                                                    if($service->proposal != "0"){
                                                ?>
											<a href="<?php echo base_url('upload/' . $service->proposal) ?>"
												target="_blank" class="btn btn-warning" width="max">Buka</a>
											<?php    
                                                    }else{
                                                ?>
											Tidak Ada
											<?php
                                                    }
                                                ?>
										</td>

										<td class="align-middle">
											<?php 
                                                    if($service->ktp != '0'){
                                                ?>
											<a href="<?php echo base_url('upload/' . $service->ktp) ?>" target="_blank"
												class="btn btn-warning" width="max">Buka</a>
											<?php    
                                                    }else{
                                                ?>
											-
											<?php
                                                    }
                                                ?>
										</td>

										<td class="align-middle">
											<?php echo $service->name ?>
										</td>

										<td class="align-middle">
											<?php
                                                if ($service->status_booking == 0) { ?>
											    <a class="btn btn-success" width="max"
												href="<?php echo base_url() . 'index.php/admin/data_booking/ambil/' . $service->id ?>/1">KIRIM</a>

												<a class="btn btn-danger" width="max"
												href="<?php echo base_url() . 'index.php/admin/data_booking/ambil/' . $service->id ?>/2">BATAL</a>
											<?php
                                                } ?>

											<a href="<?= $service->wa ?>" target="_blank" class="btn btn-primary">Chat</a>

										</td>

										<td class="align-middle">
											
											<?php
                                                if ($service->status_booking == 0) { ?>
											    <span><b>Permohonan Sedang Diproses<b></span>
											<?php
                                                } ?>

											<?php
                                                if ($service->status_booking == 1) { ?>
											    <span class="label text-success"><b>Permohonan Telah Dikirim<b></span>
											<?php
                                                } ?>

											<?php
                                                if ($service->status_booking == 2) { ?>
											    <span class="label text-danger"><b>Permohonan Telah Dibatalkan!<b></span>
											<?php
                                                } ?>

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

</body>

</html>