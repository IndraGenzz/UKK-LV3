<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tabel_siswa WHERE id=$id"));
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Edit Data Alumni</h2>
     <!-- Form dengan method POST untuk mengirim data ke server -->
    <form method="POST">
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
        <input type="text" name="nik" value="<?= $data['nik'] ?>" required>
        <input type="text" name="nisn" value="<?= $data['nisn'] ?>" required>
        <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" required>
        <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
        <input type="number" name="tahun_lulus" value="<?= $data['tahun_lulus'] ?>" required>
        <select name="jurusan" required>
            <option value="">Jurusan</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="ANIMASI">ANIMASI</option>
        </select>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $sql = "UPDATE tabel_siswa SET
            nama='$_POST[nama]', nik='$_POST[nik]', nisn='$_POST[nisn]',
            tempat_lahir='$_POST[tempat_lahir]', tanggal_lahir='$_POST[tanggal_lahir]',
            alamat='$_POST[alamat]', tahun_lulus='$_POST[tahun_lulus]', jurusan='$_POST[jurusan]'
            WHERE id=$id";
        mysqli_query($conn, $sql);
        echo "<p>Update berhasil <a href='index.php'>Kembali</a></p>";
    }
    ?>
</body>

</html>