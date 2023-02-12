<?php
include_once("../../../class/Kategori.php");

if(isset($_POST["submit"])){
    $data = [
        "kode" => $_POST["kode"],
        "nama" => $_POST["nama"],
    ];

    $kategori = new Kategori;
    $kategori->create($data);

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
                <label>Nama Kategori</label>
                <input type="text" name="nama">
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>