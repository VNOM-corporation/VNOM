<?php

session_start();

include 'connect.php';

if (!isset($_SESSION['nomecomp']) and !isset($_SESSION['cpf_user']) and !isset($_SESSION['dtnasc_user']) and !isset($_SESSION['sexo_user']) and !isset($_SESSION['uf_estado']) and !isset($_SESSION['cidade_user']) and !isset($_SESSION['cep_user']) and !isset($_SESSION['rua_user']) and !isset($_SESSION['bairro_user']) and !isset($_SESSION['numero_user']) and !isset($_SESSION['complemento_user']) and !isset($_SESSION['nome_user']) and !isset($_SESSION['email_user']) and !isset($_SESSION['senha_user']) and !isset($_SESSION['celular_user'])) {
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}



// Dados Pessoais
$nomecomp = $_SESSION['nomecomp'];
$cpf_user = $_SESSION['cpf_user'];
$dtnasc_user = $_SESSION['dtnasc_user'];
$sexo_user = $_SESSION['sexo_user'];

// Endereço

$uf_end = $_SESSION['uf_estado'];
$cidade_end = $_SESSION['cidade_user'];
$cep_end = $_SESSION['cep_user'];
$rua_end = $_SESSION['rua_user'];
$bairro_end = $_SESSION['bairro_user'];
$numero_end = $_SESSION['numero_user'];
$complemento_end = $_SESSION['complemento_user'];

// Dados do Usuário

$nome_user = $_SESSION['nome_user'];
$email_user = $_SESSION['email_user'];
$senha_user = $_SESSION['senha_user'];
$celular_user = $_SESSION['celular_user'];
$hash_pass = password_hash($senha_user, PASSWORD_DEFAULT);

// Avatar


$avatar = "../avatar/" . $_SESSION['name_avatar'];

// Redes Sociais

if (isset($_SESSION['email_contato'])) {
    $email_contato = $_SESSION['email_contato'];
}

if (isset($_SESSION['rede_wpp'])) {
    $rede_wpp = $_SESSION['rede_wpp'];
}

if (isset($_SESSION['rede_inst'])) {
    $rede_inst = $_SESSION['rede_inst'];
}

if (isset($_SESSION['rede_face'])) {
    $rede_face = $_SESSION['rede_face'];
}



// Verificação de dados repetidos 

$testuser = $connect->prepare("SELECT * FROM cad_user WHERE nome_user = :nome_user");
$testuser->execute(array('nome_user' => $nome_user));
$checkuser = $testuser->rowCount();

$testemail = $connect->prepare("SELECT * FROM cad_user WHERE email_user = :email_user");
$testemail->execute(array('email_user' => $email_user));
$checkemail = $testemail->rowCount();

$testcpf = $connect->prepare("SELECT * FROM cad_user WHERE cpf_user = :cpf_user");
$testcpf->execute(array('cpf_user' => $cpf_user));
$checkcpf = $testcpf->rowCount();

// Envio de Dados pro BD e verificando captcha
// if ($_POST['g-recaptcha-response'] != "") {
//     $secret = '6LcbfTsjAAAAALd78ylwpSvgLhXaabCGrLpru-Q0';
//     $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
//     $responseData = json_decode($verifyResponse);

