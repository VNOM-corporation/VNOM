<?php

include 'connect.php';

$cpf_verify = "%".$_POST['cpf_user']."%";

$sqlcpf = $connect->prepare("SELECT * FROM cad_user WHERE cpf_user= :cpf_user");
$sqlcpf->bindParam(':cpf_user', $cpf_verify);
$sqlcpf->execute();




?>
