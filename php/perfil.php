<?php

include 'connect.php';

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}


if ($_SESSION['tipo_user'] == 1) {
    echo"<meta http-equiv='refresh' content='0;url=perfil_adm_pessoas.php'>";
    exit;
}

if ($_SESSION['tipo_user'] == 3) {
    echo"<meta http-equiv='refresh' content='0;url=perfil_prest.php'>";
    exit;
}



$consulta = $connect->prepare("SELECT cd.id_user, cd.nomecom_user, cd.nome_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, cd.celular_user, cd.email_user, cd.senha_user, cd.tipo_user, ed.id_end, ed.cep_user, ed.cidade_user, ed.UF_user, ed.rua_user, ed.numcasa_user, ed.bairro_user, ed.comple_user, pu.id_perfil, pu.avatar_user, pu.email_contato, pu.rede_wpp, pu.rede_inst, pu.rede_face FROM cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pu ON cd.id_user = pu.id_user WHERE cd.id_user = :id_user");
$consulta->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
$consulta->execute();


$fetchdata = $consulta->fetchAll();

foreach($fetchdata as $dados) {
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
    $id_end = $dados['id_end'];
    $cep_user = $dados['cep_user'];
    $cidade_user = $dados['cidade_user'];
    $uf_user = $dados['UF_user'];
    $rua_user = $dados['rua_user'];
    $numcasa_user = $dados['numcasa_user'];
    $bairro_user = $dados['bairro_user'];
    $complemento_user = $dados['comple_user'];
    $id_perfil = $dados['id_perfil'];
    $avatar_user = $dados['avatar_user'];
    $email_contato = $dados['email_contato'];
    $rede_wpp = $dados['rede_wpp'];
    $rede_inst = $dados['rede_inst'];
    $rede_face = $dados['rede_face'];
}


