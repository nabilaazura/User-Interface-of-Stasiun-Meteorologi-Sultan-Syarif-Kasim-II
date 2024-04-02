<?php
    //SIMPAN DATA
    if(isset($_POST['bsimpan']))
    {
        //Pengujian Aplikasi Apakah Data Akan Diedit / Simpan Baru
        if($_GET['hal'] == "edit"){ 
          //Perintah Edit Data
          //edit data
         $ubah = mysqli_query($koneksi, "UPDATE tbl_departemen SET nama_departemen = '$_POST[nama_departemen]'
         where id_departemen = '$_GET[id]' ");

        if($ubah) {
        echo "<script> 
              alert('Edit Data Sukses');
              document.location='?halaman=departemen';
              </script>";
        } else {
        echo "<script>
              alert ('Edit Data Gagal!');
              document.location='?halaman=departemen';
              </script>";
        }
        } else {
          //Perintah Simpan Data Baru
          
          //simpan data
          $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen (nama_departemen)
          VALUES ('$_POST[nama_departemen]')");
          //proses simpan yang salah
          // $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen
          //                                   VALUES ('', '$_POST[nama_departemen]') ");

          if($simpan) {
          echo "<script> 
                alert('Simpan Data Sukses');
                document.location='?halaman=departemen';
                </script>";
          } else {
          echo "<script>
                alert ('Simpan Data Gagal!');
                document.location='?halaman=departemen';
                </script>";
          }
        }
    }

    //EDIT atau HAPUS DATA
    if(isset($_GET['hal']))
    {
      if($_GET['hal'] == "edit"){

        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen WHERE id_departemen='$_GET[id]'");

        $data = mysqli_fetch_array($tampil);
        if($data) {

        //jika data ditemukan, maka data ditampung kedalam variabel
        $vnama_departemen = $data['nama_departemen'];
        }
      } else {

        //Hapus Data
        $hapus = mysqli_query ($koneksi, "DELETE FROM tbl_departemen WHERE id_departemen='$_GET[id]' ");
        
        if($hapus) {
          echo "<script> 
                alert('Hapus Data Sukses');
                document.location='?halaman=departemen';
                </script>";
        } else {
          echo "<script>
                alert ('Hapus Data Gagal!');
                document.location='?halaman=departemen';
                </script>";
        }
      }
    }
?>

<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Form Data Departemen
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label for="nama_departemen">Nama Departemen</label>
            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" value="<?=@$vnama_departemen?>" required>
        </div>
        <button type="submit" name="bsimpan" class="btn btn-info">Simpan</button>
        <button type="reset" name="bbatal" class="btn btn-warning">Kosongkan</button>
    </form>
  </div>
</div>

<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Data Departemen
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
        <tr>
            <th>No</th>
            <th>Nama Departemen</th>
            <th>Aksi</th>
        </tr>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen order by id_departemen desc");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$no++."."?></td>
            <td><?=$data['nama_departemen']?></td>
            <td>
              <a href="?halaman=departemen&hal=edit&id=<?=$data['id_departemen']?>" class="btn btn-warning"> Edit </a>
              <a href="?halaman=departemen&hal=hapus&id=<?=$data['id_departemen']?>" class="btn btn-danger" 
              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" > Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
  </div>
</div>