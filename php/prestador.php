<?php

include 'connect.php';

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=php/home.php'>";
    exit;
}

if (!isset($_POST['cargo_prest']) and !isset($_POST['area_prest'])) {
    echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
    exit;
}


$cargo = $_POST['cargo_prest'];
$area = $_POST['area_prest'];

$sql = $connect->prepare("INSERT INTO cad_prestador (id_prestador, id_user, area_atuante, cargo_prestador) VALUES (null, ?, ?, ?)");
$sql->bindParam(1, $_SESSION['id_user'], PDO::PARAM_INT);
$sql->bindParam(2, $area, PDO::PARAM_STR);
$sql->bindParam(3, $cargo, PDO::PARAM_STR);

$sql->execute();

$consultar = $connect->prepare("SELECT id_prestador FROM cad_prestador WHERE id_user = ?");
$consultar->bindParam(1, $_SESSION['id_user'], PDO::PARAM_INT);
$consultar->execute();

$fetchconsult = $consultar->fetchAll();


foreach($fetchconsult as $dados) {
    $id_prestador = $dados['id_prestador'];
}

$_SESSION['tipo_user'] = 3;

$_SESSION['id_prestador'] = $id_prestador;


$update = $connect->prepare("UPDATE cad_user SET tipo_user=3 WHERE id_user = ?");
$update->bindParam(1, $_SESSION['id_user'], PDO::PARAM_INT);
$update->execute();


echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";




?>