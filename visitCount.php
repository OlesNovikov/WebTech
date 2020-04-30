<?php
    include "dbConnect.php";
    
    $visitorIp = $_SERVER['REMOTE_ADDR'];
    $visitDate = date("Y-m-d");
    $page = basename($_SERVER["PHP_SELF"]);
    $connectionResult = mysqli_query($link, "SELECT `visit_id` FROM `$page` WHERE `date`='$visitDate'");
    
    if (!$connectionResult) echo 'Не атрымалася падлучыцца да базы дадзеных';
    else {
        if (mysqli_num_rows($connectionResult) == 0) {
            mysqli_query($link, "DELETE FROM `ipVisitors`");
            mysqli_query($link, "INSERT INTO `ipVisitors` SET ip_address='$visitorIp'");
            $resCount = mysqli_query($link, "INSERT INTO `$page` SET `date`='$visitDate', `views`=1");
        } else {
            mysqli_query($link, "INSERT INTO `ipVisitors` SET `ip_address`='$visitorIp'");
            mysqli_query($link, "UPDATE `$page` SET `views`=views+1 WHERE `date`='$visitDate'");
        }
    }
?>