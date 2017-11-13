<?php
$host = "localhost"; // ip184.173.23.21 ou endereço do servidor

$usuario = "root"; // usuário

$senha = ""; // senha

$dbase = "strbc_sindicato"; // banco que será usado nesta conexão

$con = mysql_connect($host, $usuario, $senha); // Efetua a conexão com o BD

$db = mysql_select_db($dbase, $con) or DIE(mysql_error()); // Seleciona a base de dados

if (! $con) {
    
    echo "Erro de conexão ao banco de dados!";
    
    exit();
}

?>

