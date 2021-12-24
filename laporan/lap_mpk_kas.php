<?php
require '../function.php';

session_start();
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
        <link href="../css/simple-datatables@latest.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#"><img src="../img/mpk logo.png" width="50px;"> Sistem MPK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Hai, <?=$_SESSION['username']?> - <?=$_SESSION['level']?></a></li>
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
                            <a class="nav-link" href="../home_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="../data_warga.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Data Warga
                            </a>
                            <a class="nav-link" href="../kas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                                Kas
                            </a>
                            <a class="nav-link" href="../list_penerima.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shipping-fast"></i></div>
                                Penyaluran
                            </a>
                            <a class="nav-link" href="dhuafa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                            <a class="nav-link active" href="lap_mpk_kas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan Kas
                            </a>
                            <div class="sb-sidenav-menu-heading">Control Panel</div>
                            <a class="nav-link" href="../cpanel_login.php">
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
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">LAPORAN KAS</p>
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link  active" href="lap_mpk_kas.php">MPK</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="lap_dhuafa_kas.php">Dhuafa</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="lap_bank_sampah_kas.php">Bank Sampah</a>
                          </li>
                        </ul>

                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-sm-4 mb-1">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-download" style="font-size: 20px;"></i> Kas Masuk</h5>
                                    <?php
                                        $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM simpanan WHERE bank='MPK'");
                                        $masuk = mysqli_fetch_array($kas_masuk);
                                    ?>
                                    <p class="card-text" style="font-size: 30px;">Rp. <?=number_format($masuk['hasil']);?>,-</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-4 mb-1">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-upload" style="font-size: 20px;"></i> Kas Keluar</h5>
                                    <?php
                                        $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM simpanan WHERE bank='MPK'");
                                        $keluar = mysqli_fetch_array($kas_keluar);
                                    ?>
                                    <p class="card-text" style="font-size: 30px;">Rp. <?=number_format($keluar['hasil']);?>,-</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-4 mb-1">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-balance-scale" style="font-size: 20px;"></i> Saldo Kas</h5>
                                    <?php
                                    $saldo = $masuk['hasil'] -= $keluar['hasil'];
                                    ?>
                                    <p class="card-text" style="font-size: 30px;">Rp. <?=number_format($saldo);?>,-</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table-active">
                                        <th >No</th>
                                        <th>No Kwitansi</th>
                                        <th>Bank</th>
                                        <th >Tanggal Input</th>
                                        <th >Kas Masuk</th>
                                        <th >Kas Keluar</th>
                                        <th >Keterangan</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $no_kwitansi = 1;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM simpanan WHERE bank='MPK' order by id_kas desc");
                                while ($data = mysqli_fetch_array($tampil)):

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td>MPK/<?=date('Y')?>/<?=$no_kwitansi++;?></td>
                                        <td><?=$data['bank'];?></td>
                                        <td><?=$data ['tanggal_input']?></td>
                                        <td>Rp.<?=number_format($data ['kas_masuk'])?>,-</td>
                                        <td>Rp.<?=$data ['kas_keluar']?>,-</td>
                                        <td><?=$data ['keterangan']?></td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
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
        <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="../assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
