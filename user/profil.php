<?php
include_once("../class/User.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

if (isset($_POST["submit"])) {
    $data = [
        "id" => $_POST["id"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "foto" => $_FILES["foto"],
    ];

    $user->update($_POST["id"], $data);

    header("location: profil.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include("../partials/t_script_js.php") ?>
    <title>Profil</title>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">

        <?php include("../partials/sidebar_user.php") ?>

        <!-- page-content -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="rounded bg-white mt-5 mb-5">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $data_user["id"] ?>">
                            <div class="col-md-3 border-right">
                                <div class="card mb-4">
                                    <div class="card-header">Foto Profil</div>
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center p-4">
                                            <img class="rounded-circle" width="150" height="150" src="<?= $data_user["foto"] ?>">
                                            <span class="fw-bold"><?= $data_user["fullname"] ?></span>
                                            <span class="text-black-50">@<?= $data_user["username"] ?></span>
                                            <button class="btn btn-success mt-2"><?= $data_user["verif"] ?></button>
                                        </div>
                                        <input type="file" name="foto">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 border-right">
                                <div class="card">
                                    <div class="card-header">Detail Profil</div>
                                    <div class="card-body">
                                        <div class="p-3">
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Kode Anggota</label>
                                                    <input type="text" class="form-control" name="fullname" value="<?= $data_user["kode"] ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">NIS</label>
                                                    <input type="text" class="form-control" name="nis" value="<?= $data_user["nis"] ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="fullname" value="<?= $data_user["fullname"] ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?= $data_user["username"] ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Password</label>
                                                    <input type="password" class="form-control" name="password" value="<?= $data_user["password"] ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Kelas</label>
                                                    <input type="text" class="form-control" name="kelas" value="<?= $data_user["kelas"] ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" value="<?= $data_user["alamat"] ?>">
                                                </div>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <button class="btn btn-dark profile-button" type="submit" name="submit">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </main>
    </div>

    <?php include("../partials/b_script_js.php") ?>
</body>

</html>