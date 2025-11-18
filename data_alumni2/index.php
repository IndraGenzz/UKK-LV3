<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Data Alumni Sekolah</h2>
    <a href="tambah.php" id="tambahdata">+ Tambah Data</a>

    <!-- FORM PENCARIAN -->
    <form method="GET" style="margin-bottom: 20px;">
        <input type="text" name="cari" placeholder="Cari nama / NIK / NISN / Jurusan..."
            value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>Id_Alumni</th>
            <th>nama lengkap</th>
            <th>Tahun lulus</th>
            <th>jurusan</th>
            <th>Pekerjaan saat ini</th>
            <th>Nomor telepon</th>
            <th>email</th>
            <th>Alamat</th>
            <th>ubah</th>
        </tr>

        <?php
        // PENCARIAN
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $result = mysqli_query($conn, "SELECT * FROM tabel_siswa 
                WHERE nama LIKE '%$cari%' 
                OR nik LIKE '%$cari%' 
                OR nisn LIKE '%$cari%' 
                OR jurusan LIKE '%$cari%' 
                OR tahun_lulus LIKE '%$cari%' ");
        } else {
            $result = mysqli_query($conn, "SELECT * FROM tabel_siswa");
        }

        // TAMPILKAN DATA
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
              <td>{$row['Id_Alumni']}</td>
            <td>{$row['Nama_Lengkap']}</td>
             <td>{$row['Tahun_Lulus']}</td>
            <td>{$row['Jurusan']}</td>
             <td>{$row['Pekerjaan_Saat_Ini']}</td>
             <td>{$row['Nomor_Telepon']}</td>
             <td>{$row['Email']}</td>
             <td>{$row['Alamat']}</td>
            <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('konfirmasi hapus?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>


</html>
