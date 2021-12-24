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
                            <a class="nav-link active" href="list_penerima.php">
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
                        <ul class="nav nav-tabs mt-2">
                          <li class="nav-item">
                            <a class="nav-link" href="list_penerima.php">Daftar Penerima</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="data_penerima.php">Data Penerima</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link  active" href="lap_penyaluran.php">Laporan Penyaluran</a>
                          </li>
                        </ul>


                        <!-- Awal engine search -->
                        <form method="POST">
                            <div class="card mb-4 mt-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                          <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama Penerima</td>
                                                        <td>
                                                             <div class="row">
                                                                <div class="col">
                                                                  <input type="date" name="tanggal_awal" class="form-control" value="<?=isset($_POST['tanggal_awal'])?$_POST['tanggal_awal']:'';?>" required>   
                                                                </div> s/d 
                                                                <div class="col">
                                                                   <input type="date" name="tanggal_akhir" class="form-control" value="<?=isset($_POST['tanggal_akhir'])?$_POST['tanggal_akhir']:'';?>" required> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                    <button class="btn btn-info" type="submit" name="filter_cari"><i class="fab fa-sistrix"></i> Cari</button>
                                    <a href="cetak/excel_penyaluran.php?print=<?=isset($_POST['filter_cari'])?$_POST['filter_cari']:'';?>&tgl_awal=<?=isset($_POST['tanggal_awal'])?$_POST['tanggal_awal']:'';?>&tgl_akhir=<?=isset($_POST['tanggal_akhir'])?$_POST['tanggal_akhir']:'';?>" class="btn btn-info" target="blank"><i class="fas fa-file"></i> Excel</a>
                                </div>
                            </div>
                        </form>
                        <!-- Akhir engine search -->

                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table table-active">
                                        <th >No</th>
                                        <th>Tanggal Penyaluran</th>
                                        <th>Tanggal Terima</th>
                                        <th >Gambar</th>
                                        <th >Nama Penerima</th>
                                        <th >Alamat</th>
                                        <th >RT</th>
                                        <th >RW</th>
                                        <th >Jenis Kelamin</th>
                                        <th >Umur</th>
                                        <th >Status</th>
                                        <th >Kategori</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                if (isset($_POST['filter_cari']))
                                {
                                   $tanggal_awal = $_POST['tanggal_awal'];
                                   $tanggal_akhir = $_POST['tanggal_akhir'];
                                   if(empty($tanggal_awal) || empty($tanggal_akhir))
                                        {
                                           $tampil = mysqli_query ($koneksi, "SELECT * FROM lap_penyaluran INNER JOIN datawarga ON lap_penyaluran.id_pb=datawarga.id_pb order by datawarga.nama "); 
                                        }
                                        else
                                        {
                                            $tampil = mysqli_query ($koneksi, "SELECT * FROM lap_penyaluran INNER JOIN datawarga ON lap_penyaluran.id_pb=datawarga.id_pb WHERE tanggal_penerima BETWEEN '$tanggal_awal' AND '$tanggal_akhir' order by datawarga.nama "); 
                                        }
                                  
                                while ($data = mysqli_fetch_array($tampil)){

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$data['tanggal_penyaluran'];?></td>
                                        <td><?=$data['tanggal_penerima'];?></td>
                                        <td><img src="<?='img/'.$data['gambar'];?>" width="80px;"></td>
                                        <td><?=$data ['nama']?></td>
                                        <td><?=$data ['alamat']?></td>
                                        <td><?=$data ['rt']?></td>
                                        <td><?=$data ['rw']?></td>
                                        <td><?=$data ['jkelamin']?></td>
                                        <td>
                                            <?php
                                            $tanggal_awal = date_create($data['tgl']);
                                            $tanggal_akhir = date_create();
                                            $hasil = date_diff($tanggal_awal,$tanggal_akhir);
                                            echo $hasil->y." Tahun";
                                            ?>
                                        </td>
                                        <td><?=$data ['alasan']?></td>
                                        <td><?=$data ['kategori']?></td>
                                    </tr>
                                    <?php
                                        } 
                                    };?>
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
