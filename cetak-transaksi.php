<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Kasir</title>
  <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
</body>
</html>
        <div class="p-4 main-content">
          
          <div class="card col-6">
            <div class="card-body">
              <p style="text-align: center">Struk Pembelian</p>
            ============================
        <?php
            include("koneksi/koneksi.php");

            $sql = $koneksi->query("SELECT * FROM kasir_penjualan ORDER BY penjualanID DESC LIMIT 1");
            while ($data= $sql->fetch_assoc()) {
        ?>
               <p>ID Transaksi: <?php echo $data['penjualanID']?></p>
                <p>Tanggal Transaksi: <?php echo $data['TanggalPenjualan']?></p>
                
                <?php
                    $sql2 = $koneksi->query("SELECT * FROM kasir_pelanggan WHERE pelangganID = '".$data['penjualanID']."'");
                    while ($data2= $sql2->fetch_assoc()) { ?>
                      <p>Nama Pemesan: <?php echo $data2['NamaPelanggan'];?></p>
                      <P>No Meja: <?php echo $data2['NoMeja'];?></p>
                    <?php } ?>
                    <tr>
                      ============================
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th class="col-1">Jumlah</th>
                                <th class="col-1">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          // Fetch details for the current Penjualan
                          $sql3 = $koneksi->query("SELECT * FROM kasir_detailpenjualan WHERE DetailID = '" . $data['penjualanID'] . "'");
                            
                          $total_harga = 0;

                          while ($data3= $sql3->fetch_assoc()) {
                        ?>
                            <tr>
                              <td>
                              <?php
                                $sql4 = $koneksi->query("SELECT * FROM kasir_produk WHERE produkID = '" . $data3['produkID'] . "' ");
                                while ($data4= $sql4->fetch_assoc()) {
                                    echo $data4['nama_produk'];
                                }
                              ?>
                              </td>
                              <td><?php echo $data3['JumlahProduk']?> Pcs</td>
                              <td>RP.<?php echo number_format($data3['subtotal']) ?></td>
                             
                            </tr>

                            <?php
                              $total_produk = $data3['JumlahProduk'] * $data3['subtotal'];
                              $total_harga += $total_produk;
                            }
                            ?>

                            <tr>
                            <td colspan='2'><strong>Total Harga:</strong></td>
                            <td colspan='2'><strong>RP.<?php echo number_format("$total_harga") ?></strong></td>
                            </tr>
                            

                        </tbody>
                    </table>
                    <?php } ?>
            ============================
            <p style="text-align: center"><?php  echo date('d-m-Y H:i:s'); ?></p>
            ============================
            <p style="text-align: center">Kritik & Saran Whatsapp: 085693204615</p>
            </div>
          </div>
        </div>
        <script>
        window.print()
      </script>
