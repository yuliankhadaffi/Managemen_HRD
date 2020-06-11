<?php 

if(!isset($_POST['tambah'])) header('Location: tambah_data.php');

require_once 'config.php';
$nama = mysqli_escape_string($db, $_POST['nama']);
$umur = mysqli_escape_string($db, $_POST['umur']);
$jk = mysqli_escape_string($db, $_POST['jk']);
$no_hp = mysqli_escape_string($db, $_POST['no_hp']);
$tempat_lahir = mysqli_escape_string($db, $_POST['tempat_lahir']);
$tgl_lahir = mysqli_escape_string($db, $_POST['tgl_lahir']);
$jamkerja = mysqli_escape_string($db, $_POST['jamkerja']);
$gaji = mysqli_escape_string($db, $_POST['gaji']);
$bagian = mysqli_escape_string($db, $_POST['bagian']);
$alamat = mysqli_escape_string($db, $_POST['alamat']);


// persiapan upload foto
$ekstensi = $_FILES['foto']['name'];
$ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

$nama_foto = strtolower($nama);
$nama_foto = str_replace(' ', '-', $nama_foto) . '.' . $ekstensi;

$asal = $_FILES['foto']['tmp_name'];
$tujuan = '../images/pegawai/';

if($_FILES['foto']['error'] == 0){
	if($_FILES['foto']['size'] < 1000000){
		if (file_exists($tujuan . $nama_foto)) unlink($tujuan . $nama_foto);

		$query = mysqli_query($db, "INSERT INTO data_pegawai VALUES('', '$nama', $umur, '$jk', '$no_hp', '$tempat_lahir', '$tgl_lahir', '$jamkerja', '$gaji', '$bagian', '$alamat', '$nama_foto')") or die(mysqli_error($db));
		
		move_uploaded_file($asal, $tujuan . $nama_foto) or die('gagal upload foto');
		if($query){
			$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
			?>
			<script type="text/javascript">
				alert("Berhasil Ditambahkan");
			    window.location.href="data_pegawai.php?status=success";
		</script> 
			<?php
			//header('Location: pegawai-non-tetap.php');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
			header('Location: tambah_data.php');
		}
	} else {
		$_SESSION['gagal'] = 'ukuran gambar tidak boleh lebih dari 1000kb!';
		?>
		<script type="text/javascript">
			alert("Opps, Size file harus kurang dari 1 MB");
			window.location.href="tambah_data.php?status=gagal";
		</script> 

		<?php		
		// header('Location: pegawai-non-tetap.php');
	}
}
