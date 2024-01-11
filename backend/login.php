<?php
session_start();
require_once "../pages/core/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    $query = "SELECT * FROM `pegawai` WHERE nama = '$username' AND password = '$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["nama"] = $user["nama"];
        $_SESSION["role"] = $user["role"];

        header("Location: ../pages/content/dashboard/dashboard.php");
        exit();
    } else {
        echo "<script>
        alert('Username atau password salah!');
        document.location='../index.php'
        </script>";
        
    }
}

$koneksi->close();
?>