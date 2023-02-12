<?php
include_once("class/User.php");
include_once("class/Login.php");

session_start();

$user = new User;

if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);
    if ($data_user['role'] == 'admin') {
        header("Location: admin/index.php");
    } elseif ($data_user['role'] == 'user') {
        header("Location: user/index.php");
    }
}

$login = new Login;
if (isset($_POST['submit'])) {
    $login->authLogin(
        [
            "username" => $_POST['username'],
            "password" => $_POST['password'],
        ]
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="form-login">
        <form action="" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <button type="submit" name="submit">Login</button>
        </form>
    </div>

    <div>
        <a href="register.php">Register sini.</a>
    </div>
</body>

</html>