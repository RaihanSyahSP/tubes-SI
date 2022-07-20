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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Penjualan Bang Ajip</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="../style/style.css">

    <!-- Custom styles for this template -->
    <link href="../style/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php headers(); ?>
    <div class="container-fluid">
        <div class="row">
            <?php navbar(); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Statistik dan Detail Laporan</h1>
                </div>
                // div untuk statistik
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead class="align-middle">
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Pengeluaran</th>
                                        <!-- <th scope="col">ID Pengeluaran</th> -->
                                        <th scope="col">Bahan Stok</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga Bahan</th>
                                        <th scope="col">Total Bayar</th>
                                        <th scope="col">By Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php $statistikPengeluaran = getStatistikPengeluaran();
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 1000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>

</html>