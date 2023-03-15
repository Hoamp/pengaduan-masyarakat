<?php
session_start();
require_once('./koneksi.php');
if (isset($_POST['simpan_pengaduan'])) {
    $namaFile = date('YmdHis') . '.jpg';
    $namaLama = $_FILES['foto']['tmp_name'];

    $folder = 'foto/';
    move_uploaded_file($namaLama, $folder . $namaFile);

    $tanggal = date('Y-m-d');
    $nik = $_SESSION['nik'];
    $isi_laporan = $_POST['isi_laporan'];

    $query = "INSERT INTO pengaduan VALUES(
        '',
        '$tanggal',
        '$nik',
        '$isi_laporan',
        '$namaFile',
        '0'
        )";
    mysqli_query($conn, $query);


    echo "<script> alert('pengaduan berhasil dikirim') </script>";
    echo "<script> window.location.href = 'pengaduan_lihat.php' </script>";
}

if (isset($_GET['hapus'])) {
    $foto = $_GET['hapus'];
    unlink('foto/' . $foto);

    $query = "DELETE FROM pengaduan WHERE foto = '$foto'";
    mysqli_query($conn, $query);

    // 
    echo "<script> alert('pengaduan berhasil dihapus') </script>";
    echo "<script> window.location.href = 'pengaduan_lihat.php' </script>";
}
