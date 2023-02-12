<?php
include_once("../../../class/Penerbit.php");
include_once("../../../class/User.php");

$user = new User;
$data_user = $user->find(1);

$penerbit = new Penerbit;
$data_penerbit = $penerbit->all()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../../../partials/t_script_js.php") ?>
    <title>Data Penerbit</title>
</head>

<body>
    <?php include("../../..//partials/sidebar_admin.php") ?>

    <div class="tambah">
        <a href="tambah.php">Tambah Anggota</a>
    </div>
    <div class="table">
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Penerbit</th>
                    <th>Nama Penerbit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data_penerbit as $key => $b) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $b["kode"] ?></td>
                        <td><?= $b["nama"] ?></td>
                        <td><?= $b["verif"] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $b["id"] ?>">Edit</a> |
                            <a href="hapus.php?id=<?= $b["id"] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php include_once("../../../partials/b_script_js.php") ?>
</body>

</html>