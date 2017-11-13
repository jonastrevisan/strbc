<?php
ob_start();
  include("conecta.php");
  include("verifica.php");

  //recebendo informacoes do form
  	$matricula = $_GET["matricula"];
	$tipopesquisa = $_GET["tipopesquisa"];
		
if($matricula > 0){
	$sql = "UPDATE `socio` SET  `ativo` =  'S' WHERE `matricula` =".$matricula.";";
  	if($executa_sql = mysql_query($sql, $con)){
//buscar o maxid e inserir na tabela respostas 
		echo "Registro incluido com sucesso";
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"Registro incluido com sucesso!\");
</SCRIPT>";
  		header("Location: relatoriosocios.php?ativo=N&msg=S.php");	
 	}else{
		echo "Houve um erro ao incluir o registro, Tente novamente.";
  		echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";	 
 	}
}
?>

