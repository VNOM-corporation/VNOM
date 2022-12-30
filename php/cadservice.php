<?php

session_start();

include 'connect.php';


if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

$id_user = $_SESSION['id_user'];


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
    <!-- <link rel="stylesheet" href="../vendor/nouislider/nouislider.min.css"> -->

    <!-- Main css -->
    <link rel="stylesheet" href="../css/styleservice.css">
    <link rel="icon" href="../images/fevicon.png"/>
</head>
<body>
    <div class="main">

        <div class="container">
            <div class="signup-content" href="#">
                <div class="signup-img">
                    <img src="../images/VNOM.gif" href="#" alt="">
                    <div class="signup-img-content">
                        
                        </div>
                </div>
                <form method="POST" class="register-form" id="register-form" action="service.php" enctype="multipart/form-data">
                <div class="signup-form">
                        <div class="form-row">
                            <div class="form-group">

                                <div class="form-input">
                                    <label for="first_name" class="required">Título do Serviço</label>
                                    <input type="text" name="titulo_serv" id="first_name" placeholder="Ex: Fazer, Consertar, Organizar algo" maxlength="23" required/>
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Descreva o que precisa ser realizado</label>
                                    <input type="text" name="descricao_serv" id="last_name" placeholder="Observações sobre quem, onde e como" required/>
                                </div>
                                <div class="form-input">
                                    <div class="form-radio">
                                        <div class="label-flex">
                                            <label for="prazo">Prazo de Entrega</label>
                                        </div>
                                        <div class="form-radio-group">            
                                            <div class="form-radio-item">
                                                <input type="radio" name="prazo_serv" id="combprestador" onclick="prazocheck()" value="Combinar com o Prestador" required>
                                                <label for="combprestador">Combinar com o Prestador</label>
                                                <span class="check"></span>
                                            </div>
                                            <div class="form-radio-item">
                                                <input type="radio" name="prazo_serv" id="datapraz" onclick="prazocheck()" required>
                                                <label for="datapraz">Escolher Data</label>
                                                <span class="check"></span>
                                            </div>
                                        </div>
                                        <input type="date" name="data_prazo" id="campo_data" disabled> 
                                    </div>
                                </div> 
                                 <div class="form-input">
                                    <label for="email" class="required">Carga Horária</label>
                                    <input type="text" name="cargahor_serv" id="email" placeholder="Em Minutos, Horas, Dias ou Semanas" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <label for="meal_preference">Categoria</label>
                                    </div>
                                    <div class="select-list">
                                        <select name="categoria_serv" style="width: 100%; padding: 15px; border-radius:9px; border: #ebebeb 1px solid;" required>
                                            <option value="" selected >Selecione</option>
                                            <option value="EDUCAÇÃO E CULTURA">EDUCAÇÃO E CULTURA</option>
                                            <option value="ESTÉTICA E BELEZA">ESTÉTICA E BELEZA</option>
                                            <option value="LIMPEZA E CONSERVAÇÃO">LIMPEZA E CONSERVAÇÃO</option>
                                            <option value="REFORMAS E SERVIÇOS GERAIS">REFORMAS E SERVIÇOS GERAIS</option>
                                            <option value="MANUTENÇÃO AUTOMOTIVA">MANUTENÇÃO AUTOMOTIVA</option>
                                            <option value="FESTAS E EVENTOS">FESTAS E EVENTOS</option>
                                            <option value="SAÚDE E BEM ESTAR">SAÚDE E BEM ESTAR</option>
                                            <option value="TECNOLOGIA">TECNOLOGIA</option>
                                            <option value="TRANSPORTE">TRANSPORTE</option>
                                            <option value="OUTRO">OUTRO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="payment">Atendimento</label>
                                    </div>
                                    <div class="form-radio-group">            
                                        <div class="form-radio-item">
                                            <input type="radio" name="atendimento_serv" id="cash" value="Presencial" required> 
                                            <label for="cash">Presencial</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="atendimento_serv" id="cheque" value="Online" required>
                                            <label for="cheque">Online</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-input"> <!--isso tem que sumir se for online-->
                                    <label for="chequeno">Local</label>
                                    <input type="text" name="local_serv" id="chequeno" placeholder="Ex: Casa, Estabelecimento/ Plataforma"/>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="equip">Equipamentos</label>
                                    </div>
                                    <div class="form-radio-group">            
                                        <div class="form-radio-item">
                                            <input type="radio" name="equipamento_serv" id="equip_no" value="Não Possuo" required>
                                            <label for="equip_no">Não possuo</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="equipamento_serv" id="equip_yes" value="Fornecerei os meus" required>
                                            <label for="equip_yes">Fornecerei dos meus</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="donate-us" style="margin-top:-10px;">
                            <label>Quanto será Pago pelo Serviço</label>
                            <p style="color:#03989E; font-size: xx-large; margin-top: -20px;">R$ <span id="valor_server"></span></p>
                            <input type="range" min="0" value="0" max="3000" step="10" name="valor_serv" id="valor_serv" style="display: unset;" required>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Publicar" class="submit" id="submit" name="submit">
                            <a href="perfil.php"><input type="button" value="Cancelar" class="submit" id="reset" name="reset"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/nouislider/nouislider.min.js"></script>
    <script src="../vendor/wnumb/wNumb.js"></script>
    <script src="../vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../js/mainservice.js"></script>

    <script language="javascript">
        function prazocheck(){
          if(document.getElementById('datapraz').checked == true){
            document.getElementById('campo_data').disabled = false;
          }
          if(document.getElementById('datapraz').checked == false){
            document.getElementById('campo_data').disabled = true;
          }
        }
        

        function localcheck(){
          if(document.getElementById('cash').checked == true){
            document.getElementById('chequeno').disabled = false;
          }
          if(document.getElementById('cash').checked == false){
            document.getElementById('chequeno').disabled = true;
          }
        }

    </script>

<script>
    var slider = document.getElementById("valor_serv");
    var output = document.getElementById("valor_server");
    output.innerHTML = slider.value;
    
    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>