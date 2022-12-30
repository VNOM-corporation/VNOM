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
	Leia com atenção todos os termos abaixo.
	Este documento, e todo o conteúdo do site é oferecido por (VNOM respectivamente Vitória, Norgang, Ortega e Morais), neste termo representado apenas por “VNOM”, que regulamenta todos os direitos e obrigações com todos que acessam o site, situado no endereço  (www.vnom.com.br).

1. REMUNERAÇÃO DOS SERVIÇOS
	A VNOM tem como responsabilidade juntar empregador ao empregado, toda forma de remuneração deles terá que ser resolvida entre ambos, em alguma das plataformas de comunicação disponibilizadas em seus respectivos perfis, que são exigidos no cadastro do usuário (cadastro principal). 
	Reforçando que o site em questão não se responsabilizará pelos pagamentos realizados ou não dos usuários.


2. PENALIZAÇÕES
	Respeitar as cláusulas arrisca é muito importante para um bom uso do site. No Termos de condições e uso Site VNOM as penalizações são bem detalhadas e claras, dentro do tópico DENÚNCIAS, caso o perfil haja 5 denúncias a conta será imediatamente banida, ressaltando que uma vez banida, ela não poderá ser mais ativada.

                       </textarea>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>

					<div class="box_termo">
						<!--tenho que deixar na mesma linha-->
						<input type="checkbox" class="termo" value="termo" onclick="termocheck()">
						<label for="termo" id="lbl_li">Eu li, entendi e concordo com estas regras e condições.</label>
						<br><br>
					    </div>

					<div class="wrap-input100 validate-input">
						<select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="area_prest" required>
					   <option value="" selected>Selecione uma área atuante</option>
					   <option value="EDUCAÇÃO E CULTURA">Educação e Cultura</option>
                       <option value="ESTÉTICA E BELEZA">Estética e Beleza</option>
                       <option value="LIMPEZA E CONSERVAÇÃO">Limpeza e Conservação</option>
                       <option value="REFORMAS E SERVIÇOS GERAIS">Reformas e Serviços Gerais</option>
                       <option value="MANUTENÇÃO AUTOMOTIVA">Manutenção Automotiva</option>
                       <option value="FESTAS E EVENTOS">Festas e Eventos</option>
                       <option value="SAÚDE E BEM ESTAR">Saúde e Bem Estar</option>
                       <option value="TECNOLOGIA">Tecnologia</option>
                       <option value="TRANSPORTE">Transporte</option>
                       <option value="OUTRO">Outro</option>
						</select>
					</div>
<br>
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<label>Escreva o cargo que você desempenha.</label>
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