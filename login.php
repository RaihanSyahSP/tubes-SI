<?php
require_once 'db/dbConfig.php';

// if ($mysqli->connect_errno == 0) {
//     if (isset($_POST['tblLogin'])) {
//         $idDosen = $mysqli->escape_string($_POST['idDosen']);
//         $password = $mysqli->escape_string($_POST['password']);
//         $sql = "SELECT * FROM t_dosen WHERE id_dosen = '$idDosen' AND password = '$password'";
//         $result = $mysqli->query($sql);

//         if ($result) {
//             if ($result->num_rows == 1) {
//                 $data = $result->fetch_assoc();
//                 session_start();
//                 $_SESSION['id_dosen'] = $data['id_dosen'];
//                 $_SESSION['nama_dosen'] = $data['nama_dosen'];
//                 header("Location: ./pages/index-admin.php");
//             } else {
//                 header("Location: index.php?error=1");  //data tidak ditemukan login
//             }
//         } else {
//             header("Location: index.php?error=2");
//         }
//     } else {
//         header("Location: index.php?error=4"); //harus login dulu
//     }
// } else {
//     header("Location: index.php?error=3"); //gagal koneksi
// }
