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
                            <a class="nav-link" href="input_warga.php">Form Input Warga</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link  active" href="data_warga.php">Data Warga</a>
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
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>
                                                            <input type="text" name="cari_nik" value="<?=isset($_POST['cari_nik'])?$_POST['cari_nik']:'';?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>  
                                        </div>
                                        <div class="col">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>
                                                            <input type="text" name="cari_status" value="<?=isset($_POST['cari_status'])?$_POST['cari_status']:'';?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>
                                                            <input type="radio" name="cari_jk" value="Laki-laki" <?php if(isset($_POST['cari_jk'])&&$_POST['cari_jk']=="Laki-laki") echo "checked";?>> Laki-laki
                                                            <input type="radio" name="cari_jk" value="Perempuan" <?php if(isset($_POST['cari_jk'])&&$_POST['cari_jk']=="Perempuan") echo "checked";?>> Perempuan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>RT</td>
                                                        <td>
                                                            <input type="text" name="cari_rt" value="<?=isset($_POST['cari_rt'])?$_POST['cari_rt']:'';?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-info" type="submit" name="filter_cari"><i class="fab fa-sistrix"></i> Cari</button>
                                    <a href="cetak/excel_data_warga.php?print=<?=isset($_POST['filter_cari'])?$_POST['filter_cari']:'';?>&nik=<?=isset($_POST['cari_nik'])?$_POST['cari_nik']:'';?>&nama=<?=isset($_POST['cari_nama'])?$_POST['cari_nama']:'';?>&jk=<?=isset($_POST['cari_jk'])?$_POST['cari_jk']:'';?>&sts=<?=isset($_POST['cari_status'])?$_POST['cari_status']:'';?>" class="btn btn-info" target="blank"><i class="fas fa-file"></i> Excel</a>
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
                                        <th >Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                if (isset($_POST['filter_cari']))
                                {
                                    $nik = $_POST['cari_nik'];
                                    $rt = $_POST['cari_rt'];
                                    $nama = $_POST['cari_nama'];
                                    $status = $_POST['cari_status'];
                                    $jk = isset($_POST['cari_jk'])?$_POST['cari_jk']:'';

                                    $tampil = mysqli_query ($koneksi, "SELECT * FROM datawarga WHERE nama LIKE '%$nama%' AND nik LIKE '%$nik%' AND alasan LIKE '%$status%' AND jkelamin LIKE '%$jk%' AND rt LIKE '%$rt%' order by id_pb desc");

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
                                            <a href="input_warga.php?hal=edit&id=<?=$data['id_pb']?>" class="btn btn-warning mb-1"><i class="far fa-edit"></i></a>
                                            <a href="data_warga.php?hal=hapus&id=<?=$data['id_pb']?>" class="btn btn-danger mb-1"><i class='fas fa-times'></i></a>
                                            <a href="detail_warga.php?hal=detail&id=<?=$data['id_pb']?>" class="btn btn-success mb-1"><i class="fas fa-folder-open"></i></a>
                                            <?php
                                            $cariid = mysqli_query($koneksi,"SELECT * FROM daftar_penerima WHERE id_pb = '$data[id_pb]'");
                                            $id = mysqli_fetch_array($cariid);
                                            $idpb= isset($id['id_pb'])?$id['id_pb']:'';

                                            if ($idpb <= 0 ) {
                                                echo "<!-- Awal Modal Pilih Item-->
                                            <button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal$data[id_pb]'></i> Pilih
                                            </button>
                                            <!-- Akhir Modal -->";
                                            echo "<!-- The Modal Pilih Item-->
                                              <div class='modal fade' id='myModal$data[id_pb]'>
                                                <div class='modal-dialog'>
                                                  <div class='modal-content'>
                                                    <!-- Modal Header -->
                                                    <div class='modal-header'>
                                                      <h4 class='modal-title'>Data Warga</h4>
                                                    </div>
                                                  
                                                    <form method='POST'>
                                                    <!-- Modal body -->
                                                    <div class='modal-body'>
                                                        Apakah Yakin Warga Ini Akan Dimasukkan Penerima Bantuan ?<br>
                                                        Nama   : $data[nama]<br>
                                                        Status : $data[alasan]
                                                        <input type='hidden' name='id_pb' value='$data[id_pb]'>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class='modal-footer'>
                                                        <button type='submit' class='btn btn-success' name='penerima'><i class='fas fa-download'></i> Submit</button>
                                                        <button type='button' class='btn btn-danger' data-dismiss='modal'><i class='fas fa-times'></i> Close</button>
                                                    </div>

                                                    </form>
                                                    
                                                  </div>
                                                </div>
                                              </div>";
                                            }else{
                                                echo " <i class='far fa-paper-plane'></i>";
                                            }

                                            ?>
                                            
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } else {;?>
                                        <tr>
                                            <td colspan="19">Data Tidak Ditemukan</td>
                                        </tr>
                                    <?php };?>
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
