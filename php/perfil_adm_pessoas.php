<?php

include 'connect.php';

session_start();

if(!isset($_SESSION["logado"]) && $_SESSION["logado"] !== true){
	echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

if ($_SESSION['tipo_user'] != 1) {
    $_SESSION = array();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
}

$consulta = $connect->prepare("SELECT cd.id_user, cd.nome_user, p.avatar_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user WHERE cd.id_user = :id_user");
$consulta->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
$consulta->execute();


$fetchdata = $consulta->fetchAll();

foreach($fetchdata as $dados) {
    $nome_user = $dados['nome_user'];
    $avatar_user = $dados['avatar_user'];
}

$filtro_pessoas = 0;

if (isset($_POST['filtro_pessoas'])) {
    $filtro_pessoas = $_POST['filtro_pessoas'];

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
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    <!-- github acitivity css -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
    <link rel="stylesheet" href="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.css">
    
 
    <link id="theme-style" rel="stylesheet" href="../css/styles.css">
    
</head> 

<body>
    <form method="POST" class="register-form" id="register-form" action="" enctype="multipart/form-data">
    <!-- ******HEADER****** --> 
    <?php
        echo<<<HTML
        <header class="header">
        <div class="container">                       
            <img class="profile-image img-responsive pull-left" src="$avatar_user" width="16%" style="border-radius: 100%; border: 3px solid #fff; "/>
            <div class="profile-content pull-left">
                <h1 class="name">$nome_user</h1>
                <h2 class="desc">Administrador</h2>   
                <ul class="social list-inline">
                    <li><a href="#" style="background-color:black"><i class="fa fa-users"></i></a></li>
                    <li><a href="perfil_adm_services.php"><i class="fa fa-briefcase"></i></a></li>
        HTML;
                    ?>  
                    <li><select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="filtro_pessoas" style="background-color: black; margin-top: 0%;" id="filter">
                        <option value="0" <?=($filtro_pessoas== 0)? 'selected' : ''?>>Todos</option>
                        <option value="1" <?=($filtro_pessoas == 1)? 'selected' : ''?>>1- Administrador</option>
                        <option value="2" <?=($filtro_pessoas == 2)? 'selected' : ''?>>2- Usuário</option>
                        <option value="3" <?=($filtro_pessoas == 3)? 'selected' : ''?>>3- Prestador</option>
                        <option value="4" <?=($filtro_pessoas == 4)? 'selected' : ''?>>Denunciados</option>
                     </select></li>
                    <!-- <li><a href="#"><i class="fa fa-list-alt"></i></a></li>
                    <li><a href="#"><i class="fa fa-list"></i></a></li>                   
                    <li><a href="#"><i class="fa fa-wrench"></i></a></li>   
                    <li><a href="#"><i class="fa fa-exclamation"></i></a></li> -->
                </ul> 
            </div><!--//profile-->

            <a class="btn btn-cta-primary pull-right" href="logout.php"><i class="fa fa-sign-out"></i>Deslogar</a>
        </div><!--//container-->
    </header><!--//header-->

    <center>
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-sm-12 col-xs-12">
                <div class="wrap-input100 validate-input">
                    <h1 class="cad" id="list_tile">Usuários</h1> 
                 </div>
                 
                <input type="text" placeholder="Procure..." style=" width: 70%;" id="procurar" name="searchpeople">
                     <button type="submit"><a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                     </button>
            </div><!--//primary-->
    </div>
        </div>
        <?php
        if(empty($_POST['searchpeople'])) {
            if($filtro_pessoas == 0) {
        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user");
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();
    }

    elseif ($filtro_pessoas == 1) {
        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE cd.tipo_user = ?");
        $listagem->bindParam(1, $_POST['filtro_pessoas']);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();
    }

    elseif ($filtro_pessoas == 2) {
        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE cd.tipo_user = ?");
        $listagem->bindParam(1, $_POST['filtro_pessoas']);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();
    }

    elseif ($filtro_pessoas == 3) {
        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE cd.tipo_user = ?");
        $listagem->bindParam(1, $_POST['filtro_pessoas']);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();
    }

    elseif ($filtro_pessoas == 4) {
        $listagem = $connect->prepare("SELECT * FROM denuncia_user");
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

       
    

        

    }

    if ($filtro_pessoas == 0 OR $filtro_pessoas == 1 OR $filtro_pessoas == 2 OR $filtro_pessoas == 3) {
        echo<<<HTML
        <table class="table table-striped table-responsive table-action" id="table__result">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nickname</th>
        <th scope="col">Nome</th>
        <th scope="col">Sexo</th>
        <th scope="col">Email</th>
        <th scope="col">CPF</th>
        <th scope="col">Tipo</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">UF</th>
        <th scope="col">CEP</th>
        <th scope="col" colspan="2">AÇÕES</th>
        </tr>
        </thead>
    

        
        HTML;


        foreach($fetchlist as $dados) {
            $id_user = $dados['id_user'];
            $avatar_user = $dados['avatar_user'];
            $nomecomp = $dados['nomecom_user'];
            $nome_user = $dados['nome_user'];
            $email_user = $dados['email_user'];
            $cpf_user = $dados['cpf_user'];
            $dtnasc_user = $dados['dtnasc_user'];
            $sexo_user = $dados['sexo_user'];
            $cep_user = $dados['cep_user'];
            $uf_user = $dados['UF_user'];
            $tipo_user = $dados['tipo_user'];
            
            if ($tipo_user == 1) {
                $nome_tipo = 'Administrador';
            }
            elseif ($tipo_user == 2) {
                $nome_tipo = 'Usuário';
            }
            elseif ($tipo_user == 3) {
                $nome_tipo = 'Prestador';
            }
            elseif ($tipo_user == 4) {
                $nome_tipo = 'Banido';
            }
 
        echo<<<HTML

        <tbody>
        <tr>
        <th scope="row">$id_user</th>
        <td>$nome_user</td>
        <td>$nomecomp</td>
        <td>$sexo_user</td>
        <td>$email_user</td>
        <td>$cpf_user</td>
        <td>$nome_tipo</td>
        <td>$dtnasc_user</td>
        <td>$uf_user</td>
        <td>$cep_user</td>
        <td><a href='perfil_edit_user_adm.php?id_user=$id_user'>Editar</a></td>
        <td><a href='deluser_adm.php?id_user=$id_user' onclick="return confirm('Quer mesmo excluir esse usuário?');">Deletar</a></td>
        HTML;
    }
}

elseif ($filtro_pessoas = 4) {

    echo<<<HTML
        <table class="table table-striped table-responsive table-action" id="table__result">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tipo</th>
        <th scope="col">Motivo</th>
        <th scope="col">Denunciante</th>
        <th scope="col">Denunciado</th>
        <th scope="col">Descrição</th>
        <th scope="col">Status</th>
        <th scope="col">Data e Hora</th>
        <th scope="col" colspan="2">AÇÕES</th>
        </tr>
        </thead>
    

        
        HTML;

    foreach($fetchlist as $dados) {
        $id_den = $dados['id_den'];
        $tipo_den = $dados['tipo_den'];
        $motivo_den = $dados['motivo_den'];
        $denunciante_den = $dados['denunciante_den'];
        $denunciado_den = $dados['denunciado_den'];
        $descricao_den = $dados['descricao_den'];
        $status_den = $dados['status_den'];
        $datahora_den = $dados['datahora_den'];


        echo<<<HTML

        <tbody>
        <tr>
        <th scope="row">$id_den</th>
        <td>$tipo_den</td>
        <td>$motivo_den</td>
        <td>$denunciante_den</td>
        <td>$denunciado_den</td>
        <td>$descricao_den</td>
        <td>$status_den</td>
        <td>$datahora_den</td>
        <td><a href='visualizar_den.php?id_den=$id_den'>Visualizar</a></td>
        <td><a href='deldenuncia.php?id_den=$id_den' onclick="return confirm('Quer mesmo excluir essa denuncia?');">Deletar</a></td>
        HTML;
    }


}
}

        


else {

        $searchpeople = "%".$_POST['searchpeople']."%";

        if ($filtro_pessoas == 0) {

        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE (cd.id_user LIKE :searchpeople OR cd.nome_user LIKE :searchpeople)");
        $listagem->bindParam(':searchpeople', $searchpeople);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

        }

        elseif ($filtro_pessoas == 1) {

        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE (cd.id_user LIKE :searchpeople OR cd.nome_user LIKE :searchpeople) and cd.tipo_user = :tipo_user");
        $listagem->bindParam(':searchpeople', $searchpeople);
        $listagem->bindParam(':tipo_user', $filtro_pessoas);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif ($filtro_pessoas == 2) {

        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE (cd.id_user LIKE :searchpeople OR cd.nome_user LIKE :searchpeople) and cd.tipo_user = :tipo_user");
        $listagem->bindParam(':searchpeople', $searchpeople);
        $listagem->bindParam(':tipo_user', $filtro_pessoas);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif ($filtro_pessoas == 3) {

        $listagem = $connect->prepare("SELECT cd.id_user, p.avatar_user, cd.nomecom_user, cd.nome_user, cd.email_user, cd.cpf_user, cd.dtnasc_user, cd.sexo_user, ed.cep_user, ed.UF_user, cd.tipo_user FROM cad_user cd INNER JOIN perfil_user p ON cd.id_user = p.id_user INNER JOIN end_user ed ON cd.id_user = ed.id_user WHERE (cd.id_user LIKE :searchpeople OR cd.nome_user LIKE :searchpeople) and cd.tipo_user = :tipo_user");
        $listagem->bindParam(':searchpeople', $searchpeople);
        $listagem->bindParam(':tipo_user', $filtro_pessoas);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif ($filtro_pessoas == 4) {
        $listagem = $connect->prepare("SELECT * FROM denuncia_user WHERE (denunciante_den LIKE :searchpeople OR denunciado_den LIKE :searchpeople OR id_den LIKE :searchpeople)");
        $listagem->bindParam(':searchpeople', $searchpeople);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    if ($filtro_pessoas == 0 OR $filtro_pessoas == 1 OR $filtro_pessoas == 2 OR $filtro_pessoas == 3) {
        echo<<<HTML
        <table class="table table-striped table-responsive table-action" id="table__result">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nickname</th>
        <th scope="col">Nome</th>
        <th scope="col">Sexo</th>
        <th scope="col">Email</th>
        <th scope="col">CPF</th>
        <th scope="col">Tipo</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">UF</th>
        <th scope="col">CEP</th>
        <th scope="col" colspan="2">AÇÕES</th>
        </tr>
        </thead>
    

        
        HTML;


        foreach($fetchlist as $dados) {
            $id_user = $dados['id_user'];
            $avatar_user = $dados['avatar_user'];
            $nomecomp = $dados['nomecom_user'];
            $nome_user = $dados['nome_user'];
            $email_user = $dados['email_user'];
            $cpf_user = $dados['cpf_user'];
            $dtnasc_user = $dados['dtnasc_user'];
            $sexo_user = $dados['sexo_user'];
            $cep_user = $dados['cep_user'];
            $uf_user = $dados['UF_user'];
            $tipo_user = $dados['tipo_user'];
            
            if ($tipo_user == 1) {
                $nome_tipo = 'Administrador';
            }
            elseif ($tipo_user == 2) {
                $nome_tipo = 'Usuário';
            }
            elseif ($tipo_user == 3) {
                $nome_tipo = 'Prestador';
            }

            elseif ($tipo_user == 4) {
                $nome_tipo = 'Banido';
            }

        echo<<<HTML

        <tbody>
        <tr>
        <th scope="row">$id_user</th>
        <td>$nome_user</td>
        <td>$nomecomp</td>
        <td>$sexo_user</td>
        <td>$email_user</td>
        <td>$cpf_user</td>
        <td>$nome_tipo</td>
        <td>$dtnasc_user</td>
        <td>$uf_user</td>
        <td>$cep_user</td>
        <td><a href='perfil_edit_user_adm.php?id_user=$id_user'>Editar</a></td>
        <td><a href='deluser_adm.php?id_user=$id_user' onclick="return confirm('Quer mesmo excluir esse usuário?');">Deletar</a></td>
        HTML;
    }
}

elseif ($filtro_pessoas = 4) {

    echo<<<HTML
        <table class="table table-striped table-responsive table-action" id="table__result">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tipo</th>
        <th scope="col">Motivo</th>
        <th scope="col">Denunciante</th>
        <th scope="col">Denunciado</th>
        <th scope="col">Descrição</th>
        <th scope="col">Status</th>
        <th scope="col">Data e Hora</th>
        <th scope="col" colspan="2">AÇÕES</th>
        </tr>
        </thead>
    

        
        HTML;

    foreach($fetchlist as $dados) {
        $id_den = $dados['id_den'];
        $tipo_den = $dados['tipo_den'];
        $motivo_den = $dados['motivo_den'];
        $denunciante_den = $dados['denunciante_den'];
        $denunciado_den = $dados['denunciado_den'];
        $descricao_den = $dados['descricao_den'];
        $status_den = $dados['status_den'];
        $datahora_den = $dados['datahora_den'];


        echo<<<HTML

        <tbody>
        <tr>
        <th scope="row">$id_den</th>
        <td>$tipo_den</td>
        <td>$motivo_den</td>
        <td>$denunciante_den</td>
        <td>$denunciado_den</td>
        <td>$descricao_den</td>
        <td>$status_den</td>
        <td>$datahora_den</td>
        <td><a href=''>Visualizar</a></td>
        <td><a href='' onclick="return confirm('Quer mesmo excluir esse usuário?');">Deletar</a></td>
        HTML;
    }


}
}


    
    ?>
        </tr>
        </tbody>
        </table>
        
        
       
            
            <!-- 
            include 'conect.php';
            include 'session.php';
            
            $list_aluno = $sql -> query("SELECT * FROM aluno ORDER BY nome ASC");
            
            while ($linha = mysqli_fetch_array($list_aluno)){
            $rm = $linha['rm'];
            $nome = $linha['nome'];
            $data_nasc = $linha['data_nasc'];
            $sexo = $linha['sexo'];
            $email = $linha['email'];
            $senha = $linha['senha'];
            $obs = $linha['obs'];
            $avatar = $linha['avatar'];
            
            echo "<tr>
            <td class='tab2'> <a href= '../php/updateimg.php?rm= $rm'> <img src = ../$avatar heigth = 150px width = 150px> </a> </td>
            <td class='tab2'> $rm </td>
            <td class='tab2'> $nome </td>
            <td class='tab2'> $data_nasc </td>
            <td class='tab2'> $sexo </td>
            <td class='tab2'> $email </td>
            <td class='tab2'> $senha </td>
            <td class='tab2'> $obs </td>
            <td id='tab3'> <a id='tab3' href = '../php/update.php?rm= $rm'> ALTERAR </a> </td>
            <td id='tab4'> <a id='tab4' href = '../php/delete.php?rm= $rm' onclick=\"return confirm ('Deseja apagar os dados?');\"> EXCLUIR </a> </td>
            </tr>";
            }
            echo "</table>
            </center>";
            -->
    </div>
        
    </center>

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

