<?php

ob_start();

  include("conecta.php");

  include("verifica.php");





  //recebendo informacoes do form

  	$matricula = $_POST["matricula"];

	$admissaooriginal = $_POST["admissao"];

	//$admissao = date("Y-m-d", $admissaooriginal);

	$datas = explode("/", $admissaooriginal);

	$admissao = $datas[2]."-".$datas[1]."-".$datas[0];

	$inscricao = $_POST["inscricao"];

	$nome = $_POST["nome"];

	$natural = $_POST["natural"];

	$estado = $_POST["estado"];

	$nasciemntos = explode("/", $_POST["datanascimento"]);

	$nascimento = $nasciemntos[2]."-".$nasciemntos[1]."-".$nasciemntos[0];

	$estcivil = $_POST["estcivil"];

	$rg = $_POST["rg"];

	$serie = $_POST["serie"];

	$prsocial = $_POST["prsocial"];

	$cpf = $_POST["cpf"];

	$certrese = $_POST["certrese"];

	$pai = $_POST["pai"];

	$nacpai = $_POST["nacpai"];

	$mae = $_POST["mae"];

	$nacmae = $_POST["nacmae"];

	$propriedade1 = $_POST["propriedade1"];

	$proprietario1 = $_POST["proprietario1"];

	$endprop1 = $_POST["endprop1"];

	$dataadmi1s = explode("/", $_POST["dataadmi1"]); 

	$dataadmi1 = $dataadmi1s[2]."-".$dataadmi1s[1]."-".$dataadmi1s[0];

	$propriedade2 = $_POST["propriedade2"];

	$proprietario2 = $_POST["proprietario2"];

	$endprop2 = $_POST["endprop2"];

	$dataadmi2s = explode("/", $_POST["dataadmi2"]);

	$dataadmi2 = $dataadmi2s[2]."-".$dataadmi2s[1]."-".$dataadmi2s[0];

	$depnome1 = $_POST["depnome1"];

	$deppar1 = $_POST["deppar1"];

	$depnas1s = explode("/", $_POST["depnas1"]);

	$depnas1 = $depnas1s[2]."-".$depnas1s[1]."-".$depnas1s[0];

	$depnome2 = $_POST["depnome2"];

	$deppar2 = $_POST["deppar2"];

	$depnas2s = explode("/", $_POST["depnas2"]);

	$depnas2 = $depnas2s[2]."-".$depnas2s[1]."-".$depnas2s[0];

	$depnome3 = $_POST["depnome3"];

	$deppar3 = $_POST["deppar3"];

	$depnas3s = explode("/", $_POST["depnas3"]);

	$depnas3 = $depnas3s[2]."-".$depnas3s[1]."-".$depnas3s[0];

	$depnome4 = $_POST["depnome4"];

	$deppar4 = $_POST["deppar4"];

	$depnas4s = explode("/", $_POST["depnas4"]);

	$depnas4 = $depnas4s[2]."-".$depnas4s[1]."-".$depnas4s[0];

	$depnome5 = $_POST["depnome5"];

	$deppar5 = $_POST["deppar5"];

	$depnas5s = explode("/", $_POST["depnas5"]);

	$depnas5 = $depnas5s[2]."-".$depnas5s[1]."-".$depnas5s[0];

	$obs = $_POST["obs"];
	
	$cidadeatual = $_POST["cidadeatual"];

	

  //Prepara e executa a string de consulta ao BD

  /*exemplo sql

  INSERT INTO `sindicatobd`.`socio` (`matricula`, `admissao`, `inscricao`, `nome`, `naturalidade`, `estado`, `datanascimento`, `estcivil`, `rg`, `serie`, `prsocial`, `cpf`, `certificadoreserv`, `pai`, `nacionalidadepai`, `mae`, `nacionalidademae`, `propriedade1`, `proprietario1`, `endereco1`, `dataemissao1`, `propriedade2`, `proprietario2`, `endereco2`, `dataemissao2`, `nomedependente1`, `nomedependente2`, `nomedependente3`, `nomedependente4`, `nomedependente5`, `nomedependente6`, `parentesco1`, `parentesco2`, `parentesco3`, `parentesco4`, `parentesco5`, `parentesco6`, `datanasc1`, `datanasc2`, `datanasc3`, `datanasc4`, `datanasc5`, `datanasc6`, `obs`) VALUES ('0000001', '2011-09-05', '0000001', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

  */

 

  $sql = "UPDATE socio SET admissao='".$admissao."', inscricao='".$inscricao."', nome='".$nome."', naturalidade='".$natural."', estado='".$estado."', datanascimento='".$nascimento."', estcivil='".$estcivil."', rg='".$rg."', serie='".$serie."', prsocial='".$prsocial."', cpf='".$cpf."', certificadoreserv='".$certrese."', pai='".$pai."', nacionalidadepai='".$nacpai."', mae='".$mae."', nacionalidademae='".$nacmae."', propriedade1='".$propriedade1."', proprietario1='".$proprietario1."', endereco1='".$endprop1."', dataemissao1='".$dataadmi1."', propriedade2='".$propriedade2."', proprietario2='".$proprietario2."', endereco2='".$endprop2."', dataemissao2='".$dataadmi2."', nomedependente1='".$depnome1."', nomedependente2='".$depnome2."', nomedependente3='".$depnome3."', nomedependente4='".$depnome4."', nomedependente5='".$depnome5."', nomedependente6=NULL, parentesco1='".$deppar1."', parentesco2='".$deppar2."', parentesco3='".$deppar3."', parentesco4='".$deppar4."', parentesco5='".$deppar5."', parentesco6=NULL, datanasc1='".$depnas1."', datanasc2='".$depnas2."', datanasc3='".$depnas3."', datanasc4='".$depnas4."', datanasc5='".$depnas5."', datanasc6=NULL, obs='".$obs."', cidadeatual='".$cidadeatual."' WHERE matricula='".$matricula."';";

  

/*  UPDATE table_name

SET column1=value, column2=value2,...

WHERE some_column=some_value*/



  if($executa_sql = mysql_query($sql, $con)){

  echo "Registro incluido com sucesso";

  header("Location: vendosocio.php?selecionado=m&matricula=".$matricula."&nome=&tipopesquisa=edicao&salvo=s");

  //echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }else{

  echo "Houve um erro ao incluir o registro";

  echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";

  }



?>

