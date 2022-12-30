<?php

include 'connect.php';

session_start();

if ($_SESSION['tipo_user'] != 1) {
    $_SESSION = array();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

$id_user = $_POST['id_user'];

$consulta = $connect->prepare("SELECT avatar_user FROM perfil_user WHERE id_user = ?");
$consulta->bindParam(1, $id_user, PDO::PARAM_INT);
$consulta->execute();

$fetchconsult = $consulta->fetchAll();


$nomecomp = $_POST['nomecomp'];
$cpf_user = $_POST['cpf_user'];
$dtnasc_user = $_POST['dtnasc_user'];
$sexo_user = $_POST['sexo_user'];


// Dados do endereço
$uf_end = $_POST['uf_estado'];
$cidade_end = $_POST['cidade_user'];
$cep_end = $_POST['cep_user'];
$rua_end = $_POST['rua_user'];
$bairro_end = $_POST['bairro_user'];
$numero_end = $_POST['numero_user'];
$complemento_end = $_POST['complemento_user'];

// Dados do usuário

$nome_user = $_POST['nome_user'];

// Avatar

$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
$nameavatar = $nome_user . "." . $extension;
$avatard = "../avatar/";
$avatar = $avatard . $nameavatar;

if (!empty($_FILES['avatar']['name'])) {
$update = $connect->prepare("UPDATE cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pu ON cd.id_user = pu.id_user SET cd.nome_user = ?, pu.avatar_user = ?, ed.uf_user = ?, ed.cidade_user = ?, ed.cep_user = ?, ed.rua_user = ?, ed.bairro_user = ?, ed.numcasa_user = ?, ed.comple_user = ?, cd.nomecom_user = ?, cd.dtnasc_user = ?, cd.sexo_user = ?, cd.cpf_user = ? WHERE cd.id_user = ?");

$update->bindParam(1, $nome_user);
$update->bindParam(2, $avatar);
$update->bindParam(3, $uf_end);
$update->bindParam(4, $cidade_end);
$update->bindParam(5, $cep_end);
$update->bindParam(6, $rua_end);
$update->bindParam(7, $bairro_end);
$update->bindParam(8, $numero_end);
$update->bindParam(9, $complemento_end);
$update->bindParam(10, $nomecomp);
$update->bindParam(11, $dtnasc_user);
$update->bindParam(12, $sexo_user);
$update->bindParam(13, $cpf_user);
$update->bindParam(14, $id_user);

$update->execute();

move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);

}

elseif (empty($_FILES['avatar']['name'])) {
$update = $connect->prepare("UPDATE cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pu ON cd.id_user = pu.id_user SET cd.nome_user = ?, ed.uf_user = ?, ed.cidade_user = ?, ed.cep_user = ?, ed.rua_user = ?, ed.bairro_user = ?, ed.numcasa_user = ?, ed.comple_user = ?, cd.nomecom_user = ?, cd.dtnasc_user = ?, cd.sexo_user = ?, cd.cpf_user = ? WHERE cd.id_user = ?");

$update->bindParam(1, $nome_user);
$update->bindParam(2, $uf_end);
$update->bindParam(3, $cidade_end);
$update->bindParam(4, $cep_end);
$update->bindParam(5, $rua_end);
$update->bindParam(6, $bairro_end);
$update->bindParam(7, $numero_end);
$update->bindParam(8, $complemento_end);
$update->bindParam(9, $nomecomp);
$update->bindParam(10, $dtnasc_user);
$update->bindParam(11, $sexo_user);
$update->bindParam(12, $cpf_user);
$update->bindParam(13, $id_user);

$update->execute();

}

echo"<meta http-equiv='refresh' content='0;url=perfil_adm_pessoas.php'>"; 
?>