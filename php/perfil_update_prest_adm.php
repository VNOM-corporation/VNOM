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

// Dados da pessoa

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

// Dados do Perfil

$email_contato = $_POST['email_contato'];
$rede_wpp = $_POST['rede_wpp'];
$rede_inst = $_POST['rede_inst'];
$rede_face = $_POST['rede_face'];

// Dados do Prestador

$area_atuante = $_POST['area_atuante'];
$cargo_prestador = $_POST['cargo_prestador'];

// Avatar

$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
$nameavatar = $nome_user . "." . $extension;
$avatard = "../avatar/";
$avatar = $avatard . $nameavatar;


if (!empty($_FILES['avatar']['name'])) {
$update = $connect->prepare("UPDATE cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pu ON cd.id_user = pu.id_user INNER JOIN cad_prestador cp ON cd.id_user = cp.id_user SET cd.nome_user = ?, pu.avatar_user = ?, pu.email_contato = ?, pu.rede_wpp = ?, pu.rede_inst = ?, pu.rede_face = ?, cp.area_atuante = ?, cp.cargo_prestador = ?, ed.uf_user = ?, ed.cidade_user = ?, ed.cep_user = ?, ed.rua_user = ?, ed.bairro_user = ?, ed.numcasa_user = ?, ed.comple_user = ?, cd.nomecom_user = ?, cd.dtnasc_user = ?, cd.sexo_user = ?, cd.cpf_user = ? WHERE cd.id_user = ?");

$update->bindParam(1, $nome_user);
$update->bindParam(2, $avatar);
$update->bindParam(3, $email_contato);
$update->bindParam(4, $rede_wpp);
$update->bindParam(5, $rede_inst);
$update->bindParam(6, $rede_face);
$update->bindParam(7, $area_atuante);
$update->bindParam(8, $cargo_prestador);
$update->bindParam(9, $uf_end);
$update->bindParam(10, $cidade_end);
$update->bindParam(11, $cep_end);
$update->bindParam(12, $rua_end);
$update->bindParam(13, $bairro_end);
$update->bindParam(14, $numero_end);
$update->bindParam(15, $complemento_end);
$update->bindParam(16, $nomecomp);
$update->bindParam(17, $dtnasc_user);
$update->bindParam(18, $sexo_user);
$update->bindParam(19, $cpf_user);
$update->bindParam(20, $id_user);

$update->execute();

move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);

}

elseif (empty($_FILES['avatar']['name'])) {
$update = $connect->prepare("UPDATE cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pu ON cd.id_user = pu.id_user INNER JOIN cad_prestador cp ON cd.id_user = cp.id_user SET cd.nome_user = ?, pu.email_contato = ?, pu.rede_wpp = ?, pu.rede_inst = ?, pu.rede_face = ?, cp.area_atuante = ?, cp.cargo_prestador = ?, ed.uf_user = ?, ed.cidade_user = ?, ed.cep_user = ?, ed.rua_user = ?, ed.bairro_user = ?, ed.numcasa_user = ?, ed.comple_user = ?, cd.nomecom_user = ?, cd.dtnasc_user = ?, cd.sexo_user = ?, cd.cpf_user = ? WHERE cd.id_user = ?");

$update->bindParam(1, $nome_user);
$update->bindParam(2, $email_contato);
$update->bindParam(3, $rede_wpp);
$update->bindParam(4, $rede_inst);
$update->bindParam(5, $rede_face);
$update->bindParam(6, $area_atuante);
$update->bindParam(7, $cargo_prestador);
$update->bindParam(8, $uf_end);
$update->bindParam(9, $cidade_end);
$update->bindParam(10, $cep_end);
$update->bindParam(11, $rua_end);
$update->bindParam(12, $bairro_end);
$update->bindParam(13, $numero_end);
$update->bindParam(14, $complemento_end);
$update->bindParam(15, $nomecomp);
$update->bindParam(16, $dtnasc_user);
$update->bindParam(17, $sexo_user);
$update->bindParam(18, $cpf_user);
$update->bindParam(19, $id_user);
    
$update->execute();

}

echo"<meta http-equiv='refresh' content='0;url=perfil_adm_pessoas.php'>"; 
exit;
?>