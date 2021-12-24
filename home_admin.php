<?php

require 'function.php';
session_start();

// Buat Block Jika langsung Masuk
if(empty($_SESSION['username']))
    {
        echo "<script>alert('Maav Anda Harus Login Terlebih Dahulu, Terima Kasih'); document.location='index.php'</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem MPK</title>
        <link href="css/simple-datatables@latest.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#"><img src="img/mpk logo.png" width="50px;"> Sistem MPK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Hai, <?=$_SESSION['username']?></a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="keluar.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"><!-- Awal Nav-->
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link active" href="home_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="data_warga.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Data Warga
                            </a>
                            <a class="nav-link" href="kas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                                Kas
                            </a>
                            <a class="nav-link" href="list_penerima.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shipping-fast"></i></div>
                                Penyaluran
                            </a>
                            <a class="nav-link" href="laporan/dhuafa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                            <a class="nav-link" href="Laporan/lap_mpk_kas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan Kas
                            </a>
                            <div class="sb-sidenav-menu-heading">Control Panel</div>
                            <a class="nav-link" href="cpanel_login.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Login
                            </a>
                        </div>
                    </div>
                </nav><!-- Akhir Nav-->
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">DATA LANSIA, DHUAFA, YATIM PIATU RW 006</p>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><i>"Sebaik - baik manusia adalah yang bermanfaat untuk orang lain "</i></li>
                        </ol>
                        <div class="row">
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-home" style="font-size: 20px;"></i> Data Warga</h5>
                                <?php
                                    $jumlah_warga = mysqli_query($koneksi, "SELECT * FROM datawarga");
                                    $hasil_warga = mysqli_num_rows($jumlah_warga);
                                ?>
                                <p class="card-text"><?=$hasil_warga?> jiwa</p>
                                <a href="data_warga.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-download" style="font-size: 20px;"></i> Saldo Akhir</h5>
                                <?php
                                $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM simpanan");
                                $masuk = mysqli_fetch_array($kas_masuk);

                                $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM simpanan");
                                $keluar = mysqli_fetch_array($kas_keluar);

                                $total = $masuk['hasil'] -= $keluar['hasil'];
                                ?>
                                <p class="card-text">Rp <?=number_format($total);?> ,-</p>
                                <a href="kas.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Jumlah Dhuafa</h5>
                                <?php
                                    $dhuafa = mysqli_query ($koneksi ,"SELECT alasan FROM datawarga WHERE alasan = 'Dhuafa' ");
                                    $hasil_dhuafa = mysqli_num_rows($dhuafa);
                                ?>
                                <p class="card-text"><?=$hasil_dhuafa;?> jiwa</p>
                                <a href="laporan/dhuafa.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Jumlah Lansia</h5>
                                <?php
                                    $lansia = mysqli_query ($koneksi ,"SELECT alasan FROM datawarga WHERE alasan = 'Lansia' ");
                                    $hasil_lansia = mysqli_num_rows($lansia);
                                ?>
                                <p class="card-text"><?=$hasil_lansia;?> jiwa</p>
                                <a href="laporan/lansia.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Jumlah Yatim</h5>
                                <?php
                                    $yatim = mysqli_query ($koneksi ,"SELECT alasan FROM datawarga WHERE alasan = 'Yatim' ");
                                    $hasil_yatim = mysqli_num_rows($yatim);
                                ?>
                                <p class="card-text"><?=$hasil_yatim;?> jiwa</p>
                                <a href="laporan/yatim.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Jumlah Piatu</h5>
                                <?php
                                    $piatu = mysqli_query ($koneksi ,"SELECT alasan FROM datawarga WHERE alasan = 'Piatu' ");
                                    $hasil_piatu = mysqli_num_rows($piatu);
                                ?>
                                <p class="card-text"><?=$hasil_piatu;?> jiwa</p>
                                <a href="laporan/piatu.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Jumlah Yatim Piatu</h5>
                                <?php
                                    $yatim_piatu = mysqli_query ($koneksi ,"SELECT alasan FROM datawarga WHERE alasan = 'Yatim Piatu' ");
                                    $hasil_yatim_piatu = mysqli_num_rows($yatim_piatu);
                                ?>
                                <p class="card-text"><?=$hasil_yatim_piatu;?> jiwa</p>
                                <a href="laporan/yatim_piatu.php" class="btn btn-primary">Lihat Data</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">MPK AL-MUNNAWWIR&copy; 2021- <?=date('Y')?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
