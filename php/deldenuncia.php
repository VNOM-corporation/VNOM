<?php

include 'connect.php';

session_start();


if (!isset($_GET['id_den'])) {
    echo"<meta http-equiv='refresh' content='0;url=perfil_adm_services.php'>";
    exit;
}

$delden = $connect->prepare("DELETE FROM denuncia_user WHERE id_den = ?");
$delden->bindParam(1, $_GET['id_den'], PDO::PARAM_INT);
$delden->execute();

echo"<meta http-equiv='refresh' content='0;url=perfil_adm_pessoas.php'>";
exit;

?>