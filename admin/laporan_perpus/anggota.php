<?php
session_start();
include_once("../../class/User.php");
include_once("../../class/Peminjaman.php");

$user = new User;
$data_user = $user->find($_SESSION["id"]);
$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->allPinjam();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../partials/t_script_js.php") ?>
    <title>Riwayat Peminjaman</title>
</head>

<body>
    <?php include("../../partials/sidebar_admin.php") ?>
    <div class="table">
        <h4>Laporan Peminjaman</h4>

        <button>
            <a href="http://localhost/perpus/admin/laporan_perpus/index.php">Laporan Peminjaman</a>
        </button>
        <button>
            <a href="http://localhost/perpus/admin/laporan_perpus/pengembalian.php">Laporan Pengembalian</a>
        </button>
        <button>
            <a href="http://localhost/perpus/admin/laporan_perpus/anggota.php">Nama Anggota</a>
        </button>

        <table id="jquery-tab" class='display dataTable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku Saat Dipinjam</th>
                    <th>Kondisi Buku Saat Dikembalikan</th>
                    <th>Denda</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data_peminjaman as $key => $p) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $p["nama"] ?></td>
                        <td><?= $p["judul"] ?></td>
                        <td><?= $p["tanggal_peminjaman"] ?></td>
                        <td>
                            <?php if (empty($p["tanggal_pengembalian"])) {
                                echo "<strong>Buku belum dikembalikan</strong>";
                            } ?>
                            <?= $p["tanggal_pengembalian"]; ?>
                        </td>
                        <td><?= $p["kondisi_buku_saat_dipinjam"] ?></td>
                        <td>
                            <?php if (empty($p["kondisi_buku_saat_dikembalikan"])) {
                                echo "<strong>Buku belum dikembalikan</strong>";
                            } else {
                                echo $p["kondisi_buku_saat_dikembalikan"];
                            } ?>
                        </td>
                        <td><?= $p["denda"] ?></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>

    <?php include("../../partials/b_script_js.php") ?>
</body>

</html>