if ($checkuser == 0 and $checkemail == 0 and $checkcpf == 0) {
    // Inserindo dados do usuário
    $sqluser = $connect->prepare("INSERT INTO cad_user (id_user, nomecom_user, nome_user, cpf_user, dtnasc_user, sexo_user, celular_user, email_user, senha_user, tipo_user, status_user) VALUES (null, :nomecom_user, :nome_user, :cpf_user, :dtnasc_user, :sexo_user, :celular_user, :email_user, :senha_user, :tipo_user, :status_user)");
    $sqluser->execute(array('nomecom_user' => $nomecomp, 'nome_user' => $nome_user, 'cpf_user' => $cpf_user, 'dtnasc_user' => $dtnasc_user, 'sexo_user' => $sexo_user, 'celular_user' => $celular_user, 'email_user' => $email_user, 'senha_user' => $hash_pass, 'tipo_user' => 2, 'status_user' => 'Ativo'));

    


    // Consultando o usuário que acabou de se cadastrar

    $consulta = $connect->prepare("SELECT * FROM cad_user WHERE nome_user = :nome_user");
    $consulta->execute(array('nome_user' => $nome_user));

    $fetchuser = $consulta->fetchAll();

    foreach($fetchuser as $item) {
      $id_user = $item['id_user'];
    
    // Inserindo endereço do usuário

    $sqlend = $connect->prepare("INSERT INTO end_user (id_end, id_user, cep_user, cidade_user, UF_user, rua_user, numcasa_user, bairro_user, comple_user) VALUES (null, :id_user, :cep_user, :cidade_user, :UF_user, :rua_user, :numcasa_user, :bairro_user, :comple_user)");
    $sqlend->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $sqlend->bindParam(':cep_user', $cep_end);
    $sqlend->bindParam(':cidade_user', $cidade_end);
    $sqlend->bindParam(':UF_user', $uf_end);
    $sqlend->bindParam(':rua_user', $rua_end);
    $sqlend->bindParam(':numcasa_user', $numero_end);
    $sqlend->bindParam(':bairro_user', $bairro_end);
    $sqlend->bindParam(':comple_user', $complemento_end);
    
    $sqlend->execute();

    // Inserindo dados de Perfil
    // if (isset($_SESSION['email_contato']) and isset($_SESSION['rede_wpp']) and isset($_SESSION['rede_inst']) and isset($_SESSION['rede_face'])) {
    $sqlperfil = $connect->prepare("INSERT INTO perfil_user (id_perfil, id_user, avatar_user, email_contato, rede_wpp, rede_inst, rede_face) VALUES (null, :id_user, :avatar_user, :email_contato, :rede_wpp, :rede_inst, :rede_face)");
    $sqlperfil->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $sqlperfil->bindParam(':avatar_user', $avatar, PDO::PARAM_STR);

    if (isset($_SESSION['email_contato'])) {
    $sqlperfil->bindParam(':email_contato', $email_contato, PDO::PARAM_STR);
    }

    else {
        $sqlperfil->bindParam(':email_contato', null, PDO::PARAM_STR);
    }

    if (isset($_SESSION['rede_wpp'])) {
    $sqlperfil->bindParam(':rede_wpp', $rede_wpp, PDO::PARAM_STR);
    }

    else {
        $sqlperfil->bindParam(':rede_wpp', null, PDO::PARAM_STR);
    }
    
    if (isset($_SESSION['rede_inst'])) {
    $sqlperfil->bindParam(':rede_inst', $rede_inst, PDO::PARAM_STR);
    }
    
    else {
        $sqlperfil->bindParam(':rede_inst', null, PDO::PARAM_STR);
    }

    if (isset($_SESSION['rede_face'])) {
    $sqlperfil->bindParam(':rede_face', $rede_face, PDO::PARAM_STR);
    }

    else {
        $sqlperfil->bindParam(':rede_face', null, PDO::PARAM_STR);
    }

    
    $sqlperfil->execute();

    }

    rename($_SESSION['avatar_tmp'], "../avatar/" . $_SESSION['name_avatar']);

    echo"<meta http-equiv='refresh' content='0;url=login.php'>"; 

    }
// }


elseif ($checkemail == 1 and $checkuser == 1 and $checkcpf == 1) {
    echo"<meta http-equiv='refresh' content='0;url=cadastroerror.php'>";
    exit;
}

elseif ($checkemail == 1) {
    echo"<meta http-equiv='refresh' content='0;url=cadastroerror.php'>";
    exit;
}


elseif ($checkuser == 1) {
    echo"<meta http-equiv='refresh' content='0;url=cadastroerror.php'>";
    exit;
}

elseif ($checkcpf == 1) {
    echo"<meta http-equiv='refresh' content='0;url=cadastroerror.php'>";
    exit;
}
?>
