<?php
require 'function.php';

session_start();

// Buat Block Jika langsung Masuk
if(empty($_SESSION['username']))
    {
        echo "<script>alert('Maav Anda Harus Login Terlebih Dahulu, Terima Kasih'); document.location='index.php'</script>";
    }

// cari data warga
if (isset($_GET['id'])) {
    $idu = $_GET['id'];

    $getid = mysqli_query($koneksi,"SELECT * FROM datawarga WHERE id_pb='$idu'");
    $id = mysqli_fetch_array($getid);
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
                            <a class="nav-link active" href="data_warga.php">
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
                        <div class="row mt-2">
                            <div class="col">
                                <img src="<?='img/'.$id['gambar'];?>" width="100%" height="auto">
                            </div>
                            <div class="col">
                                <p>KETERANGAN PRIBADI</p>
                                <table class="mb-2">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>: <?=$id['nama'];?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>: <?=$id['nik'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kartu keluarga</td>
                                            <td>: <?=$id['kk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?=$id['alamat'];?>, rt<?=$id['rt'];?>/rw<?=$id['rw']?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?=$id['jkelamin'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>: <?=$id['agama'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat,Tanggal Lahir</td>
                                            <td>: <?=$id['tl'];?>,<?=$id['tgl'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Telephone</td>
                                            <td>: <?=$id['hp'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>: <?=$id['alasan'];?></td>
                                        </tr>
                                        <tr>
                                            <td><p>KETERANGAN KELUARGA</p></td>
                                        </tr>
                                        <tr>
                                            <td>Ayah</td>
                                            <td>: <?=$id['ayah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ibu</td>
                                            <td>: <?=$id['ibu'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p style="font-size: 20px; font-style: times new roman;" class="mt-4">History/Riwayat Penyaluran</p>
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
                                $tampil = mysqli_query ($koneksi, "SELECT * FROM lap_penyaluran INNER JOIN datawarga ON lap_penyaluran.id_pb=datawarga.id_pb WHERE datawarga.id_pb = '$idu' ");

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
                                    <?php };?>
                                </tbody>
                            </table>
                        </div>
                        <a href="data_warga.php" class="btn btn-primary">Kembali</a>
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
