<?php
include_once("../../../class/User.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$data_admin = $user->getAdmin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <?php include("../../../partials/t_script_js.php") ?>
    <title>Data Administrator</title>
</head>

<body>
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="tambah">
        <a href="tambah.php">Tambah Anggota</a>
    </div>
    <div class="table">
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Terakhir Login</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data_admin as $key => $b) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><img width="200" src="<?= $b["foto"] ?>" alt=""></td>
                        <td><?= $b["fullname"] ?></td>
                        <td><?= $b["username"] ?></td>
                        <td class="password"><?= $b["password"] ?></td>
                        <td><?= $b["terakhir_login"] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $b["id"] ?>">Edit</a> |
                            <a href="hapus.php?id=<?= $b["id"] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include("../../../partials/b_script_js.php") ?>
</body>

</html>