<?php
include_once("../../../class/User.php");

if (isset($_POST["submit"])) {
    $data = [
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "role" => $_POST["role"],
        "join_date" => $_POST["join_date"],
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "verif" => $_POST["verif"],
        "foto" => $_POST["foto"],
    ];

    $user = new User;
    $user->create($data);

    header(("location: index.php"));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Tambah Anggota</title>
</head>

<body>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="foto" value="">
                <img src="" alt="">
            </div>

            <div>
                <label>Kode</label>
                <input type="text" name="kode">
            </div>

            <div>
                <label>NIS</label>
                <input type="text" name="nis">
            </div>

            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="fullname">
            </div>

            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div>
                <label>Kelas</label>
                <input type="text" name="kelas">
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10"></textarea>
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