<?php
session_start();
include_once("../class/User.php");
include_once("../class/Peminjaman.php");
include_once("../class/Buku.php");

$user = new User;
$data_user = $user->find($_SESSION['id']);

if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);
    if ($data_user['role'] == 'user') {
        header("Location: http://localhost/perpus/user/index.php");
    }
}

$data_anggota = $user->getAnggota();

$buku = new Buku;
$data_buku = $buku->all();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->getPeminjaman();
$data_pengembalian = $peminjaman->getPengembalian();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include("../partials/t_script_js.php") ?>
    <title>Dashboard Admin</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">

        <?php include("../partials/sidebar_admin.php") ?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-dark">
                                        <th>Data Anggota</th>
                                        <th>Data Buku</th>
                                        <th>Data Peminjaman</th>
                                        <th>Data Pembembalian</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><?= count($data_anggota) ?></td>
                                        <td><?= count($data_buku) ?></td>
                                        <td><?= count($data_peminjaman) ?></td>
                                        <td><?= count($data_pengembalian) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <?php include("../partials/b_script_js.php") ?>
</body>

</html>