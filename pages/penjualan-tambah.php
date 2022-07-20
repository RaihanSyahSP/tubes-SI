<?php
session_start();
$_SESSION['current_page'] = "Penjualan";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
?>
<!-- ini ada check login -->

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
    <link href=" ../style/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row">
            <?php navbar() ?>;
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tambah Data Penjualan</h1>
                </div>
                <form method="POST" name="form-tambah-penjualan" action="penjualan-simpan.php">
                    <div class="row mb-3">
                        <label for="inputIdPenjualan" class="col-sm-2 col-form-label">ID Penjualan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdPenjualan" name="inputIdPenjualan" required>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputTanggal" name="inputTanggal" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTotalHarga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTotalHarga" name="inputTotalHarga" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputIdPegawai" class="col-sm-2 col-form-label">ID Pegawai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdPegawai" name="inputIdPegawai" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblSimpan">Simpan</button>
                    <a href="pegawai.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                </form>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>

</html>