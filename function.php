<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbsmpk";

$koneksi = mysqli_connect($server, $user , $pass , $database)or die (mysqli_eror($koneksi));


// panggil koneksi database
if(isset($_POST['masuk']))
{

	$pass = md5($_POST['password']);
	$username = mysqli_escape_string($koneksi, $_POST['username']);
	$password = mysqli_escape_string($koneksi, $pass);
	$level = mysqli_escape_string($koneksi, $_POST['level']);

	// cek username,

	$cek_user = mysqli_query ($koneksi, "SELECT * FROM idlogin WHERE username = '$username' ");
	$user_valid = mysqli_fetch_array ($cek_user);

	if($user_valid)
	{
		if($password == $user_valid['password'])
		{
			session_start();
			$_SESSION['username'] = $user_valid['username'];
			$_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
			$_SESSION['level'] = $user_valid['level'];
			header('location:home_admin.php');
		}
		else
		{
			echo "<script> alert('Maaf Login Gagal Password Tidak Terdaftar'); ;document.location.href='index.php'</script>";
		}
	}
	else
	{
		echo "<script> alert('Maaf Login Gagal Username Tidak Terdaftar'); ;document.location.href='index.php'</script>";
	}

}

// ketika simpan

if(isset($_POST['bsimpan']))
{
		if($_GET['hal'] == "edit")
		{

			$ekstensi_diperbolehkan = array('png' , 'jpg', 'jpeg');
		 	$nama = $_FILES ['gambar']['name']; // Untuk mendapatkan nama file yang di upload
		 	$x= explode('.', $nama); // nama_file
		 	$ekstensi = strtolower (end($x));
		 	$ukuran = $_FILES['gambar']['size']; // untuk mendapatkan ukuran file yang akan di upload
		 	$file_tmp = $_FILES ['gambar']['tmp_name'];// untuk mendapatkan temporary file yang akan di upload
			if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) 
		 				{
		 					// boleh upload
		 					if($ukuran < 1044070 )
		 					{
							 		move_uploaded_file($file_tmp,'img/'.$nama);

							 		// simpan data ke database

									$edit = mysqli_query ($koneksi, "UPDATE datawarga set
																				gambar = '$nama',
																				nama = '$_POST[tnama]',
																				nik = '$_POST[tnik]',
																				kk = '$_POST[tkk]',
																				alamat = '$_POST[talamat]',
																				rt = '$_POST[trt]',
																				rw = '$_POST[trw]',
																				jkelamin = '$_POST[tjkelamin]',
																				agama = '$_POST[tagama]',
																				hp = '$_POST[thp]',
																				tl = '$_POST[tlahir]',
																				tgl = '$_POST[ttanggal]',
																				ayah = '$_POST[tayah]',
																				ibu = '$_POST[tibu]',
																				pendidikan = '$_POST[tpendidikan]',
																				alasan = '$_POST[talasan]'
																				WHERE id_pb = '$_GET[id]'

														");
									if($edit)
									{
										echo "<script> alert('Edit Data Berhasil'); document.location.href ='data_warga.php';</script>";
									}
									else
									{
										echo "<script> alert('Edit Data Gagal !'); document.location.href ='data_warga.php';</script>";
									}
							}
		 					else
		 					{
		 						echo " <script> alert('Ukuran file yang di upload terlalu besar, max 1MB'); document.location.href='data_warga.php';</script>";
		 					}
		 				}
		 				else
		 				{
		 					// ekstensi yang di upload tidak sesuai
		 					echo " <script> alert('Ekstensi File yang di upload tidak sesuai'); document.location.href='data_warga.php';</script>";
		 			}
			
		}
		else
		{
			$ekstensi_diperbolehkan = array('png' , 'jpg', 'jpeg');
		 	$nama = $_FILES ['gambar']['name']; // Untuk mendapatkan nama file yang di upload
		 	$x= explode('.', $nama); // nama_file
		 	$ekstensi = strtolower (end($x));
		 	$ukuran = $_FILES['gambar']['size']; // untuk mendapatkan ukuran file yang akan di upload
		 	$file_tmp = $_FILES ['gambar']['tmp_name'];// untuk mendapatkan temporary file yang akan di upload
			if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) 
		 				{
		 					// boleh upload
		 					if($ukuran < 1044070 )
		 					{
							 		move_uploaded_file($file_tmp,'img/'.$nama);

							 		// simpan data ke database
							 		$simpan = mysqli_query($koneksi, "INSERT INTO datawarga (
																					gambar,
																					nama,
																					nik,
																					kk,
																					alamat,
																					rt,
																					rw,
																					jkelamin,
																					agama,
																					hp,
																					tl,
																					tgl,
																					ayah,
																					ibu,
																					pendidikan,
																					alasan
																					 )
																				VALUES (
																					'$nama',
																					'$_POST[tnama]',
																					'$_POST[tnik]',
																					'$_POST[tkk]',
																					'$_POST[talamat]',
																					'$_POST[trt]',
																					'$_POST[trw]',
																					'$_POST[tjkelamin]',
																					'$_POST[tagama]',
																					'$_POST[thp]',
																					'$_POST[tlahir]',
																					'$_POST[ttanggal]',
																					'$_POST[tayah]',
																					'$_POST[tibu]',
																					'$_POST[tpendidikan]',
																					'$_POST[talasan]'
																				     )
																						");
								if($simpan)
								{ 
									echo "<script> alert('Simpan Data Berhasil');document.location.href ='data_warga.php';</script>";
								}
								else
								{
									echo "<script>alert('Simpan Data Gagal'); document.location.href ='data_warga.php';</script>";
								}
		 					}
		 					else
		 					{
		 						echo " <script> alert('Ukuran file yang di upload terlalu besar, max 1MB'); document.location.href='data_warga.php';</script>";
		 					}
		 				}
		 				else
		 				{
		 					// ekstensi yang di upload tidak sesuai
		 					echo " <script> alert('Ekstensi File yang di upload tidak sesuai'); document.location.href='data_warga.php';</script>";
		 				}
		 			

			
		}
		
}

