<?php

include 'connect.php';

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true) {
	echo"<meta http-equiv='refresh' content='0;url=php/home.php'>";
    exit;
}

$prest = $connect->prepare("SELECT * FROM cad_prestador WHERE id_user = ?");
$prest->bindParam(1, $_SESSION['id_user'], PDO::PARAM_INT);
$prest->execute();

$verify = $prest->rowCount();

if ($verify != 0) {
	echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
	exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro VNOM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../images/fevicon.png"/>

	<link rel="stylesheet" type="text/css" href="../css/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../fonts/font/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="../css/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="../css/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>

	<script src='https://www.google.com/recaptcha/api.js'></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/1.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="prestador.php" method="POST">
					<span class="login100-form-title">
						TERMOS DE PRESTADOR
					</span>


					<div class="wrap-input100 validate-input">
						<textarea id="textareaterms" type="text" heigth="100px" readonly>
	Leia com aten????o todos os termos abaixo.
	Este documento, e todo o conte??do do site ?? oferecido por (VNOM respectivamente Vit??ria, Norgang, Ortega e Morais), neste termo representado apenas por ???VNOM???, que regulamenta todos os direitos e obriga????es com todos que acessam o site, situado no endere??o  (www.vnom.com.br).

1. REMUNERA????O DOS SERVI??OS
	A VNOM tem como responsabilidade juntar empregador ao empregado, toda forma de remunera????o deles ter?? que ser resolvida entre ambos, em alguma das plataformas de comunica????o disponibilizadas em seus respectivos perfis, que s??o exigidos no cadastro do usu??rio (cadastro principal). 
	Refor??ando que o site em quest??o n??o se responsabilizar?? pelos pagamentos realizados ou n??o dos usu??rios.


2. PENALIZA????ES
	Respeitar as cl??usulas arrisca ?? muito importante para um bom uso do site. No Termos de condi????es e uso Site VNOM as penaliza????es s??o bem detalhadas e claras, dentro do t??pico DEN??NCIAS, caso o perfil haja 5 den??ncias a conta ser?? imediatamente banida, ressaltando que uma vez banida, ela n??o poder?? ser mais ativada.

                       </textarea>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>

					<div class="box_termo">
						<!--tenho que deixar na mesma linha-->
						<input type="checkbox" class="termo" value="termo" onclick="termocheck()">
						<label for="termo" id="lbl_li">Eu li, entendi e concordo com estas regras e condi????es.</label>
						<br><br>
					    </div>

					<div class="wrap-input100 validate-input">
						<select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="area_prest" required>
					   <option value="" selected>Selecione uma ??rea atuante</option>
					   <option value="EDUCA????O E CULTURA">Educa????o e Cultura</option>
                       <option value="EST??TICA E BELEZA">Est??tica e Beleza</option>
                       <option value="LIMPEZA E CONSERVA????O">Limpeza e Conserva????o</option>
                       <option value="REFORMAS E SERVI??OS GERAIS">Reformas e Servi??os Gerais</option>
                       <option value="MANUTEN????O AUTOMOTIVA">Manuten????o Automotiva</option>
                       <option value="FESTAS E EVENTOS">Festas e Eventos</option>
                       <option value="SA??DE E BEM ESTAR">Sa??de e Bem Estar</option>
                       <option value="TECNOLOGIA">Tecnologia</option>
                       <option value="TRANSPORTE">Transporte</option>
                       <option value="OUTRO">Outro</option>
						</select>
					</div>
<br>
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigat??rio">
						<label>Escreva o cargo que voc?? desempenha.</label>
						<input class="input100" type="text" placeholder="Ex: Marceneira, Faxineiro,..." name="cargo_prest" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-gears" style="margin-top: 30px;"></i>
						</span>
					</div>
<br>
					 <div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="btn_finalizar">
							Finalizar
						</button>
					 </div>

		

					<div class="text-center p-t-136">
			
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="../css/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="../css/vendor/bootstrap/js/popper.js"></script>
	<script src="../css/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="../css/vendor/select2/select2.min.js"></script>

	<script src="../css/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="../js/main.js"></script>

	<script language="javascript">
        function termocheck(){
          if(document.getElementById('termo').checked == true){
            document.getElementById('btn_finalizar').hidden = false;
          }
          if(document.getElementById('termo').checked == false){
            document.getElementById('btn_finalizar').hidden = true;
          }
        }
    </script>

</body>
</html>