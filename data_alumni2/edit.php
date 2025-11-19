<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM alumni WHERE id_Alumni=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Alumni</h2>
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['Nama_Lengkap'] ?>" required>
        
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" value="<?= $data['Tahun_Lulus'] ?>" required>
        
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="RPL" <?= $data['Jurusan'] == 'RPL' ? 'selected' : '' ?>>RPL</option>
            <option value="TKJ" <?= $data['Jurusan'] == 'TKJ' ? 'selected' : '' ?>>TKJ</option>
            <option value="TJAT" <?= $data['Jurusan'] == 'TJAT' ? 'selected' : '' ?>>TJAT</option>
            <option value="ANIMASI" <?= $data['Jurusan'] == 'ANIMASI' ? 'selected' : '' ?>>ANIMASI</option>
        </select>
        
        <label>Pekerjaan Saat Ini</label>
        <input type="text" name="pekerjaan_saat_ini" value="<?= $data['Pekerjaan_Saat_Ini'] ?>" required>
        
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="<?= $data['Nomor_Telepon'] ?>" required>
        
        <label>Email</label>
        <input type="email" name="email" value="<?= $data['Email'] ?>" required>
        
        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['Alamat'] ?></textarea>
        
        <button type="submit" name="update">Update Data</button>
        <a href="index.php" style="margin-left: 10px;">Batal</a>
    </form>
    
    <?php
    if (isset($_POST['update'])) {
        $sql = "UPDATE alumni SET
            Nama_Lengkap='$_POST[nama]',
            Tahun_Lulus='$_POST[tahun_lulus]',
            Jurusan='$_POST[jurusan]',
            Pekerjaan_Saat_Ini='$_POST[pekerjaan_saat_ini]',
            Nomor_Telepon='$_POST[nomor_telepon]',
            Email='$_POST[email]',
            Alamat='$_POST[alamat]'
            WHERE id_Alumni=$id";
        mysqli_query($conn, $sql);
        echo "<p>Data berhasil diupdate! <a href='index.php'>Kembali</a></p>";
    }
    ?>
</body>
</html>
