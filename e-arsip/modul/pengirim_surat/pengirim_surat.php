<?php
    //SIMPAN DATA
    if(isset($_POST['bsimpan']))
    {
        //Pengujian Aplikasi Apakah Data Akan Diedit / Simpan Baru
        if(@$_GET['hal'] == "edit"){ 
          //Perintah Edit Data
          //edit data
         $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
                                        nama_pengirim = '$_POST[nama_pengirim]',
                                        alamat  = '$_POST[alamat]',
                                        no_hp   = '$_POST[no_hp]',
                                        email   = '$_POST[email]'
                                        where id_pengirim = '$_GET[id]' ");

        if($ubah) {
        echo "<script> 
              alert('Edit Data Pengirim Berhasil');
              document.location='?halaman=pengirim_surat';
              </script>";
        } else {
        echo "<script>
              alert ('Edit Data Pengirim Gagal!');
              document.location='?halaman=pengirim';
              </script>";
        }
        } else {
          //Perintah Simpan Data Baru
          
          //simpan data
          $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat (nama_pengirim, alamat, no_hp, email)
          VALUES ('$_POST[nama_pengirim]', '$_POST[alamat]', '$_POST[no_hp]', '$_POST[email]' )");

          if($simpan) {
          echo "<script> 
                alert('Simpan Data Pengirim Berhasil');
                document.location='?halaman=pengirim_surat';
                </script>";
          } else {
          echo "<script>
                alert ('Simpan Data Pengirim Gagal!');
                document.location='?halaman=pengirim_surat';
                </script>";
          }
        }
    }

    //EDIT atau HAPUS DATA
    if(isset($_GET['hal']))
    {
      if($_GET['hal'] == "edit"){

        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat WHERE id_pengirim='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if($data) {

        //jika data ditemukan, maka data ditampung kedalam variabel
        $vnama_pengirim = $data['nama_pengirim'];
        $valamat = $data['alamat'];
        $vno_hp  = $data['no_hp'];
        $vemail  = $data['email'];
        }
      } else {

        //Hapus Data
        $hapus = mysqli_query ($koneksi, "DELETE FROM tbl_pengirim_surat WHERE id_pengirim='$_GET[id]' ");
        
        if($hapus) {
          echo "<script> 
                alert('Hapus Data Sukses');
                document.location='?halaman=pengirim_surat';
                </script>";
        } else {
          echo "<script>
                alert ('Hapus Data Gagal!');
                document.location='?halaman=pengirim_surat';
                </script>";
        }
      }
    }
?>

<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Form Data Pengirim Surat
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label for="nama_pengirim">Nama Pengirim</label>
            <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?=@$vnama_pengirim?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?=@$valamat?>" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No. Hp</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=@$vno_hp?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=@$vemail?>" required>
        </div>
        <button type="submit" name="bsimpan" class="btn btn-info">Simpan</button>
        <button type="reset" name="bbatal" class="btn btn-warning">Kosongkan</button>
    </form>
  </div>
</div>

<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Data Pengirim Surat
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped" id="datatables">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengirim</th>
            <th>Alamat</th>
            <th>No. Hp</th>
            <th>email</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat order by id_pengirim desc");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$no++."."?></td>
            <td><?=$data['nama_pengirim']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['no_hp']?></td>
            <td><?=$data['email']?></td>
            <td>
              <a href="?halaman=pengirim_surat&hal=edit&id=<?=$data['id_pengirim']?>" class="btn btn-warning"> Edit </a>
              <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" > Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
  </div>
</div>