<?php
//Koneksi ke DataBase
$conn = mysqli_connect("localhost", "root", "", "db_tugass3");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $fakultas = htmlspecialchars($data["fakultas"]);

     //query insert data
     $query = "INSERT INTO mahasiswa
                VALUES
            ('', '$nama', '$email', '$jurusan', '$fakultas', '$gambar')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);



    function upload() {

        $namaFile = $_FILES['Gambar']['Name'];
        $ukuranFile = $_FILES['Gambar']['size'];
        $error = $_FILES['Gambar']['error'];
        $tmpName = $_FILES['Gambar']['tmp_name'];
        
       
    
        // cek apakah tidak ada gambar yg di upload
        if($error === 4) {
            echo "<script> 
                    alert('pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }
    
        //cek apakah yang diupload adalah gambar
        $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ektensiGambar = explode('.', $namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        if( !in_array($ektensiGambar, $ektensiGambarValid)) {
            echo "<script> 
                    alert('yang anda upload bukan gambar!');
                </script>";
            return false;
        }
    
        //cek jika ukuranya terlalu besar
        if( $ukuranfile > 1000000) {
            echo "<script> 
                    alert('ukuran gambar terlalu besar!');
                </script>";
            return false;
        }
    
        //lolos pengecekan, gambar siap diupload
        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru = $ektensiGambar;
    
        move_uploaded_file($tmpName, 'img_gambar' . $namaFileBaru);
    
        return $namaFileBaru;
    
    }
    
    
    
    
    
    
}




function hapus($Nim) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE Nim = $Nim");
    return mysqli_affected_rows($conn);
}




function ubah($data) {
    global $conn;
    
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    //cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

     //query insert data
     $query = "UPDATE mahasiswa SET
             
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            fakultas = '$fakultas', 
            gambar = '$gambar'
            WHERE Nim = $nim
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
            nama LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' OR
            fakultas LIKE '%$keyword%' 
          ";
    return query($query);
   
} 



?>
