<?php
    session_start();
    $chars = 'abcdefghijklmnopqrstuvwxyz';
    $randInteger = mt_rand();
    $randString = substr(str_shuffle($chars), 0, 10);
    for ($i = 0; $i < mt_rand(5, 10); $i++) {
        $randArray[] = substr(str_shuffle($chars), 0, 10);
        $randArray[] = mt_rand();
    } 
    $dataArray = array();
    array_push($dataArray, $randInteger, $randString, $randArray);
    $serializedArray = serialize($dataArray);
?>