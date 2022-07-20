<?php require_once('../functions/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.uikit.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.uikit.min.css">
        <script src="https://kit.fontawesome.com/81efd83dc2.js" crossorigin="anonymous"></script>
</head>
<body>
<table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Stok</th>
                                <th scope="col">Nama Bahan</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataStokBahan = getListStok();
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
                                        <a href="mhs-konfirmasi-hapus.php?nim=<?php // echo $mahasiswa["nim"] 
                                                                                ?>" class="badge bg-danger"><span data-feather="trash"></span></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>