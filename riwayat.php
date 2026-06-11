<?php
include 'koneksi.php';

$query = "SELECT * FROM pendaftar ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran dan Riwayat PPBA</title>
    <style>
        /* Desain tambahan khusus untuk menyatukan & merapikan Tabel Riwayat di bawah form Anda */
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 20px; display: flex; flex-direction: column; align-items: center; }
        
        .riwayat-section { max-width: 900px; width: 100%; background: white; padding: 25px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); margin-top: 20px; box-sizing: border-box; }
        .riwayat-title { font-size: 20px; font-weight: bold; margin-bottom: 15px; color: #333; border-bottom: 2px solid #28a745; padding-bottom: 5px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; font-size: 14px; }
        th { background-color: #28a745; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <?php include 'index.php'; ?>


    <div class="riwayat-section">
        <div class="riwayat-title">Riwayat Pendaftaran Terbaru</div>
        <table>
            <thead>
                <tr>
                    <th style="width: 40px; text-align: center;">No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. WhatsApp</th>
                    <th>Program Bahasa</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td><?= htmlspecialchars($row['program_bahasa']); ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($row['tanggal_daftar'])); ?> WIB</td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='6' style='text-align:center; color:#999; padding: 20px;'>Belum ada data pendaftar yang masuk.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>