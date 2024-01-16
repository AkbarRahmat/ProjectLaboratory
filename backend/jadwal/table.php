<?php
session_start();
$query_state = false;
$query_message = "";

function tableData() {
    global $db_connect, $query_state, $query_message, $year_selected, $month_selected;

    // Get
    $sql = "SELECT id_jadwal, nama, tanggal, jam_awal, jam_akhir FROM jadwal
            INNER JOIN pegawai ON jadwal.id_pegawai = pegawai.id_pegawai
            WHERE jadwal.status_deleted = 0 AND YEAR(tanggal) = '$year_selected'  AND MONTH(tanggal) = '$month_selected'
            ORDER BY tanggal, DAY(tanggal)";
    $query = mysqli_query($db_connect, $sql);

    $dataList = [];
    while ($data = mysqli_fetch_assoc($query)) {
        // Tanggal
        $date = DateTime::createFromFormat("Y-m-d", $data['tanggal']);
        $data['tanggal_hari'] = $date->format('d');

        // Jam
        $jam_parse = explode(":", $data['jam_awal']);
        $data['jam_awal'] = $jam_parse[0] . ":" . $jam_parse[1];
        $jam_parse = explode(":", $data['jam_akhir']);
        $data['jam_akhir'] = $jam_parse[0] . ":" . $jam_parse[1];

        // Nama Hari
        $dayEnglish = $date->format('l');
        switch ($dayEnglish) {
            case 'Monday':
                $data['tanggal_namahari'] = 'Senin';
                break;
            case 'Tuesday':
                $data['tanggal_namahari'] = 'Selasa';
                break;
            case 'Wednesday':
                $data['tanggal_namahari'] = 'Rabu';
                break;
            case 'Thursday':
                $data['tanggal_namahari'] = 'Kamis';
                break;
            case 'Friday':
                $data['tanggal_namahari'] = 'Jumat';
                break;
            case 'Saturday':
                $data['tanggal_namahari'] = 'Sabtu';
                break;
            case 'Sunday':
                $data['tanggal_namahari'] = 'Minggu';
                break;
            default:
                $data['tanggal_namahari'] = 'Hari Tidak Valid';
                break;
        }
        
        // Data
        array_push($dataList, $data);
    }

    $query_state = true;
    $query_message = "succes";
    
    return $dataList;
}

function currentDate() {
    $date = new DateTime();
    return [
        "year" => sprintf('%02d', $date->format('Y')),
        "month" => sprintf('%02d', $date->format('m')),
        "day" => sprintf('%02d', $date->format('d'))
    ];
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