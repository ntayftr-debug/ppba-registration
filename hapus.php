<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query Hapus Data
    $query_hapus = "DELETE FROM pendaftar WHERE id = '$id'";

    if (mysqli_query($koneksi, $query_hapus)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: admin.php");
}
?>