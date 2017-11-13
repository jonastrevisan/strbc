<?php
     header('Content-Type: text/html; charset=utf-8');
$servidor = "localhost";

$user = "root";

$senha = "";

$db = "sindicato";

$conexao = mysql_connect($servidor,$user,$senha) or die (mysql_error());

$banco = mysql_select_db($db, $conexao) or die(mysql_error());
        mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');
?>