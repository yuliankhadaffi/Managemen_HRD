<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: data_pegawai.php');

require_once 'config.php';
$id = $_GET['id'];

$query = mysqli_query($db, "SELECT foto FROM data_pegawai WHERE id = {$id}");
$row = mysqli_fetch_assoc($query);

if(file_exists("../images/pegawai/" . $row['foto'])) unlink("../images/pegawai/" . $row['foto']) or die('foto tidak bisa dihapus');

$query = mysqli_query($db, "DELETE FROM data_pegawai WHERE id = {$id}");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Dihapus!';

	?>
	<script type="text/javascript">
		alert("Data Berhasil di Hapus");
		window.location.href="data_pegawai.php?status=success";
</script> 

	<?php

} else {
	$_SESSION['gagal'] = 'Data Gagal Dihapus!';
	header('Location: data_pegawai.php?status=gagal');
}