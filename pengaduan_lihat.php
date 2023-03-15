<?php
require_once('koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}

$nik = $_SESSION['nik'];
$query = "SELECT * FROM pengaduan WHERE nik = '$nik' ORDER BY tgl_pengaduan DESC";
$i = 1;
$hasil = mysqli_query($conn, $query);


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
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-12">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="10%" class="text-center">No</th>
                                                            <th width="12%" class="text-center">Foto</th>
                                                            <th width="13%" class="text-center">Tanggal</th>
                                                            <th width="40%" class="text-center">Laporan</th>
                                                            <th width="15%" class="text-center">Status</th>
                                                            <th width="10%" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        <?php foreach ($hasil as $pengaduan) : ?>
                                                            <tr>
                                                                <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i++; ?></strong></td>
                                                                <td class="text-center"><img src="foto/<?= $pengaduan['foto']; ?>" width='175px'></td>
                                                                <td class="text-center"><?= $pengaduan['tgl_pengaduan']; ?></td>
                                                                <td><?= $pengaduan['isi_laporan']; ?></td>
                                                                <td class="text-center">
                                                                    <?php if ($pengaduan['status'] == '0') { ?>
                                                                        <span class="badge bg-label-warning me-1">Belum diproses</span>

                                                                    <?php } elseif ($pengaduan['status'] == 'proses') { ?>
                                                                        <span class="badge bg-label-primary me-1">Proses</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge bg-label-success me-1">Selesai</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                            <a class="dropdown-item" href="masyarakat_model.php?hapus=<?= $pengaduan['foto'] ?>" onclick="return confirm('Yakin menghapus pengaduan ini')"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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