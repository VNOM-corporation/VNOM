<?php

include 'connect.php';

if (!isset($_GET['id_user'])) {
    echo"<meta http-equiv='refresh' content='0;url=perfil.php'>";
    exit;
}

$deluser = $connect->prepare("DELETE FROM cad_user WHERE id_user = ?");
$deluser->bindParam(1, $_GET['id_user'], PDO::PARAM_INT);
$deluser->execute();

echo"<meta http-equiv='refresh' content='0;url=logout.php'>";
exit;
?>