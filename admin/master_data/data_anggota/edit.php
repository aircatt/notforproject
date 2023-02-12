<?php
include_once("../../../class/User.php");

$id = $_GET["id"];

$user = new User;
$data_user = $user->find($id);

if (isset($_POST["submit"])) {
    $data = [
        "id" => $_POST["id"],
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "verif" => $_POST["verif"],
        "foto" => $_FILES["foto"],
    ];

    $user->updateFromAdmin($id, $data);

    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Edit Anggota</title>
</head>

<body>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" disabled value="<?= $data_user["id"] ?>">

            <div>
                <img width="200" src="<?= $data_user["foto"] ?>" alt="">
                <input type="file" name="foto" value="">
            </div>

            <div>
                <label>Kode</label>
                <input type="text" name="kode" value="<?= $data_user["kode"] ?>">
            </div>

            <div>
                <label>NIS</label>
                <input type="text" name="nis" value="<?= $data_user["nis"] ?>">
            </div>

            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="fullname" value="<?= $data_user["fullname"] ?>">
            </div>

            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?= $data_user["username"] ?>">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?= $data_user["password"] ?>" placeholder="Password belum diubah">
            </div>

            <div>
                <label>Kelas</label>
                <input type="text" name="kelas" value="<?= $data_user["kelas"] ?>">
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10"><?= $data_user["alamat"] ?></textarea>
            </div>

            <div>
                <label>Verifikasi</label>
                <select name="verif">
                    <option value="unverified">Unverified</option>
                    <option value="verified">Verified</option>
                </select>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>