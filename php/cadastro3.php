<?php

session_start();

$_SESSION['cep_user'] = $_POST['cep_user'];
$_SESSION['uf_estado'] = $_POST['uf_estado'];
$_SESSION['cidade_user'] = $_POST['cidade_user'];
$_SESSION['rua_user'] = $_POST['rua_user'];
$_SESSION['bairro_user'] = $_POST['bairro_user'];
$_SESSION['numero_user'] = $_POST['numero_user'];
$_SESSION['complemento_user'] = $_POST['complemento_user'];

if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
	echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

if(!isset($_SESSION['nomecomp']) and !isset($_SESSION['cpf_user']) and !isset($_SESSION['dtnasc_user']) and !isset($_SESSION['sexo_user']) and !isset($_SESSION['cep_user']) and !isset($_SESSION['uf_estado']) and !isset($_SESSION['cidade_user']) and !isset($_SESSION['rua_user']) and !isset($_SESSION['bairro_user']) and !isset($_SESSION['numero_user']) and !isset($_SESSION['complemento_user'])) {
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

	<script src="../js/img_view.js" defer></script>

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
<!-- mudar para cadastro 4 depois de finalizado o banco -->
				<form class="login100-form validate-form" action="cadastro4.php" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title">
						DADOS DA CONTA
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="text" placeholder="Nome de Usuário" name="nome_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user"></i>
						</span>
					</div>

				
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input id="cell" class="input100" placeholder="Celular" name="celular_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<!--máscara cell-->
						<script type="text/javascript">
							$("#cell").mask("(00)00000-0000");
							</script>
						</span>
					</div>

				
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="email" placeholder="E-mail" name="email_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="password" placeholder="Senha" name="senha_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<input class="input100" type="password" placeholder="Confirme sua Senha" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-check" aria-hidden="true"></i>
						</span>
					</div>
					
					<br>
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<p>Sua imagem de perfil</p>
						<input class="input100" type="file" id="image" name="avatar" accept=".png, .jpg" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-image" aria-hidden="true"  style="margin-top: 20px;"></i>
						</span>
					</div>
					<br>
					<center>
					<img src="" id="preview-img" width="20%" style="border-radius:100%; object-fit:cover; object-position:center;"/>
				    </center>
						<br>
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