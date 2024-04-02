<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<!-- Navigation-->
<?php $this->load->view("_partials/navbar2.php") ?><br><br><br><br>

<body>
    

    <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-5 d-none d-lg-block" >
            <img src="<?php echo base_url('assets/img/bagrd.jpg') ?>" alt="Imag" class="img-fluid">  
        </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <?php echo "<h5 class='text-primary'> Anda mengambil form permohonan : " . $services->name . "</h5> " ?>
                <h1 class="h3 text-gray-900 mb-4">Formulir Permohonan Informasi</h1>
              </div>

              
              <form action="<?php echo site_url('booking/add') ?>" method="post" enctype="multipart/form-data">


                <!-- HIDDEN AREA -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user" id="name" name="name" type="hidden" value="<?php echo $services->name ?>" />
                  </div>

                  <div class="col-sm-6">
                  <input class="form-control form-control-user" id="service_id" name="service_id" type="hidden" value="<?php echo $services->service_id ?>" />
                  </div>
                </div>
                <!-- HIDDEN AREA -->


                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama" name="nama" required>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Instansi/Perusahaan" name="instansi" required>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Jabatan" name="jabatan" required>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat" name="alamat" required>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nomor Whatsapp" name="whatsapp" value="+62" required>
                  </div>

                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Email" name="email" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1" class="form-label">Informasi/Jasa yang diperlukan :</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jasa" id="jasa1" onclick="tutup()" value="Analisis Curah Hujan Bulanan">
                    <label class="form-check-label" for="jasa1">Analisis Curah Hujan Bulanan</label><br>
                    <input class="form-check-input" type="radio" name="jasa" id="jasa2" onclick="tutup()" value="Informasi Cuaca Khusus Untuk Komersial">
                    <label class="form-check-label" for="jasa2">Informasi Cuaca Khusus Untuk Komersial</label><br>
                    <input class="form-check-input" type="radio" name="jasa" id="jasa3" onclick="tutup()" value="Informasi Radar Cuaca">
                    <label class="form-check-label" for="jasa3">Informasi Radar Cuaca</label><br>
                    <input class="form-check-input" type="radio" name="jasa" id="jasa4" onclick="tutup()" value="Informasi Meteorologi Untuk Klaim Asuransi Dan Data Dukung">
                    <label class="form-check-label" for="jasa4">Informasi Meteorologi Untuk Klaim Asuransi Dan Data Dukung</label><br>
                    <input class="form-check-input" type="radio" name="jasa" id="jasa4" onclick="tutup()" value="Informasi Meteorologi Untuk Klaim Asuransi Dan Data Dukung">
                    <label class="form-check-label" for="jasa5">Jasa Konsultasi Meteorologi</label><br>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="formDate" class="form-label">Data Meteorologi Dari tanggal :</b></label>
                    <input type="date" data-date-format="DD/MM/YYYY" class="form-control form-control-user" id="exampleFirstName" placeholder="tanggal1" name="tanggal1" required>
                  </div>

                  <div class="col-sm-6">
                    <label for="formDate" class="form-label">Sampai dengan tanggal :</b></label>
                    <input type="date" data-date-format="DD/MM/YYYY" class="form-control form-control-user" id="exampleLastName" placeholder="tanggal2" name="tanggal2" required>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Lokasi/Wilayah" name="lokasi" required>
                </div>

                <div class="form-group">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">(PDF) Surat Permohonan Permintaan Informasi <b>(Umum)</b>/ Surat Pengantar Permohonan Data Dari Sekolah/Kampus <b> (Mahasiswa/Pelajar)</b></label>
                    <input class="form-control" type="file" id="formFile" name="surat">
                  </div>
                </div>

                <div class="form-group">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">(PDF) Proposal Penelitian <b> (Khusus Mahasiswa/Pelajar)</b></label>
                    <input class="form-control" type="file" id="formFile" name="proposal">
                  </div>
                </div>

                <div class="form-group">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">(PDF) Kartu Tanda Penduduk<b> (Wajib)</b></label>
                    <input class="form-control" type="file" id="formFile" name="ktp" required>
                  </div>
                </div>

                    <p><a href="http://localhost/sipeldatinssk2/index.php/tarif" target="_blank">Jenis Layanan dan Tarif</a></p>
                    <button id="keperluan" type="submit" class="btn btn-primary btn-user btn-block" name="ajukan">Ajukan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<br><br>
<?php $this->load->view("_partials/footer.php") ?>
</body>

</html>