<?php
include_once("../class/Peminjaman.php");
include_once("../class/Buku.php");
include_once("../class/User.php");
include_once("../class/Stock.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$buku = new Buku;
$data_buku = $buku->find($_GET["id_buku"]);

$stock = new Stock;

$pengembalian = new Peminjaman;

if (isset($_POST["submit"])) {
    $data = [
        "id_buku" => $_POST["id_buku"],
        "tanggal_pengembalian" => $_POST["tanggal_pengembalian"],
        "kondisi_buku_saat_dikembalikan" => $_POST["kondisi_buku_saat_dikembalikan"],
    ];

    if ($_POST["kondisi_buku_saat_dikembalikan"] == "baik") {
        $reduce = $stock->addGood($id, $data);
    } elseif ($_POST["kondisi_buku_saat_dikembalikan"] == "rusak") {
        $reduce = $stock->addBad($id, $data);
        $denda = $pengembalian->denda();
    }

    $pengembalian->kembalikan($data);
    header("location: pengembalian.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian</title>
</head>

<body>
    <div class="form">
        <form action="" method="post">
            <input type="hidden" name="id_user" value="<?= $data_user["id"] ?>">
            <div>
                <label>Nama Anggota</label>
                <input type="text" disabled value="<?= $data_user["fullname"] ?>">
            </div>

            <div>
                <label>Judul Buku</label>
                <input type="text" disabled name="judul" value="<?= $data_buku["judul"] ?>">
            </div>

            <div>
                <label>Tanggal Pengembalian</label>
                <input required type="datetime" disabled name="tanggal_pengembalian" value="<?= date("Y-m-d H:i:s") ?>">
            </div>

            <div>
                <label>Kondisi Buku</label>
                <select required name="kondisi_buku_saat_dikembalikan">
                    <option disabled selected>Pilih Opsi</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>

            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>