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
        <link href="css/simple-datatables@latest.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <!-- Modal -->
        <script src="js/jquery-1.min.js"></script>
        <script src="js/popper-1.min.js"></script>
        <script src="js/bootstrap-1.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <?php
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Daftar Warga.xls");
                    ?>
                    <div class="container-fluid px-4">
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">DAFTAR WARGA RW 006</p>
                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table table-active">
                                        <th >No</th>
                                        <th >Nama Penerima</th>
                                        <th >NIK</th>
                                        <th >Alamat</th>
                                        <th >RT</th>
                                        <th >RW</th>
                                        <th >Jenis Kelamin</th>
                                        <th >Agama</th>
                                        <th >Umur</th>
                                        <th >Status</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                if (isset($_GET['print']))
                                {
                                    $rt = isset($_GET['cari_rt'])?$_GET['cari_rt']:'';
                                    $nama = isset($_GET['cari_nama'])?$_GET['cari_nama']:'';

                                    $tampil = mysqli_query ($koneksi, "SELECT * FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb WHERE rt LIKE '%$rt%' AND nama LIKE '%$nama%' order by datawarga.nama ");
                                }else{
                                    $tampil = mysqli_query ($koneksi, "SELECT * FROM daftar_penerima INNER JOIN datawarga ON daftar_penerima.id_pb=datawarga.id_pb order by datawarga.nama ");
                                }

                                while ($data = mysqli_fetch_array($tampil)){

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
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
                                    </tr>
                                    <?php };?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
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
