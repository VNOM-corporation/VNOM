<?php

include 'connect.php';

session_start();

if ($_SESSION['tipo_user'] != 1) {
    $_SESSION = array();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

$id_user = $_SESSION['id_get'];

$consulta = $connect->prepare("SELECT cd.nomecom_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, cd.nome_user, ed.cep_user, ed.cidade_user, ed.uf_user, ed.rua_user, ed.numcasa_user, ed.bairro_user, ed.comple_user, pf.avatar_user, pf.email_contato, pf.rede_wpp, pf.rede_inst, pf.rede_face, cp.area_atuante, cp.cargo_prestador FROM cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pf ON cd.id_user = pf.id_user INNER JOIN cad_prestador cp ON cd.id_user = cp.id_user WHERE cd.id_user = :id_user");
$consulta->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$consulta->execute();

$fetchdados = $consulta->fetchAll();

foreach($fetchdados as $dados) {
    $nomecomp = $dados['nomecom_user'];
    $cpf_user = $dados['cpf_user'];
    $dtnasc_user = $dados['dtnasc_user'];
    $sexo_user = $dados['sexo_user'];
    $nome_user = $dados['nome_user'];
    $cep_user = $dados['cep_user'];
    $cidade_user = $dados['cidade_user'];
    $uf_user = $dados['uf_user'];
    $rua_user = $dados['rua_user'];
    $numcasa = $dados['numcasa_user'];
    $bairro_user = $dados['bairro_user'];
    $complemento_user = $dados['comple_user'];
    $avatar_user = $dados['avatar_user'];
    $email_contato = $dados['email_contato'];
    $rede_wpp = $dados['rede_wpp'];
    $rede_inst = $dados['rede_inst'];
    $rede_face = $dados['rede_face'];
    $area_atuante = $dados['area_atuante'];
    $cargo_prestador = $dados['cargo_prestador'];

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>VNOM</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Website landing Page for Developers">
    <meta name="author" content="3rd Wave Media">    
    <link rel="shortcut icon" href="../images/fevicon.png">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="../fonts/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    <!-- github acitivity css -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
    <link rel="stylesheet" href="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.css">
    
 
    <link id="theme-style" rel="stylesheet" href="../css/styles.css">

    <script src="../js/img_view.js" defer></script>
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container"> 
            <center>                
           <a href=home.html><img src="../images/1.png" width="16%" style="border-radius: 100%; border: 3px solid #fff;"/></a>
            </center>      
        </header><!--//header-->

    <form action="perfil_update_prest_adm.php" method="POST" enctype="multipart/form-data">
    
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">

                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Dados da Conta</h2>
                        <div class="content">
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                            <?php
                            echo<<<HTML
                                <label>Nome de Usuário</label> <input placeholder="Nome de Usuário"  type="text" class="isd" value="$nome_user" name="nome_user"/>
                                <input type="hidden" name="id_user" value="$id_user" readonly>
                               <br><br>
                               <label>Imagem de Perfil</label> 
                               <p>*Apenas arquivos .jpg e .png*</p>
                               <input type="file" class="isd" id="image" accept=".png, .jpg" name="avatar"/>
                                <br><br>
                                <center>
                                <img src="$avatar_user" width="20%" style="border-radius:100%;">
                                <i class="fa fa-arrow-right" style="font-size:xx-large; margin-left:20px; margin-right:20px;"></i>
                                <img src="" id="preview-img" width="20%" style="border-radius:100%;"/>
                            </center>
                            </div><!--//item-->
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                HTML;

                echo<<<HTML
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Mídias Sociais e Contato</h2>
                        <div class="content">
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                                <label>E-mail</label> <input type="email" placeholder="user@mail.com" class="isd" value="$email_contato" name="email_contato"/>
                                <br><br>
                                <label>Whatsapp</label> <input placeholder="+00(00)00000-0000" id="wpp" class="isd" value="$rede_wpp" type="text" name="rede_wpp"/>
                                <script type="text/javascript">
                                $("#wpp").mask("+00(00)00000-0000");
                                </script>
                                <br><br>
                                <label>Instagram</label> <input placeholder="@user" class="isd" value="$rede_inst" type="text" name="rede_inst"/>
                                <br><br>
                                <label>Facebook</label> <input placeholder="Perfil" class="isd" value="$rede_face" type="text" name="rede_face"/>
                            </div><!--//item-->
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                HTML;

                echo<<<HTML
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Dados de Prestador</h2>
                        <div class="content">
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">

                                <label>Área Atuante</label> <input placeholder="Área de Prestador" class="isd" value="$area_atuante" readonly type="text"/>
                            <select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="area_atuante" style=" width:100%; color: black;">
                               <option value="" selected>Selecione outra área</option>
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
                                <br><br>
                                <label>Cargo Desempenhado</label> <input placeholder="Cargo de Prestador" class="isd" value="$cargo_prestador" type="text" name="cargo_prestador"/>
                            </div><!--//item-->
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                HTML;
               ?>
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Endereço</h2>
                        <div class="content">

                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                                <label>Estado</label> 
                                <BR>
                                <select name="uf_estado">
                                    <option value="" <?=($uf_user == 'Estado')? 'selected' : ''?>>Estado</option> 
                                    <option value="AC" <?=($uf_user == 'AC')? 'selected' : ''?>>Acre - AC</option>
                                    <option value="AL" <?=($uf_user == 'AL')? 'selected' : ''?>>Alagoas - AL</option>
                                    <option value="AP" <?=($uf_user == 'AP')? 'selected' : ''?>>Amapá - AP</option>
                                    <option value="AM" <?=($uf_user == 'AM')? 'selected' : ''?>>Amazonas - AM</option>
                                    <option value="BA" <?=($uf_user == 'BA')? 'selected' : ''?>>Bahia - BA</option>
                                    <option value="CE" <?=($uf_user == 'CE')? 'selected' : ''?>>Ceará - CE</option>
                                    <option value="DF" <?=($uf_user == 'DF')? 'selected' : ''?>>Distrito Federal - DF</option>
                                    <option value="ES" <?=($uf_user == 'ES')? 'selected' : ''?>>Espirito Santo - ES</option>
                                    <option value="GO" <?=($uf_user == 'GO')? 'selected' : ''?>>Goiás - GO</option>
                                    <option value="MA" <?=($uf_user == 'MA')? 'selected' : ''?>>Maranhão - MA</option>
                                    <option value="MS" <?=($uf_user == 'MS')? 'selected' : ''?>>Mato Grosso do Sul - MS</option>
                                    <option value="MT" <?=($uf_user == 'MT')? 'selected' : ''?>>Mato Grosso - MT</option>
                                    <option value="MG" <?=($uf_user == 'MG')? 'selected' : ''?>>Minas Gerais - MG</option>
                                    <option value="PA" <?=($uf_user == 'PA')? 'selected' : ''?>>Pará - PA</option>
                                    <option value="PB" <?=($uf_user == 'PB')? 'selected' : ''?>>Paraíba - PB</option>
                                    <option value="PR" <?=($uf_user == 'PR')? 'selected' : ''?>>Paraná - PR</option>
                                    <option value="PE" <?=($uf_user == 'PE')? 'selected' : ''?>>Pernambuco - PE</option>
                                    <option value="PI" <?=($uf_user == 'PI')? 'selected' : ''?>>Piauí - PI</option>
                                    <option value="RJ" <?=($uf_user == 'RJ')? 'selected' : ''?>>Rio de Janeiro - RJ</option>
                                    <option value="RN" <?=($uf_user == 'RN')? 'selected' : ''?>>Rio Grande do Norte - RN</option>
                                    <option value="RS" <?=($uf_user == 'RS')? 'selected' : ''?>>Rio Grande do Sul - RS</option>
                                    <option value="RO" <?=($uf_user == 'RO')? 'selected' : ''?>>Rondônia - RO</option>
                                    <option value="RR" <?=($uf_user == 'RR')? 'selected' : ''?>>Roraima - RR</option>
                                    <option value="SC" <?=($uf_user == 'SC')? 'selected' : ''?>>Santa Catarina - SC</option>
                                    <option value="SP" <?=($uf_user == 'SP')? 'selected' : ''?>>São Paulo - SP</option>
                                    <option value="SE" <?=($uf_user == 'SE')? 'selected' : ''?>>Sergipe - SE</option>
                                    <option value="TO" <?=($uf_user == 'TO')? 'selected' : ''?>>Tocantins - TO</option>
                                </select>
                                <?php
                                echo<<<HTML
                               <br><br>
                               <label>CEP</label> <input placeholder="00000-000" class="isd" value="$cep_user" type="text" name="cep_user"/>
                                <br><br>
                                <label>Cidade</label> <input placeholder="Cidade" class="isd" value="$cidade_user" type="text" name="cidade_user"/>
                                <br><br>
                                <label>Bairro</label> <input placeholder="Bairro" class="isd" value="$bairro_user" type="text" name="bairro_user"/>
                                <br><br>
                               <label>Rua</label> <input placeholder="Rua" class="isd" value="$rua_user" name="rua_user"/>
                                <br><br>
                                <label>Número</label> <input placeholder="Número" class="isd" value="$numcasa" type="text" name="numero_user"/>
                                <br><br>
                                <label>Complemento</label> <input placeholder="Complemento" class="isd" value="$complemento_user" type="text" name="complemento_user"/>
                            </div><!--//item-->
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                HTML;

                echo<<<HTML
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Dados Pessoais</h2>
                        <div class="content">
                            <!-- TUDO READONLY AQUI -->
                            <!-- NÃO PRECISA ALTERAR NO BANCO -->
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                               <label>Nome Completo</label> <input placeholder="Nome Completo" class="isd" value="$nomecomp" type="text" name="nomecomp"/>
                               <br><br>
                               <label>CPF</label> <input placeholder="000.000.000-00"  class="isd" value="$cpf_user" type="text" name="cpf_user"/>
                                <br><br>
                                <label>Data de Nascimento</label> <input placeholder="dd/mm/yyyy" class="isd"  value="$dtnasc_user" type="date" name="dtnasc_user"/>
                                <br><br>
                                <label>Sexo</label> <input placeholder="Sexo" class="isd"  value="$sexo_user" type="text" name="sexo_user"/>
                                
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                HTML;
                ?>
                
                <section class="projects section">
                    <div class="section-inner">
                        <div class="content">
                        <div class="item">
                        <center>
                        <button class="btn btn-cta-secondary" type="submit">Salvar Alterações</button>
                        </center>
                        </div><!--//content--> 
                        </div> 
                    </div><!--//section-inner-->                 
                </section><!--//section-->


            </div><!--//primary-->

            <div class="secondary col-md-4 col-sm-12 col-xs-12">
                 <aside class="info aside section">
                    <div class="section-inner">
                        <h2 class="heading sr-only">Basic Information</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-arrow-left"></i><a href="perfil_adm_pessoas.php">Voltar</a></li>
                            </ul>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->

                            </ul>
                        </div>
                    </div>
                </aside>
    </form>
             
               
                
              
  
    <!-- Javascript -->          
    <script type="text/javascript" src="../plugins/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="../plugins/jquery-rss/dist/jquery.rss.min.js"></script> 
    <!-- github activity plugin -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
    <script type="text/javascript" src="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="../js/main2.js"></script>            
</body>
</html> 

