<?php
require_once('koneksi.php');
if (isset($_POST['register'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $query = "INSERT INTO masyarakat VALUES ('$nik','$nama','$username','$password','$telp')";
    mysqli_query($conn, $query);
    header("Location:login.php");
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    if ($level == "Masyarakat") {
        // Login sebagai Masyarakat
        $query = "SELECT * FROM masyarakat where username='$username'";
        $hasil = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($hasil);
        // tidak ada user ditemukan
        if ($data == null) {
            echo "<script> alert('tidak ada user') </script>";
            echo "<script> window.location.href = 'login.php' </script>";
        } else if ($password != $data['password']) {
            // jika pass salah
            echo "<script> alert('
                password salah') </script>";
            echo "<script> window.location.href = 'login.php' </script>";
        } else {
            // jika benar
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['telp'] = $data['telp'];
            $_SESSION['level'] = 'Masyarakat';

            // location href
            echo "<script> alert('login berhasil') </script>";
            echo "<script> window.location.href = 'index.php' </script>";
        }
    } else {
        // Login sebagai Admin
        $query = "SELECT * FROM petugas where username= '$username' ";
        $hasil = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($hasil);
        // jika password benar
        if ($data == null) {
            echo "<script> alert('tidak ada user') </script>";
            echo "<script> window.location.href = 'login.php' </script>";
        } else if ($password != $data['password']) {
            // jika pass salah
            echo "<script> alert('password salah') </script>";
            echo "<script> window.location.href = 'login.php' </script>";
        } else {
            // jika benar
            session_start();
            $_SESSION['id_petugas'] = $data['id_petugas'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama_petugas'] = $data['nama_petugas'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['telp'] = $data['telp'];
            $_SESSION['level'] = $data['level'];

            // location href
            echo "<script> alert('login berhasil') </script>";
            echo "<script> window.location.href = 'index.php' </script>";
        }
    }
}
