<?php
include_once("../class/Pemberitahuan.php");
include_once("../class/User.php");
include_once("../class/Pesan.php");

session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->notifAktif();

if (isset($_POST["read_all"])) {
    $pemberitahuan->bacaNotifAll();
    header("location: notif.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
</head>

<body>
    <?php include("../partials/sidebar_admin.php") ?>

    <div class="read-all">
        <form method="post">
            <button type="submit" name="read_all">Baca Semua</button>
        </form>
    </div>
    <div class="table">
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($data_pemberitahuan as $key => $p) { ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $p["isi"] ?></td>
                    <td> <a href="baca_notif.php?id=<?= $p["id"] ?>">Baca</a></td>
                </tr>
            <?php } ?>
            <tr>

            </tr>
        </table>
    </div>
</body>

</html>