<?php

include 'connect.php';

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=login.php'>";
   exit;
}

if($_SESSION['tipo_user'] == 2){
	echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
   exit;
}





?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>SERVIÇOS</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout position_head">
      <!-- header -->
      <header style="margin-bottom:-60px;">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="../index.html"><img src="../images/1.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="home.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="aboutlog.php">Sobre</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="pessoas.php">Pessoas</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="listservices.php">Serviços</a>
                              </li>
                              <li class="nav-item login_btn">
                                 <a class="nav-link" href="perfil.php"><img src="../images/user_pt.png" width="30p"></a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- Our  Glasses section -->
      <div class="glasses">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>SERVIÇOS</h2>
                     <br>
                     <form method="POST" action="">
                     <input type="text" placeholder="Procure..." style="width: 300px;" name="buscarserv">
                     <button type="submit"><a class="nav-link" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
                     </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <div class="container-fluid">
            <div class="row">
         
         <?php
         if (empty($_POST['buscarserv'])) {
         $servconsulta = $connect->prepare("SELECT ed.uf_user, ed.cidade_user, pf.avatar_user, cs.id_serv, cs.titulo_serv, cs.status_serv, cs.valor_serv, cs.cargahor_serv, cs.local_serv, cs.tipo_serv, cs.img_serv FROM cad_service cs INNER JOIN perfil_user pf ON cs.id_user = pf.id_user INNER JOIN end_user ed ON cs.id_user = ed.id_user WHERE cs.id_user != ?");
         $servconsulta->bindParam(1, $_SESSION['id_user'], PDO::PARAM_INT);
         $servconsulta->execute();


                     $fetchserv = $servconsulta->fetchAll();

                    foreach($fetchserv as $dadoserv) {
                        $id_serv = $dadoserv['id_serv'];
                        $titulo_serv = $dadoserv['titulo_serv'];
                        $valor_serv = $dadoserv['valor_serv'];
                        $img_serv = $dadoserv['img_serv'];
                        $cargahor_serv = $dadoserv['cargahor_serv'];
                        $local_serv = $dadoserv['local_serv'];
                        $tipo_serv = $dadoserv['tipo_serv'];
                        $avatar_user = $dadoserv['avatar_user'];
                        $cidade_user = $dadoserv['cidade_user'];
                        $uf_estado = $dadoserv['uf_user'];
                        $status_serv = $dadoserv['status_serv'];

                        if ($status_serv == 'Pendente') {

                       
                        echo<<<HTML
                        <a href="solicitacao.php?id_serv=$id_serv">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="service_box" id="service__box">
                     <figure><img src=$img_serv width="300px" alt="#"/></figure>
                     <h3><span class="blu">O</span>$titulo_serv</h3>
                     <h1><b>R$$valor_serv</b></h1>
                     <h4>$cargahor_serv</h4>
                     <h4>$tipo_serv - $cidade_user - $uf_estado</h4>
                     <a href="cad_denserv.php?id_serv=$id_serv"><i class="fa fa-exclamation-circle" style="font-size: 24px; color:black; "></i></a>
                  </div>
               </div>
                    </a>
       HTML;
      }
   }
   }

   else {

         $buscarserv = "%".$_POST['buscarserv']."%";

         $servconsulta = $connect->prepare("SELECT ed.uf_user, ed.cidade_user, pf.avatar_user, cs.id_serv, cs.titulo_serv, cs.status_serv, cs.valor_serv, cs.cargahor_serv, cs.local_serv, cs.tipo_serv, cs.img_serv FROM cad_service cs INNER JOIN perfil_user pf ON cs.id_user = pf.id_user INNER JOIN end_user ed ON cs.id_user = ed.id_user WHERE cs.id_user != :id_user and (cs.titulo_serv LIKE :buscarserv OR cs.id_serv LIKE :buscarserv)");
         $servconsulta->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
         $servconsulta->bindParam(':buscarserv', $buscarserv);
         $servconsulta->execute();


                     $fetchserv = $servconsulta->fetchAll();

                    foreach($fetchserv as $dadoserv) {
                        $id_serv = $dadoserv['id_serv'];
                        $titulo_serv = $dadoserv['titulo_serv'];
                        $valor_serv = $dadoserv['valor_serv'];
                        $img_serv = $dadoserv['img_serv'];
                        $cargahor_serv = $dadoserv['cargahor_serv'];
                        $local_serv = $dadoserv['local_serv'];
                        $tipo_serv = $dadoserv['tipo_serv'];
                        $avatar_user = $dadoserv['avatar_user'];
                        $cidade_user = $dadoserv['cidade_user'];
                        $uf_estado = $dadoserv['uf_user'];
                        $status_serv = $dadoserv['status_serv'];

                        if ($status_serv == 'Pendente') {

                       
                        echo<<<HTML
                        <a href="solicitacao.php?id_serv=$id_serv">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="service_box" id="service__box">
                     <figure><img src=$img_serv width="300px" alt="#"/></figure>
                     <h3><span class="blu">O</span>$titulo_serv</h3>
                     <h1><b>R$$valor_serv</b></h1>
                     <h4>$cargahor_serv</h4>
                     <h4>$tipo_serv - $cidade_user - $uf_estado</h4>
                     <a href="cad_denserv.php?id_serv=$id_serv"><i class="fa fa-exclamation-circle" style="font-size: 24px; color:black; "></i></a>
                  </div>
               </div>
                    </a>
       HTML;
   }
}
   }

?>
            </div>
       </div>
       </div>
      <!-- end Our  Glasses section -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <ul class="location_icon">
                        <li><a href="mailto:contatovnom@gmail.com"><img src="../images/2.png" width="50%"></a></li>
                        </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>® VNOM © 2022 – Todos os direitos reservados.</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->

      <script src="../js/jquery.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../js/custom.js"></script>
      <script src="../js/buscar.js"></script>
   </body>
</html>


