<?php
session_start();
$_SESSION['current_page'] = "Detail Pengeluaran";
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
    <link href="../style/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row">
            <?php navbar() ?>;
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Penyimpanan Data Detail Pengeluaran</h1>
                </div>
                <?php
                if (isset($_POST["tblSimpan"])) {
                    if ($mysqli->connect_errno == 0) {
                        $id_pengeluaran = $mysqli->escape_string($_POST["inputIdPengeluaran"]);
                        $stok_bahan = $mysqli->escape_string($_POST["inputStokBahan"]);
                        $harga_satuan = $mysqli->escape_string($_POST["inputHargaSatuan"]);
                        $adaError = false;


                        $pesanSalah = '';

                        // //validasi nilai
                        // if (strlen($kd_nilai) > 4 || strlen($kd_nilai) < 4) {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan kode nilai harus terdiri dari 4 karakter.                 
                        //         </div>";
                        //     $adaError = true;
                        // }

                        // $formaKdNilai = substr($kd_nilai, 0, 1);
                        // if ($formaKdNilai != 'N') {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan kode nilai harus diawali oleh huruf N.                 
                        //         </div>";
                        //     $adaError = true;
                        // }


                        // if (!preg_match("/^[0-9]*$/", $nilai)) {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan nilai tidak boleh mengandung huruf.                 
                        //         </div>";
                        //     $adaError = true;
                        // }

                        // if ($nim == 'Pilih NIM') {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan pilih NIM terlebih dahulu.                 
                        //         </div>";
                        //     $adaError = true;
                        // }

                        // if ($kd_matkul == 'Pilih Kode Mata Kuliah') {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan pilih kode mata kuliah terlebih dahulu.                 
                        //         </div>";
                        //     $adaError = true;
                        // }

                        // if ($index == 'Pilih Index Nilai') {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan pilih index terlebih dahulu.                 
                        //         </div>";
                        //     $adaError = true;
                        // }

                        // if ($keterangan == 'Pilih Keterangan') {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan pilih keterangan terlebih dahulu.                 
                        //         </div>";
                        //     $adaError = true;
                        // }


                        // if ($adaError == false) {
                        $sql = "INSERT INTO detail_pengeluaran VALUES ('$id_pengeluaran', '$stok_bahan', '$harga_satuan')";
                        $res = $mysqli->query($sql);
                        var_dump($res);

                        if ($res) {
                            if ($mysqli->affected_rows > 0) {
                                echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='Menu.php'>
                                            <button type='button' class='btn btn-success'>View Nilai</button>
                                    </a>";
                            }
                        } else {
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, ID Menu sudah ada udah ada.                 
                                </div>
                                <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Kembali</button></a>
                                ";
                        }
                        // } else {
                ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $pesanSalah; ?>
                                </div>
                                <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Kembali</button></a>
                            </div>
                        </div>
                <?php
                        // }
                    }
                } else {
                    echo "Gagal koneksi"  . $mysqli->connect_error   . "<br>";
                }
                ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>

</html>