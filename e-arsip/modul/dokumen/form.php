<?php
    //Panggil function.php untuk upload file
    include "config/function_dokumen.php";

        //EDIT atau HAPUS DATA
        if(isset($_GET['hal']))
        {
          if($_GET['hal'] == "edit"){
    
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dokumen WHERE id_dokumen='$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data) {
    
            //jika data ditemukan, maka data ditampung kedalam variabel
            $vno_dokumen          = $data['no_dokumen'];
            $vtanggal_dokumen     = $data['tanggal_dokumen'];
            $vtentang             = $data['tentang'];
            $vnama_departemen     = $data['nama_departemen'];
            $vpembuat             = $data['pembuat'];
            $vfile                = $data['file'];
            }
          }
          elseif($_GET['hal'] == 'hapus') {
            //Hapus Data
            $hapus = mysqli_query ($koneksi, "DELETE FROM tbl_dokumen WHERE id_dokumen='$_GET[id]' ");
            
            if($hapus) {
              echo "<script> 
                    alert('Hapus Data Sukses');
                    document.location='?halaman=dokumen';
                    </script>";
            } else {
              echo "<script>
                    alert ('Hapus Data Gagal!');
                    document.location='?halaman=dokumen';
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

         $ubah = mysqli_query($koneksi, "UPDATE tbl_dokumen SET 
                                        no_dokumen         = '$_POST[no_dokumen]',
                                        tanggal_dokumen    = '$_POST[tanggal_dokumen]',
                                        tentang            = '$_POST[tentang]',
                                        nama_departemen    = '$_POST[nama_departemen]',
                                        pembuat            = '$_POST[pembuat]',
                                        file               = '$file'
                                        where id_dokumen   = '$_GET[id]' ");

        if($ubah) {
        echo "<script> 
              alert('Edit Data Berhasil');
              document.location='?halaman=dokumen';
              </script>";
        } else {
        echo "<script>
              alert ('Edit Data Gagal!');
              document.location='?halaman=dokumen';
              </script>";
        }
        } else {
          //Perintah Simpan Data Baru
          
          //simpan data

          $file = upload(); // untuk pemanggilan function upload

          $simpan = mysqli_query($koneksi, "INSERT INTO tbl_dokumen (no_dokumen, tanggal_dokumen, tentang, nama_departemen, pembuat, file)
                                            VALUES ('$_POST[no_dokumen]',
                                                    '$_POST[tanggal_dokumen]',
                                                    '$_POST[tentang]',
                                                    '$_POST[nama_departemen]',
                                                    '$_POST[pembuat]',
                                                    '$file'
                                                    )");

          if($simpan) {
          echo "<script> 
                alert('Simpan Data Dokumen Berhasil');
                document.location='?halaman=dokumen';
                </script>";
          } else {
          echo "<script>
                alert ('Simpan Data Dokumen Gagal!');
                document.location='?halaman=dokumen';
                </script>";
          }
        }
    }
?>

<div class="card mt-3">
  <div class="card-header text-white bg-success">
    Form Data Surat Keluar
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="no_dokumen">No. Surat</label>
            <input type="text" class="form-control" id="no_dokumen" name="no_dokumen" value="<?=@$vno_dokumen?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal_dokumen">Tanggal Surat</label>
            <input type="date" class="form-control" id="tanggal_dokumen" name="tanggal_dokumen" value="<?=@$vtanggal_dokumen?>" required>
        </div>
        <div class="form-group">
            <label for="tentang">Tentang</label>
            <input type="text" class="form-control" id="tentang" name="tentang" value="<?=@$vtentang?>" required>
        </div>
        <div class="form-group">
            <label for="">Departemen</label>
            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" value="<?=@$vnama_departemen?>" required>
        </div>
        <div class="form-group">
            <label for="pembuat">Pembuat</label>
            <input type="text" class="form-control" id="pembuat" name="pembuat" value="<?=@$vpembuat?>" required>
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