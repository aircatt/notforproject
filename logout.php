<?php
session_start();
include_once("class/Login.php");

$login = new Login;
$login->lastLog($_SESSION["id"]);

session_destroy();

header("location: index.php");
