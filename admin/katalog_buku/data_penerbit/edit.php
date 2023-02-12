<?php
include_once("../../../class/Penerbit.php");

$id = $_GET["id"];

$penerbit = new Penerbit;
$data_penerbit = $penerbit->find($id);

if (isset($_POST["submit"])) {
    $data = [
        "kode" => $_POST["kode"],
        "nama" => $_POST["nama"],
        "verif" => $_POST["verif"],
    ];

    $penerbit->update($id, $data);

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
            <input type="hidden" disabled value="<?= $data_penerbit["id"] ?>">

            <div>
                <label>Kode</label>
                <input type="text" name="kode" value="<?= $data_penerbit["kode"] ?>">
            </div>

            <div>
                <label>Nama Penerbit</label>
                <input type="text" name="nama" value="<?= $data_penerbit["nama"] ?>">
            </div>

            <div>
                <label>Status</label>
                <input type="text" name="verif" value="<?= $data_penerbit["verif"] ?>">
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>