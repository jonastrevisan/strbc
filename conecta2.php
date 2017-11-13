<?php
  $host    = "mysql5aconnect.winserversecure.com";  	  //ip ou endereço do servidor
  $usuario = "sindjj";         //usuário
  $senha   = "catoct";             //senha
  $dbase   = "sindicatobd";         //banco que será usado nesta conexão
  
  $con = mysql_connect($host,$usuario,$senha);	//Efetua a conexão com o BD
  $db  = mysql_select_db($dbase, $con);			//Seleciona a base de dados
  if (!$con) {
    echo "Erro de conexão ao banco de dados!";
    exit();    
  }
?>
