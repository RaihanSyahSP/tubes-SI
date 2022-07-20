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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Stok</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


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