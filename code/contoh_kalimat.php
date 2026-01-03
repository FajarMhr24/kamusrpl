<?php
include 'koneksi.php';
$id = $_GET['id'];

if(isset($_POST['simpan'])){
    mysqli_query($conn, "INSERT INTO contoh_kalimat 
    (id_kata, kalimat, terjemahan)
    VALUES ($id, '$_POST[kalimat]', '$_POST[arti]')");
}

$data = mysqli_query($conn, "SELECT * FROM contoh_kalimat WHERE id_kata=$id");
?>

<h2>Contoh Kalimat</h2>

<form method="post">
    <textarea name="kalimat" placeholder="Kalimat"></textarea><br>
    <textarea name="arti" placeholder="Terjemahan"></textarea><br>
    <button name="simpan">Tambah</button>
</form>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Kalimat</th>
    <th>Terjemahan</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['kalimat'] ?></td>
    <td><?= $row['terjemahan'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<a href="index.php">← Kembali</a>
<link rel="stylesheet" href="style.css">

