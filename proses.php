<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    // Ambil data dari form dan amankan dari SQL Injection
    $nama           = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email          = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp          = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $program_bahasa = mysqli_real_escape_string($koneksi, $_POST['program_bahasa']);

    // Query Input Data
    $query = "INSERT INTO pendaftar (nama, email, no_hp, program_bahasa) 
              VALUES ('$nama', '$email', '$no_hp', '$program_bahasa')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Pendaftaran Berhasil! Selamat bergabung di PPBA.');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
}
?>