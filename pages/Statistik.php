<?php
session_start();
$_SESSION['current_page'] = "Statistik";
?>
<?php require_once('../functions/functions.php'); ?>
<?php
// checkLogin();
?>

<!doctype html>
<html lang="en">

<?php include_once("../head.php"); ?>

<body>
    <?php headers(); ?>
    <div class="container-fluid">
        <div class="row">
            <?php navbar(); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Statistik dan Detail Laporan</h1>
                </div>
                <!-- div untuk statistik -->
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table id="example" class="nowrap uk-table uk-table-hover uk-table-striped" style="width:100%">
                                <thead class="align-middle">
                                    <tr class="text-center">
                                        <th scope="col"  class="dt-center">No</th>
                                        <th scope="col"  class="dt-center">Tanggal Pengeluaran</th>
                                        <!-- <th scope="col">ID Pengeluaran</th> -->
                                        <th scope="col"  class="dt-center">Bahan Stok</th>
                                        <th scope="col"  class="dt-center">Jumlah</th>
                                        <th scope="col"  class="dt-center">Harga Bahan</th>
                                        <th scope="col"  class="dt-center">Total Bayar</th>
                                        <th scope="col"  class="dt-center">By Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php
                                    $statistikPengeluaran = getStatistikPengeluaran();
                                    $no = 1;
                                    foreach ($statistikPengeluaran as $row) {
                                    ?>
                                        <tr class=" text-center">
                                            <td><?= $no++; ?>.</td>
                                            <td><?php echo formatTgl($row["tanggal"]); ?></td>
                                            <!-- <td><?php //echo $row["id_pengeluaran"];
                                                        ?></td> -->
                                            <td><?php echo $row["nama_bahan"]; ?></td>
                                            <td><?php echo $row["jumlah_stok"]; ?></td>
                                            <td>Rp <?php echo number_format($row["harga_satuan"], 0, ",", "."); ?></td>
                                            <td>Rp <?php echo number_format($row["total_harga"], 0, ",", "."); ?></td>
                                            <td><?php echo $row["nama_pegawai"]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" col">
                        kolom penjualan
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 1000);
            $('#example').DataTable({
                scrollX: true,
            });
        });
    </script>
</body>

</html>