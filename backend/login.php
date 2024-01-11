<?php
session_start();
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($db_connect, $username);
    $password = mysqli_real_escape_string($db_connect, $password);

    $query = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
    $result = $db_connect->query($query);

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

$db_connect->close();
?>