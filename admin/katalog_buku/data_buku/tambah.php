<?php
include_once("../../../class/Buku.php");
include_once("../../../class/Penerbit.php");
include_once("../../../class/Kategori.php");

$penerbit = new Penerbit;
$data_penerbit = $penerbit->all();

$kategori = new Kategori;
$data_kategori = $kategori->all();

$buku = new Buku;
$data_buku = $buku->all();

if (isset($_POST["submit"])) {
    $data = [
        "judul" => $_POST["judul"],
        "pengarang" => $_POST["pengarang"],
        "id_penerbit" => $_POST["id_penerbit"],
        "id_kategori" => $_POST["id_kategori"],
        "isbn" => $_POST["isbn"],
        "tahun_terbit" => $_POST["tahun_terbit"],
        "j_buku_baik" => $_POST["j_buku_baik"],
        "j_buku_rusak" => $_POST["j_buku_rusak"],
        "foto" => $_FILES["foto"],
    ];

    $buku->create($data);

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
                <img src="<?= $ ?>">
            </div>
            <div>
                <label>Judul Buku</label>
                <input type="text" name="judul">
            </div>

            <div>
                <label>Pengarang</label>
                <input type="text" name="pengarang">
            </div>

            <div>
                <label>Penerbit</label>
                <select name="id_penerbit">
                    <?php foreach ($data_penerbit as $p) { ?>
                        <option value="<?= $p["id"] ?>"><?= $p["nama"] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <label>Kategori</label>
                <select name="id_kategori">
                    <?php foreach ($data_kategori as $p) { ?>
                        <option value="<?= $p["id"] ?>"><?= $p["nama"] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <label>ISBN</label>
                <input type="text" name="isbn">
            </div>

            <div>
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit">
            </div>

            <div>
                <label>Buku Baik</label>
                <input type="number" name="j_buku_baik">
            </div>

            <div>
                <label>Buku Rusak</label>
                <input type="number" name="j_buku_rusak">
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>