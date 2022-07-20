<?php
session_start();
$_SESSION['current_page'] = "Stok Bahan";
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
                    <h1 class="h2">Data Stok Bahan</h1>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="stok-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Stok Bahan</button></a>
                        </div>
                        <?php formCari(); ?>
                    </div>
                </div>

                <?php
                // tombol cari ditekan
                if (isset($_POST["tblCari"])) {
                    $keyword = $_POST["cariData"];
                    $dataStokBahan = cariData("SELECT * FROM stok_bahan WHERE id_stok LIKE '%$keyword%' OR nama_bahan LIKE '%$keyword%' OR qty LIKE '%$keyword%' OR satuan LIKE '%$keyword%'");
                    if ($dataStokBahan == false) {
                        echo "<div class='alert alert-danger' role='alert'>Data yang dicari tidak ditemukan</div>";
                        $dataStokBahan = getListStok();
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Data ditemukan</div>";
                    }
                } else {
                    $dataStokBahan = getListStok();
                }
                ?>


                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Stok</th>
                                <th scope="col">Nama Bahan</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Satuan</th>
                                <th colspan="2" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataStokBahan as $stok) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td class="text-center"><?php echo $stok["id_stok"]; ?></td>
                                    <td><?php echo $stok["nama_bahan"]; ?></td>
                                    <td class="text-center"><?php echo $stok["qty"]; ?></td>
                                    <td class="text-center"><?php echo $stok["satuan"]; ?></td>
                                    <td class="text-center">
                                        <a href="stok-form-edit.php?id_stok=<?php echo $stok["id_stok"] 
                                                                        ?>" class="badge bg-info"><span data-feather="edit"></span></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="mhs-konfirmasi-hapus.php?nim=<?php // echo $mahasiswa["nim"] 
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