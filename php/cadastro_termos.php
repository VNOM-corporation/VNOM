<?php

session_start();


$_SESSION['email_contato'] = $_POST['email_contato'];
$_SESSION['rede_wpp'] = $_POST['rede_wpp'];
$_SESSION['rede_inst'] = $_POST['rede_inst'];
$_SESSION['rede_face'] = $_POST['rede_face'];


if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
	echo"<meta http-equiv='refresh' content='0;url=home.php'>";
    exit;
}

if(!isset($_SESSION['nomecomp']) and !isset($_SESSION['cpf_user']) and !isset($_SESSION['dtnasc_user']) and !isset($_SESSION['sexo_user']) and !isset($_SESSION['cep_user']) and !isset($_SESSION['uf_estado']) and !isset($_SESSION['cidade_user']) and !isset($_SESSION['rua_user']) and !isset($_SESSION['bairro_user']) and !isset($_SESSION['numero_user']) and !isset($_SESSION['complemento_user']) and !isset($_SESSION['nome_user']) and !isset($_SESSION['celular_user']) and !isset($_SESSION['email_user']) and !isset($_SESSION['senha_user']) and !isset($_SESSION['avatar_user'])) {
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

				<form class="login100-form validate-form" action="caduser.php" method="POST">
					<span class="login100-form-title">
						TERMOS DE USO
					</span>


					<div class="wrap-input100 validate-input">
						<textarea id="textareaterms" type="text" style="height: 300px;" readonly>
	Leia com aten????o todos os termos abaixo.
	Este documento, e todo o conte??do do site ?? oferecido por (VNOM respectivamente Vit??ria, Norgang, Ortega e Morais), neste termo representado apenas por ???VNOM???, que regulamenta todos os direitos e obriga????es com todos que acessam o site, denominado neste termo como ???USU??RIO???, resguardado todos os direitos previstos na legisla????o, trazem as cl??usulas abaixo como requisito para acesso e visita do mesmo, situado no endere??o (www.vnom.com.br).
	A perman??ncia no website implica-se automaticamente na leitura e aceita????o t??cita dos presentes termos de uso a seguir. 

1. DA FUN????O DO SITE
	Este site foi criado e desenvolvido com a fun????o de divulgar de presta????o de servi??o. A VNOM busca unir a divulga????o e utiliza????o de servi??os, facilitando a vida profissional e suas necessidades at?? mesmo pessoais.
	Nesta plataforma, poder?? ser realizado tanto a divulga????o de servi??os de alta qualidade, assim como a procura deles.
	Todos os perfis s??o analisados e monitorados periodicamente, assim, tendo acesso a den??ncias, coment??rios e avalia????es, verificando sua atividade no site e desativando-as se necess??rio, por viola????es ou inatividade.
	?? de responsabilidade do usu??rio de usar todas as informa????es presentes no site com senso cr??tico, utilizando apenas como fonte de informa????o, e sempre buscando especialistas da ??rea para a solu????o concreta do seu conflito.

2. DO ACEITE DOS TERMOS
	Este termo especifica e exige que todo usu??rio ao acessar o site da VNOM, leia e compreenda todas as cl??usulas dele, visto que ele estabelece entre a VNOM e o USU??RIO direitos e obriga????es entre ambas as partes, aceitos expressamente pelo USU??RIO ao permanecer desfrutando dos servi??os no site da VNOM.
	Ao continuar acessando o site, o USU??RIO expressa que aceita e entende todas as cl??usulas, assim como concorda integralmente com cada uma delas, sendo este aceite imprescind??vel para a perman??ncia na mesma. Caso o USU??RIO discorde de alguma cl??usula ou termo deste contrato, ele deve imediatamente interromper sua navega????o de todas as formas e meios.
	Este termo pode e ir?? ser atualizado periodicamente pela VNOM, que se resguarda no direito de altera????o, sem qualquer tipo de aviso pr??vio e comunica????o. ?? importante que o USU??RIO confira sempre se houve movimenta????o e qual foi a ??ltima atualiza????o dele no come??o da p??gina.

3. DO GLOSS??RIO
	Este termo pode conter algumas palavras espec??ficas que podem n??o se de conhecimento geral. Entre elas:
???	NAVEGA????O: O ato de visitar p??ginas e conte??do do website ou plataforma da empresa.
???	COOKIES: Pequenos arquivos de textos gerados automaticamente pelo site e transmitido para o navegador do visitante, que servem para melhorar a usabilidade do visitante.
???	LOGIN: Dados de acesso do visitante ao realizar o cadastro junto a EMPRESA, dividido entre usu??rio e senha, que d?? acesso a fun????es restritas do site.
???	HIPERLINKS: S??o links clic??veis que podem aparecer pelo site ou no conte??do, que levam para outra p??gina da EMPRESA ou site externo.
???	OFFLINE: Quando o site ou plataforma se encontra indispon??vel, n??o podendo ser acessado externamente por nenhum usu??rio.
	Em caso de d??vidas sobre qualquer palavra utilizada neste termo, o USU??RIO dever?? entrar em contato com a VNOM atrav??s dos canais de comunica????o encontradas no site.

4. DO ACESSO AO SITE
	O Site e plataforma funcionam normalmente 24 (vinte e quatro) horas por dia, por??m podem ocorrer pequenas interrup????es de forma tempor??ria para ajustes, manuten????o, mudan??a de servidores, falhas t??cnicas ou por ordem de for??a maior, que podem deixar o site indispon??vel por tempo limitado.
	A VNOM n??o se responsabiliza por nenhuma perda de oportunidade ou preju??zos que esta indisponibilidade tempor??ria possa gerar aos usu??rios.
	Em caso de manuten????o que exigirem um tempo maior, a VNOM ir?? informar previamente aos clientes da necessidade e do tempo previsto em que o site ou plataforma ficar?? offline.
	Inicialmente ser?? preenchido um formul??rio para efetuar o login no site, assim se tornando um usu??rio e tendo acesso aos prestadores de servi??os e j?? podendo solicit??-los. Caso seja de sua vontade se tornar tamb??m um prestador, ter?? que ser preenchido outro formul??rio com informa????es adicionais para essa fun????o.
	O acesso ao site s?? ?? permitido a maiores de 18 anos de idade ou que possu??rem capacidade civil plena.
	Caso seja necess??rio realizar um cadastro junto a plataforma, onde o USU??RIO dever?? preencher um formul??rio com seus dados e informa????es, para ter acesso a alguma parte restrita, ou realizar alguma compra.
	Todos os dados est??o protegidos conforme a Lei Geral de Prote????o de Dados, e ao realizar o cadastro junto ao site, o USU??RIO concorda integralmente com a coleta de dados conforme a Lei e com a Pol??tica de Privacidade da VNOM.
	?? importante refor??ar que a plataforma s?? aceita uma conta por individuo, assim limitando um cadastro por CPF que ser?? a forma mais segura e assertiva de prote????o dos demais usu??rios ou dele pr??prio.

5. DA LICEN??A DE USO E C??PIA
	O usu??rio poder?? acessar todo o conte??do disponibilizado para a procura de servi??os em seus respectivos perfis.
	Todos os direitos s??o preservados, conforme a legisla????o brasileira, principalmente na Lei de Direitos Autorais (regulamentada na Lei n?? 9.610/18), assim como no C??digo Civil brasileiro (regulamentada na Lei n?? 10.406/02), ou quaisquer outras legisla????es aplic??veis.
	Todo o conte??do do site ?? protegido por direitos autorais, e seu uso, c??pia, transmiss??o, venda, cess??o ou revenda, deve seguir a lei brasileira, tendo a VNOM todos os seus direitos reservados, e n??o permitindo a c??pia ou utiliza????o de nenhuma forma e meio, sem autoriza????o expressa e por escrita dela.
	A VNOM poder?? em casos concretos permitir pontualmente exce????es a este direito, que ser??o claramente destacados no mesmo, com a forma e permiss??o de uso do conte??do protegido. Este direito ?? revog??vel e limitado as especifica????es de cada caso.

6. DAS OBRIGA????ES
	O USU??RIO ao utilizar o website da VNOM, concorda integralmente em:
???	De nenhuma forma ou meio realizar qualquer tipo de a????o que tente invadir, hacker, destruir ou prejudicar a estrutura do site, plataforma da VNOM ou de seus parceiros comerciais. Incluindo-se, mas n??o se limitando, ao envio de v??rus de computador, de ataques de DDOS, de acesso indevido por falhas dela ou quaisquer outras forma e meio.
???	De n??o realizar divulga????o indevida nos coment??rios do site de conte??do de SPAM, empresas concorrentes, v??rus, conte??do que n??o possua direitos autorais ou quaisquer outros que n??o seja pertinente a discuss??o daquele texto, v??deo ou imagem.
???	Da proibi????o em reproduzir qualquer conte??do do site ou plataforma sem autoriza????o expressa, podendo responder civil e criminalmente por ele.
???	Com a Pol??tica de Privacidade do site, assim como tratamos os dados referentes ao cadastro e visita no site, podendo a qualquer momento e forma, requerer a exclus??o deles, atrav??s do formul??rio de contato.

7. DA MONETIZA????O E PUBLICIDADE
	A VNOM pode alugar ou vender espa??os publicit??rios na plataforma, ou no site, diretamente aos anunciantes, ou atrav??s de empresas especializadas com o Adsense (Google), Taboola ou outras plataformas especializadas como o EletroCriticas.com
	Essas publicidades n??o significam nenhuma forma de endosso ou responsabilidade pelos mesmos, ficando o USU??RIO respons??vel pelas compras, visitas, acessos ou quaisquer a????es referentes as estas empresas.
	Todas as propagandas no site ou plataforma ser??o claramente destacadas como publicidade, como forma de disclaimer da VNOM e de conhecimento do USU??RIO.
	Em casos de compra de servi??os, pacotes da VNOM, ser?? poss??vel a devolu????o em at?? 07 (sete) dias, conforme o C??digo de Defesa do Consumidor.
	Estes an??ncios podem ser selecionados pela empresa de publicidade automaticamente, conforme as visitas recentes do VISITANTE, assim como baseado no seu hist??rico de busca, conforme as pol??ticas de acesso da plataforma.
	A forma de pagamento, retribui????o ou remunera????o, ser?? discutida entre ambos os perfis. A VNOM n??o se responsabiliza pela forma que esta quest??o ser?? resolvida e nem se caso n??o houver a devida troca, seu cunho ?? apenas de unir e localizar prestadores e usu??rios.

8. DEN??NCIAS
	Dentro das den??ncias, nenhuma viola????o dos direitos humanos, trabalhistas ser??o permitidos na plataforma. Caso algum das viola????es forem identificadas, o perfil dever?? ser reportado imediatamente, assim sua den??ncia sendo repassada para os administradores, podendo tamb??m ser mandado um e-mail a VNOM que a respectiva apurar?? a den??ncia.
	Nenhuma apologia a qualquer tipo de viol??ncia, dentre elas viol??ncia sexual, f??sica, patrimonial, moral e psicol??gicas n??o ser??o toleradas.

9. DOS TERMOS GERAIS
	O Site pode apresentar hiperlinks durante sua experi??ncia nele, que podem levar diretamente para outra p??gina da empresa ou para sites externos.
	Apesar da VNOM apenas criar links para sites externos de extrema confian??a, caso o usu??rio acesse um site externo, a VNOM n??o tem nenhuma responsabilidade pelo meio, sendo uma mera indica????o de complementa????o de conte??do, ficando o mesmo respons??vel pelo acesso, assim como sobre quaisquer a????es que venham a realizar neste site.
	Em caso que ocorra eventuais conflitos judiciais entre o USU??RIO e a VNOM, o foro elegido para a devida a????o ser?? o da comarca da Empresa, mesmo que haja outro mais privilegiado.
	Em circunst??ncia, qualquer d??vida ou cr??tica em quest??o poder?? ser reportada aos administradores pelos contatos deles disponibilizados.
	Estes Termos de uso s??o elaborados pelos alunos do 3?? (terceiro) ano do ensino m??dio, para a conclus??o do TCC no t??cnico em desenvolvimento de sistemas, Etec Jardim ??ngela.

						</textarea>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>


					<div class="box_termo">
						<!--tenho que deixar na mesma linha-->
						<input type="checkbox" class="termo" value="termo" onclick="termocheck()">
						<label for="termo" id="lbl_li">Eu li, entendi e concordo com estas regras e condi????es.</label>
						</div>
						
						<!-- <div class="g-recaptcha" data-sitekey="6LcbfTsjAAAAAGuIbM7V3CUlOq8cw7rtb3zDFPND"></div> -->

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