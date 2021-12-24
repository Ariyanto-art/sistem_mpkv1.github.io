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
                            <a class="nav-link  active" href="list_penerima.php">Daftar Penerima</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="data_penerima.php">Data Penerima</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="lap_penyaluran.php">Laporan Penyaluran</a>
                          </li>
                        </ul>

                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-sm-2">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-home" style="font-size: 20px;"></i> Warga</h5>
                                    <?php
                                        $jumlah_warga = mysqli_query($koneksi, "SELECT * FROM daftar_penerima");
                                        $hasil_warga = mysqli_num_rows($jumlah_warga);
                                    ?>
                                <p class="card-text"><?=$hasil_warga?> jiwa</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Dhuafa</h5>
                                    <?php
                                    $dhuafa = mysqli_query ($koneksi ,"SELECT alasan FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE alasan = 'Dhuafa' ");
                                    $hasil_dhuafa = mysqli_num_rows($dhuafa);
                                    ?>
                                    <p class="card-text"><?=$hasil_dhuafa;?> jiwa</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Lansia</h5>
                                    <?php
                                        $lansia = mysqli_query ($koneksi ,"SELECT alasan FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE alasan = 'Lansia' ");
                                        $hasil_lansia = mysqli_num_rows($lansia);
                                    ?>
                                    <p class="card-text"><?=$hasil_lansia;?> jiwa</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Yatim</h5>
                                    <?php
                                        $yatim = mysqli_query ($koneksi ,"SELECT alasan FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE alasan = 'Yatim' ");
                                        $hasil_yatim = mysqli_num_rows($yatim);
                                    ?>
                                    <p class="card-text"><?=$hasil_yatim;?> jiwa</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Piatu</h5>
                                    <?php
                                        $piatu = mysqli_query ($koneksi ,"SELECT alasan FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE alasan = 'Piatu' ");
                                        $hasil_piatu = mysqli_num_rows($piatu);
                                    ?>
                                    <p class="card-text"><?=$hasil_piatu;?> jiwa</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title"><i class="fa fa-user" style="font-size: 20px;"></i> Yatim Piatu</h5>
                                    <?php
                                        $yatim_piatu = mysqli_query ($koneksi ,"SELECT alasan FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE alasan = 'Yatim Piatu' ");
                                        $hasil_yatim_piatu = mysqli_num_rows($yatim_piatu);
                                    ?>
                                    <p class="card-text"><?=$hasil_yatim_piatu;?> jiwa</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        

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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-info" type="submit" name="filter_cari"><i class="fab fa-sistrix"></i> Cari</button>
                                    <a href="cetak/excel_list_penerima.php?print=<?=isset($_POST['filter_cari'])?$_POST['filter_cari']:'';?>&nama=<?=isset($_POST['cari_nama'])?$_POST['cari_nama']:'';?>&rt=<?=isset($_POST['cari_rt'])?$_POST['cari_rt']:'';?>" class="btn btn-info" target="blank"><i class="fas fa-file"></i> Excel</a>
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
                                    $rt = $_POST['cari_rt'];
                                    $nama = $_POST['cari_nama'];

                                    $tampil = mysqli_query ($koneksi, "SELECT * FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE rt LIKE '%$rt%' AND nama LIKE '%$nama%' order by datawarga.nama ");
                                }else{
                                    $tampil = mysqli_query ($koneksi, "SELECT * FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb order by datawarga.nama ");
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
                                            <!-- Awal Modal Pilih Item-->
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal<?=$data['id_daftar_penerima'];?>'><i class='fas fa-times'></i>
                                            </button>
                                            <!-- Akhir Modal -->
                                        </td>
                                    </tr>
                                    <!-- The Modal Pilih Item-->
                                      <div class='modal fade' id='myModal<?=$data['id_daftar_penerima'];?>'>
                                        <div class='modal-dialog'>
                                          <div class='modal-content'>
                                            <!-- Modal Header -->
                                            <div class='modal-header'>
                                              <h4 class='modal-title'>Data Warga</h4>
                                            </div>
                                          
                                            <form method='POST'>
                                            <!-- Modal body -->
                                            <div class='modal-body'>
                                                Apakah Yakin Warga Ini Akan Dihapus Sebagai Penerima Bantuan ?<br>
                                                Nama   : <?=$data['nama'];?><br>
                                                Status : <?=$data['alasan']?>
                                                <input type='hidden' name='id_db' value='<?=$data['id_daftar_penerima'];?>'>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class='modal-footer'>
                                                <button type='submit' class='btn btn-success' name='hapus_penerima'><i class='fas fa-download'></i> Submit</button>
                                                <button type='button' class='btn btn-danger' data-dismiss='modal'><i class='fas fa-times'></i> Close</button>
                                            </div>

                                            </form>
                                            
                                          </div>
                                        </div>
                                      </div>
                                    <?php };?>
                                </tbody>
                            </table>
                            <form method="POST">
                                <?php
                                    $cekdata = mysqli_query($koneksi,"SELECT * FROM data_penerima");
                                    $data = mysqli_fetch_array($cekdata);
                                    $id = isset($data['id_pb'])?$data['id_pb']:'';
                                    if ($id >= 0) {
                                        echo "<button readonly class='btn btn-warning' >Sudah Dipilih</button>";
                                    }else
                                    {
                                        echo "<button type='submit' class='btn btn-primary' name='lp' style='margin-right:3px;'>Simpan</button> ";
                                        echo "<button type='submit' class='btn btn-danger' name='batallp'>Hapus</button>";
                                    }
                                ?>
                                
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
