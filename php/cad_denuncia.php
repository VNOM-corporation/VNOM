<?php

include 'connect.php';

$denunciado = $_GET['nome_user'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>VNOM denuncia</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../css/denuncia.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Denúncia</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="denuncia.php">


                       <div class="form-row">
                            <div class="name">Motivo</div>

                


                            <div class="value">
                                
                           <select class="input--style-6" name="motivo_den">
                            <option value="Bullying ou assédio">Bullying ou assédio</option>
                            <option value="Conduta de ódio">Conduta de ódio</option>
                            <option value="Danos a si mesmo">Danos a si mesmo</option>
                            <option value="Nudez ou conteúdo sexualmente explícito">Nudez ou conteúdo sexualmente explícito</option>
                            <option value="Spam, golpes ou bots">Spam, golpes ou bots</option>
                            <option value="Terrorismo">Terrorismo</option>
                           </select> 

                          


                            </div>
                        </div>
          
                        <?php
                        echo<<<HTML
                        <input type="hidden" name="denunciado" value="$denunciado">
                        HTML;
                        ?>
                        <div class="form-row">
                            <div class="name">Descrição</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="desc_den" placeholder="Digite aqui de maneira detalhada o que ocorreu..."></textarea>
                                </div>
                            </div>
                        </div>
                      
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Enviar Denúncia</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="../js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->