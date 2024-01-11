<?php

include "../../core/connection.php";

if(isset($_POST['tambah'])) {

    $nama = $_POST['nama'];

    $alamat = $_POST['alamat'];

    $jk = $_POST['jk'];


    $sql = "INSERT INTO pegawai (nama, alamat, jk) VALUES ('$nama', '$alamat', '$jk')";

    $query = mysqli_query($koneksi, $sql);


    if($query) {

        echo "<script>alert('Data berhasil ditambahkan!');window.location='datapegawai.php';</script>";

    } else {

        echo "<script>alert('Data gagal ditambahkan!');window.location='add-datapegawai.php';</script>";

    }

}
if(isset($_POST['edit_submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];

    $query = "UPDATE pegawai SET nama='$nama', alamat='$alamat', jk='$jk' WHERE id='$id'";

    if(mysqli_query($koneksi, $query)){
        $_SESSION['message'] = "Data berhasil diedit!";
        header("location: datapegawai.php");
    } else {
        $_SESSION['message'] = "Terjadi kesalahan!";
        header("location: datapegawai.php");
    }
}

    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> GET LIST DATA TMU <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	$QueryGetListUser = mysqli_query($koneksi, "SELECT * FROM pegawai");
    
    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    function tambah($data) {
        global $koneksi;
            $nama = htmlspecialchars($data["nama"]);
            $alamat = htmlspecialchars($data["alamat"]);
            $jk = ($data["jk"]);

        $query = "INSERT INTO pegawai
        VALUES
        ('', '$nama', '$alamat', '$jk')
        ";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
    }
    
    function hapus($id) {
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM pegawai WHERE id = $id");
    
        return mysqli_affected_rows($koneksi);
    }

    
    
    
    
    
?>