<?php

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=about.php'>";
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
      <title>SOBRE</title>
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
                              <li class="nav-item active">
                                 <a class="nav-link" href="aboutlog.php">Sobre</a>
                              </li>
                              <?php
                              if ($_SESSION['tipo_user'] != 1) {
                              echo<<<HTML
                              <li class="nav-item">
                                 <a class="nav-link" href="pessoas.php">Pessoas</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="listservices.php">Serviços</a>
                              </li>
                              HTML;
                           }
                           ?>
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
      <br>
      <!-- end header inner -->
      <!-- end header -->
      <!-- about section -->
      <div class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="about_img">
                     <figure><img src="../images/sobre_img.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Quem somos</h2>
                     <p>A VNOM é uma empresa que foi criada com o intuito de ajudar aqueles que buscam inserção no mercado de trabalho, experiência para o currículo ou renda de trabalho autônomo.
                        </p>
                        <br>
                     <h2>Por que VN<span class="blu">O</span>M?</h2>
                     <p>O nome se refere à inicial de cada um dos <a href="#integrantes" style="color:aqua;">integrantes</a> que criaram o projeto. Com uma pronúncia simples e sofisticada busca fazer digno o trabalho autônomo assim como qualquer outro trabalho formal.
                     </p>
                     <br>
                     <h2>Nosso Design</h2>
                     <p>Com um tema claro e minimalista buscamos ambientalizar uma plataforma objetiva e de fácil entendimento para nossos usuários. A escolha da variação do azul escuro e verde ciano diz respeito ao trabalho remunerado e confiabilidade.
                     </p>
                  </div>          
               </div>
            </div>
         </div>
      </div>

         <div class="glasses">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <div class="titlepage">
                        <video style="width: 100%;" autoplay muted loop controls="controls" autoplay="autoplay">
                           <source src="../media/Video.mp4" type="video/mp4">
                           </object>
                           </video>
                           <br></br>
                           <br></br>
                           <h2 id="integrantes">Nossa Equipe</h2>   
                           <p>Conheça nossos perfis</p>                          
                     </div>
                  </div>
               </div>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <a href="https://instagram.com/vmarquexc" target="_blank">
                     <div class="glasses_box">
                        <figure><img src="../images/perfil_equip/vitoria_perfil.jpg" alt="#" style="border-radius: 100%;"/></figure>
                        <h3><span class="blu">V</span>itória</h3>
                        <p>Documentação</p>
                  
                     </div>
                  </div>
                     </a>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <a href="https://instagram.com/vnorgang" target="_blank">
                     <div class="glasses_box">
                        <figure><img src="../images/perfil_equip/norgang_perfil.jpg" alt="#" style="border-radius: 100%; border:none;"/></figure>
                        <h3><span class="blu">N</span>organg</h3>
                        <p>Front-end</p>

                     </div>
                  </div>
                     </a>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <a href="https://instagram.com/gabsortegz_" target="_blank">
                     <div class="glasses_box">
                        <figure><img src="../images/perfil_equip/ortega_perfil.jpg" alt="#" style="border-radius: 100%;"/></figure>
                        <h3><span class="blu">O</span>rtega</h3>
                        <p>Back-end</p>

                     </div>
                  </div>
                    </a>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <a href="https://instagram.com/kajota_victor" target="_blank">
                     <div class="glasses_box">
                        <figure><img src="../images/perfil_equip/morais_perfil.jpg" alt="#" style="border-radius: 100%;"/></figure>
                        <h3><span class="blu">M</span>orais</h3>
                        <p>Front-end</p>
                     </div>
                 
                     </div>
                     </a>

                  </div>
         
                  </div>
               </div>
            </div>
         </div>


      <!-- about section -->
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