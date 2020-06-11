<?php
	$server    = "localhost";
	$user      = "root";
	$password  = "";
	$namadb    = "manajemen_hrd";

	$db = mysqli_connect($server, $user, $password, $namadb);

	$id = $_GET['id'];
	$sql = $db->query("DELETE from login where id='$id'");
?>
    <script type="text/javascript">
    	alert("Berhasil dihapus!");
        window.location.href="index.php";
   </script> 