<?php
include_once("../../../class/Penerbit.php");

$id = $_GET["id"];

$penerbit = new Penerbit;
$penerbit->delete($id);

header("location: index.php");
?>