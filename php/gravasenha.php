<?php
ob_start();
  include("conecta.php");
  include("verifica.php");


  //recebendo informacoes do form
  	$senhaatual = $_POST["senhaatual"];
  	$senhanova = $_POST["senhanova"];
	$senhanova2 = $_POST["senhanova2"];

if($senhaatual <> '36441066' || $senhanova <> $senhanova2 || $senhanova == '36441066'){
  if($senhanova == '36441066'){
	echo "Sua senha nova não pode ser igual a senha antiga, tente novamente";
    	echo "<a href=\"javascript:history.go(-1)\">Voltar</a>";
  }else{
	echo "Sua senha atual esta incorreta ou a senha nova n'ao foi confirmada, a senha n'ao foi atualizada, tente novamente";
    	echo "<a href=\"javascript:history.go(-1)\">Voltar</a>";
  }
}
else{
  $sql = "UPDATE users SET senhaa='".$senhanova."' WHERE id=5";

  if($executa_sql = mysql_query($sql, $con)){
	  echo "Senha atualizada com sucesso";
	  echo "<a href=\"javascript:history.go(-2)\">Clique aqui para Voltar ao menu principal</a>";
  }else{
  echo "Houve um erro ao atualizar, tente novamente";
  echo "<a href=\"javascript:history.go(-1)\">Voltar</a>";
  }
}
?>
