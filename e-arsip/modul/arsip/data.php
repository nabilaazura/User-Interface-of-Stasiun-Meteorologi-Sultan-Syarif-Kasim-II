<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Data Surat Masuk
  </div>
  <div class="card-body">
    <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-info mb-3">Tambah Data</a>
    <table class="table table-borderd table-hovered table-striped" id="datatables">
        <thead>
        <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Prihal</th>
            <th>Departemen / Tujuan</th>
            <th>Pengirim</th>
            <th>File</th>
            <th>Disposisi Surat</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $tampil = mysqli_query($koneksi, "
                      SELECT 
                        tbl_arsip.*,
                        tbl_departemen.nama_departemen,
                        tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                      FROM
                        tbl_arsip, tbl_departemen, tbl_pengirim_surat
                      WHERE
                        tbl_arsip.id_departemen = tbl_departemen.id_departemen
                        and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim
                      ");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$no++."."?></td>
            <td><?=$data['no_surat']?></td>
            <td><?=$data['tanggal_surat']?></td>
            <td><?=$data['prihal']?></td>
            <td><?=$data['nama_departemen']?></td>
            <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
            <td>
              <?php
                //uji apakah file nya ada atau tidak
                if(empty($data['file'])){
                  echo " Kosong ";
                } else {
                  ?>
                  <a href="file/<?=$data['file']?>" target="$_blank" class="btn btn-dark"> Download </a>
                  <?php
                }
              ?>
            </td>
            <td>
                 <a href="modul/email_php/index.php" target="$_blank" class="btn btn-primary"> Kirim File </a>
            </td>
            <td>
              <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-warning"> Edit </a>
              <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" 
              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" > Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
  </div>
</div>