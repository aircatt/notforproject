<?php 
include_once("../class/Pesan.php");
include_once("../class/User.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$id_pesan = $_GET["id"];

$pesan = new Pesan;
$data_pesan = $pesan->find($id_pesan);

$baca = $pesan->read($id_pesan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <title>Baca Pesan</title>
</head>
<body>
    <?php include("../partials/sidebar_user.php") ?>

    <div class="table">
        <h3>Pesan</h3>
        <a href="pesan.php">Kembali</a>

        <table border="1">
            <tr>
                <th>Judul Pesan</th>
                <td><?= $data_pesan["judul"]; ?></td>
            </tr>

            <tr>
                <th>Isi Pesan</th>
                <td><?= $data_pesan["isi"]; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>