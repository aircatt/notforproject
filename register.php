<?php
include_once("class/User.php");

if (isset($_POST["submit"])) {
    $data = [
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
    ];

    $user = new User;
    $submit = $user->createRegis($data);

    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>

<body>
    <div class="form">
        <form action="" method="post">
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
                <input type="text" name="password">
            </div>

            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>

</html>