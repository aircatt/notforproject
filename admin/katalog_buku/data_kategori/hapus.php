<?php
include_once("../../../class/Kategori.php");

$id = $_GET["id"];

$kategori = new Kategori;
$kategori->delete($id);

header("location: index.php");
?>