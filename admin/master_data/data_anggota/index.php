<?php
session_start();
include_once("../../../class/User.php");

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$data_anggota = $user->getAnggota();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <?php include("../../../partials/t_script_js.php") ?>
    <title>Data Anggota</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">

        <?php include("../../../partials/sidebar_admin.php"); ?>

        <!-- page-content -->
        <main class="page-content">
            <div class="container-fluid">

                <div class="tambah">
                    <a href="tambah.php">Tambah Anggota</a>
                </div>

                <div class="table">
                    <table class="table  table-striped" id="jquery-tab">
                        <thead>
                            <tr class="table-dark">
                                <th>No</th>
                                <!-- <th>Foto</th> -->
                                <th>Kode Anggota</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Kelas</th>
                                <th>Nama Alamat</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data_anggota as $key => $b) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <!-- <td>
                                        <img width="200" src="<?= $b["foto"] ?>" alt="">
                                    </td> -->
                                    <td><?= $b["kode"] ?></td>
                                    <td><?= $b["nis"] ?></td>
                                    <td><?= $b["fullname"] ?></td>
                                    <td><?= $b["kelas"] ?></td>
                                    <td><?= $b["alamat"] ?></td>
                                    <td class="text-capitalize"><?= $b["verif"] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $b["id"] ?>">Edit</a> |
                                        <a href="hapus.php?id=<?= $b["id"] ?>">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
    <?php include("../../../partials/b_script_js.php") ?>
</body>

</html>