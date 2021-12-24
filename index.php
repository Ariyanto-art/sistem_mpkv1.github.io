<?php
require 'function.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login Data Warga 006</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin"  method="post" >
      <img class="mb-4" src="img/mpk logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Silakan Masuk</h1>
      <label class="sr-only">Masukkan Pengguna</label>
      <input type="text" class="form-control" name="username" placeholder="Masukkan Nama Pengguna" required>
      <label class="sr-only">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="masuk">Masuk</button>
      <p class="mt-5 mb-3 text-muted">MPK AL-MUNNAWWIR&copy; 2021- <?=date('Y')?></p>
    </form>
  </body>
</html>
