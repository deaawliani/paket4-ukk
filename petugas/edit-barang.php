<?php

include_once("../koneksi/koneksi.php");
 
if(isset($_POST['update'])) {   
    $id = $_GET['produkID'];
    $name = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $Foto = $_POST['Foto'];

    $result = mysqli_query($koneksi, "UPDATE kasir_produk SET nama_produk='$name', harga='$harga', stok='$stok', Foto='$Foto' WHERE produkID=$id");
    
    header("Location: index.php?page=stok");
    echo "<script>alert('berhasil')</script>";
}

$id = $_GET['produkID'];

$result1 = mysqli_query($koneksi, "SELECT * FROM kasir_produk WHERE produkID=$id");
 
while($barang_data = mysqli_fetch_array($result1))
{
    $nama_produk = $barang_data['nama_produk'];
    $harga = $barang_data['harga'];
    $stok = $barang_data['stok'];
    $Foto = $barang_data['Foto'];
    
    
}
?>

<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Update barang</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="name" value="<?php echo $nama_produk; ?>" placeholder="Enter Name" name="nama_produk">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="harga" class="form-label">harga:</label>
                            <input type="text" class="form-control" id="harga" value="<?php echo $harga; ?>" placeholder="harga" name="harga">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="stok" class="form-label">stok:</label>
                            <input type="text" class="form-control" id="stok" value="<?php echo $stok; ?>" placeholder="stok" name="stok">
                        </div>
                        <div class="mb-3">
                            <label for="Foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                            <input type="file" class="form-control" id="Foto" value="<?php echo $foto;?>" name="Foto"
                            <p style="color: red;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
