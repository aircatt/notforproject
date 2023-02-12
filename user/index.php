<?php
include_once("../class/User.php");
include_once("../class/Buku.php");

session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);
    if ($data_user["verif"] == "unverified") {
        echo '<script> alert("Akun kamu belum diverifikasi, tunggu Admin memverifikasikan akunmu") </script>';
        header("location: http://localhost/perpus/index.php");
    }

    if ($data_user['role'] == 'admin') {
        header("Location: http://localhost/perpus/admin/index.php");
    }
}
// var_dump($data_user);
// return exit;

$buku = new Buku;
$data_buku = $buku->all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include("../partials/t_script_js.php") ?>
    <title>Dashboard User</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">

        <?php include("../partials/sidebar_user.php") ?>

        <!-- page-content -->
        <main class="page-content">
            <div class="container-fluid">
                <h2>Selamat Datang di E-Perputakaan SMKN 64</h2>
                <hr>

                <!-- Pemberitahuan  -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Pemberitahuan !</h4>
                            <p></p>

                        </div>

                    </div>
                </div>

                <!-- Buku  -->
                <h5>Koleksi Buku</h5>
                <hr>
                <div class="row">
                    <?php foreach ($data_buku as $b) : ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="card rounded-0 p-0 shadow-sm mb-4">
                                <img src="" class="card-img-top rounded-0" alt="Foto Buku">
                                <div class="card-body text-center">
                                    <h6 class="card-title"><?= $b["judul"] ?> by <?= $b["pengarang"] ?></h6>
                                    <h6 class="card-title"><?= $b["penerbit"] ?></h6>
                                    <a href="form_peminjaman.php?id_buku=<?= $b["id"] ?>" class="btn btn-success btn-sm">Pinjam Buku</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <hr>

                <footer class="text-center">
                    <div class="mb-2">
                        <small>
                            © 1998 made with <i class="fa fa-heart" style="color:red"></i>
                        </small>
                    </div>

                </footer>
            </div>
        </main>
    </div>


    <?php include("../partials/b_script_js.php") ?>
</body>

</html>