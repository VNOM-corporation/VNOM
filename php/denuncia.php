<?php

include 'connect.php';

session_start();

if (!isset($_POST['denunciado'])) {
    echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

$denunciado = $_POST['denunciado'];
$denunciante = $_SESSION['nome_user'];
$id_user = $_SESSION['id_user'];

$motivo_den = $_POST['motivo_den'];
$desc_den = $_POST['desc_den'];
$tipo_den = 'Usuário';
$status_den = 'Pendente';

$datahor_atual = date('d/m/Y H:i');

$denuncia = $connect->prepare("INSERT INTO denuncia_user (id_den, id_user, tipo_den, motivo_den, denunciante_den, denunciado_den, descricao_den, status_den, datahora_den) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)");
$denuncia->bindParam(1, $id_user, PDO::PARAM_INT);
$denuncia->bindParam(2, $tipo_den, PDO::PARAM_STR);
$denuncia->bindParam(3, $motivo_den, PDO::PARAM_STR);
$denuncia->bindParam(4, $denunciante, PDO::PARAM_STR);
$denuncia->bindParam(5, $denunciado, PDO::PARAM_STR);
$denuncia->bindParam(6, $desc_den, PDO::PARAM_STR);
$denuncia->bindParam(7, $status_den, PDO::PARAM_STR);
$denuncia->bindParam(8, $datahor_atual, PDO::PARAM_STR);
$denuncia->execute();


echo"<meta http-equiv='refresh' content='0;url=pessoas.php'>";
exit;



?>