<?php

require '../../core/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_jam'])) {
    $idjam = $_GET['id_jam'];

    // Delete the product from the database based on the given ID
    $result = mysqli_query($koneksi, "DELETE FROM shift WHERE id_jam = $idjam");

    if ($result) {
        echo "<script>alert('Sukses menghapus pegawai!'); 
            setTimeout(function(){ window.location.href = 'datashift'; }, 500);</script>";
    } else {
        echo "<script>alert('Gagal menghapus pegawai!'); 
            setTimeout(function(){ window.location.href = 'datashift'; }, 500);</script>";
    }
} else {
    echo "Error";
}
