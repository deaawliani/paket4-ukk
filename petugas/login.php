<?php
include "../koneksi/koneksi.php";

error_reporting(0);
session_start();
if(isset($_SESSION['Nama_user'])) {
    echo "<script>alert('Maaf, anda sudah login. Silahkan logout terlebih dahulu'); window.location.replace('index.php')</script>";
}

if (isset($_POST['submit'])) {
    $Nama_user = $_POST['Nama_user'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM kasir_user WHERE Nama_user='$Nama_user' AND Password='$Password'";
    $result = mysqli_query($koneksi, $sql);
    

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $level = $row['level'];
        $_SESSION['level'] = $level;
        $_SESSION['Nama_user'] = $row['Nama_user'];

        header("Location: index.php");

        echo "<script>alert(Berhasil Masuk!')</script>";
    } else {
        echo "<script>alert(Username atau password anda salah, silahkan coba lagi'),/script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3 mt-3"> 
                                <label for="" class="form-label">Nama</label>
                                <input type="text" name="Nama_user" class="form-control" placeholder="Nama_user">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="" class="form-label">password</label>
                                <input type="Password" name="Password" class="form-control" placeholder="Password">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Login</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
 </div>

    <script src="../bootstarp-5.3.2-dist/bootstrap.min.js"></script>
    <script src="../bootstrap-5.3.2-dist/jquery.min.js"></script>   

</body>
</html>    