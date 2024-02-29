<?php
if(isset($_POST['search'])){
    $search = $_POST ['search'];
    $sql = $koneksi->query("SELECT * FROM kasir_produk WHERE nama_produk LIKE '%$search%'");
} else {
    $sql = $koneksi->query("SELECT * FROM kasir_produk");
}
?>
<div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Barang</h4>
                    <p class="card-description">
                        <a href="?page=tambah-barang" title="Tambah Produk" 
                            class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                                <span class="text">Tambah Produk</span>
                        </a>
                    </p>
                    <form class="d-flex" action="?page=cari-menu" method="post">
            <input class="form-control me-2" type="search" placeholder="cari menu..." aria-label="Search" name="search">
            <button class="btn btn-outline-light" type="submit">Cari</button>
        </form>

                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>stok</th>
                                    <th>Terjual</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $nama = $_POST ['search'];
                              $no = 1;
                              $sql = $koneksi->query("SELECT * FROM kasir_produk WHERE nama_produk LIKE '%$nama%'");
                              while ($data= $sql->fetch_assoc()){
  
                                  
                                      
                              ?>
                          
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo "<img src='../foto/".$data['Foto']."' width='70' height='70'>"; ?></td>
                                <td><?php echo $data['nama_produk']?></td>
                                <td>IDR.<?php echo number_format ($data['harga']) ?></td>
                                <td><?php echo $data['stok']?></td>
                                <td><?php echo $data['Terjual']?></td>
                                <td><a type='button' href="?page=edit-barang&produkID=<?php echo $data['produkID']?>" 
                                       class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapusnya')"' href="?page=hapus-barang&produkID=<?php echo $data['produkID']?>" 
                                       class="btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
