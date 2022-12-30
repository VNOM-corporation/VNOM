<?php

include 'connect.php';

session_start();

$id_serv = $_GET['id_serv'];

$consulta = $connect->prepare("SELECT cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.datapraz_serv, cs.cargahor_serv, cd.nome_user FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.id_serv = ?");
$consulta->bindParam(1, $id_serv, PDO::PARAM_INT);
$consulta->execute();

$fetchserv = $consulta->fetchAll();

foreach($fetchserv as $dadoserv) {
    $titulo_serv = $dadoserv['titulo_serv'];
    $desc_serv = $dadoserv['desc_serv'];
    $valor_serv = $dadoserv['valor_serv'];
    $categoria_serv = $dadoserv['categoria_serv'];
    $tipo_serv = $dadoserv['tipo_serv'];
    $local_serv = $dadoserv['local_serv'];
    $equipamento_serv = $dadoserv['equipamento_serv'];
    $img_serv = $dadoserv['img_serv'];
    $datapraz = $dadoserv['datapraz_serv'];
    $cargahor_serv = $dadoserv['cargahor_serv'];
    $nome_user = $dadoserv['nome_user'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VNOM</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/styleservice.css">
    <link rel="icon" href="../images/fevicon.png"/>
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <!-- imagem do serviço -->
                    <div class="signup-img-content">
                        <?php
                        echo<<<HTML
                        <a href="../html/perfil_view.html"><img src="$img_serv"  width="50%;" alt=""></a>
                        </div>
                        </div>
                        <div class="signup-form">
                        <div class="register-form" id="register-form">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <h2 style="color:black">$titulo_serv</h2>
                                    </div>
                                <div class="form-input">
                                    <p style="color:black">$desc_serv</p>
                                    
                                    </div>
                                <div class="form-input">
                                    <h3 style="color:black">$datapraz</h3>
                                </div> 
                                 <div class="form-input">
                                    <h3>$cargahor_serv</h3>
                                </div>
                                <div class="form-input">
                                    <h1>R$$valor_serv</h1>
                               </div>      
                               <div class="form-input">
                                <a href='perfil_view.php?nome_user=$nome_user' style="text-decoration:none; color:aqua">
                                <h3>$nome_user</h3></a>
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <h4>$categoria_serv</h4>
                                    </div>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <h3>$tipo_serv</h3>
                                    </div>
                                </div>
                                
                                <div class="form-input"> <!--isso tem que sumir se for online-->
                                    <h3>$local_serv</h3>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <h4>$equipamento_serv</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                            <!-- onclick=\"return confirm ('Confirmar atendimento?');\"/ -->
                            <!-- atendimento confirmado passa o serviço para a tabela de atendidos do prestador -->
                            <a href='atenderserv.php?id_serv=$id_serv'><input type="submit" value="Atender" class="submit" id="submit" name="submit" ></a>
                            <input type="submit" onclick="goBack()" value="Cancelar" class="submit" id="reset" name="reset" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

HTML;
?>

    <!-- JS -->

    <script>
    function goBack(){
        window.history.back();

    }
    </script>
   
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/nouislider/nouislider.min.js"></script>
    <script src="../vendor/wnumb/wNumb.js"></script>
    <script src="../vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>