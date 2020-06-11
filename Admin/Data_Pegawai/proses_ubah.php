<?php 

if(!isset($_POST['ubah'])) header('Location: ubah.php');


require_once 'config.php';
$nama = mysqli_real_escape_string($db, isset($_POST['nama']) ? $_POST['nama'] : '');
$umur = mysqli_real_escape_string($db, isset($_POST['umur']) ? $_POST['umur'] : '');
$jk   = mysqli_real_escape_string($db, isset($_POST['jk']) ? $_POST['jk'] : '');
$no_hp = mysqli_real_escape_string($db, isset($_POST['no_hp']) ? $_POST['no_hp'] : '');
$tempat_lahir = mysqli_real_escape_string($db, isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '');
$tgl_lahir = mysqli_real_escape_string($db, isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : '');
$jamkerja = mysqli_real_escape_string($db, isset($_POST['jamkerja']) ? $_POST['jamkerja'] : '');
$gaji     = mysqli_real_escape_string($db, isset($_POST['gaji']) ? $_POST['gaji'] : '');
$bagian   = mysqli_real_escape_string($db, isset($_POST['bagian']) ? $_POST['bagian'] : '');
$alamat   = mysqli_real_escape_string($db, isset($_POST['alamat']) ? $_POST['alamat'] : '');

$id = $_GET['id'];

// persiapan upload foto

if($_FILES['foto']['error'] == 0){
	$ekstensi = $_FILES['foto']['name'];
	$ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

	$nama_foto = strtolower($judul);
	$nama_foto = str_replace(' ', '-', $nama_foto) . '.' . $ekstensi;

	$asal = $_FILES['foto']['tmp_name'];
} else {
	// hapus foto sebelumnya
	$query_guru = mysqli_query($db, "SELECT foto FROM data_pegawai WHERE id = $id");
	$row = mysqli_fetch_assoc($query_guru);
	
	$nama_foto = $row['foto'];
}

$tujuan = '../images/pegawai/';
		
if($_FILES['foto']['error'] == 0){
	if($_FILES['foto']['size'] < 1000000){
		if (file_exists('../images/pegawai/' . $nama_foto)) unlink('../images/pegawai/' . $nama_foto . '.' . $ekstensi);
		if(file_exists('../images/pegawai/' . $row['foto'])) unlink('../images/pegawai/' . $row['foto']);
		move_uploaded_file($asal, $tujuan . $nama_foto) or die('gagal upload foto');

		// ubah data
		$query = mysqli_query($db, "UPDATE data_pegawai SET nama = '$nama', umur = $umur, jk = '$jk', no_hp = '$no_hp', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jamkerja = '$jamkerja', gaji = '$gaji', bagian = '$bagian', alamat = '$alamat', foto = '$nama_foto' WHERE id = $id") or die(mysqli_error($db));
		if($query){
			$_SESSION['sukses'] = 'Data Berhasil Diubah!';
			?>
			<script type="text/javascript">
			alert("Data Berhasil Diubah");
			window.location.href="data_pegawai.php?status=success";
		</script> 

			<?php
			//header('Location: pegawai.php?status=success');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Diubah!';
			?>
			<script type="text/javascript">
			alert("Gagal Diubah");
			window.location.href="ubah.php?status=gagal";
		</script>

			<?php
			//header('Location: Blank_404.php?status=gagal');
		}
	} else {
		$_SESSION['gagal'] = 'ukuran gambar tidak boleh lebih dari 1000kb!';
		?>
		<script type="text/javascript">
			alert("Ukuran gambar tidak boleh lebih dari 1Mb!");
			window.location.href="pegawai.php?status=gagal";
		</script>

		<?php
		//header('Location: pegawai.php');
	}
} else {
	$query = mysqli_query($db, "UPDATE data_pegawai SET nama = '$nama', umur = $umur, jk = '$jk', no_hp = '$no_hp', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jamkerja = '$jamkerja', gaji = '$gaji', bagian = '$bagian', alamat = '$alamat', foto = '$nama_foto' WHERE id = $id") or die(mysqli_error($db));

	if($query){
			$_SESSION['sukses'] = 'Data Berhasil Diubah!';
			?>
			<script type="text/javascript">
			alert("Data Berhasil Diubah");
			window.location.href="data_pegawai.php?status=success";
		</script>
			<?php
			//header('Location: pegawai.php?status=success');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Diubah!';
			?>
			<script type="text/javascript">
			alert("Gagal Diubah");
			window.location.href="ubah.php?status=gagal";
		</script>
			<?php
			//header('Location: Blank_404.php?status=gagal');
		}
}