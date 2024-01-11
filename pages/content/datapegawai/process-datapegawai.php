<?php

include "../../core/connection.php";

if(isset($_POST['tambah'])) {

    $nama = $_POST['nama'];

    $alamat = $_POST['alamat'];

    $jk = $_POST['jk'];


    $sql = "INSERT INTO pegawai (nama, alamat, jk) VALUES ('$nama', '$alamat', '$jk')";

    $query = mysqli_query($db_connect, $sql);


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

    if(mysqli_query($db_connect, $query)){
        $_SESSION['message'] = "Data berhasil diedit!";
        header("location: datapegawai.php");
    } else {
        $_SESSION['message'] = "Terjadi kesalahan!";
        header("location: datapegawai.php");
    }
}

    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> GET LIST DATA TMU <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	$QueryGetListUser = mysqli_query($db_connect, "SELECT * FROM pegawai");
    
    function query($query) {
        global $db_connect;
        $result = mysqli_query($db_connect, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    function tambah($data) {
        global $db_connect;
            $nama = htmlspecialchars($data["nama"]);
            $alamat = htmlspecialchars($data["alamat"]);
            $jk = ($data["jk"]);

        $query = "INSERT INTO pegawai
        VALUES
        ('', '$nama', '$alamat', '$jk')
        ";
    mysqli_query($db_connect, $query);
    
    return mysqli_affected_rows($db_connect);
    }
    
    function hapus($id) {
        global $db_connect;
        mysqli_query($db_connect, "DELETE FROM pegawai WHERE id = $id");
    
        return mysqli_affected_rows($db_connect);
    }

    
    
    
    
    
?>