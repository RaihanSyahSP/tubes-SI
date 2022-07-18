<?php
include_once("../db/dbConfig.php");


function getListMenu()
{
    global $mysqli;
    if ($mysqli->connect_errno == 0) {
        $res = $mysqli->query("SELECT * FROM menu ORDER BY id_menu");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListPegawai()
{
    global $mysqli;
    if ($mysqli->connect_errno == 0) {
        $res = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListStok()
{
    global $mysqli;
    if ($mysqli->connect_errno == 0) {
        $res = $mysqli->query("SELECT * FROM stok_bahan ORDER BY id_stok");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListPenjualan()
{
    global $mysqli;
    if ($mysqli->connect_errno == 0) {
        $res = $mysqli->query("SELECT penjualan.id_penjualan, penjualan.tanggal, penjualan.total_harga, pegawai.nama_pegawai 
                                FROM penjualan
                                JOIN ON penjualan.id_pegawai = pegawai.id_pegawai
                                ORDER BY id_penjualan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListPengeluaran()
{
    global $mysqli;
    if ($mysqli->connect_errno == 0) {
        $res = $mysqli->query("SELECT p.id_pengeluaran,p.tanggal,p.total_harga,g.nama_pegawai FROM pengeluaran p join pegawai g on p.id_pegawai=g.id_pegawai ORDER BY p.id_pengeluaran");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function getListDetailPenjualan()
{
    global $mysqli;
    if ($mysqli->connect_errno == 0) {
        $res = $mysqli->query("SELECT  
        FROM penjualan 
        ORDER BY id_penjualan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}




function navbar()
{
?>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../pages/Statistik.php">
                        <span class="align-text-bottom"></span>
                        Statistik
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/Penjualan.php">
                        <span class="align-text-bottom"></span>
                        Penjualan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/Pengeluaran.php">
                        <span class="align-text-bottom"></span>
                        Pengeluaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../pages/Pegawai.php">
                        <span class="align-text-bottom"></span>
                        Pegawai
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/StokBahan.php">
                        <span class="align-text-bottom"></span>
                        Stok Bahan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/DetailPengeluaran.php">
                        <span class="align-text-bottom"></span>
                        Detail Pengeluaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../pages/DetailPenjualan.php">
                        <span class="align-text-bottom"></span>
                        Detail Penjualan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/Menu.php">
                        <span class="align-text-bottom"></span>
                        Menu
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<?php
}

function headers()
{
?>
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="../pages/index-admin.php">Sistem Penjualan Bang Ajip</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form action="../logout.php" method="POST">
                    <button type="submit" class="nav-link px-3 bg-dark border-0 fw-bold">
                        Logout
                        <i data-feather="log-out">
                        </i>
                    </button>
                </form>
            </div>
        </div>
    </header>
<?php
}

function formCari()
{
?>
    <div class="col">
        <div class="d-flex justify-content-end">
            <form action="" method="POST" class="">
                <!-- <input type="text" name="cariData" placeholder="Cari data....">
                <button class="btn btn-primary mx-2 px-3 py-1" name="tblCari">Cari</button> -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="cariData" placeholder="Cari data...">
                    <button class="btn btn-outline-secondary" name="tblCari" id="button-addon1">Cari</button>
                </div>
            </form>

        </div>
    </div>
<?php
}
