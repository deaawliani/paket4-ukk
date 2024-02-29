<?php
$server = "localhost";
$user ="root";
$pass = "";
$database = "kasirdea";

$koneksi = new mysqli ($server, $user, $pass, $database);

if (!$koneksi) {
    die("<script>alert('Tidak terhubung dengan databse.')</script>");
}
// else {
//     die("<script>alert('Berhasil Login.')</script>");
// }

?>
