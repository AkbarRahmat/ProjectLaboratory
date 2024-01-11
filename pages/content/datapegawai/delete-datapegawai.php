<?php

require '../../core/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $IDUser = $_GET['id'];

    // Delete the product from the database based on the given ID
    $result = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id = $IDUser");

    if ($result) {
        echo "<script>alert('Sukses menghapus pegawai!'); 
            setTimeout(function(){ window.location.href = 'datapegawai'; }, 500);</script>";
    } else {
        echo "<script>alert('Gagal menghapus pegawai!'); 
            setTimeout(function(){ window.location.href = 'datapegawai'; }, 500);</script>";
    }
} else {
    echo "Error";
}
