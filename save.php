<?php

// var_dump($_REQUEST);
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'uas');

$nama_foto = null;
if ($_FILES['foto']['name'] !=''){
    $name = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];


    //pindah ke folder foto
    move_uploaded_file($tmp_name, "foto/" . time(). '_' . $name);
    $nama_foto = time(). '_'. $name;
}



$nim = $_REQUEST['nim'];
$nama = $_REQUEST['nama'];
$periode = $_REQUEST['periode'];
$kelas = $_REQUEST['kelas'];
$prodi = $_REQUEST['prodi'];
$foto = $nama_foto;

$insert = mysqli_query($conn, "INSERT 
                                INTO mahasiswa (nim, nama, periode, kelas, prodi, foto)
                                VALUES ('$nim', '$nama', '$periode', '$kelas', '$prodi', '$foto')");

if ($insert){
    $_SESSION['message'] = 'Data Mahasiswa Berhasil Tambah.';
    header("Location: index.php");

}else{
    echo "Error: " . mysqli_error($conn);
}