// jika tekan tombol edit dan hapus

if(isset($_GET['hal']))
{
	if($_GET['hal'] == "edit")
	{
		$tampil = mysqli_query ($koneksi, "SELECT * FROM datawarga WHERE id_pb = '$_GET[id]' ");
		$data = mysqli_fetch_array ($tampil);

		if($data)
		{
			$vgambar = '$nama' ;
			$vnama = $data['nama'];
			$vnik = $data['nik'];
			$vkk = $data['kk'];
			$valamat = $data['alamat'];
			$vrt = $data['rt'];
			$vrw = $data['rw'];
			$vjkelamin = $data['jkelamin'];
			$vagama = $data['agama'];
			$vhp = $data['hp'];
			$vtl = $data['tl'];
			$vtgl = $data['tgl'];
			$vayah = $data['ayah'];
			$vibu = $data['ibu'];
			$vpendidikan = $data['pendidikan'];
			$valasan = $data['alasan'];
		}
	}
	else if ($_GET['hal'] == "hapus") 
		{
		$hapus = mysqli_query ($koneksi, "DELETE FROM datawarga WHERE id_pb = '$_GET[id]'");
		if($hapus)
		{
			echo "<script>alert ('Data Berhasil Dihapus'); document.location.href ='data_warga.php';</script>";
		}
	}
}

