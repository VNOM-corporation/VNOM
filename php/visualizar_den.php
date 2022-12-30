<?php

include 'connect.php';

session_start();

if ($_SESSION['tipo_user'] != 1) {
    $_SESSION = array();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

$id_den = $_GET['id_den'];

$consultar = $connect->prepare("SELECT * FROM denuncia_user WHERE id_den = ?");
$consultar->bindParam(1, $id_den, PDO::PARAM_INT);
$consultar->execute();

$fetchden = $consultar->fetchAll();

foreach($fetchden as $dados) {
    $id_user = $dados['id_user'];
    $motivo_den = $dados['motivo_den'];
    $denunciante = $dados['denunciante_den'];
    $denunciado = $dados['denunciado_den'];
    $descricao = $dados['descricao_den'];

}


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
                    <h2 class="title">Visualizar Denuncia</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="punicao_den.php">

                    <div class="form-row">
                            <div class="name">Denunciante / Denunciado</div>
                            <div class="value">
                            <?php
                            echo<<<HTML
                           <input type="text" value="$denunciante" class="input--style-6" name="denunciante" readonly>
                           <br><br>
                           <input type="text" value="$denunciado" class="input--style-6" name="denunciado" readonly>
                            </div>
                        </div>

                       <div class="form-row">
                            <div class="name">Motivo</div>

                


                            <div class="value">
                            
                           <input type="text" value="$motivo_den" class="input--style-6" name="motivo_den" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Descrição</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="desc_den" placeholder=""  readonly>$descricao</textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                    HTML;
                        ?>
                    
                </div>
                
                <div class="card-footer">
                <br><br>
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Punir</button>
                    <a class="btn btn--radius-2 btn--blue-2" href="perfil.php">Voltar</a>
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