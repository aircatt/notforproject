<?php
include_once("../class/Pesan.php");
include_once("../class/User.php");
session_start();

$pesan = new Pesan;
$data_pesan = $pesan->all();

$user = new User;
$data_user = $user->find($_SESSION["id"]);
$data_anggota = $user->getAnggota();

if (isset($_POST["submit"])) {
    $data = [
        "id_penerima" => $_POST["id_penerima"],
        "id_pengirim" => $_POST["id_pengirim"],
        "judul" => $_POST["judul"],
        "isi" => $_POST["isi"],
    ];

    $pesan->create($data);
    header("location: pesan.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
</head>

<body>
    <?php include("../partials/sidebar_admin.php") ?>

    <div class="form">
        <form action="" method="post">
            <div>
                <label>Penerima</label>
                <select name="id_penerima">
                    <?php foreach ($data_anggota as $u) : ?>
                        <option value="<?= $u["id"] ?>"><?= $u["fullname"]; ?> | <?= $u["role"]; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div>
                <label>Pengirim</label>
                <input type="hidden" name="id_pengirim" value="<?= $a["id"] ?>">
                <input type="text" disabled value="<?= $data_user["fullname"] ?>">
            </div>

            <div>
                <label>Judul Pesan</label>
                <input type="text" name="judul">
            </div>

            <div>
                <label>Isi Pesan</label>
                <textarea type="text" name="isi"> </textarea>
            </div>

            <button type="submit" name="submit">Kirim Pesan</button>
        </form>
    </div>


    <div class="table">
        <h4>Data Pesan</h4>
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penerima</th>
                    <th>Judul Pesan</th>
                    <th>Isi Pesan</th>
                    <th>Status</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data_pesan as $key => $p) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $p["fullname"] ?></td>
                        <td><?= $p["judul"] ?></td>
                        <td><?= $p["isi"] ?></td>
                        <td><?= $p["status"] ?></td>
                        <td><?= $p["tanggal_kirim"] ?></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</body>

</html>