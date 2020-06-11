<?php 

function koneksi(){
	return mysqli_connect('localhost', 'root', '' ,'manajemen_hrd');

}

function query($query){
	$conn = koneksi();
	$result = mysqli_query($conn, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
		
	}
	return $rows;


}

	function registrasi($data)
	{
		//require_once 'config.php';
		$conn = koneksi();

		$nama = htmlspecialchars(strtolower($data['nama']));
		$username = htmlspecialchars(strtolower($data['username']));
		$password1 = mysqli_real_escape_string($conn, $data['password1']);
		$password2 = mysqli_real_escape_string($conn, $data['password2']);
		
		// jika usernname / password kosong
		if(empty($username) || empty($password1) || empty($password2)){
			echo "<script> 
			alert('username / password tidak boleh kosong!');
			document.location.href = 'tambah_data.php';
			</script>";


			return false;

		}

		// jika username sudah terdaptar
		//$cek = mysqli_query($db,"SELECT * FROM masuk WHERE username='$username'");

		if(query("SELECT *from login WHERE username = '$username'")){
			
			echo "<script type='text/javascript'>

                alert('username sudah terdaptar');
                window.location.href='tambah_data.php?status=gagal';
              </script>";

			return false;
		}

		// jika confirm password tidak sesuai
		if ($password1 !== $password2 ) {
		echo "<script type='text/javascript'>
		alert('Konfirmasi password tidak sesuai');
		window.location.href='tambah_data.php?status=gagal';
		</script>";

			return false;
		
	}

	// jika password <= 5 digit

	if (strlen($password1) <5 ) {
		echo "<script type='text/javascript'>
		alert('password terlalu pendek!');
		window.location.href='tambah_data.php?status=gagal';
		</script>";

			return false;
	}


	// jika username dan password benar
	// enkripsi password
	//$conn = koneksi();
	$password_baru = password_hash($password1, PASSWORD_DEFAULT);

	// insert into
	$query = "INSERT INTO login values (null,'$nama','$username', '$password_baru')";

	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);

	} //end registrasi

	function Login($data)
	{
		$conn = koneksi();

		$username = htmlspecialchars($data['username']);
		$password = htmlspecialchars($data['password']);

		// cek username
		if ($user = query("SELECT *FROM masuk where username = '$username' ")){

	    // cek password
			if(password_verify($password, $password['password'])){
				// jika sesuai maka masuk sini
				// $_SESSION['Login'] == true;
				// header("Location: index.php");
				// exit;

				 //cek jika password sama dan levelnya == admin
				if($password == $data["password"] && $data["level"] == "Admin"){
				$_SESSION["username"] = $data["username"]; //buat session username
     			$_SESSION["level"] = $data["level"]; //buat session level
     			header('Location: '.$base_url.'/Admin/index.php'); //redirect kehalaman admin.

     			//jika password sama dan levelnya == hrd

     		}else if($password == $data["password"] && $data["level"] == "HRD"){
     			$_SESSION["username"] = $data["username"]; //buat session username
     			$_SESSION["level"] = $data["level"]; //buat session level
     			header('Location: '.$base_url.'/HRD/index.php'); //redirect kehalaman hrd.
     			//jika password sama dan levelnya == pimpinan
     	} else if($password == $data["password"] && $data["level"] == "Pimpinan"){
     			$_SESSION["username"] = $data["username"]; //buat session username
        		$_SESSION["level"] = $data["level"]; //buat session level
        		header('Location: '.$base_url.'/Pimpinan/index.php'); //redirect kehalaman pimpinan.
			}

			
		}
		else{
			return[
				'error' => true,
				'pesan' => 'Username / Password salah!'
			];
		}
	}
}



 ?>