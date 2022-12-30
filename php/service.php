<?php

include 'connect.php';

session_start();

$id_user = $_SESSION['id_user'];
$nome_user = $_SESSION['nome_user'];

$titulo_serv = $_POST['titulo_serv'];
$desc_serv = $_POST['descricao_serv'];
$cargahor_serv = $_POST['cargahor_serv'];
$valor_serv = $_POST['valor_serv'];
$equipamento = $_POST['equipamento_serv'];
$status_serv = 'Pendente';
$datatual = date('d/m/Y');


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


// $extension = strtolower(substr($_FILES['img_serv']['name'], -4));
// $nameserv = $nome_user . $titulo_serv . $extension;
// $imgdirect = "../images/services/";
// $imgserv = $imgdirect . $nameserv;


$sqlconsult = $connect->prepare("SELECT * FROM cad_user INNER JOIN end_user ON cad_user.id_user = end_user.id_user WHERE cad_user.id_user = ?");
$sqlconsult->bindParam(1, $id_user); 
$sqlconsult->execute();

$fetchconsult = $sqlconsult->fetchAll();

$usercount = $sqlconsult->rowCount();

if ($usercount == 1 and isset($_POST['local_serv']) and isset($_POST['atendimento_serv'])) {

foreach($fetchconsult as $dados) {
    $id_userbd = $dados['id_user'];
    $id_end = $dados['id_end'];


$sqlserv = $connect->prepare("INSERT INTO cad_service (id_serv, id_user, id_end, titulo_serv, desc_serv, valor_serv, cargahor_serv, datapraz_serv, categoria_serv, tipo_serv, local_serv, equipamento_serv, img_serv, status_serv, data_serv) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$sqlserv->bindParam(1, $id_userbd, PDO::PARAM_INT);
$sqlserv->bindParam(2, $id_end, PDO::PARAM_INT);
$sqlserv->bindParam(3, $titulo_serv, PDO::PARAM_STR);
$sqlserv->bindParam(4, $desc_serv, PDO::PARAM_STR);
$sqlserv->bindParam(5, $valor_serv, PDO::PARAM_STR);
$sqlserv->bindParam(6, $cargahor_serv, PDO::PARAM_STR);
$sqlserv->bindParam(7, $prazo, PDO::PARAM_STR);
$sqlserv->bindParam(8, $categoria, PDO::PARAM_STR);
$sqlserv->bindParam(9, $atendimento, PDO::PARAM_STR);
$sqlserv->bindParam(10, $local, PDO::PARAM_STR);
$sqlserv->bindParam(11, $equipamento, PDO::PARAM_STR);
$sqlserv->bindParam(12, $img_serv, PDO::PARAM_STR);
$sqlserv->bindParam(13, $status_serv, PDO::PARAM_STR);
$sqlserv->bindParam(14, $datatual, PDO::PARAM_STR);
$sqlserv->execute();

}

// move_uploaded_file($_FILES['img_serv']['tmp_name'], $imgserv);
echo"<meta http-equiv='refresh' content='0;url=../php/perfil.php'>";

}

// elseif ($usercount == 1 and !isset($_POST['local_serv']) and isset($_POST['atendimento_serv'])) {


// foreach($fetchconsult as $dados) {
//     $id_userbd = $dados['id_user'];
//     $id_end = $dados['id_end'];

// $sqlserv = $connect->prepare("INSERT INTO cad_service (id_serv, id_user, id_end, titulo_serv, desc_serv, valor_serv, cargahor_serv, datapraz_serv, categoria_serv, tipo_serv, local_serv, equipamento_serv, img_serv, status_serv, data_serv) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, null, ?, ?, ?, ?, ?)");

// $sqlserv->bindParam(1, $id_userbd, PDO::PARAM_INT);
// $sqlserv->bindParam(2, $id_end, PDO::PARAM_INT);
// $sqlserv->bindParam(3, $titulo_serv, PDO::PARAM_STR);
// $sqlserv->bindParam(4, $desc_serv, PDO::PARAM_STR);
// $sqlserv->bindParam(5, $valor_serv, PDO::PARAM_STR);
// $sqlserv->bindParam(6, $cargahor_serv, PDO::PARAM_STR);
// $sqlserv->bindParam(7, $prazo, PDO::PARAM_STR);
// $sqlserv->bindParam(8, $categoria, PDO::PARAM_STR);
// $sqlserv->bindParam(9, $atendimento, PDO::PARAM_STR);
// $sqlserv->bindParam(10, $equipamento, PDO::PARAM_STR);
// $sqlserv->bindParam(11, $img_serv, PDO::PARAM_STR);
// $sqlserv->bindParam(12, $status_serv, PDO::PARAM_STR);
// $sqlserv->bindParam(13, $datatual, PDO::PARAM_STR);

// $sqlserv->execute();

// }

// // move_uploaded_file($_FILES['img_serv']['tmp_name'], $imgserv);
// echo"<meta http-equiv='refresh' content='5;url=../php/cadservice.php'>";
// }





?>
