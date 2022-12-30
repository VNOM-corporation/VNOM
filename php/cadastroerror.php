<?php

session_start();


$date = date('Y-m-d', strtotime('- 18 years'));


if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
	echo"<meta http-equiv='refresh' content='0;url=home.php'>";
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

				<form class="login100-form validate-form" action="cadastro2.php" method="POST">

					<span class="login100-form-title">
						DADOS PESSOAIS

						<br><br>
						<marquee><h5 style="color:#03989E;">Usuário, CPF ou E-mail já cadastrados!</h5></marquee>
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<!--Bloquear números e caracteres especiais-->
						<input class="input100" type="text" placeholder="Nome Completo" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" name="nomecomp" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user"></i>
						</span>
					</div>

					
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<!--Números com máscara-->
						<!--pattern="[0-9]+$" mascara para apenas números-->
						<input type="text" id="cpf" class="input100" placeholder="CPF" name="cpf_user" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-circle-o"></i>
						</span>
						<!--máscara cpf-->
						<script type="text/javascript">
							$("#cpf").mask("000.000.000-00");
							</script>
					</div>

				
					<div class="wrap-input100 validate-input" data-validate = "Campo obrigatório">
						<!--Apenas maiores de 18 anos-->
						<?php
						echo<<<HTML
						<input class="input100" type="date" placeholder="Data De Nascimento" max="$date" name="dtnasc_user" required>
						HTML;
						?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="sexo_user" required>
							<option value="" selected>Sexo</option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
							<option value="Prefiro Não Dizer">Prefiro não dizer</option>
							<option value="Personalizado">Personalizado</option>
							</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">

						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Avançar
						</button>
					</div>

		

					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Já sou cadastrado
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--máscaras-->

	<script src="../css/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="../css/vendor/bootstrap/js/popper.js"></script>
	<script src="../css/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="../css/vendor/select2/select2.min.js"></script>

	<script src="../css/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="../js/main.js"></script>		

</body>
</html>