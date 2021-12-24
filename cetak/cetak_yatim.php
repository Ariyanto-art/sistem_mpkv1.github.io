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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">DATA LANSIA RW006</p>
                        <table class="table table-bordered text-center ">
                            <thead>
                                <tr class="table-active">
                                    <th >No</th>
                                    <th>Gambar</th>
                                    <th >Nama Penerima</th>
                                    <th >NIK</th>
                                    <th >Kartu Keluarga</th>
                                    <th >Alamat</th>
                                    <th >RT</th>
                                    <th >RW</th>
                                    <th >Jenis Kelamin</th>
                                    <th >Agama</th>
                                    <th >Nomor Telepon</th>
                                    <th >Tempat Lahir</th>
                                    <th >Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th >Ayah</th>
                                    <th >Ibu</th>
                                    <th >Pendidikan</th>
                                    <th >Status</th>
                                    <!-- <th >Aksi</th> -->
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM pbmpk WHERE alasan = 'Yatim'");
                            while ($data = mysqli_fetch_array($tampil)):

                            ?>
                            <tbody>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><img src="<?php echo "../img/".$data['gambar']?>" width="80px;"></td>
                                    <td><?=$data ['nama']?></td>
                                    <td><?=$data ['nik']?></td>
                                    <td><?=$data ['kk']?></td>
                                    <td><?=$data ['alamat']?></td>
                                    <td><?=$data ['rt']?></td>
                                    <td><?=$data ['rw']?></td>
                                    <td><?=$data ['jkelamin']?></td>
                                    <td><?=$data ['agama']?></td>
                                    <td><?=$data ['hp']?></td>
                                    <td><?=$data ['tl']?></td>
                                    <td><?=$data ['tgl']?></td>
                                    <td>
                                        <?php
                                        $tanggal_awal = date_create($data['tgl']);
                                        $tanggal_akhir = date_create();
                                        $hasil = date_diff($tanggal_awal,$tanggal_akhir);
                                        echo $hasil->y." Tahun";
                                        ?>
                                    </td>
                                    <td><?=$data ['ayah']?></td>
                                    <td><?=$data ['ibu']?></td>
                                    <td><?=$data ['pendidikan']?></td>
                                    <td><?=$data ['alasan']?></td>
                                   <!--  <td>
                                        <a href="data_warga.php?hal=edit&id=<?=$data['id_pb']?>" class="btn btn-warning">Ubah</a>
                                        <a href="data_warga.php?hal=hapus&id=<?=$data['id_pb']?>" class="btn btn-danger">Hapus</a>
                                    </td> -->
                                </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    <script> window.print();</script>
                </main>
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
