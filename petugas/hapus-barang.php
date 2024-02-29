<?php
include_once("../koneksi/koneksi.php");

$id = $_GET['produkID'];

$result = mysqli_query($koneksi, "DELETE FROM kasir_produk WHERE produkID=$id");

header("location:index.php?page=stok");
?>