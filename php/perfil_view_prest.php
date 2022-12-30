<?php

include 'connect.php';

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

$id_get = $_GET['id_user'];


$consulta = $connect->prepare("SELECT cd.id_user, cd.nomecom_user, cd.nome_user, cd.tipo_user, pu.avatar_user, pu.email_contato, pu.rede_wpp, pu.rede_inst, pu.rede_face FROM cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pu ON cd.id_user = pu.id_user WHERE cd.id_user = :id_user");
$consulta->bindParam(':id_user', $id_get , PDO::PARAM_INT);
$consulta->execute();


$fetchdata = $consulta->fetchAll();

foreach($fetchdata as $dados) {
    $id_user = $dados['id_user'];
    $nomecomp = $dados['nomecom_user'];
    $nome_user = $dados['nome_user'];
    $tipo_user = $dados['tipo_user'];
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
                <img class="profile-image img-responsive pull-left" src="$avatar_user" width="16%" style="border-radius: 100%; border: 3px solid #fff;"/>
                <div class="profile-content pull-left">
                <h1 class="name">$nome_user</h1>
                <h2 class="desc">Prestador</h2>
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
                ?>
                </ul> 
            </div><!--//profile-->            
   </div><!--//container-->
    </header><!--//header-->

    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
               
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Serviços Solicitados</h2>
                        <div class="content">
                        <?php
           $servconsulta = $connect->prepare("SELECT id_serv, titulo_serv, desc_serv,
           valor_serv, cargahor_serv, tipo_serv, data_serv FROM cad_service WHERE id_user = :id_user");
           $servconsulta->bindParam(':id_user', $id_get, PDO::PARAM_INT);
           $servconsulta->execute();

            $checkservice = $servconsulta->rowCount();

            $fetchserv = $servconsulta->fetchAll();

            if ($checkservice != 0) {

            foreach($fetchserv as $dadoserv) {
                $id_serv = $dadoserv['id_serv'];
                $titulo_serv = $dadoserv['titulo_serv'];
                $valor_serv = $dadoserv['valor_serv'];
                $data_serv = $dadoserv['data_serv'];
                $cargahor_serv = $dadoserv['cargahor_serv'];
                $tipo_serv = $dadoserv['tipo_serv'];
                
                echo<<<HTML
                <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                <h3 class="title">$titulo_serv</h3>
                <p class="summary">R$ $valor_serv - $cargahor_serv</p>
                <p class="summary">$tipo_serv</p>
                HTML;
                if($_SESSION['tipo_user'] != 2) {
                echo<<<HTML
                <p><a class="more-link" href="solicitacao.php?id_serv=$id_serv"><i class="fa fa-gears"></i>Visualizar</a>
                <span style="margin-left:70%;">$data_serv</span></p>
                HTML;
            }
            else {
                echo<<<HTML
                <span>$data_serv</span></p>
                HTML;
            }

            echo<<<HTML
            
            </div><!--//item-->
            HTML;
        }
    }

    else {
        echo<<<HTML
            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                <h3 class="title">Este usuário não possui serviços solicitados.</h3>
            
            </div><!--//item-->
            HTML;
    }
    ?>

                </div><!--//content--> 
                    </div><!--//section-inner-->                 
                        </section><!--//section-->
          
    
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Serviços Realizados</h2>
                        <div class="content">
                          <?php

                          $status_serv = 'Finalizado';

                            $servR = $connect->prepare("SELECT cd.nome_user, cs.id_serv, cs.titulo_serv, cs.valor_serv, cs.cargahor_serv, cs.tipo_serv, cs.data_serv FROM cad_service cs INNER JOIN service_info si ON cs.id_serv = si.id_serv INNER JOIN cad_user cd ON cd.id_user = si.id_cliente WHERE cs.status_serv = ? and cs.id_user = ?");
                            $servR->bindParam(1, $status_serv, PDO::PARAM_STR);
                            $servR->bindParam(2, $id_get, PDO::PARAM_INT);
                            $servR->execute();

                            $checkservR = $servR->rowCount();

                            $fetchservR = $servR->fetchAll();

                            if ($checkservR != 0) {

                            foreach($fetchservR as $dadoserv) {
                                $id_serv = $dadoserv['id_serv'];
                                $titulo_serv = $dadoserv['titulo_serv'];
                                $valor_serv = $dadoserv['valor_serv'];
                                $data_serv = $dadoserv['data_serv'];
                                $cargahor_serv = $dadoserv['cargahor_serv'];
                                $tipo_serv = $dadoserv['tipo_serv'];
                                $cliente = $dadoserv['nome_user'];
                            

                                echo<<<HTML
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                                <h3 class="title">$titulo_serv</h3>
                                <p class="summary">R$ $valor_serv - $cargahor_serv</p>
                                <p class="summary">$tipo_serv</p>
                                <h5>Cliente: $cliente</h5> <span>$data_serv</span>
                            </div><!--//item-->
                            HTML;
                        }
                    }

                    else {
                    
                                echo<<<HTML
                                    <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                                    <h3 class="title">Este usuário não possui serviços realizados.</h3>
                                        </div><!--//item-->
                                    HTML;

                    }
    
                        echo<<<HTML
                            </div><!--//content-->  
                            </div><!--//section-inner-->                 
                            </section><!--//section--> 
                            </div><!--//primary-->
                            <div class="secondary col-md-4 col-sm-12 col-xs-12">
                            <aside class="info aside section">
                            <div class="section-inner">
                            <h2 class="heading sr-only">Basic Information</h2>
                            <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-exclamation-circle"></i><a class="more-link" href="cad_denuncia.php?nome_user=$nome_user">Denunciar Usuário</a></li>
                                <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                            </ul>
                            HTML;
                            ?>
                        </div><!--//content--> 
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->

                            </ul>
                        </div>
                    </div>
                </aside>
       
             
               
                
              
  
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

