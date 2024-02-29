<?php
include_once("../koneksi/koneksi.php");
$id=$_GET['UserID'];
$result = mysqli_query($koneksi, "DELETE FROM kasir_user WHERE UserID=$id");
header("Location:index.php?page=user");
?>