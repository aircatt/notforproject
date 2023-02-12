<?php
include_once("../../../class/User.php");

$id = $_GET["id"];

$user = new User;
$user->delete($id);

header("location: index.php");
?>