<!-- <div class="sidebar">
    <h3 class="text-center">Selamat Datang <?= $data_user["fullname"] ?></h3>
    <ul>
        <li><a href="http://localhost/perpus/admin/index.php">Dashboard</a></li>
        <li><a href="#">Master Data</a>
            <ul>
                <li><a href="http://localhost/perpus/admin/master_data/data_admin/index.php">Data Admin</a></li>
                <li><a href="http://localhost/perpus/admin/master_data/data_anggota/index.php">Data Anggota</a></li>
                <li><a href="http://localhost/perpus/admin/master_data/data_peminjaman/index.php">Data Peminjaman</a></li>
            </ul>
        </li>
        <li><a href="#">Katalog Buku</a>
            <ul>
                <li><a href="http://localhost/perpus/admin/katalog_buku/data_buku/index.php">Data Buku</a></li>
                <li><a href="http://localhost/perpus/admin/katalog_buku/data_kategori/index.php">Data Kategori</a></li>
                <li><a href="http://localhost/perpus/admin/katalog_buku/data_penerbit/index.php">Data Penerbit</a></li>
            </ul>
        </li>
        <li><a href="http://localhost/perpus/admin/laporan_perpus/index.php">Laporan Perpustakaan</a></li>
        <li><a href="http://localhost/perpus/admin/pesan.php">Pesan</a></li>
        <li><a href="http://localhost/perpus/admin/pemberitahuan.php">Pemberitahuan</a></li>
        <li><a href="http://localhost/perpus/admin/notif.php">Notifikasi</a></li>
        <li><a href="http://localhost/perpus/logout.php">Keluar</a></li>
    </ul>
</div> -->


<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="http://localhost/perpus/admin/index.php">E-Perputakaan 64</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="<?= $data_user["foto"] ?>" alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name"><Strong><?= $data_user["fullname"]; ?></Strong></span>
                <span class="user-role text-capitalize"><?= $data_user["role"]; ?></span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>
        <!-- sidebar-header  -->

        <div class="sidebar-menu">
            <ul>
                <li class="sidebar">
                    <a href="http://localhost/perpus/admin/index.php">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Master Data</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="http://localhost/perpus/admin/master_data/data_admin/index.php">Data Admin

                                </a>
                            </li>
                            <li>
                                <a href="http://localhost/perpus/admin/master_data/data_anggota/index.php">Data Anggota</a>
                            </li>
                            <li>
                                <a href="http://localhost/perpus/admin/master_data/data_peminjaman/index.php">Data Peminjaman</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="far fa-gem"></i>
                        <span>Katalog Buku</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="http://localhost/perpus/admin/katalog_buku/data_buku/index.php">Data Buku</a>
                            </li>
                            <li>
                                <a href="http://localhost/perpus/admin/katalog_buku/data_kategori/index.php">Data Kategori</a>
                            </li>
                            <li>
                                <a href="http://localhost/perpus/admin/katalog_buku/data_penerbit/index.php">Data Penerbit</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar">
                    <a href="http://localhost/perpus/admin/laporan_perpus/index.php">
                        <i class="fa fa-chart-line"></i>
                        <span>Laporan Perpustakaan</span>
                    </a>
                </li>
                <li class="header-menu">
                    <span>Informasi</span>
                </li>
                <li>
                    <a href="http://localhost/perpus/admin/pesan.php">
                        <i class="fa fa-book"></i>
                        <span>Pesan</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/perpus/admin/pemberitahuan.php">
                        <i class="fa fa-calendar"></i>
                        <span>Pemberitahuan</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/perpus/admin/notif.php">
                        <i class="fa fa-folder"></i>
                        <span>Notifikasi</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <a href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
        </a>
        <a href="http://localhost/perpus/logout.php">
            <i class="fa fa-power-off"></i>
        </a>
    </div>
</nav>
<!-- sidebar-wrapper  -->