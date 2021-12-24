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
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="input_warga.php">Form Input Warga</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="data_warga.php">Data Warga</a>
                          </li>
                        </ul>
                        <!-- Awal Form -->
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="card mb-4 mt-4">
                                <div class="card-header">
                                    Lembar Input Data Warga
                                </div>
                                <div class="card-body">
                                      <div class="row">
                                        <div class="col">
                                            <label>Nama Penerima</label>
                                            <input type="text" class="form-control" name="tnama" value="<?=@$vnama?>" placeholder="-= Input nama disini =-" >
                                        </div>
                                        <div class="col">
                                            <label>Nomor Induk Kependudukan</label>
                                            <input type="text" class="form-control" name="tnik" value="<?=@$vnik?>" placeholder="-= Input nomor NIK disini =-">
                                        </div>
                                        <div class="col">
                                            <label>Kartu Keluarga</label>
                                            <input type="text" class="form-control" name="tkk" value="<?=@$vkk?>" placeholder="-= Input nomor KK disini =-">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label >Nama Ayah</label>
                                            <input type="text" class="form-control" name="tayah" value="<?=@$vayah?>" placeholder="-= Input nama ayah disini =-">
                                        </div>
                                        <div class="col">
                                            <label>Nama Ibu</label>
                                            <input type="text" class="form-control" name="tibu" value="<?=@$vibu?>" placeholder="-= Input nomor ibu disini =-">
                                        </div>
                                        <div class="col">
                                            <label >Nomor Telepon</label>
                                            <input type="text" class="form-control" name="thp" value="<?=@$vhp?>" placeholder="-= Input nomor telepon disini =-">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label >Alamat</label>
                                            <input type="text" class="form-control" name="talamat" value="<?=@$valamat?>" placeholder="-= Inputkan Alamat disini =-">
                                        </div>
                                        <div class="col-1">
                                            <label>RT</label>
                                            <select name="trt" class="form-control">
                                                <option value="<?=@$vrt?>"><?=@$vrt?></option>
                                                <option value="001">001</option>
                                                <option value="002">002</option>
                                                <option value="003">003</option>
                                                <option value="004">004</option>
                                                <option value="005">005</option>
                                                <option value="006">006</option>
                                                <option value="007">007</option>
                                                <option value="008">008</option>
                                                <option value="009">009</option>
                                                <option value="010">010</option>
                                                <option value="011">011</option>
                                                <option value="012">012</option>
                                                <option value="013">013</option>
                                                <option value="014">014</option>
                                                <option value="015">015</option>
                                                <option value="016">016</option>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <label >RW</label>
                                            <select name="trw" class="form-control">
                                                <option value="<?=@$vrw?>"><?=@$vrw?></option>
                                                <option value="001">001</option>
                                                <option value="002">002</option>
                                                <option value="003">003</option>
                                                <option value="004">004</option>
                                                <option value="005">005</option>
                                                <option value="006">006</option>
                                                <option value="007">007</option>
                                                <option value="008">008</option>
                                                <option value="009">009</option>
                                                <option value="010">010</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label >Agama</label>
                                            <select name="tagama" class="form-control">
                                                <option value="<?=@$vagama?>"><?=@$vagama?></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Khatolik">Khatolik</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Pendidikan</label>
                                            <select name="tpendidikan" class="form-control">
                                                <option value="<?=@$vpendidikan?>"><?=@$vpendidikan?></option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label >Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tlahir" value="<?=@$vtl?>" placeholder="-= Input Tempat Asal Lahir =-">
                                        </div>
                                        <div class="col-2">
                                            <label >Tanggal Lahir</label>
                                            <input type="date" class="form-control"  value="<?=@$vtgl?>" name="ttanggal">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Jenis Kelamin</label>
                                            <select name="tjkelamin" class="form-control">
                                                <option  value="<?=@$vjkelamin?>"><?=@$vjkelamin?></option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Status</label>
                                            <select name="talasan" class="form-control">
                                                <option  value="<?=@$valasan?>"><?=@$valasan?></option>
                                                <option value="Dhuafa">Dhuafa</option>
                                                <option value="Lansia">Lansia</option>
                                                <option value="Yatim">Yatim</option>
                                                <option value="Piatu">Piatu</option>
                                                <option value="Yatim Piatu">Yatim Piatu</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <div class="form-group col">
                                                <label>Pilih Gambar</label>
                                                <input type="file" name="gambar" value="<?=@$vgambar?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3 mr-3 " name="bsimpan">Simpan</button>
                                    <button type="reset" class="btn btn-danger mt-3 " name="bkosong">Kosongkan</button>
                                </div><!-- Card Body -->
                            </div>
                        </form>

                        <!-- Akhir Form -->
                        
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
