<?php

include 'connect.php';

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$logar = $connect->prepare("SELECT * FROM cad_user cd WHERE (cd.email_user = :logar OR cd.nome_user = :logar)");
$logar->bindParam(':logar', $login, PDO::PARAM_STR);
$logar->execute();

$fetchlog = $logar->fetchAll();


foreach($fetchlog as $dados) {
    $id_user = $dados['id_user'];
    $nomecomp = $dados['nomecom_user'];
    $nome_user = $dados['nome_user'];
    $cpf_user = $dados['cpf_user'];
    $dtnasc_user = $dados['dtnasc_user'];
    $sexo_user = $dados['sexo_user'];
    $celular_user = $dados['celular_user'];
    $email_user = $dados['email_user'];
    $senha_user = $dados['senha_user'];
    $tipo_user = $dados['tipo_user'];
    $status_user = $dados['status_user'];

}

$prest = $connect->prepare("SELECT * FROM cad_prestador WHERE id_user = ?");
$prest->bindParam(1, $id_user, PDO::PARAM_INT);
$prest->execute();

$fetchprest = $prest->fetchAll();

foreach($fetchprest as $dados) {
    $id_prestador = $dados['id_prestador'];
}

$cad = $logar->rowCount();

// Usuário Admin = 1
If ($cad == 1 and password_verify($password, $senha_user) and $tipo_user == 1 and $tipo_user != 4) {
    $_SESSION['id_user'] = $id_user;
    $_SESSION['nomecom_user'] = $nomecomp;
    $_SESSION['nome_user'] = $nome_user;
    $_SESSION['cpf_user'] = $cpf_user;
    $_SESSION['dtnasc_user'] = $dtnasc_user;
    $_SESSION['sexo_user'] = $sexo_user;
    $_SESSION['celular_user'] = $celular_user;
    $_SESSION['email_user'] = $email_user;
    $_SESSION['tipo_user'] = $tipo_user;
    $_SESSION['logado'] = true;


    echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

// Usuário Membro = 2
elseif ($cad == 1 and password_verify($password, $senha_user) and $tipo_user == 2 and $tipo_user != 4) {
    $_SESSION['id_user'] = $id_user;
    $_SESSION['nomecom_user'] = $nomecomp;
    $_SESSION['nome_user'] = $nome_user;
    $_SESSION['cpf_user'] = $cpf_user;
    $_SESSION['dtnasc_user'] = $dtnasc_user;
    $_SESSION['sexo_user'] = $sexo_user;
    $_SESSION['celular_user'] = $celular_user;
    $_SESSION['email_user'] = $email_user;
    $_SESSION['tipo_user'] = $tipo_user;
    $_SESSION['logado'] = true;

    echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

// Usuário Profissional = 3
elseif ($cad == 1 and password_verify($password, $senha_user) and $tipo_user == 3 and $tipo_user != 4) {
    $_SESSION['id_user'] = $id_user;
    $_SESSION['nomecom_user'] = $nomecomp;
    $_SESSION['nome_user'] = $nome_user;
    $_SESSION['cpf_user'] = $cpf_user;
    $_SESSION['dtnasc_user'] = $dtnasc_user;
    $_SESSION['sexo_user'] = $sexo_user;
    $_SESSION['celular_user'] = $celular_user;
    $_SESSION['email_user'] = $email_user;
    $_SESSION['tipo_user'] = $tipo_user;
    $_SESSION['id_prestador'] = $id_prestador;
    $_SESSION['logado'] = true;
    

    echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

elseif ($tipo_user == 4) {
    echo"<meta http-equiv='refresh' content='0;url=login_suspenso.php'>";
    exit;
}

else {
    $_SESSION = array();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=login_error.php'>";
    exit;
}

?>