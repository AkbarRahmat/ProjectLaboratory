<?php
$query_state = false;
$query_message = "";

function tableData() {
    global $db_connect, $query_state, $query_message;

    // Get
    $sql = "SELECT * FROM jadwal
            INNER JOIN pegawai ON jadwal.id_jadwal = pegawai.id_pegawai
            WHERE jadwal.status_deleted = 0";
    $query = mysqli_query($db_connect, $sql);

    $dataList = [];
    while ($data = mysqli_fetch_assoc($query)) {
        array_push($dataList, $data);
    }

    $query_state = true;
    $query_message = "succes";
    
    return $dataList;
}

function pegawaiData() {
    global $db_connect, $query_state, $query_message;

    // Get
    $sql = "SELECT * FROM pegawai WHERE status_deleted = 0";
    $query = mysqli_query($db_connect, $sql);

    $dataList = [];
    while ($data = mysqli_fetch_assoc($query)) {
        array_push($dataList, $data);
    }

    $query_state = true;
    $query_message = "succes";
    
    return $dataList;
}
?>