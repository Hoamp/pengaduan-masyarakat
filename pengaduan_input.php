<?php
require_once('koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Suara Rakyat</title>
    <meta name="description" content="" />
    <!-- CSS -->
    <?php require_once('layout.php/_css.php') ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar  -->
            <?php require_once('layout.php/_sidebar.php') ?>
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require_once('layout.php/_navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-4">
                                    <form enctype="multipart/form-data" method="post" action="masyarakat_model.php">

                                        <h5 class="card-header">Form Pengaduan</h5>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Foto</label>
                                                <input class="form-control" type="file" id="formFile" name="foto">
                                            </div>
                                            <div class="form-floating">
                                                <textarea type="text" class="form-control" id="floatingInput" name="isi_laporan" placeholder="John Doe" aria-describedby="floatingInputHelp" style="height: 100px"></textarea>
                                                <label for="floatingInput">Isi laporan :</label>
                                                <div id="floatingInputHelp" class="form-text">
                                                    Laporan di adukan kepada admin website
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-primary mt-3" name="simpan_pengaduan">Kirim Pengaduan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Content -->
                <!-- Footer -->
                <?php require_once('layout.php/_footer.php') ?>
            </div>
        </div>
    </div>
    </div>
    <!-- / Layout wrapper -->
    <!-- JS -->
    <?php require_once('layout.php/_js.php') ?>
</body>

</html>