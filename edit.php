<?php
include 'koneksi.php';

// 1. Ambil data lama berdasarkan ID yang dikirim dari halaman admin
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "SELECT * FROM pendaftar WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data tidak ditemukan.");
    }
}

// 2. Proses Update data ketika form disubmit
if (isset($_POST['update'])) {
    $id             = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama           = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email          = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp          = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $program_bahasa = mysqli_real_escape_string($koneksi, $_POST['program_bahasa']);

    $query_update = "UPDATE pendaftar SET 
                     nama = '$nama', 
                     email = '$email', 
                     no_hp = '$no_hp', 
                     program_bahasa = '$program_bahasa' 
                     WHERE id = '$id'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftar PPBA</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 50px; }
        .container { max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { background: #007bff; color: white; padding: 10px; border: none; width: 100%; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Pendaftar</h2>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>
        </div>
        <div class="form-group">
            <label>No. WhatsApp</label>
            <input type="text" name="no_hp" value="<?= htmlspecialchars($data['no_hp']); ?>" required>
        </div>
        <div class="form-group">
            <label>Pilihan Program Bahasa</label>
            <select name="program_bahasa" required>
                <option value="Arab" <?= $data['program_bahasa'] == 'Arab' ? 'selected' : ''; ?>>Bahasa Arab</option>
                <option value="Inggris" <?= $data['program_bahasa'] == 'Inggris' ? 'selected' : ''; ?>>Bahasa Inggris</option>
                <option value="Jepang" <?= $data['program_bahasa'] == 'Jepang' ? 'selected' : ''; ?>>Bahasa Jepang</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn">Simpan Perubahan</button>
        <a href="admin.php" style="display:block; text-align:center; margin-top:10px; color:#666; text-decoration:none;">Batal</a>
    </form>
</div>

</body>
</html>