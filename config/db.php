<?php

$DBHOST = 'localhost';
$DBUSER = 'root';
$DBPASSWORD = '';
$DBNAME = 'kaef';
$DBPORT = 3307;



try{
    $db_connect = mysqli_connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME, $DBPORT);
    }catch(\Throwable $th){
        error_log($th->getMessage());
    }