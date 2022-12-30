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
	Leia com atenção todos os termos abaixo.
	Este documento, e todo o conteúdo do site é oferecido por (VNOM respectivamente Vitória, Norgang, Ortega e Morais), neste termo representado apenas por “VNOM”, que regulamenta todos os direitos e obrigações com todos que acessam o site, denominado neste termo como “USUÁRIO”, resguardado todos os direitos previstos na legislação, trazem as cláusulas abaixo como requisito para acesso e visita do mesmo, situado no endereço (www.vnom.com.br).
	A permanência no website implica-se automaticamente na leitura e aceitação tácita dos presentes termos de uso a seguir. 

1. DA FUNÇÃO DO SITE
	Este site foi criado e desenvolvido com a função de divulgar de prestação de serviço. A VNOM busca unir a divulgação e utilização de serviços, facilitando a vida profissional e suas necessidades até mesmo pessoais.
	Nesta plataforma, poderá ser realizado tanto a divulgação de serviços de alta qualidade, assim como a procura deles.
	Todos os perfis são analisados e monitorados periodicamente, assim, tendo acesso a denúncias, comentários e avaliações, verificando sua atividade no site e desativando-as se necessário, por violações ou inatividade.
	É de responsabilidade do usuário de usar todas as informações presentes no site com senso crítico, utilizando apenas como fonte de informação, e sempre buscando especialistas da área para a solução concreta do seu conflito.

2. DO ACEITE DOS TERMOS
	Este termo especifica e exige que todo usuário ao acessar o site da VNOM, leia e compreenda todas as cláusulas dele, visto que ele estabelece entre a VNOM e o USUÁRIO direitos e obrigações entre ambas as partes, aceitos expressamente pelo USUÁRIO ao permanecer desfrutando dos serviços no site da VNOM.
	Ao continuar acessando o site, o USUÁRIO expressa que aceita e entende todas as cláusulas, assim como concorda integralmente com cada uma delas, sendo este aceite imprescindível para a permanência na mesma. Caso o USUÁRIO discorde de alguma cláusula ou termo deste contrato, ele deve imediatamente interromper sua navegação de todas as formas e meios.
	Este termo pode e irá ser atualizado periodicamente pela VNOM, que se resguarda no direito de alteração, sem qualquer tipo de aviso prévio e comunicação. É importante que o USUÁRIO confira sempre se houve movimentação e qual foi a última atualização dele no começo da página.

3. DO GLOSSÁRIO
	Este termo pode conter algumas palavras específicas que podem não se de conhecimento geral. Entre elas:
•	NAVEGAÇÃO: O ato de visitar páginas e conteúdo do website ou plataforma da empresa.
•	COOKIES: Pequenos arquivos de textos gerados automaticamente pelo site e transmitido para o navegador do visitante, que servem para melhorar a usabilidade do visitante.
•	LOGIN: Dados de acesso do visitante ao realizar o cadastro junto a EMPRESA, dividido entre usuário e senha, que dá acesso a funções restritas do site.
•	HIPERLINKS: São links clicáveis que podem aparecer pelo site ou no conteúdo, que levam para outra página da EMPRESA ou site externo.
•	OFFLINE: Quando o site ou plataforma se encontra indisponível, não podendo ser acessado externamente por nenhum usuário.
	Em caso de dúvidas sobre qualquer palavra utilizada neste termo, o USUÁRIO deverá entrar em contato com a VNOM através dos canais de comunicação encontradas no site.

4. DO ACESSO AO SITE
	O Site e plataforma funcionam normalmente 24 (vinte e quatro) horas por dia, porém podem ocorrer pequenas interrupções de forma temporária para ajustes, manutenção, mudança de servidores, falhas técnicas ou por ordem de força maior, que podem deixar o site indisponível por tempo limitado.
	A VNOM não se responsabiliza por nenhuma perda de oportunidade ou prejuízos que esta indisponibilidade temporária possa gerar aos usuários.
	Em caso de manutenção que exigirem um tempo maior, a VNOM irá informar previamente aos clientes da necessidade e do tempo previsto em que o site ou plataforma ficará offline.
	Inicialmente será preenchido um formulário para efetuar o login no site, assim se tornando um usuário e tendo acesso aos prestadores de serviços e já podendo solicitá-los. Caso seja de sua vontade se tornar também um prestador, terá que ser preenchido outro formulário com informações adicionais para essa função.
	O acesso ao site só é permitido a maiores de 18 anos de idade ou que possuírem capacidade civil plena.
	Caso seja necessário realizar um cadastro junto a plataforma, onde o USUÁRIO deverá preencher um formulário com seus dados e informações, para ter acesso a alguma parte restrita, ou realizar alguma compra.
	Todos os dados estão protegidos conforme a Lei Geral de Proteção de Dados, e ao realizar o cadastro junto ao site, o USUÁRIO concorda integralmente com a coleta de dados conforme a Lei e com a Política de Privacidade da VNOM.
	É importante reforçar que a plataforma só aceita uma conta por individuo, assim limitando um cadastro por CPF que será a forma mais segura e assertiva de proteção dos demais usuários ou dele próprio.

