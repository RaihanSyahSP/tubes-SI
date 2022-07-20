<?php
session_start();
$_SESSION['current_page'] = "Pegawai";
?>
<?php require_once('../functions/functions.php'); ?>
<?php
// checkLogin();
?>

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
                    <h1 class="h2">Data Pegawai</h1>
                </div>

                <!-- <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="pegawai-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Pegawai</button></a>
                        </div>
                    </div>
                </div> -->
                <a href="pegawai-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Pegawai</button></a>

                <div class="table-responsive">
                    <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" class="dt-center">No</th>
                                <th scope="col" class="dt-center">ID Pegawai</th>
                                <th scope="col" class="dt-center">Nama Pegawai</th>
                                <th scope="col" class="dt-center">Alamat</th>
                                <th scope="col" class="dt-center">No HP</th>
                                <th scope="col" class="dt-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataPegawai = getListPegawai();
                            $no = 1;
                            foreach ($dataPegawai as $pegawai) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?>.</td>
                                    <td class="text-center"><?php echo $pegawai["id_pegawai"]; ?></td>
                                    <td><?php echo $pegawai["nama_pegawai"]; ?></td>
                                    <td><?php echo $pegawai["alamat"]; ?></td>
                                    <td class="text-center"><?php echo $pegawai["no_hp"]; ?></td>
                                    <td class="text-center">
                                        <a href="pegawai-form-edit.php?id_pegawai=<?php echo $pegawai["id_pegawai"] ?>" class="badge bg-info"><i class="fas fa-pen"></i></a>
                                        <a href="pegawai-konfirmasi-hapus.php?id_pegawai=<?php echo $pegawai["id_pegawai"] ?>" class="badge bg-danger"><i class="fas fa-trash-can"></i></a>
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


    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 1000);
            $('#example').DataTable();
        });
    </script>
</body>

</html>