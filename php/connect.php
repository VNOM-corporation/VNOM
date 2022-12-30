<?php

date_default_timezone_set("America/Sao_Paulo");

$username = 'epiz_33288903';
$password = 'DfnklR5xRcV';

$connect = new PDO('mysql:host=sql310.epizy.com;dbname=epiz_33288903_vnom;charset=utf8', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>