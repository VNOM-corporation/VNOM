<?php

session_start();

$_SESSION['nomecomp'] = $_POST['nomecomp'];
$_SESSION['cpf_user'] = $_POST['cpf_user'];
$_SESSION['dtnasc_user'] = $_POST['dtnasc_user'];
$_SESSION['sexo_user'] = $_POST['sexo_user'];

if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
	echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

if(!isset($_SESSION['nomecomp']) and !isset($_SESSION['cpf_user']) and !isset($_SESSION['dtnasc_user']) and !isset($_SESSION['sexo_user'])) {
	session_destroy();
	echo"<meta http-equiv='refresh' content='0;url=cadastro.php'>";
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

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/1.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="cadastro3.php" method="POST">
					<span class="login100-form-title">
						ENDEREÇO
					</span>

					<div class="wrap-input100 validate-input">
						<select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="uf_estado" required>
							<option value="" selected>Estado</option>
							<option value="AC">Acre - AC</option>
							<option value="AL">Alagoas - AL</option>
							<option value="AP">Amapá - AP</option>
							<option value="AM">Amazonas - AM</option>
							<option value="BA">Bahia - BA</option>
							<option value="CE">Ceará - CE</option>
							<option value="DF">Distrito Federal - DF</option>
							<option value="ES">Espirito Santo - ES</option>
							<option value="GO">Goiás - GO</option>
							<option value="MA">Maranhão - MA</option>
							<option value="MS">Mato Grosso do Sul - MS</option>
							<option value="MT">Mato Grosso - MT</option>
							<option value="MG">Minas Gerais - MG</option>
							<option value="PA">Pará - PA</option>
							<option value="PB">Paraíba - PB</option>
							<option value="PR">Paraná - PR</option>
							<option value="PE">Pernambuco - PE</option>
							<option value="PI">Piauí - PI</option>
							<option value="RJ">Rio de Janeiro - RJ</option>
							<option value="RN">Rio Grande do Norte - RN</option>
							<option value="RS">Rio Grande do Sul - RS</option>
							<option value="RO">Rondônia - RO</option>
							<option value="RR">Roraima - RR</option>
							<option value="SC">Santa Catarina - SC</option>
							<option value="SP">São Paulo - SP</option>
							<option value="SE">Sergipe - SE</option>
							<option value="TO">Tocantins - TO</option>
							</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input id="cep" class="input100" type="text" placeholder="CEP" name="cep_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map"></i>
						<!--máscara cep-->
						<script type="text/javascript">
							$("#cep").mask("00000-000");
							</script>
						</span>
					</div>

				
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" placeholder="Cidade" name="cidade_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-marker"></i>
						</span>
					</div>

				
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" placeholder="Bairro" name="bairro_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-pin"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" placeholder="Rua" name="rua_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-o"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" placeholder="Número" name="numero_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-signs"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" placeholder="Complemento" name="complemento_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-home"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Avançar
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="cadastro.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Início
						</a>
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
	<script type="text/javascript" src="../js/cep.js"></script>

</body>
</html>