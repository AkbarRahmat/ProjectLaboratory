<?php
session_start();
$action_state = false;
$action_message = "";

    function login(){
        global $db_connect, $action_state, $action_message;

    $username = $_POST["username"];
    $password = $_POST["password"];

    // $username = mysqli_real_escape_string($db_connect, $username);
    // $password = mysqli_real_escape_string($db_connect, $password);

    $query = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
    $result = $db_connect->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["nama"] = $user["nama"];
        $_SESSION["role"] = $user["role"];
        $action_state = true;
        $action_message = "login berhasil";
    } else {
        $action_state = false;
        $action_message = "username atau password salah!";
    }
    $db_connect->close();
}
?>