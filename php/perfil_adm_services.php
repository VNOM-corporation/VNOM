
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

$categoria_serv = "TODOS";

if (isset($_POST['categoria_serv'])) {
    $categoria_serv = $_POST['categoria_serv'];
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
    <form method="POST" class="register-form" id="register-form" action="" enctype="multipart/form-data">
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">    
        <?php
        echo<<<HTML
                        <img class="profile-image img-responsive pull-left" src="$avatar_user" width="16%" style="border-radius: 100%; border: 3px solid #fff; "/>
                        <div class="profile-content pull-left">    
                        <h1 class="name">$nome_user</h1>
                        <h2 class="desc">Administrador</h2> 
                        HTML;
                        ?>  
                        <ul class="social list-inline">
                        <li><a href="perfil_adm_pessoas.php"><i class="fa fa-users"></i></a></li>
                        <li><a href="#" style="background-color:black"><i class="fa fa-briefcase"></i></a></li>  
                        <li><select required class="btn btn-secondary dropdown-toggle" class="dropdown-menu" name="categoria_serv" style="background-color: black; margin-top: 0%;">
                        <option value="TODOS">TODOS</option>
                        <option value="EDUCAÇÃO E CULTURA" <?=($categoria_serv == 'EDUCAÇÃO E CULTURA')? 'selected' : ''?>>EDUCAÇÃO E CULTURA</option>
                        <option value="ESTÉTICA E BELEZA" <?=($categoria_serv == 'ESTÉTICA E BELEZA')? 'selected' : ''?>>ESTÉTICA E BELEZA</option>
                        <option value="LIMPEZA E CONSERVAÇÃO" <?=($categoria_serv == 'LIMPEZA E CONSERVAÇÃO')? 'selected' : ''?>>LIMPEZA E CONSERVAÇÃO</option>
                        <option value="REFORMAS E SERVIÇOS GERAIS" <?=($categoria_serv == 'REFORMAS E SERVIÇOS GERAIS')? 'selected' : ''?>>REFORMAS E SERVIÇOS GERAIS</option>
                        <option value="MANUTENÇÃO AUTOMOTIVA" <?=($categoria_serv == 'MANUTENÇÃO AUTOMOTIVA')? 'selected' : ''?>>MANUTENÇÃO AUTOMOTIVA</option>
                        <option value="FESTAS E EVENTOS" <?=($categoria_serv == 'FESTAS E EVENTOS')? 'selected' : ''?>>FESTAS E EVENTOS</option>
                        <option value="SAÚDE E BEM ESTAR" <?=($categoria_serv == 'SAÚDE E BEM ESTAR')? 'selected' : ''?>>SAÚDE E BEM ESTAR</option>
                        <option value="TECNOLOGIA" <?=($categoria_serv == 'TECNOLOGIA')? 'selected' : ''?>>TECNOLOGIA</option>
                        <option value="TRANSPORTE" <?=($categoria_serv == 'TRANSPORTE')? 'selected' : ''?>>TRANSPORTE</option>
                        <option value="OUTRO" <?=($categoria_serv == 'OUTRO')? 'selected' : ''?>>OUTRO</option>
                     </select></li>
                    <!-- <li><a href="#"><i class="fa fa-list-alt"></i></a></li>
                    <li><a href="#"><i class="fa fa-list"></i></a></li>                   
                    <li><a href="#"><i class="fa fa-wrench"></i></a></li>   
                    <li><a href="#"><i class="fa fa-exclamation"></i></a></li> -->
                </ul> 
            </div><!--//profile-->
        </div><!--//container-->
    </header><!--//header-->
    <center>
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-sm-12 col-xs-12">
                <div class="wrap-input100 validate-input">
                    <h1 class="cad" id="list_tile">Solicitações</h1> 
                 </div>
                 
                <input type="text" placeholder="Procure..." style=" width: 70%;" name="pesquisar" id="pesquisar">
                     <button type="submit"><a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                     </button>
            </div><!--//primary-->
    </div>
        </div>
        <div>
            <?php

            if (empty($_POST['pesquisar'])) {
                
                if($categoria_serv == "TODOS") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user");
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "EDUCAÇÃO E CULTURA") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "ESTÉTICA E BELEZA") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "LIMPEZA E CONSERVAÇÃO") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "REFORMAS E SERVIÇOS GERAIS") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "MANUTENÇÃO AUTOMOTIVA") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "FESTAS E EVENTOS") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "SAÚDE E BEM ESTAR") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "TECNOLOGIA") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "TRANSPORTE") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        elseif($categoria_serv == "OUTRO") {

            $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = ?");
            $listagem->bindParam(1, $categoria_serv);
            $listagem->execute();
    
            $fetchlist = $listagem->fetchAll();

        }

        
    
            
            echo<<<HTML

        <table class="table table-striped table-responsive table-action" id="table__result">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Descrição</th>
        <th scope="col">Usuário</th>
        <th scope="col">Prazo</th>
        <th scope="col">Valor</th>
        <th scope="col">Carga Horária</th>
        <th scope="col">Atendimento</th>
        <th scope="col">Local</th>
        <th scope="col">Equipamento</th>
        <th scope="col">Categoria</th>
        <th scope="col" colspan="2">AÇÕES</th>
        </tr>
        </thead>

        HTML;



        foreach($fetchlist as $dados) {
            $id_serv = $dados['id_serv'];
            $nome_user = $dados['nome_user'];
            $titulo_serv = $dados['titulo_serv'];
            $desc_serv = $dados['desc_serv'];
            $valor_serv = $dados['valor_serv'];
            $cargahor_serv = $dados['cargahor_serv'];
            $categoria_serv = $dados['categoria_serv'];
            $tipo_serv = $dados['tipo_serv'];
            $local_serv = $dados['local_serv'];
            $equipamento_serv = $dados['equipamento_serv'];
            $img_serv = $dados['img_serv'];
            $status_serv = $dados['status_serv'];
            $data_serv = $dados['data_serv'];
            $data_prazo = $dados['datapraz_serv'];
         
          

        echo<<<HTML

        <tbody>
        <tr>
        <th scope="row">$id_serv</th>
        <td>$titulo_serv</td>
        <td>$desc_serv</td>
        <td>$nome_user</td>
        <td>$data_prazo</td>
        <td>$valor_serv</td>
        <td>$cargahor_serv</td>
        <td>$tipo_serv</td>
        <td>$local_serv</td>
        <td>$equipamento_serv</td>
        <td>$categoria_serv</td>
        <td><a href='cadservicealt.php?id_serv=$id_serv'>Editar</a></td>
        <td><a href='delservice_adm.php?id_serv=$id_serv' onclick="return confirm('Quer mesmo excluir esse serviço?');">Deletar</a></td>
        HTML;
    }
}


