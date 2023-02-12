<?php
include_once("../class/Pemberitahuan.php");

$id = $_GET["id"];

$pemberitahuan = new Pemberitahuan;

$baca_pesan = $pemberitahuan->bacaNotif($id);

header("Location: notif.php")
?>