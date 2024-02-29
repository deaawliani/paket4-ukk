<?php
include_once("koneksi/koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM kasir_detailpenjualan WHERE penjualanID=$id");
echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = 'daftar-transaksi.php';
    </script>";
?>

