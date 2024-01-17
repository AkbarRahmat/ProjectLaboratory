<?php

include "../../core/connection.php";

if(isset($_POST['tambahshift'])) {

    $jam = $_POST['jam'];

    $mulai = $_POST['mulai'];

    $akhir = $_POST['akhir'];


    $sql = "INSERT INTO shift (jam, mulai, akhir) VALUES ('$jam', '$mulai', '$akhir')";

    $query = mysqli_query($db_connect, $sql);


    if($query) {

        echo "<script>alert('Data berhasil ditambahkan!');window.location='datashift.php';</script>";

    } else {

        echo "<script>alert('Data gagal ditambahkan!');window.location='add-datashift.php';</script>";

    }

}
if(isset($_POST['edit_submit'])){
    $id = $_POST['id_jam'];
    $jam = $_POST['jam'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    $query = "UPDATE shift SET jam='$jam', mulai='$akhir', mulai='$mulai' WHERE id_jam='$id'";

    if(mysqli_query($db_connect, $query)){
        $_SESSION['message'] = "Data berhasil diedit!";
        header("location: datashift.php");
    } else {
        $_SESSION['message'] = "Terjadi kesalahan!";
        header("location: datashift.php");
    }
}

    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> GET LIST DATA TMU <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	$QueryGetListShift = mysqli_query($db_connect, "SELECT * FROM shift");
    
    function query($query) {
        global $db_connect;
        $result = mysqli_query($db_connect, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    function tambahshift($data) {
        global $db_connect;
            $jam = htmlspecialchars($data["jam"]);
            $mulai = htmlspecialchars($data["mulai"]);
            $akhir = htmlspecialchars($data["akhir"]);

        $query = "INSERT INTO shift
        VALUES
        ('', '$jam', '$mulai', '$akhir')
        ";
    mysqli_query($db_connect, $query);
    
    return mysqli_affected_rows($db_connect);
    }
    
    function hapus($id) {
        global $db_connect;
        mysqli_query($db_connect, "DELETE FROM shift WHERE id_jam = $id");
    
        return mysqli_affected_rows($db_connect);
    }

    
    
    
    
    
?>