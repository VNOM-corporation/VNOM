<?php

include 'connect.php';

session_start();


if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=login.php'>";
   exit;
}

$consultar = $connect->prepare("SELECT nome_user FROM cad_user WHERE id_user = ?");
$consultar->bindParam(1, $_SESSION['id_user']);
$consultar->execute();

$fetch = $consultar->fetchAll();

foreach($fetch as $dados) {
   $user_log = $dados['nome_user'];
}



?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>PESSOAS</title>
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
      <header>
         <!-- header inner -->
         <div class="header" style="margin-bottom:-60px;">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="home.php"><img src="../images/1.png" alt="#" /></a>
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
                              <li class="nav-item active">
                                 <a class="nav-link" href="pessoas.php">Pessoas</a>
                              </li>
                              <li class="nav-item">
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
                     <h2>PESSOAS</h2>
                     <br>
                     <form method="POST" action="">
                     <input type="text" placeholder="Procure..." style="width: 300px;" name="buscarpessoas">
                     <button type="submit"><a class="nav-link" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
                     </button>
                     </form>
                     <!-- Alguma coisa para identificar os prestadores-->
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <?php

               if(empty($_POST['buscarpessoas'])) {
               $tipo_user = 3;
               $tipo_user_adm = 1;

               $people = $connect->prepare("SELECT cd.id_user, pf.avatar_user, cd.nome_user, cp.cargo_prestador FROM cad_user cd INNER JOIN perfil_user pf ON cd.id_user = pf.id_user INNER JOIN cad_prestador cp ON cd.id_user = cp.id_user WHERE (cd.nome_user <> ? and cd.tipo_user <> ? and cd.tipo_user = ?)");
               $people->bindParam(1, $user_log, PDO::PARAM_STR);
               $people->bindParam(2, $tipo_user_adm, PDO::PARAM_INT);
               $people->bindParam(3, $tipo_user, PDO::PARAM_INT);
               $people->execute();

               $fetchpeople = $people->fetchAll();

                    foreach($fetchpeople as $dadosp) {
                        $id_user = $dadosp['id_user'];
                        $avatar_user = $dadosp['avatar_user'];
                        $cargo_prest = $dadosp['cargo_prestador'];
                        $nome_user = $dadosp['nome_user'];
                        
                        echo<<<HTML
                        <a href='perfil_view_prest.php?id_user=$id_user'>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="glasses_box">
                              <figure><img src="$avatar_user" alt="#"/></figure>
                              <h3><span class="blu">O</span>$nome_user</h3>
                              <p><span><i class="fa fa-gears" style="color:#03989E"></i></span> Prestador</p>
                              <br>
                              <div><h1 class="blu">$cargo_prest</h1></div>
                              <a href='cad_denuncia.php?nome_user=$nome_user'><i class="fa fa-exclamation-circle" style="font-size: 24px; color:black;"></i></a>
                           </div>
                           </div>
                           </a>
                   HTML;
                  }
               }

               else {

               $tipo_user = 3;
               $tipo_user_adm = 1;

               $buscarpessoas = "%".$_POST['buscarpessoas']."%";


               $people = $connect->prepare("SELECT cd.id_user, pf.avatar_user, cd.nome_user, cp.cargo_prestador FROM cad_user cd INNER JOIN perfil_user pf ON cd.id_user = pf.id_user INNER JOIN cad_prestador cp ON cd.id_user = cp.id_user WHERE cd.tipo_user = :tipo_user and cd.tipo_user != :tipo_user_adm and cd.nome_user <> :nome_user and (cd.id_user LIKE :buscarpessoas OR cd.nome_user LIKE :buscarpessoas)");
               $people->bindParam(':tipo_user', $tipo_user, PDO::PARAM_INT);
               $people->bindParam(':tipo_user_adm', $tipo_user_adm, PDO::PARAM_INT);
               $people->bindParam(':nome_user', $user_log, PDO::PARAM_STR);
               $people->bindParam(':buscarpessoas', $buscarpessoas);
               $people->execute();

               $fetchpeople = $people->fetchAll();

               $rowpeople = $people->rowCount();

               if($rowpeople > 0) {

                    foreach($fetchpeople as $dadosp) {
                        $id_user = $dadosp['id_user'];
                        $avatar_user = $dadosp['avatar_user'];
                        $cargo_prest = $dadosp['cargo_prestador'];
                        $nome_user = $dadosp['nome_user'];
                        
                        echo<<<HTML
                        <a href='perfil_view_prest.php?id_user=$id_user'>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="glasses_box">
                              <figure><img src="$avatar_user" alt="#"/></figure>
                              <h3><span class="blu">O</span>$nome_user</h3>
                              <p><span><i class="fa fa-gears" style="color:#03989E"></i></span> Prestador</p>
                              <br>
                              <div><h1 class="blu">$cargo_prest</h1></div>
                              <a href='cad_denuncia.php?nome_user=$nome_user'><i class="fa fa-exclamation-circle" style="font-size: 24px; color:black;"></i></a>
                           </div>
                           </div>
                           </a>
                   HTML;
                  }
               }
               }
               
             
                  ?>
               <!-- <div class="col-md-12">
                  <a class="read_more" href="#">Mais</a>
               </div> -->
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
   </body>
</html>

