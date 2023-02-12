<?php
include_once("../class/Pesan.php");
include_once("../class/User.php");
session_start();

$pesan = new Pesan;
$data_pesan = $pesan->findByUserId($_SESSION["id"]);

$user = new User;
$data_user = $user->find($_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include("../partials/t_script_js.php") ?>
    <title>Pesan</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">

        <?php include("../partials/sidebar_user.php") ?>

        <!-- page-content -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <h4>Pesan Masuk</h4>

                            <table class="table table-striped" id="jquery-tab">
                                <thead>
                                    <tr class="table-dark">
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($data_pesan as $key => $p) :
                                    ?>

                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $p["judul"] ?></td>
                                            <td><?= $p["status"] ?></td>
                                            <td>
                                                <a href="baca.php?id=<?= $p["id"] ?>">Lihat</a>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
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