$num_wpp = str_replace(array('+', '(', ')', '-'), '', $rede_wpp);
$user_inst = str_replace(array('@'), '', $rede_inst)


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>VNOM</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Website landing Page for Developers">
    <meta name="author" content="3rd Wave Media">    
    <link rel="shortcut icon" href="../images/fevicon.png">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="../fonts/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    <!-- github acitivity css -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
    <link rel="stylesheet" href="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.css">
    
 
    <link id="theme-style" rel="stylesheet" href="../css/styles.css">
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">
            <?php
            echo<<<HTML
                <img class="profile-image img-responsive pull-left" src=$avatar_user width="16%" style="border-radius: 100%; border: 3px solid #fff; object-fit:cover; object-position:center;"/>
                <div class="profile-content pull-left">
                <h1 class="name">$nome_user</h1>
                <h2 class="desc">Usuário</h2>
                <ul class="social list-inline">
                HTML;

                if ($email_contato != '' and $email_contato != 'NULL') {
                    echo<<<HTML
                    <li><a href="mailto:$email_contato"><i class="fa fa-envelope-o"></i></a></li>
                    HTML;
                }
                if ($rede_wpp != '' and $rede_wpp != 'NULL') {
                    echo<<<HTML
                    <li><a href="https://api.whatsapp.com/send?phone=$num_wpp"><i class="fa fa-whatsapp"></i></a></li> 
                    HTML;
                }
                if ($rede_inst != '' and $rede_inst != 'NULL') {
                    echo<<<HTML
                    <li><a href="https://www.instagram.com/$user_inst/"><i class="fa fa-instagram"></i></a></li>   
                    HTML;
                }
                if ($rede_face != '' and $rede_face != 'NULL') {
                    echo<<<HTML
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>  
                    HTML;
                }
                
                echo<<<HTML
                                                        
                </ul> 
            </div><!--//profile-->
            HTML;  

            $prest = $connect->prepare("SELECT * FROM cad_prestador WHERE id_user = ?");
            $prest->bindParam(1, $_SESSION['id_user'], PDO::PARAM_INT);
            $prest->execute();

            $verify = $prest->rowCount();

            if ($verify == 0) {
                echo<<<HTML
                <a class="btn btn-cta-primary pull-right" href="cadastro_termos_prest.php"><i class="fa fa-gears"></i> Tornar-se prestador</a>
                HTML;
            }
            ?>
        </div><!--//container-->
    </header><!--//header-->
    <?php
               
   
 $servconsulta = $connect->prepare("SELECT id_serv, titulo_serv, desc_serv,
    valor_serv, cargahor_serv, datapraz_serv, categoria_serv, tipo_serv, local_serv,
    equipamento_serv, img_serv, status_serv, data_serv FROM cad_service WHERE id_user = :id_user and status_serv != 'Finalizado'");
    $servconsulta->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
    $servconsulta->execute();
    $checkservice = $servconsulta->rowCount();

    if ($checkservice != 0) {
        $fetchserv = $servconsulta->fetchAll();
        echo<<<HTML
        <div class="container sections-wrapper">
        <div class="row">
        <div class="primary col-md-8 col-sm-12 col-xs-12">
        <section class="projects section">
        <div class="section-inner">
        <h2 class="heading">Serviços</h2>
        HTML;
        
        foreach($fetchserv as $dadoserv) {
            $id_serv = $dadoserv['id_serv'];
            $titulo_serv = $dadoserv['titulo_serv'];
            $valor_serv = $dadoserv['valor_serv'];
            $data_serv = $dadoserv['data_serv'];
            $cargahor_serv = $dadoserv['cargahor_serv'];
            
            echo<<<HTML
            <div class="content">
            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
            <h3 class="title">$titulo_serv</h3>
            <p class="summary">R$$valor_serv - $cargahor_serv</p>
            <p><a class="more-link" href="cadservicealt.php?id_serv=$id_serv"><i class="fa fa-pencil"></i>Editar</a>
            <a class="more-link" href="delservice.php?id_serv=$id_serv" onclick="return confirm('Quer mesmo excluir esse serviço?');" style="margin-left:20px;"><i class="fa fa-trash"></i>Excluir</a>
            <span style="margin-left:60%;">$data_serv</span></p>
            HTML;
        
        echo<<<HTML
        </div><!--//item-->
        </div><!--//content-->
        HTML;
        }
        echo<<<HTML
        <a class="btn btn-cta-secondary" href="cadservice.php">Solicitar <i class="fa fa-plus"></i></a> 
        </div><!--//section-inner-->                
        </section><!--//section-->
        </div><!--//primary-->
        HTML;
   
    }

    else { 
        echo<<<HTML
            <div class="container sections-wrapper">
            <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Serviços</h2>
                        <div class="content">
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                                <h3 class="title">Você não possui nenhum serviço solicitado</h3>
                            </div><!--//item-->
                        </div><!--//content--> 
                        <a class="btn btn-cta-secondary" href="cadservice.php">Solicitar <i class="fa fa-plus"></i></a>  
                    </div><!--//section-inner-->                 
                </section><!--//section-->

            </div><!--//primary-->
        HTML;

 }

 echo<<<HTML
            <div class="secondary col-md-4 col-sm-12 col-xs-12">
                 <aside class="info aside section">
                    <div class="section-inner">
                        <h2 class="heading sr-only">Basic Information</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-pencil"></i><a class="more-link" href="perfil_edit.php">Editar meus dados</a></li>
                                <li><i class="fa fa-trash"></i><a href="deluser.php?id_user=$id_user" onclick="return confirm('Quer mesmo excluir esse usuário?')">Excluir conta</a></li>
                                <li><i class="fa fa-sign-out"></i><a href="logout.php">Sair</a></li>
                                <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                            </ul>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->

                            </ul>
                        </div>
                    </div>
                </aside>
                       
HTML;
                                ?>
       
             
  
    <!-- Javascript -->          
    <script type="text/javascript" src="../plugins/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="../plugins/jquery-rss/dist/jquery.rss.min.js"></script> 
    <!-- github activity plugin -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
    <script type="text/javascript" src="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="../js/main2.js"></script>            
</body>
</html> 

