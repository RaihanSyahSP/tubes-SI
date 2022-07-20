<?php
session_start();
$_SESSION['current_page'] = "Detail Pengeluaran";
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
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row">
            <?php navbar() ?>;
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Data Detail Pengeluaran</h1>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="DetailPengeluaran-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Detail Pengeluaran</button></a>
                        </div>
                        <?php formCari(); ?>
                    </div>
                </div>

                <?php
                // // tombol cari ditekan
                if (isset($_POST["tblCari"])) {
                    $keyword = $_POST["cariData"];
                    $dataPengeluaran = cariData("
                                            SELECT * FROM pegawai 
                                            WHERE id_pegawai LIKE '%$keyword%' OR 
                                            nama_pegawai LIKE '%$keyword%' OR 
                                            alamat LIKE '%$keyword%' OR 
                                            no_hp LIKE '%$keyword%'
                                            "
                    );
                    if ($dataPengeluaran == false) {
                        echo "<div class='alert alert-danger' role='alert'>Data yang dicari tidak ditemukan</div>";
                        $dataPengeluaran = getListPengeluaran();
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Data ditemukan</div>";
                    }
                } else {
                    $dataPengeluaran = getListPengeluaran();
                }
                ?>


                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pengeluaran</th>
                                <th scope="col">Stok Bahan</th>
                                <th scope="col">Harga Satuan</th>
                                <th colspan="2" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataDetailPengeluaran as $dpengeluaran) {
                            ?>
                                <tr class="text-center">
                                    <td><?= $no++; ?>.</td>
                                    <td><?php echo $dpengeluaran["id_pengeluaran"];
                                        ?></td>
                                    <td class="text-start"><?php echo $dpengeluaran["nama_bahan"];
                                                            ?></td>
                                    <td>Rp <?php echo number_format($dpengeluaran["harga_satuan"], 0, ",", ".");
                                            ?></td>
                                    <td>
                                        <a href="mhs-form-edit.php?id_stok=<?php //echo $dpengeluaran["id_stok"];
                                                                            ?>" class="badge bg-info"><span data-feather="edit"></span></a>
                                    </td>
                                    <td>
                                        <a href="mhs-konfirmasi-hapus.php?id_stok=<?php //echo $dpengeluaran["id_pengeluaran"]
                                                                                    ?>" class="badge bg-danger"><span data-feather="trash"></span></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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