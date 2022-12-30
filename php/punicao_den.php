<?php

include 'connect.php';

$denunciado = $_POST['denunciado'];

$consultar = $connect->prepare("SELECT * FROM cad_user WHERE nome_user = ?");
$consultar->bindParam(1, $denunciado, PDO::PARAM_STR);
$consultar->execute();

$rowconsult = $consultar->rowCount();

$tipo_pun = 4;
$status_den = 'Penalizado';

if($rowconsult == 1) {
    $update = $connect->prepare("UPDATE cad_user cd INNER JOIN denuncia_user den ON cd.id_user = den.id_user SET cd.tipo_user = ?, den.status_den = ? WHERE cd.nome_user = ?");
    $update->bindParam(1, $tipo_pun, PDO::PARAM_INT);
    $update->bindParam(2, $status_den, PDO::PARAM_STR);
    $update->bindParam(3, $denunciado, PDO::PARAM_STR);
    $update->execute();
}


echo"<meta http-equiv='refresh' content='0;url=perfil_adm_pessoas.php'>";
exit;






?>