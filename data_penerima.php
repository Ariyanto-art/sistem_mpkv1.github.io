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
                            <a class="nav-link  active" href="data_penerima.php">Data Penerima</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="lap_penyaluran.php">Laporan Penyaluran</a>
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
                                                            <input type="text" name="cari_nama" value="<?=isset($_POST['cari_nama'])?$_POST['cari_nama']:'';?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>  
                                        </div>
                                        <div class="col">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>RT</td>
                                                        <td>
                                                            <input type="text" name="cari_rt" value="<?=isset($_POST['cari_rt'])?$_POST['cari_rt']:'';?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kategori</td>
                                                        <td>
                                                            <input type="radio" name="cari_kategori" value="Belum Terima" <?php if(isset($_POST['cari_kategori'])&&$_POST['cari_kategori']=="Belum Terima") echo "checked";?>> Belum Terima
                                                            <input type="radio" name="cari_kategori" value="Sudah Terima" <?php if(isset($_POST['cari_kategori'])&&$_POST['cari_kategori']=="Sudah Terima") echo "checked";?>> Sudah Terima
                                                            <input type="radio" name="cari_kategori" value="ALL" <?php if(isset($_POST['cari_kategori'])&&$_POST['cari_kategori']=="ALL") echo "checked";?>> ALL
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-info" type="submit" name="filter_cari"><i class="fab fa-sistrix"></i> Cari</button>
                                </div>
                            </div>
                        </form>
                        <!-- Akhir engine search -->

                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table table-active">
                                        <th >No</th>
                                        <th >Gambar</th>
                                        <th >Nama Penerima</th>
                                        <th >NIK</th>
                                        <th >Alamat</th>
                                        <th >RT</th>
                                        <th >RW</th>
                                        <th >Jenis Kelamin</th>
                                        <th >Agama</th>
                                        <th >Umur</th>
                                        <th >Status</th>
                                        <th >Kategori</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                if (isset($_POST['filter_cari']))
                                {
                                    $rt = $_POST['cari_rt'];
                                    $nama = $_POST['cari_nama'];
                                    $kategori = isset($_POST['cari_kategori'])?$_POST['cari_kategori']:'';

                                    if ($kategori !== 'ALL' ) {
                                        $tampil = mysqli_query ($koneksi, "SELECT * FROM data_penerima INNER JOIN datawarga ON data_penerima.id_pb=datawarga.id_pb  WHERE datawarga.rt LIKE '%$rt%' AND datawarga.nama LIKE '%$nama%' AND data_penerima.kategori LIKE '%$kategori%' order by datawarga.nama ");
                                    }else{
                                        $tampil = mysqli_query ($koneksi, "SELECT * FROM data_penerima INNER JOIN datawarga ON data_penerima.id_pb=datawarga.id_pb order by datawarga.nama ");
                                    }
                                }else{
                                   $tampil = mysqli_query ($koneksi, "SELECT * FROM data_penerima INNER JOIN datawarga ON data_penerima.id_pb=datawarga.id_pb order by datawarga.nama "); 
                                }

                                    
                                while ($data = mysqli_fetch_array($tampil)){

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><img src="<?='img/'.$data['gambar'];?>" width="80px;"></td>
                                        <td><?=$data ['nama']?></td>
                                        <td><?=$data ['nik']?></td>
                                        <td><?=$data ['alamat']?></td>
                                        <td><?=$data ['rt']?></td>
                                        <td><?=$data ['rw']?></td>
                                        <td><?=$data ['jkelamin']?></td>
                                        <td><?=$data ['agama']?></td>
                                        <td>
                                            <?php
                                            $tanggal_awal = date_create($data['tgl']);
                                            $tanggal_akhir = date_create();
                                            $hasil = date_diff($tanggal_awal,$tanggal_akhir);
                                            echo $hasil->y." Tahun";
                                            ?>
                                        </td>
                                        <td><?=$data ['alasan']?></td>
                                        <td>
                                            <form method="POST">
                                                <input type="hidden" name="idp" value="<?=$data['id_pb'];?>">
                                                <?php
                                                    $cekstatus = mysqli_query($koneksi,"SELECT kategori FROM data_penerima WHERE id_pb='$data[id_pb]'");
                                                    $status = mysqli_fetch_array($cekstatus);
                                                    $st = $status['kategori'];
                                                    if ($st == 'Sudah Terima') {
                                                        echo "$st";
                                                    }else{
                                                        echo "
                                                        <select name='kategori'>
                                                            <option value='Belum Terima'>Belum Terima</option>
                                                            <option value='Sudah Terima'>Sudah Terima</option>
                                                        </select>";
                                                       echo "<button type='submit' class='btn btn-info mt-2' name='skategori'>Pilih</button>"; 
                                                    }
                                                ?>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                    <?php };?>
                                </tbody>
                            </table>
                            <form method="POST">
                                <button type="submit" class="btn btn-primary mt-2" name="dp">Simpan</button>
                                <button type="submit" class="btn btn-danger mt-2" name="dpbatal">Batal</button>
                            </form>
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
