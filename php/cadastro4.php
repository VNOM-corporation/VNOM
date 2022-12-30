<?php

session_start();

$_SESSION['nome_user'] = $_POST['nome_user'];
$_SESSION['celular_user'] = $_POST['celular_user'];
$_SESSION['email_user'] = $_POST['email_user'];
$_SESSION['senha_user'] = $_POST['senha_user'];

if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
	echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

if(!isset($_SESSION['nomecomp']) and !isset($_SESSION['cpf_user']) and !isset($_SESSION['dtnasc_user']) and !isset($_SESSION['sexo_user']) and !isset($_SESSION['cep_user']) and !isset($_SESSION['uf_estado']) and !isset($_SESSION['cidade_user']) and !isset($_SESSION['rua_user']) and !isset($_SESSION['bairro_user']) and !isset($_SESSION['numero_user']) and !isset($_SESSION['complemento_user']) and !isset($_SESSION['nome_user']) and !isset($_SESSION['celular_user']) and !isset($_SESSION['email_user']) and !isset($_SESSION['avatar_user'])) {
	session_destroy();
	echo"<meta http-equiv='refresh' content='0;url=cadastro.php'>";
    exit;
}

$nome_user = $_POST['nome_user'];

$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
$nameavatar = $nome_user . "." . $extension;
$avatard = "../avatartmp/";
$avatartmp = $avatard . $nameavatar;

$_SESSION['avatar_tmp'] = $avatartmp;
$_SESSION['name_avatar'] = $nameavatar;

move_uploaded_file($_FILES['avatar']['tmp_name'], $avatartmp);


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

				<form class="login100-form validate-form" action="cadastro_termos.php" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title">
						MÍDIAS E CONTATOS
						<br><br>
						<p>Elenque pelo menos 2 de seus melhores meios de comunicação (link de perfil) para fazer contato com os prestadores e divulgar informações adicionais.</p>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="email" placeholder="E-mail de Contato" name="email_contato">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


				<!-- puxar o celular pelo banco e perguntar se o usuário gostaria de usa-lo aqui (não obrigatório) -->
				<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input id="cell" class="input100" placeholder="Whatsapp" name="rede_wpp">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<!-- máscara cell -->
						<script type="text/javascript">
							$("#cell").mask("+00(00)00000-0000");
							</script>
						</span>
					</div> 


					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="text" placeholder="Instagram" name="rede_inst">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-instagram"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="text" placeholder="Facebook" name="rede_face">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						</span>
					</div>
						

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Avançar
						</button>
					</div>

		

					<div class="text-center p-t-136">
						<a class="txt2" href="cadastro2.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Início
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

</body>
</html>