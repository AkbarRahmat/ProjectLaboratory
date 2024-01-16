<?php
$query_state = false;
$query_message = "";

function pegawaiData() {
    global $db_connect, $query_state, $query_message;

    // Get
    $sql = "SELECT * FROM jadwal
            WHERE jadwal.status_deleted = 0";
    $query = mysqli_query($db_connect, $sql);

    $dataList = [];
    while ($data = mysqli_fetch_assoc($query)) {
        $timestamp = strtotime($data["tanggal"]);
        $dayEnglish = date("l", $timestamp);
        switch ($dayEnglish) {
            case 'Monday':
                $data['nama_hari'] = 'Senin';
                break;
            case 'Tuesday':
                $data['nama_hari'] = 'Selasa';
                break;
            case 'Wednesday':
                $data['nama_hari'] = 'Rabu';
                break;
            case 'Thursday':
                $data['nama_hari'] = 'Kamis';
                break;
            case 'Friday':
                $data['nama_hari'] = 'Jumat';
                break;
            case 'Saturday':
                $data['nama_hari'] = 'Sabtu';
                break;
            case 'Sunday':
                $data['nama_hari'] = 'Minggu';
                break;
            default:
                $data['nama_hari'] = 'Hari Tidak Valid';
                break;
        }
        
        array_push($dataList, $data);
    }

    $query_state = true;
    $query_message = "succes";
    
    return $dataList;
}
/*
function pegawaiData() {
    global $db_connect, $query_state, $query_message;

    // Get
    $sql = "SELECT * FROM jadwal WHERE status_deleted = 0";
    $query = mysqli_query($db_connect, $sql);

    $dataList = [];
    while ($data = mysqli_fetch_assoc($query)) {
        array_push($dataList, $data);
    }

    $query_state = true;
    $query_message = "succes";
    
    return $dataList;
}*/
?>