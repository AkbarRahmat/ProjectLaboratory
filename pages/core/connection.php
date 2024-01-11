<?php
date_default_timezone_set('Asia/Jakarta');

$databaseHost = 'localhost';
$databaseName = 'kaef';
$databaseUsername = 'root';
$databasePassword = '';
$databasePort = 3307;

try{
$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName, $databasePort);
}catch(\Throwable $th){
    error_log($th->getMessage());
} 
?>