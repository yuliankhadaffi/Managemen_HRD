  <?php

include("config.php"); 

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['login'])){

    // ambil data dari formulir
    $nama = $db->real_escape_string($_POST['nama']);
    $username = $db->real_escape_string($_POST['username']);   
    $password = $db->real_escape_string($_POST['password']);
    
   $password = password_hash($password, PASSWORD_DEFAULT);
   
    // buat query
    $sql = "INSERT INTO login (id,nama,username,password)VALUES (null,$nama', '$username', '$password')";
      $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        //header('Location: pegawai_tetap.php');
       ?>
       <script type="text/javascript">
         alert("Data Berhasil Disimpan!");
         window.location.href="index.php?status=success";
       </script>           


       <?php
    } else {
      header('Location:tambah_data.php?status=gagal');
       
    }


} else {
    die("Akses dilarang...");
}

?>
