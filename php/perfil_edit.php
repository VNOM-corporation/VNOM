<?php

include 'connect.php';

session_start();

$consulta = $connect->prepare("SELECT cd.nomecom_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, cd.nome_user, ed.cep_user, ed.cidade_user, ed.uf_user, ed.rua_user, ed.numcasa_user, ed.bairro_user, ed.comple_user, pf.avatar_user FROM cad_user cd INNER JOIN end_user ed ON cd.id_user = ed.id_user INNER JOIN perfil_user pf ON cd.id_user = pf.id_user WHERE 
cd.id_user = :id_user");
$consulta->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
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
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container"> 
            <center>                
           <a href=perfil.php><img src="../images/1.png" width="16%" style="border-radius: 100%; border: 3px solid #fff;"/></a>
            </center>      
        </header><!--//header-->

    <form action="perfil_update.php" method="POST" enctype="multipart/form-data">
    
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
               
                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Dados Pessoais</h2>
                        <div class="content">
                            <!-- TUDO READONLY AQUI -->
                            <?php
                            echo<<<HTML
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                               <label>Nome Completo</label> <input type="text" placeholder="Nome Completo" class="isd" value="$nomecomp" name="nomecomp" readonly/>
                               <br><br>
                               <label>CPF</label> <input type="text" placeholder="000.000.000-00"  class="isd" value="$cpf_user" name="cpf_user" readonly/>
                                <br><br>
                                <label>Data de Nascimento</label> <input type="date" placeholder="dd/mm/yyyy" class="isd" value="$dtnasc_user" name="dtnasc_user" readonly/>
                                <br><br>
                                <label>Sexo</label> <input type="text" placeholder="Sexo" class="isd" value="$sexo_user" readonly/>
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
                                <br>
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
                               <br><br>
                               <?php
                               echo<<<HTML
                               <label>CEP</label> <input type="text" placeholder="00000-000" class="isd" value="$cep_user" name="cep_user"/>
                                <br><br>
                                <label>Cidade</label> <input type="text" placeholder="Cidade" class="isd" value="$cidade_user" name="cidade_user"/>
                                <br><br>
                                <label>Bairro</label> <input type="text" placeholder="Bairro" class="isd" value="$bairro_user" name="bairro_user"/>
                                <br><br>
                               <label>Rua</label> <input type="text" placeholder="Rua" class="isd" value="$rua_user" name="rua_user"/>
                                <br><br>
                                <label>Número</label> <input type="text" placeholder="Número" class="isd" value="$numcasa" name="numero_user"/>
                                <br><br>
                                <label>Complemento</label> <input type="text" placeholder="Complemento" class="isd" value="$complemento_user" name="complemento_user"/>
                            </div><!--//item-->
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->

                <section class="projects section">
                    <div class="section-inner">
                        <h2 class="heading">Dados da Conta</h2>
                        <div class="content">
                            <div class="item" style="background-color:#f1f1f1; padding: 20px; border-radius: 10px;">
                                <label>Nome de Usuário</label> <input type="text" placeholder="Nome de Usuário" class="isd" value="$nome_user" name="nome_user"/>
                               <br><br>
                               <label>Imagem de Perfil</label> <input type="file" class="isd" name="avatar" accept=".png, .jpg"/>
                               <br>
                               <p>*Apenas arquivos .jpg e .png*</p>
                                <br>
                                <img src="$avatar_user" width="10%">
                            </div><!--//item-->
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                HTML;
                ?>

                
                <section class="projects section">
                    <div class="section-inner">
                        <div class="content">
                        <div class="item">
                        <center>
                        <input type="submit" class="btn btn-cta-secondary" value="Salvar Alterações">
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
                                <li><i class="fa fa-pencil"></i><a class="more-link" href="#">Editar meus dados</a></li>
                                <li><i class="fa fa-arrow-left"></i><a href="perfil.php">Voltar</a></li>
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