// kas tambah dan edit
if(isset($_POST['tambah']))
{
		if($_GET['hal'] == "edit")
		{

		$edit = mysqli_query ($koneksi, "UPDATE simpanan set
														tanggal_input = '$_POST[tanggal_input]',
														kas_masuk = '$_POST[kas_masuk]',
														kas_keluar = '$_POST[kas_keluar]',
														keterangan = '$_POST[keterangan]',
														bank = '$_POST[bank]'
														WHERE id_kas = '$_GET[id]'

														");
			if($edit)
			{
				echo "<script> alert('Edit Data Berhasil'); document.location.href ='kas.php';</script>";
			}
			else
			{
				echo "<script> alert('Edit Data Gagal !'); document.location.href ='kas.php';</script>";
			}
			
		}
		else
		{
		$simpan = mysqli_query($koneksi, "INSERT INTO simpanan (
														tanggal_input ,
														kas_masuk ,
														kas_keluar ,
														keterangan ,
														bank
														)
												VALUES (
														'$_POST[tanggal_input]',
														'$_POST[kas_masuk]',
														'$_POST[kas_keluar]',
														'$_POST[keterangan]',
														'$_POST[bank]'
														)
															");
			if($simpan)
			{ 
			echo "<script> alert('Simpan Data Berhasil');document.location.href ='kas.php';</script>";
			}
			else
			{
			echo "<script>alert('Simpan Data Gagal'); document.location.href ='kas.php';</script>";
			}
		}
		
}

// jika tekan tombol edit dan hapus kas

if(isset($_GET['hal']))
{
	if($_GET['hal'] == "edit")
	{
		$tampil = mysqli_query ($koneksi, "SELECT * FROM simpanan WHERE id_kas = '$_GET[id]' ");
		$data = mysqli_fetch_array ($tampil);

		if($data)
		{
			$vtanggal_input = $data['tanggal_input'] ;
			$vkas_masuk = $data['kas_masuk'];
			$vkas_keluar = $data['kas_keluar'];
			$vketerangan = $data['keterangan'];
			$vbank = $data['bank'];
		}
	}
	else if ($_GET['hal'] == "hapus_kas") 
		{
		$hapus = mysqli_query ($koneksi, "DELETE FROM simpanan WHERE id_kas = '$_GET[id]'");
		if($hapus)
		{
			echo "<script>alert ('Data Berhasil Dihapus'); document.location.href ='kas.php';</script>";
		}
	}
}

// login tambah dan edit

if(isset($_POST['tambah_login']))
{
		if($_GET['hal'] == "edit")
		{

		$edit = mysqli_query ($koneksi, "UPDATE idlogin set
														username = '$_POST[nama_user]',
														nama_lengkap = '$_POST[nama_lengkap]',
														password = md5('$_POST[password]'),
														level = '$_POST[level]'
														WHERE id_user = '$_GET[id]'

														");
			if($edit)
			{
				echo "<script> alert('Edit Data Berhasil'); document.location.href ='cpanel_login.php';</script>";
			}
			else
			{
				echo "<script> alert('Edit Data Gagal !'); document.location.href ='cpanel_login.php';</script>";
			}
			
		}
		else
		{
		$simpan = mysqli_query($koneksi, "INSERT INTO idlogin (
														username ,
														nama_lengkap ,
														password ,
														level
														)
												VALUES (
														'$_POST[nama_user]',
														'$_POST[nama_lengkap]',
														md5('$_POST[password]'),
														'$_POST[level]'
														)
															");
			if($simpan)
			{ 
			echo "<script> alert('Simpan Data Berhasil');document.location.href ='cpanel_login.php';</script>";
			}
			else
			{
			echo "<script>alert('Simpan Data Gagal'); document.location.href ='cpanel_login.php';</script>";
			}
		}
		
}

// jika tekan tombol edit dan hapus login

if(isset($_GET['hal']))
{
	if($_GET['hal'] == "edit")
	{
		$tampil = mysqli_query ($koneksi, "SELECT * FROM idlogin WHERE id_user = '$_GET[id]' ");
		$data = mysqli_fetch_array ($tampil);

		if($data)
		{
			$vusername = $data['username'] ;
			$vnamalengkap = $data['nama_lengkap'];
			$vpassword = md5($data['password']);
			$vlevel = $data['level'];
		}
	}
	else if ($_GET['hal'] == "hapus_login") 
		{
		$hapus = mysqli_query ($koneksi, "DELETE FROM idlogin WHERE id_user = '$_GET[id]'");
		if($hapus)
		{
			echo "<script>alert ('Data Berhasil Dihapus'); document.location.href ='cpanel_login.php';</script>";
		}
	}
}

if (isset($_POST['penerima'])) {
	$idpb = $_POST['id_pb'];

	$getpenerima = mysqli_query($koneksi,"INSERT INTO daftar_penerima (id_pb) VALUES ('$idpb')");
	if ($getpenerima) {
		echo "<script>alert ('Berhasil Pilih Warga'); document.location.href ='list_penerima.php';</script>";
	}else{
		echo "<script>alert ('Gagal Pilih Warga')</script>";
	}
}

if (isset($_POST['hapus_penerima'])) {
	$id_db = $_POST['id_db'];

	$hapusdp = mysqli_query($koneksi,"DELETE FROM daftar_penerima WHERE id_daftar_penerima = '$id_db'");
	if ($hapusdp) {
		echo "<script>alert ('Berhasil Hapus Warga'); document.location.href ='data_warga.php';</script>";
	}else{
		echo "<script>alert ('Gagal Hapus Warga')</script>";
	}
}

if (isset($_POST['lp'])) {
	$getdata = mysqli_query($koneksi,"SELECT * FROM daftar_penerima");
	while ($a = mysqli_fetch_array($getdata)) {
		$idpb = $a['id_pb'];

		$dp = mysqli_query($koneksi,"INSERT INTO data_penerima (id_pb,kategori) VALUES ('$idpb','Belum Terima')");
	}
	echo "<script>document.location.href ='data_penerima.php'</script>";
}

if (isset($_POST['batallp'])) {
	$getdata = mysqli_query($koneksi,"SELECT * FROM daftar_penerima");
	while ($a = mysqli_fetch_array($getdata)) {
		$dp = mysqli_query($koneksi,"DELETE FROM data_penerima");
	}
	echo "<script>alert ('Berhasil Hapus Data Warga'); document.location.href ='data_warga.php';</script>";
}

if (isset($_POST['skategori'])) {
	$idp = $_POST['idp'];
	$kt = $_POST['kategori'];

	$dp = mysqli_query($koneksi,"UPDATE data_penerima SET kategori = '$kt' WHERE id_pb = '$idp' ");
	if ($dp) {
		echo "<script>document.location.href ='data_penerima.php'</script>";
	}else{
		echo "<script>alert ('Gagal Masukkan kategori Warga')</script>";
	}
}

if (isset($_POST['dpbatal'])) {
	$getdata = mysqli_query($koneksi,"SELECT * FROM data_penerima");
	while ($a = mysqli_fetch_array($getdata)) {

		$dp = mysqli_query($koneksi,"DELETE FROM data_penerima");
	}
	echo "<script>document.location.href ='list_penerima.php'</script>";
}

if (isset($_POST['dp'])) {
	$getdata = mysqli_query($koneksi,"SELECT * FROM data_penerima");
	while ($a = mysqli_fetch_array($getdata)) {
		$idp = $a['id_pb'];
		$tgl_p = $a['tgl_penyaluran'];
		$kategori = $a['kategori'];

		$dp = mysqli_query($koneksi,"INSERT INTO lap_penyaluran (tanggal_penyaluran,id_pb,kategori) VALUES ('$tgl_p','$idp','$kategori')");
		$c = mysqli_query($koneksi,"DELETE FROM data_penerima");
	}
	echo "<script>alert ('Berhasil Simpan Data Laporan Penyaluran, Jazakumullah Khairan ');document.location.href ='lap_penyaluran.php'</script>";
}
                              
?>

