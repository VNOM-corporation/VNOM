<?php

include 'connect.php';

session_start();

$id_serv = $_GET['id_serv'];

$consultar = $connect->prepare("SELECT cs.id_user, cd.nome_user FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.id_serv = ?");
$consultar->bindParam(1, $id_serv, PDO::PARAM_INT);
$consultar->execute();

$fetchconsult = $consultar->fetchAll();


foreach($fetchconsult as $dados) {
    $cliente = $dados['id_user'];
    $nome_user_cli = $dados['nome_user'];
}

$atender = $connect->prepare("INSERT INTO service_info (id_servinfo, id_serv, id_cliente, id_prestador) VALUES (null, ?, ?, ?)");
$atender->bindParam(1, $id_serv, PDO::PARAM_INT);
$atender->bindParam(2, $cliente, PDO::PARAM_INT);
$atender->bindParam(3, $_SESSION['id_prestador'], PDO::PARAM_INT);

$atender->execute();

$status_serv = 'Atendido';

$update = $connect->prepare("UPDATE cad_service SET status_serv = ? WHERE id_serv = ?");
$update->bindParam(1, $status_serv, PDO::PARAM_STR);
$update->bindParam(2, $id_serv, PDO::PARAM_INT);
$update->execute();

echo"<meta http-equiv='refresh' content='0;url=perfil_view.php?nome_user=$nome_user_cli'>";
exit;




?>