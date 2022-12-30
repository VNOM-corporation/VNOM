<?php

include 'connect.php';

session_start();

$id_user = $_GET['id_user'];


$consultar = $connect->prepare("SELECT avatar_user FROM perfil_user WHERE id_user = ?");
$consultar->bindParam(1, $id_user, PDO::PARAM_INT);
$consultar->execute();

$fetchconsulta = $consultar->fetchAll();


$deletar = $connect->prepare("DELETE FROM cad_user WHERE id_user = ?");
$deletar->bindParam(1, $id_user, PDO::PARAM_INT);
$deletar->execute();

if ($id_user == $_SESSION['id_user']) {
    $_SESSION = array();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
exit;