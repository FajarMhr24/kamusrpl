<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// ambil data kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// simpan data
if (isset($_POST['simpan'])) {

    $indo = $_POST['indo'];
    $ing  = $_POST['ing'];
    $kat  = $_POST['kategori'];

    mysqli_query($conn, "INSERT INTO kata 
        (kata_indonesia, kata_inggris, id_kategori)
        VALUES ('$indo', '$ing', '$kat')");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kata</title>
</head>
<body>

<h2>Tambah Kata</h2>

<form method="post">
    <input type="text" name="indo" placeholder="Kata Indonesia" required><br><br>
    <input type="text" name="ing" placeholder="Kata Inggris" required><br><br>

    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <?php while ($k = mysqli_fetch_assoc($kategori)) : ?>
            <option value="<?= $k['id_kategori'] ?>">
                <?= $k['nama_kategori'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<a href="index.php">← Kembali</a>
<link rel="stylesheet" href="style.css">


</body>
</html>
