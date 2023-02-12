<?php
session_start();
include_once("../class/User.php");
include_once("../class/Pemberitahuan.php");

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->notifAktif();

if (isset($_POST["submit"])) {
    $data = [
        "isi" => $_POST["isi"],
        "status" => $_POST["status"],
    ];
    $pemberitahuan->create($data);

    header("location: pemberitahuan.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../partials/t_script_js.php") ?>
    <title>Form Pemberitahuan</title>
</head>

<body>
    <?php include("../partials/sidebar_admin.php") ?>

    <div class="form">
        <form action="" method="post">
            <div>
                <label>Isi Pemberitahuan</label> <br>
                <textarea name="isi" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label>Status Pemberitahuan</label>
                <select name="status">
                    <option selected disabled>Pilih Opsi</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <br>

    <div class="table">
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Isi Pemberitahuan</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data_pemberitahuan as $key => $p) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $p["isi"] ?></td>
                        <td><?= $p["status"] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php include("../partials/b_script_js.php") ?>
</body>

</html>