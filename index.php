<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa ");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Halaman Admin </title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
    
<button><a href="tambahdata.php"> Tambah Data Mahasiswa </a></button>
<br></br>

<from action="" method="post">

    <input type="text" name="keyword" size="40" autofocus 
    placeholder="Masukkan Keyword Pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
   
</from>

<br></br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Opsi</th>
        <th>Gambar</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Fakultas</th>
    </tr>

    <?php $i = 1 ; ?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <button ><a href="ubah.php?Nim=<?= $row["Nim"]; ?>" onclick="return confirm('Anda yakin ingin mengubah data ini?');">Ubah</button></a>
            <button ><a href="hapus.php?Nim=<?= $row["Nim"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</button></a>
        </td>
        <td><img src="img_gambar<?= $row["Gambar"]; ?>" width="50"></td>
        <td><?= $row["Nim"]; ?></td>
        <td><?= $row["Nama"]; ?></td>
        <td><?= $row["Email"]; ?></td>
        <td><?= $row["Jurusan"]; ?></td>
        <td><?= $row["Fakultas"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>
    
</body>
</html>
