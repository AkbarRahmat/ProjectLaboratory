<?php
$action_state = false;
$action_message = "";

function addJadwal() {
    global $db_connect, $action_state, $action_message;

    $id_pegawai = $_POST['id_pegawai'];
    $jam_awal = $_POST['jam_awal'];
    $jam_akhir = $_POST['jam_akhir'];
    $hari = $_POST['tanggal_hari'];
    $bulan = $_POST['tanggal_bulan'];
    $tahun =  $_POST['tanggal_tahun'];
    $date = $tahun . "-" . $bulan . "-" . $hari;
    
    // Insert sift pagi
    $sql = "INSERT INTO jadwal (id_pegawai, jam_awal, jam_akhir, tanggal) VALUES ('$id_pegawai', '$jam_awal', '$jam_akhir', '$date');";

    $query = mysqli_query($db_connect, $sql);
    
    if (!$query || mysqli_affected_rows($db_connect) <= 0) {
        $action_state = false;
        $action_message = "fail_query: " . mysqli_error($db_connect);
    } else {
        $id_pegawai = mysqli_insert_id($db_connect);
        $action_state = true;
        $action_message = "success";
    }
}

function editJadwal() {
    global $db_connect, $action_state, $action_message;
    $id_jadwal = $_POST['id_jadwal'];
    $jam_awal = $_POST['jam_awal'];
    $jam_akhir = $_POST['jam_akhir'];
    
    // Update
    $sql = "UPDATE jadwal SET jam_awal = '$jam_awal', jam_akhir = '$jam_akhir' WHERE id_jadwal = $id_jadwal;";
    $query = mysqli_query($db_connect, $sql);

    if ($query && mysqli_affected_rows($db_connect)) {
        $action_state = true;
        $action_message = "succes";
    } else {
        $action_state = false;
        $action_message = "fail_query";
    }
}

function deleteJadwal() {
    global $db_connect, $action_state, $action_message;
    $id_jadwal = $_POST['id_jadwal'];
    
    // Deleted
    $sql = "UPDATE jadwal SET status_deleted = 1 WHERE id_jadwal = $id_jadwal;";
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