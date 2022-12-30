<?php

include 'connect.php';

if (!isset($_GET['id_serv'])) {
    echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
    exit;
}

$del = $connect->prepare("DELETE FROM cad_service WHERE id_serv = ?");
$del->bindParam(1, $_GET['id_serv'], PDO::PARAM_INT);
$del->execute();

echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
exit;

?>