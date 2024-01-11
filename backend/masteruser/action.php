<?php
$action_state = false;
$action_message = "";

function addUser() {
    global $db_connect, $action_state, $action_message;
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check
    $sqlc = "SELECT COUNT(*) as count FROM user WHERE username = '$username' AND status_deleted = 0";
    $queryc = mysqli_query($db_connect, $sqlc);
    $count = mysqli_fetch_assoc($queryc)['count'];

    if ($count > 0) {
        $action_state = false;
        $action_message = "fail_same";
        return;
    }
    
    // Insert Petugas
    $sql = "INSERT INTO pegawai (nama, alamat, jenis_kelamin) VALUES ('$nama', '$alamat', '$jenis_kelamin');";
    $query = mysqli_query($db_connect, $sql);

    if (!$query || !mysqli_affected_rows($db_connect) > 0) {
        $action_state = false;
        $action_message = "fail_query";
    }
    $id_pegawai = mysqli_insert_id($db_connect);

    // Insert User
    $sql = "INSERT INTO user (username, password, role, id_pegawai) VALUES ('$username', '$password', '$role', '$id_pegawai')";
    $query = mysqli_query($db_connect, $sql);

    if (!$query || !mysqli_affected_rows($db_connect) > 0) {
        $action_state = false;
        $action_message = "fail_query";
    }

    $action_state = true;
    $action_message = "succes";
}

function editUser() {
    global $db_connect, $action_state, $action_message;
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    
    // Update
    $sql = "UPDATE user SET nama = '$nama', jenis = '$jenis' WHERE id_user = $id_user;";
    $query = mysqli_query($db_connect, $sql);

    if ($query && mysqli_affected_rows($db_connect)) {
        $action_state = true;
        $action_message = "succes";
    } else {
        $action_state = false;
        $action_message = "fail_query";
    }
}

function deleteUser() {
    global $db_connect, $action_state, $action_message;
    $id_user = $_POST['id_user'];
    
    // Deleted
    $sql = "UPDATE user SET status_deleted = 1 WHERE id_user = $id_user;";
    $query = mysqli_query($db_connect, $sql);

    if ($query && mysqli_affected_rows($db_connect)) {
        $action_state = true;
        $action_message = "succes";
    } else {
        $action_state = false;
        $action_message = "fail_query";
    }
}
?>