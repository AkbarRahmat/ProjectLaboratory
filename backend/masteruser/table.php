<?php
$query_state = false;
$query_message = "";

function tableData() {
    global $db_connect, $query_state, $query_message;

    // Get
    $sql = "SELECT * FROM user
            INNER JOIN pegawai ON user.id_pegawai = pegawai.id_pegawai
            WHERE user.status_deleted = 0";
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