<?php
require 'functions.php';
//cek apakah tombol sumbit sudah ditekan atau belum
if( isset($_POST["tambah"])) {

    

  
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
            echo 
                "<script>
                    alert('Data Berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
    }else {
        echo 
            "<script>
                alert('Data Gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    }
}
      
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/tambah.css"/>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/from-data">

        <div style=position:absolute;>

                <label for="nim">Nim: </label>
                <input type="text" name="nim" id="nim" required><br></br> 
            
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required><br><br> 
            
                <label for="email">Email: </label>
                <input type="text" name="email" id="email"><br><br>
                 
                <label for="jurusan">Jurusan: </label> 
                <input type="text" name="jurusan" id="jurusan"><br><br>
             
                <label for="fakultas">Fakultas: </label>
                <input type="text" name="fakultas" id="fakultas"><br><br>
             
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar"><br><br>
             
                <button type="submit" name="tambah">Tambah</button>
                <a href="index.php"><button>Kembali</button></a>          
        </div>
    </form>
    
</body>
</html>
