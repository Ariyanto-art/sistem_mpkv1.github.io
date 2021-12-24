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
        <!-- Modal -->
        <script src="js/jquery-1.min.js"></script>
        <script src="js/popper-1.min.js"></script>
        <script src="js/bootstrap-1.min.js"></script>
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
                            <a class="nav-link" href="home_admin.php">
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
                            <a class="nav-link" href="Laporan/dhuafa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                            <a class="nav-link" href="Laporan/lap_mpk_kas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan Kas
                            </a>
                            <div class="sb-sidenav-menu-heading">Control Panel</div>
                            <a class="nav-link  active" href="#">
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
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">TAMBAH USER LOGIN</p>
                        <!-- Awal Form -->
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="card mb-4 mt-4">
                                <div class="card-header">
                                    Lembar Input Login
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label>Nama User</label>
                                            <input type="text" class="form-control" name="nama_user" value="<?=@$vusername?>">
                                        </div>
                                        <div class="col">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?=@$vnamalengkap?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="<?=@$vpassword?>" >
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3 mr-3 " name="tambah_login">Simpan</button>
                                    <button type="reset" class="btn btn-danger mt-3 " name="bkosong">Kosongkan</button>
                                </div><!-- Card Body -->
                            </div>
                        </form>

                        <!-- Akhir Form -->
                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table-active">
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama lengkap</th>
                                        <th>Password</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM idlogin ORDER BY id_user DESC");
                                while ($data = mysqli_fetch_array($tampil)):

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$data ['username']?></td>
                                        <td><?=$data ['nama_lengkap']?></td>
                                        <td><?=md5($data ['password'])?></td>
                                        <td>
                                            <a href="cpanel_login.php?hal=edit&id=<?=$data['id_user']?>" class="btn btn-warning">Ubah</a>
                                            <a href="cpanel_login.php?hal=hapus_login&id=<?=$data['id_user']?>" class="btn btn-danger">Hapus</a>
                                        </td>
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
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
