<?php

include 'connect.php';

session_start();

$id_serv = $_POST['id_serv'];


$titulo_serv = $_POST['titulo_serv'];
$desc_serv = $_POST['descricao_serv'];
$cargahor_serv = $_POST['cargahor_serv'];
$valor_serv = $_POST['valor_serv'];
$equipamento = $_POST['equipamento_serv'];
$categoria = $_POST['categoria_serv'];

if ($categoria == 'EDUCAÇÃO E CULTURA') {
    $img_serv = '../images/servicesimg/EDUCAÇÃO_E_CULTURA.png';
}

elseif ($categoria == 'ESTÉTICA E BELEZA') {
    $img_serv = '../images/servicesimg/ESTÉTICA_E_BELEZA.png';
}

elseif ($categoria == 'LIMPEZA E CONSERVAÇÃO') {
    $img_serv = '../images/servicesimg/LIMPEZA_E_CONSERVAÇÃO.png';
}

elseif ($categoria == 'REFORMAS E SERVIÇOS GERAIS') {
    $img_serv = '../images/servicesimg/REFORMAS_E_SERVIÇOS_GERAIS.png';
}

elseif ($categoria == 'MANUTENÇÃO AUTOMOTIVA') {
    $img_serv = '../images/servicesimg/MANUTENÇÃO_AUTOMOTIVA.png';
}

elseif ($categoria == 'FESTAS E EVENTOS') {
    $img_serv = '../images/servicesimg/FESTAS_E_EVENTOS.png';
}

elseif ($categoria == 'SAÚDE E BEM ESTAR') {
    $img_serv = '../images/servicesimg/SAUDE_E_BEM_ESTAR.png';
}

elseif ($categoria == 'TECNOLOGIA') {
    $img_serv = '../images/servicesimg/TECNOLOGIA.png';
}

elseif ($categoria == 'OUTRO') {
    $img_serv = '../images/servicesimg/OUTRO.png';
}

elseif ($categoria == 'TRANSPORTE') {
    $img_serv = '../images/servicesimg/TRANSPORTE.png';
}


if (isset($_POST['data_prazo'])) {
    $prazo = $_POST['data_prazo'];
}

elseif (!isset($_POST['data_prazo'])) {
    $prazo = $_POST['prazo_serv'];
}

if (isset($_POST['atendimento_serv']) and isset($_POST['local_serv'])) {
    $atendimento = $_POST['atendimento_serv'];
    $local = $_POST['local_serv'];
}

elseif (isset($_POST['atendimento_serv']) and !isset($_POST['local_serv'])) {
    $atendimento = $_POST['atendimento_serv'];
    $local = 'Remoto';
}


$sqlupdate = $connect->prepare("UPDATE cad_service SET titulo_serv = ?, desc_serv = ?, valor_serv = ?, cargahor_serv = ?, datapraz_serv = ?, categoria_serv = ?, tipo_serv = ?, local_serv = ?, equipamento_serv = ?, img_serv = ? WHERE id_serv = ?");


$sqlupdate->bindParam(1, $titulo_serv, PDO::PARAM_STR);
$sqlupdate->bindParam(2, $desc_serv, PDO::PARAM_STR);
$sqlupdate->bindParam(3, $valor_serv, PDO::PARAM_STR);
$sqlupdate->bindParam(4, $cargahor_serv, PDO::PARAM_STR);
$sqlupdate->bindParam(5, $prazo, PDO::PARAM_STR);
$sqlupdate->bindParam(6, $categoria, PDO::PARAM_STR);
$sqlupdate->bindParam(7, $atendimento, PDO::PARAM_STR);
$sqlupdate->bindParam(8, $local, PDO::PARAM_STR);
$sqlupdate->bindParam(9, $equipamento, PDO::PARAM_STR);
$sqlupdate->bindParam(10, $img_serv, PDO::PARAM_STR);
$sqlupdate->bindParam(11, $id_serv, PDO::PARAM_STR);

$sqlupdate->execute();


echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";








?>