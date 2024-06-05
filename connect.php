<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "form";

$koneksi = mysqli_connect($server, $user, $pass, $db) or die(mysqli_error($koneksi));
