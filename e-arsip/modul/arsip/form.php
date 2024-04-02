<?php
    //Panggil function.php untuk upload file
    include "config/function.php";

        //EDIT atau HAPUS DATA
        if(isset($_GET['hal']))
        {
          if($_GET['hal'] == "edit"){
    
            //tampilkan data yang akan diedit
            $tampil = mysqli_query($koneksi, "SELECT 
                                                  tbl_arsip.*,
                                                  tbl_departemen.nama_departemen,
                                                  tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                                              FROM
                                                  tbl_arsip, tbl_departemen, tbl_pengirim_surat
                                              WHERE
                                                  tbl_arsip.id_departemen = tbl_departemen.id_departemen
                                              and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim
                                              and tbl_arsip.id_arsip='$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data) {
    
            //jika data ditemukan, maka data ditampung kedalam variabel
            $vno_surat          = $data['no_surat'];
            $vtanggal_surat     = $data['tanggal_surat'];
            $vprihal            = $data['prihal'];
            $vid_departemen     = $data['id_departemen'];
            $vnama_departemen   = $data['nama_departemen'];
            $vid_pengirim       = $data['id_pengirim'];
            $vnama_pengirim     = $data['nama_pengirim'];
            $vfile              = $data['file'];
            }
          }
          elseif($_GET['hal'] == 'hapus') {
            //Hapus Data
            $hapus = mysqli_query ($koneksi, "DELETE FROM tbl_arsip WHERE id_arsip='$_GET[id]' ");
            
            if($hapus) {
              echo "<script> 
                    alert('Hapus Data Sukses');
                    document.location='?halaman=arsip_surat';
                    </script>";
            } else {
              echo "<script>
                    alert ('Hapus Data Gagal!');
                    document.location='?halaman=arsip_surat';
                    </script>";
            }
          } 
        }


    //SIMPAN DATA
    if(isset($_POST['bsimpan']))
    {
        //Pengujian Aplikasi Apakah Data Akan Diedit / Simpan Baru
        if(@$_GET['hal'] == "edit"){ 
          //Perintah Edit Data
          //edit data
         
          //Cek apakah user pilih file atau gambar atau tidak
          if($_FILES['file']['error'] === 4){
            $file = $vfile;
          }else {
            $file = upload();
          }

         $ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET 
                                        no_surat         = '$_POST[no_surat]',
                                        tanggal_surat    = '$_POST[tanggal_surat]',
                                        prihal           = '$_POST[prihal]',
                                        id_departemen    = '$_POST[id_departemen]',
                                        id_pengirim      = '$_POST[id_pengirim]',
                                        file             = '$file'
                                        where id_arsip   = '$_GET[id]' ");

        if($ubah) {
        echo "<script> 
              alert('Edit Data Pengirim Berhasil');
              document.location='?halaman=arsip_surat';
              </script>";
        } else {
        echo "<script>
              alert ('Edit Data Pengirim Gagal!');
              document.location='?halaman=arsip_surat';
              </script>";
        }
        } else {
          //Perintah Simpan Data Baru
          
          //simpan data

          $file = upload(); // untuk pemanggilan function upload

          $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip (no_surat, tanggal_surat, tanggal_diterima, prihal, id_departemen, id_pengirim, file)
                                            VALUES ('$_POST[no_surat]',
                                                    '$_POST[tanggal_surat]',
                                                    '$_POST[tanggal_diterima]',
                                                    '$_POST[prihal]',
                                                    '$_POST[id_departemen]',
                                                    '$_POST[id_pengirim]',
                                                    '$file'
                                                    )");

          if($simpan) {
          echo "<script> 
                alert('Simpan Data Arsip Berhasil');
                document.location='?halaman=arsip_surat';
                </script>";
          } else {
          echo "<script>
                alert ('Simpan Data Arsip Gagal!');
                document.location='?halaman=arsip_surat';
                </script>";
          }
        }
    }
?>

<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Form Data Surat Masuk
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="no_surat">No. Surat</label>
            <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?=@$vno_surat?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal_surat">Tanggal Surat</label>
            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?=@$vtanggal_surat?>" required>
        </div>
        <div class="form-group">
            <label for="prihal">Prihal</label>
            <input type="text" class="form-control" id="prihal" name="prihal" value="<?=@$vprihal?>" required>
        </div>
        <div class="form-group">
            <label for="id_departemen">Departemen / Tujuan</label>
            <select class="form-control" name="id_departemen">
              <option value="<?=@$vid_departemen?>"> <?=@$vnama_departemen?> </option>
              <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen ORDER BY nama_departemen asc");
                WHILE ($data = mysqli_fetch_array($tampil)){
                  echo "<option value = '$data[id_departemen]'> $data[nama_departemen] </option> ";
                }
              ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_pengirim">Pengirim</label>
            <select class="form-control" name="id_pengirim">
              <option value="<?=@$vid_pengirim?>"> <?=@$vnama_pengirim?> </option>
              <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat ORDER BY nama_pengirim asc");
                WHILE ($data = mysqli_fetch_array($tampil)){
                  echo "<option value = '$data[id_pengirim]'> $data[nama_pengirim] </option> ";
                }
              ?>
            </select>
        </div>
        <div class="form-group">
            <label for="file">Pilih File</label>
            <input type="file" class="form-control" id="file" name="file" value="<?=@$vfile?>" >
            <label for="file"><small><i>Maksimal Ukuran File 2 Mb / 2048 Kb</i></small></label>
        </div>       
        <button type="submit" name="bsimpan" class="btn btn-info">Simpan</button>
        <button type="reset" name="bbatal" class="btn btn-warning">Kosongkan</button>
    </form>
  </div>
</div>