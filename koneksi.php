<?php
// Detail koneksi database dari panel InfinityFree Anda
$host = "sql311.infinityfree.com"; 
$user = "if0_42155397";           
$pass = "E4s5bJISKHc"; // Klik ikon mata di panel InfinityFree untuk melihat password Anda
$db   = "if0_42155397_db_ppba";    // SESUAIKAN dengan nama database yang baru saja Anda buat di atas

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database hosting gagal: " . mysqli_connect_error());
}
?>