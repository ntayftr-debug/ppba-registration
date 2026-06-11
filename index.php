<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran PPBA</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 50px; }
        .container { max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { background: #28a745; color: white; padding: 10px; border: none; width: 100%; cursor: pointer; border-radius: 5px; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulir Pendaftaran PPBA</h2>
    <p>Silakan isi data diri Anda untuk mengikuti Program Pembelajaran Bahasa Asing.</p>
    
    <form action="proses.php" method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required placeholder="Masukkan nama lengkap">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required placeholder="nama@email.com">
        </div>
        <div class="form-group">
            <label>No. WhatsApp</label>
            <input type="text" name="no_hp" required placeholder="08xxxxxxxxxx">
        </div>
        <div class="form-group">
            <label>Pilihan Program Bahasa</label>
            <select name="program_bahasa" required>
                <option value="">-- Pilih Bahasa --</option>
                <option value="Arab">Bahasa Arab</option>
                <option value="Inggris">Bahasa Inggris</option>
                <option value="mandarin">Bahasa mandarin</option>
            </select>
        </div>
        <button type="submit" name="daftar" class="btn">Daftar Sekarang</button>
    </form>
</div>

</body>
</html>