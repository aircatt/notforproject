<?php
include_once("../../../class/User.php");

if(isset($_POST["submit"])){
    $data = [
        "kode" => $_POST["kode"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "role" => $_POST["role"],
        "join_date" => $_POST["join_date"],
    ];

    $user = new User;
    $user->createAdmin($data);

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
        <form action="" method="post">
            <div>
                <label>Kode</label>
                <input type="text" name="kode">
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
                <label>Foto</label>
                <input type="file" name="foto" value="">
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>