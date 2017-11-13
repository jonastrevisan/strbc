<?php
ob_start();
  include("conecta.php");
  include("verifica.php");

  //recebendo informacoes do form
  	$oculta = $_GET["oculta"];
if($oculta == 'true'){
	$sql = "UPDATE informativos SET lido='S' WHERE id='11';";
}else{
  	$sql = "UPDATE informativos SET lido='N' WHERE id='11';";
}
  if($executa_sql = mysql_query($sql, $con)){

  echo "Registro incluido com sucesso";

  header("Location: ../inicio.php");

  //echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }else{

  echo "Houve um erro ao editar Registro";

  echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }
?>
