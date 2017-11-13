<?php
ob_start();
  include("conecta.php");
  include("verifica.php");

  //recebendo informacoes do form
  	$id = $_GET["id"];

  $sql = "UPDATE informativos SET flagmostrar='N', lido='S' WHERE id='".$id."';";

  if($executa_sql = mysql_query($sql, $con)){

  echo "Registro incluido com sucesso";

  header("Location: ../inicio.php");

  //echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }else{

  echo "Houve um erro ao incluir o registro";

  echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }
?>
