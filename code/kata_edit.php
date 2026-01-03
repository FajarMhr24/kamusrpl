<?php
include 'koneksi.php';

$id = $_GET['id'];
$kata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kata WHERE id_kata=$id"));
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if(isset($_POST['update'])){
    mysqli_query($conn, "UPDATE kata SET
        kata_indonesia='$_POST[indo]',
        kata_inggris='$_POST[ing]',
        id_kategori='$_POST[kategori]'
        WHERE id_kata=$id");

    header("Location: index.php");
}
?>

<h2>Edit Kata</h2>
<form method="post">
    <input type="text" name="indo" value="<?= $kata['kata_indonesia'] ?>"><br><br>
    <input type="text" name="ing" value="<?= $kata['kata_inggris'] ?>"><br><br>

    <select name="kategori">
        <?php while($k=mysqli_fetch_assoc($kategori)): ?>
            <option value="<?= $k['id_kategori'] ?>"
            <?= $k['id_kategori']==$kata['id_kategori']?'selected':'' ?>>
                <?= $k['nama_kategori'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <button name="update">Update</button>
    <link rel="stylesheet" href="style.css">

</form>
