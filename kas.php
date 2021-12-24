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
                            <a class="nav-link" href="home_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="data_warga.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Data Warga
                            </a>
                            <a class="nav-link active" href="kas.php">
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
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">KAS MASUK DAN KELUAR</p>
                        <!-- Awal Form -->
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="card mb-4 mt-4">
                                <div class="card-header">
                                    Lembar Input Kas
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label>Kas Masuk</label>
                                            <input type="num" class="form-control" name="kas_masuk" value="<?=@$vkas_masuk?>" required >
                                        </div>
                                        <div class="col">
                                            <label>kas Keluar</label>
                                            <input type="num" class="form-control" name="kas_keluar" value="<?=@$vkas_keluar?>" required >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Tanggal Input</label>
                                            <input type="date" class="form-control" name="tanggal_input" value="<?=@$vtanggal_input?>" required >
                                        </div>
                                        <div class="col">
                                            <label >Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan" value="<?=@$vketerangan?>" placeholder="-= Inputkan Keterangan disini =-">
                                        </div>
                                        <div class="col">
                                            Bank
                                            <select class="form-control" name="bank" required>
                                                <option value="<?=@$vbank?>"><?=@$vbank?></option>
                                                <option value="Dhuafa">Dhuafa</option>
                                                <option value="MPK">MPK</option>
                                                <option value="Bank Sampah">Bank Sampah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3 mr-3 " name="tambah">Simpan</button>
                                    <button type="reset" class="btn btn-danger mt-3 " name="bkosong">Kosongkan</button>
                                </div><!-- Card Body -->
                            </div>
                        </form>

                        <!-- Akhir Form -->

                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table-active">
                                        <th >No</th>
                                        <th>No Kwitansi</th>
                                        <th >Tanggal Input</th>
                                        <th >Kas Masuk</th>
                                        <th >Kas Keluar</th>
                                        <th >Keterangan</th>
                                        <th >Bank</th>
                                        <th >Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $no_kwitansi = 1;
                                if (isset($_POST['cari']))
                                {
                                    $tanggal_awal = $_POST['tanggal_awal'];
                                    $tanggal_akhir = $_POST['tanggal_akhir'];
                                    if(empty($tanggal_awal) || empty($tanggal_akhir))
                                    {
                                       $tampil = mysqli_query ($koneksi, "SELECT * FROM simpanan ORDER BY id_kas DESC "); 
                                    }
                                    else
                                    {

                                       $tampil = mysqli_query ($koneksi, "SELECT * FROM simpanan WHERE tanggal_input BETWEEN '$tanggal_awal' AND '$tanggal_akhir' "); 
                                    }
                                }else
                                {
                                    $tampil = mysqli_query ($koneksi, "SELECT * FROM simpanan ORDER BY id_kas DESC "); 
                                }
                                
                                while ($data = mysqli_fetch_array($tampil)):
                                    $kas_masuk = isset($data['kas_masuk'])?$data['kas_masuk']:'0';
                                    $kas_keluar = isset($data['kas_keluar'])?$data['kas_keluar']:'0';
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td>MPK/<?=date('Y')?>/<?=$no_kwitansi++;?></td>
                                        <td><?=$data ['tanggal_input']?></td>
                                        <td>Rp.<?=number_format($kas_masuk);?>,-</td>
                                        <td>Rp.<?=number_format($kas_keluar);?>,-</td>
                                        <td><?=$data ['keterangan']?></td>
                                        <td><?=$data ['bank']?></td>
                                        <td>
                                            <a href="kas.php?hal=edit&id=<?=$data['id_kas']?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <a href="kas.php?hal=hapus_kas&id=<?=$data['id_kas']?>" class="btn btn-danger"><i class='fas fa-times'></i></a>
                                            <form method="post" action="cetak/kwitansi.php" target="_blank">
                                            <input type="submit" name="Kwitansi" class="btn btn-success mt-1" value="Kwitansi">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endwhile;?>
                                    <tr>
                                        <td colspan="6">Total Kas Masuk</td>
                                        <td>
                                            <?php
                                            if (isset($_POST['cari']))
                                            {
                                                $tanggal_awal = $_POST['tanggal_awal'];
                                                $tanggal_akhir = $_POST['tanggal_akhir'];
                                                if(empty($tanggal_awal) || empty($tanggal_akhir))
                                                {
                                                   $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM simpanan "); 
                                                }
                                                else
                                                {

                                                   $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM simpanan WHERE tanggal_input LIKE '$tanggal_awal' AND '$tanggal_akhir' "); 
                                                }
                                            }
                                            else
                                            {
                                              $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM simpanan ");  
                                            }
                                            $masuk = mysqli_fetch_array($kas_masuk);
                                            echo 'Rp.'.number_format($masuk['hasil']);
                                            ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Total Kas Keluar</td>
                                        <td>
                                            <?php
                                            if (isset($_POST['cari']))
                                            {
                                                $tanggal_awal = $_POST['tanggal_awal'];
                                                $tanggal_akhir = $_POST['tanggal_akhir'];
                                                if(empty($tanggal_awal) || empty($tanggal_akhir))
                                                {
                                                   $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM simpanan"); 
                                                }
                                                else
                                                {

                                                   $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM simpanan WHERE tanggal_input LIKE '$tanggal_awal' AND '$tanggal_akhir'"); 
                                                }
                                            }
                                            else
                                            {
                                                $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM simpanan");
                                            }
                                            $keluar = mysqli_fetch_array($kas_keluar);
                                            echo 'Rp.'.number_format($keluar['hasil']);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Saldo Kas</td>
                                        <td>
                                            <?php
                                            $hasil = $masuk['hasil'] -= $keluar['hasil'];
                                            echo 'Rp.'.number_format($hasil);
                                            ?>
                                        </td>
                                    </tr>
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
