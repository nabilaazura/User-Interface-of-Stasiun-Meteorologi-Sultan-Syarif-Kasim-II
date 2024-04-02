<div class="card mt-4">
  <div class="card-header text-white bg-success">
    Data Surat Keluar
  </div>
  <div class="card-body">
    <a href="?halaman=dokumen&hal=tambahdokumen" class="btn btn-info mb-3">Tambah Data</a>
    <table class="table table-borderd table-hovered table-striped" id="datatables">
        <thead>
        <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Prihal</th>
            <th>Departemen/Tujuan</th>
            <th>Pembuat</th>
            <th>File</th>
            <th>Disposisi Surat</th>
            <th>Aksi</>
        </tr>
        </thead>
        <tbody>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dokumen order by id_dokumen desc");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$no++."."?></td>
            <td><?=$data['no_dokumen']?></td>
            <td><?=$data['tanggal_dokumen']?></td>
            <td><?=$data['tentang']?></td>
            <td><?=$data['nama_departemen']?></td>
            <td><?=$data['pembuat']?></td>
            <td>
              <?php
                //uji apakah file nya ada atau tidak
                if(empty($data['file'])){
                  echo " Kosong ";
                } else {
                  ?>
                  <a href="file_dokumen/<?=$data['file']?>" target="$_blank" class="btn btn-dark"> Download </a>
                  <?php
                }
              ?>
            </td>
            <td>
            <a href="modul/email_php/index.php" target="$_blank" class="btn btn-primary"> Kirim File </a>
            </td>
            <td>
              <a href="?halaman=dokumen&hal=edit&id=<?=$data['id_dokumen']?>" class="btn btn-warning"> Edit </a>
              <a href="?halaman=dokumen&hal=hapus&id=<?=$data['id_dokumen']?>" class="btn btn-danger" 
              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" > Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
  </div>
</div>