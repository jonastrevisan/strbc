<?php

ob_start();

  include("conecta.php");

  include("verifica.php");





  //recebendo informacoes do form

  	$matricula = $_POST["matricula"];

  	$idpagto = $_POST["idpagto"];

	$valor = $_POST["valor"];

	$datapagto = date("Y-m-d");

	





  $sql = "UPDATE cobranca SET datapagto='".$datapagto."', valor='".$valor."', situacao='pago' WHERE idpagto='".$idpagto."';";



  if($executa_sql = mysql_query($sql, $con)){

  echo "Registro incluido com sucesso";
header("Location: recibo.php?idpagto=".$idpagto);

  }else{

  echo "Houve um erro ao incluir o registro";

  echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }



?>

