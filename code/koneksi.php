<?php
$conn = mysqli_connect("localhost", "root", "", "db_kamus");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