5. DA LICENÇA DE USO E CÓPIA
	O usuário poderá acessar todo o conteúdo disponibilizado para a procura de serviços em seus respectivos perfis.
	Todos os direitos são preservados, conforme a legislação brasileira, principalmente na Lei de Direitos Autorais (regulamentada na Lei nº 9.610/18), assim como no Código Civil brasileiro (regulamentada na Lei nº 10.406/02), ou quaisquer outras legislações aplicáveis.
	Todo o conteúdo do site é protegido por direitos autorais, e seu uso, cópia, transmissão, venda, cessão ou revenda, deve seguir a lei brasileira, tendo a VNOM todos os seus direitos reservados, e não permitindo a cópia ou utilização de nenhuma forma e meio, sem autorização expressa e por escrita dela.
	A VNOM poderá em casos concretos permitir pontualmente exceções a este direito, que serão claramente destacados no mesmo, com a forma e permissão de uso do conteúdo protegido. Este direito é revogável e limitado as especificações de cada caso.

6. DAS OBRIGAÇÕES
	O USUÁRIO ao utilizar o website da VNOM, concorda integralmente em:
•	De nenhuma forma ou meio realizar qualquer tipo de ação que tente invadir, hacker, destruir ou prejudicar a estrutura do site, plataforma da VNOM ou de seus parceiros comerciais. Incluindo-se, mas não se limitando, ao envio de vírus de computador, de ataques de DDOS, de acesso indevido por falhas dela ou quaisquer outras forma e meio.
•	De não realizar divulgação indevida nos comentários do site de conteúdo de SPAM, empresas concorrentes, vírus, conteúdo que não possua direitos autorais ou quaisquer outros que não seja pertinente a discussão daquele texto, vídeo ou imagem.
•	Da proibição em reproduzir qualquer conteúdo do site ou plataforma sem autorização expressa, podendo responder civil e criminalmente por ele.
•	Com a Política de Privacidade do site, assim como tratamos os dados referentes ao cadastro e visita no site, podendo a qualquer momento e forma, requerer a exclusão deles, através do formulário de contato.

7. DA MONETIZAÇÃO E PUBLICIDADE
	A VNOM pode alugar ou vender espaços publicitários na plataforma, ou no site, diretamente aos anunciantes, ou através de empresas especializadas com o Adsense (Google), Taboola ou outras plataformas especializadas como o EletroCriticas.com
	Essas publicidades não significam nenhuma forma de endosso ou responsabilidade pelos mesmos, ficando o USUÁRIO responsável pelas compras, visitas, acessos ou quaisquer ações referentes as estas empresas.
	Todas as propagandas no site ou plataforma serão claramente destacadas como publicidade, como forma de disclaimer da VNOM e de conhecimento do USUÁRIO.
	Em casos de compra de serviços, pacotes da VNOM, será possível a devolução em até 07 (sete) dias, conforme o Código de Defesa do Consumidor.
	Estes anúncios podem ser selecionados pela empresa de publicidade automaticamente, conforme as visitas recentes do VISITANTE, assim como baseado no seu histórico de busca, conforme as políticas de acesso da plataforma.
	A forma de pagamento, retribuição ou remuneração, será discutida entre ambos os perfis. A VNOM não se responsabiliza pela forma que esta questão será resolvida e nem se caso não houver a devida troca, seu cunho é apenas de unir e localizar prestadores e usuários.

8. DENÚNCIAS
	Dentro das denúncias, nenhuma violação dos direitos humanos, trabalhistas serão permitidos na plataforma. Caso algum das violações forem identificadas, o perfil deverá ser reportado imediatamente, assim sua denúncia sendo repassada para os administradores, podendo também ser mandado um e-mail a VNOM que a respectiva apurará a denúncia.
	Nenhuma apologia a qualquer tipo de violência, dentre elas violência sexual, física, patrimonial, moral e psicológicas não serão toleradas.

9. DOS TERMOS GERAIS
	O Site pode apresentar hiperlinks durante sua experiência nele, que podem levar diretamente para outra página da empresa ou para sites externos.
	Apesar da VNOM apenas criar links para sites externos de extrema confiança, caso o usuário acesse um site externo, a VNOM não tem nenhuma responsabilidade pelo meio, sendo uma mera indicação de complementação de conteúdo, ficando o mesmo responsável pelo acesso, assim como sobre quaisquer ações que venham a realizar neste site.
	Em caso que ocorra eventuais conflitos judiciais entre o USUÁRIO e a VNOM, o foro elegido para a devida ação será o da comarca da Empresa, mesmo que haja outro mais privilegiado.
	Em circunstância, qualquer dúvida ou crítica em questão poderá ser reportada aos administradores pelos contatos deles disponibilizados.
	Estes Termos de uso são elaborados pelos alunos do 3º (terceiro) ano do ensino médio, para a conclusão do TCC no técnico em desenvolvimento de sistemas, Etec Jardim Ângela.

						</textarea>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>


					<div class="box_termo">
						<!--tenho que deixar na mesma linha-->
						<input type="checkbox" class="termo" value="termo" onclick="termocheck()">
						<label for="termo" id="lbl_li">Eu li, entendi e concordo com estas regras e condições.</label>
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