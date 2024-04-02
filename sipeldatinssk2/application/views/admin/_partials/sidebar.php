<!-- Sidebar -->

<ul class="sidebar navbar-nav bg-secondary">

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'services' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Layanan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/services/add') ?>">Tambah Layanan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/services') ?>">Daftar Layanan</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/data_booking') ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Pemohon</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('register') ?>">    
            <i class="fas fa-fw fa-users"></i>
            <span>Tambah Akun</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/data_pesan') ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesan dan Saran</span></a>
    </li>
</ul>
