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
        <div class="container">
    <!-- Awal Header -->
        <div class="card border border-dark">
          <div class="card-body">
            <div class="media">
             <img class="mr-1" src="../img/logo_mpk.png" width="70px;" alt="Generic placeholder image">
              <div class="media-body">
                <h2 class="mt-0" style="font-family: times new roman; font-size: 20px; color: seagreen;">MPK Al-MUNNAWIR</h2>
                <h6>Jl. Kincir Raya RT001/RW006 No.18 , Cengkareng Timur , Jakarta Barat</h6>
              </div>
            </div>
             <p style="font-family: times new roman; font-size: 35px;" class="text-center">KWITANSI</p>

            <form class="border border-dark bg-light">
                <div>
                <label class="ml-3 " style="padding-top: 5px;">No.Kwitansi :</label>
                <input type="text" value="MPK/<?=date('Y')?>" class="border-0">
                </div>
                <div>
                <label class="ml-3">Telah di Terima dari :</label>
                <input type="text" class="ml-2 border-0">
                </div>
                <div>
                <label class="ml-3">Keterangan :</label>
                <?php
                $tampil = mysqli_query ($koneksi, "SELECT keterangan FROM kas");
                $data = mysqli_fetch_array($tampil);
                ?>
                <?=$data['keterangan']?>
                <?php
                $tampil = mysqli_query ($koneksi, "SELECT keterangan FROM kas");
                $data = mysqli_fetch_array($tampil);
                ?>
                </div>
                <div>
                <label class="ml-3">Jumlah :</label>
                <?php
                $kas_masuk = mysqli_query($koneksi, "SELECT SUM(kas_masuk) AS hasil FROM kas");
                $kas_keluar = mysqli_query($koneksi, "SELECT SUM(kas_keluar) AS hasil FROM kas");
                $masuk = mysqli_fetch_array($kas_masuk);
                $keluar = mysqli_fetch_array($kas_keluar);

                echo 'Rp.'.$masuk['hasil'] -= $keluar['hasil'];
                ?>
                </div>
            </form>
            <p style="padding-top: 10px; text-align: right"> Jakarta, <?=date('d-m-Y');?></p>
            <p style="text-align: right">Dengan Hormat,</p>
            <p style="padding-top: 55px; text-align: right">Penerima</p>
          </div>
    </div>
    

    <!-- Akhir Header -->
        <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="../assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
