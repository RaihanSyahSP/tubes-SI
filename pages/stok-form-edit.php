<?php
session_start();
$_SESSION['current_page'] = "Stok Bahan";
?>
<?php include_once("../functions/functions.php"); ?>
<?php
//checkLogin();
?>
<!-- ini ada check login -->

<!doctype html>
<html lang="en">

<?php include_once("../head.php"); ?>

<body>
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row">
            <?php navbar() ?>;
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Data Stok</h1>
                </div>
                <?php
                if (isset($_GET["id_stok"])) {
                    $id_stok = $mysqli->escape_string($_GET["id_stok"]);
                    // $data = getMahasiswa($nim);
                    if ($data = getDataStok($id_stok)) {
                ?>
                        <form method="POST" name="form-edit-stok" action="stok-edit.php">
                            <div class="row mb-3">
                                <label for="inputIdStoK" class="col-sm-2 col-form-label">ID stok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputIdStok" name="inputIdStok" value="<?php echo $data["id_stok"]; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaBahan" class="col-sm-2 col-form-label">Nama Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNamBahan" name="inputNamaBahan" value="<?php echo $data["nama_bahan"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputQty" class="col-sm-2 col-form-label">Qty</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputQty" name="inputQty" value="<?php echo $data["qty"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaBahan" class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSatuan" name="inputSatuan" value="<?php echo $data["satuan"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Edit</button>
                            <a href="menu.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data menu tidak ditemukan</div>";
                    }
                    ?>
                <?php
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Data tidak ditemukan</div>";
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