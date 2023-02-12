<?php
include_once("../../../class/Buku.php");

$id = $_GET["id"];

$buku = new Buku;
$buku->delete($id);

header("location: index.php");
?>