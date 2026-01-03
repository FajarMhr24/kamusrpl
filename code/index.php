<?php
include 'koneksi.php';

$sql = "SELECT kata.*, kategori.nama_kategori 
        FROM kata 
        LEFT JOIN kategori ON kata.id_kategori = kategori.id_kategori";
$data = mysqli_query($conn, $sql);
?>

<h2>Data Kamus</h2>
<a href="kata_tambah.php">+ Tambah Kata</a>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Kata Indonesia</th>
    <th>Kata Inggris</th>
    <th>Kategori</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['kata_indonesia'] ?></td>
    <td><?= $row['kata_inggris'] ?></td>
    <td><?= $row['nama_kategori'] ?></td>
    <td>
        <a href="kata_edit.php?id=<?= $row['id_kata'] ?>">Edit</a> |
        <a href="kata_hapus.php?id=<?= $row['id_kata'] ?>" 
           onclick="return confirm('Hapus data?')">Hapus</a> |
        <a href="contoh_kalimat.php?id=<?= $row['id_kata'] ?>">Contoh</a>
        <link rel="stylesheet" href="style.css">

    </td>
</tr>
<?php endwhile; ?>
</table>
