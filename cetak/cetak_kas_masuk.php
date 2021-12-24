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
                        <p style="font-family: times new roman; font-size: 35px;" class="mt-1 text-center">KAS MASUK</p>
                        <div class=" table-responsive mt-2">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="table-active">
                                        <th >No</th>
                                        <th>No Kwitansi</th>
                                        <th >Tanggal Input</th>
                                        <th >Kas Masuk</th>
                                        <!-- <th >Kas Keluar</th> -->
                                        <th >Keterangan</th>
                                        <!-- <th >Aksi</th> -->
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $no_kwitansi = 1;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM kas order by id_kas desc");
                                while ($data = mysqli_fetch_array($tampil)):

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td>MPK/<?=date('Y')?>/<?=$no_kwitansi++;?></td>
                                        <td><?=$data ['tanggal_input']?></td>
                                        <td>Rp.<?=$data ['kas_masuk']?>,-</td>
                                       <!--  <td>Rp.<?=$data ['kas_keluar']?>,-</td> -->
                                        <td><?=$data ['keterangan']?></td>
                                        <!-- <td>
                                            <a href="kas.php?hal=edit&id=<?=$data['id_kas']?>" class="btn btn-warning">Ubah</a>
                                            <a href="kas.php?hal=hapus&id=<?=$data['id_kas']?>" class="btn btn-danger">Hapus</a>
                                            <form method="post" action="kwitansi.php" target="_blank">
                                            <input type="submit" name="Kwitansi" class="btn btn-success mt-1" value="Kwitansi">
                                            </form>
                                        </td> -->
                                    </tr>
                                    <?php endwhile;?>
                                    <tr>
                                        <td colspan="4">Total Kas Masuk</td>
                                        <td>
                                            <?php
                                            $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM kas");
                                            $masuk = mysqli_fetch_array($kas_masuk);
                                            echo 'Rp.'.$masuk['hasil'];
                                            ?>
                                            
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="4">Total Kas Keluar</td>
                                        <td>
                                            <?php
                                            $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM kas");
                                            $keluar = mysqli_fetch_array($kas_keluar);
                                            echo 'Rp.'.$keluar['hasil'];
                                            ?>
                                        </td>
                                    </tr> -->
                                   <!--  <tr>
                                        <td colspan="5">Saldo Kas</td>
                                        <td>
                                            <?php
                                            echo 'Rp.'.$masuk['hasil'] -= $keluar['hasil'];
                                            ?>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script> window.print();</script>
                </main>
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
