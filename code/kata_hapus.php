<?php
include 'koneksi.php';
mysqli_query($conn, "DELETE FROM kata WHERE id_kata=$_GET[id]");
header("Location: index.php");
?>
