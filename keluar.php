<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['level']);

session_destroy();
echo "<script> alert('Anda telah keluar dari halaman Administrator/Jamaah'); document.location.href='index.php'</script>";


?>