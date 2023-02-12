<?php
include_once("../../../class/Kategori.php");

$id = $_GET["id"];

$kategori = new Kategori;
$data_kategori = $kategori->find($id);

if(isset($_POST["submit"])){
    $data = [
        "kode" => $_POST["kode"],
        "nama" => $_POST["nama"],
    ];

    $kategori->update($id, $data);

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
            <input type="hidden" disabled value="<?= $data_kategori["id"] ?>">

            <div>
                <label>Kode</label>
                <input type="text" name="kode" value="<?= $data_kategori["kode"] ?>">
            </div>

            <div>
                <label>Nama kategori</label>
                <input type="text" name="nama" value="<?= $data_kategori["nama"] ?>">
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>