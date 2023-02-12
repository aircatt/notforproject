<!-- <div class="sidebar">
    <h3 class="text-center">Selamat Datang <?= $data_user["fullname"] ?></h3>
    <ul>
        <li><a href="http://localhost/perpus/user/index.php">Dashboard</a></li>
        <li><a href="http://localhost/perpus/user/peminjaman.php">Peminjaman</a></li>
        <li><a href="http://localhost/perpus/user/pengembalian.php">Pegembalian</a></li>
        <li><a href="http://localhost/perpus/user/pesan.php">Pesan</a></li>
        <li><a href="http://localhost/perpus/user/profil.php">Profil</a></li>
        <li><a href="../logout.php">Keluar</a></li>
    </ul>
</div> -->

<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="http://localhost/perpus/user/index.php">E-Perputakaan 64</a>
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
                    <a href="http://localhost/perpus/user/index.php">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="http://localhost/perpus/user/peminjaman.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Riwayat Peminjaman</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="http://localhost/perpus/user/pengembalian.php">
                        <i class="far fa-gem"></i>
                        <span>Riwayat Pengembalian</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="http://localhost/perpus/user/pesan.php">
                        <i class="fa fa-chart-line"></i>
                        <span>Pesan</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href="http://localhost/perpus/user/profil.php">
                        <i class="fa fa-globe"></i>
                        <span>Profil</span>
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
            <!-- <span class="badge badge-pill badge-warning notification">3</span> -->
        </a>
        <a href="#">
            <i class="fa fa-envelope"></i>
            <!-- <span class="badge badge-pill badge-success notification">7</span> -->
        </a>
        <a href="#">
            <i class="fa fa-cog"></i>
            <!-- <span class="badge-sonar"></span> -->
        </a>
        <a href="http://localhost/perpus/logout.php">
            <i class="fa fa-power-off"></i>
        </a>
    </div>
</nav>
<!-- sidebar-wrapper  -->