else {

    $buscarp = "%".$_POST['pesquisar']."%";

    if($categoria_serv == "TODOS") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "EDUCAÇÃO E CULTURA") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "ESTÉTICA E BELEZA") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "LIMPEZA E CONSERVAÇÃO") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "REFORMAS E SERVIÇOS GERAIS") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "MANUTENÇÃO AUTOMOTIVA") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "FESTAS E EVENTOS") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "SAÚDE E BEM ESTAR") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "TECNOLOGIA") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "TRANSPORTE") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    elseif($categoria_serv == "OUTRO") {

        $listagem = $connect->prepare("SELECT cs.id_serv, cd.nome_user, cs.titulo_serv, cs.desc_serv, cs.valor_serv, cs.cargahor_serv, cs.categoria_serv, cs.tipo_serv, cs.local_serv, cs.equipamento_serv, cs.img_serv, cs.status_serv, cs.data_serv, cs.datapraz_serv FROM cad_service cs INNER JOIN cad_user cd ON cs.id_user = cd.id_user WHERE cs.categoria_serv = :categoria_serv AND (cs.id_serv LIKE :buscar OR cd.nome_user LIKE :buscar OR cs.titulo_serv LIKE :buscar)");
        $listagem->bindParam(':categoria_serv', $categoria_serv);
        $listagem->bindParam(':buscar', $buscarp, PDO::PARAM_STR);
        $listagem->execute();

        $fetchlist = $listagem->fetchAll();

    }

    
            
    echo<<<HTML

    <table class="table table-striped table-responsive table-action" id="table__result">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Titulo</th>
    <th scope="col">Descrição</th>
    <th scope="col">Usuário</th>
    <th scope="col">Prazo</th>
    <th scope="col">Valor</th>
    <th scope="col">Carga Horária</th>
    <th scope="col">Atendimento</th>
    <th scope="col">Local</th>
    <th scope="col">Equipamento</th>
    <th scope="col">Categoria</th>
    <th scope="col" colspan="2">AÇÕES</th>
    </tr>
    </thead>

    HTML;



    foreach($fetchlist as $dados) {
        $id_serv = $dados['id_serv'];
        $nome_user = $dados['nome_user'];
        $titulo_serv = $dados['titulo_serv'];
        $desc_serv = $dados['desc_serv'];
        $valor_serv = $dados['valor_serv'];
        $cargahor_serv = $dados['cargahor_serv'];
        $categoria_serv = $dados['categoria_serv'];
        $tipo_serv = $dados['tipo_serv'];
        $local_serv = $dados['local_serv'];
        $equipamento_serv = $dados['equipamento_serv'];
        $img_serv = $dados['img_serv'];
        $status_serv = $dados['status_serv'];
        $data_serv = $dados['data_serv'];
        $data_prazo = $dados['datapraz_serv'];
     
      

    echo<<<HTML

    <tbody>
    <tr>
    <th scope="row">$id_serv</th>
    <td>$titulo_serv</td>
    <td>$desc_serv</td>
    <td>$nome_user</td>
    <td>$data_prazo</td>
    <td>$valor_serv</td>
    <td>$cargahor_serv</td>
    <td>$tipo_serv</td>
    <td>$local_serv</td>
    <td>$equipamento_serv</td>
    <td>$categoria_serv</td>
    <td><a href='cadservicealt.php?id_serv=$id_serv'>Editar</a></td>
    <td><a href='delservice_adm.php?id_serv=$id_serv' onclick="return confirm('Quer mesmo excluir esse serviço?');">Deletar</a></td>
    HTML;
    }
}

    
    ?>
        </tr>
        </tbody>
        </table>
        </div>
        
       
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