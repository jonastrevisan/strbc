<?php
ob_start();
  include("conecta.php");
  include("verifica.php");

  //recebendo informacoes do form
  	$idsuporte = $_POST["idsuporte"];
	$data = $_POST["data"];
	$nome = $_POST["nome"];
	$titulo = $_POST["titulo"];
	$resp = $_POST["resp"];
	$fecha = $_GET["fecha"];
	
if($idsuporte == 0){
//insere primeiro na tabela suporte, depois pega por select o max do id e insere um registro na tabela respostas 
	$sql = "INSERT INTO suporte (`idsuporte`, `titulo`, `ativo`) VALUES (NULL, '".$titulo."', 'S')";
  if($executa_sql = mysql_query($sql, $con)){
//buscar o maxid e inserir na tabela respostas
    $sql = "SELECT max(idsuporte) as idsuporte FROM suporte";
	 $executa_sql = mysql_query($sql, $con);
     while($linha_da_consulta = mysql_fetch_array($executa_sql)){
	  $idsuporte = $linha_da_consulta["idsuporte"];
	 }
     if($idsuporte > 0){
		//insere na tabela respostas
		$sql = "INSERT INTO respostas (`idresposta`, `nome`, `texto`, `data`, `idsuporte`) VALUES (NULL, '".$nome."', '".$resp."', '".$data."', '".$idsuporte."')";
		 if($executa_sql = mysql_query($sql, $con)){
		//buscar o maxid e inserir na tabela respostas
			echo "Registro incluido com sucesso";
			echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"Registro incluido com sucesso!\");
</SCRIPT>";
  			header("Location: ../inicio.php");	
		}else{
			echo "Houve um erro ao incluir o registro, Tente novamente.";
  			echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";	 
		 }
	 }
  }else{
	echo "Houve um erro ao incluir o registro, tente novamente.";
  	echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";
  }
}else{
//soh pega o idsuporte e insere um novo registro na tabela respostas 
	$sql = "INSERT INTO respostas (`idresposta`, `nome`, `texto`, `data`, `idsuporte`) VALUES (NULL, '".$nome."', '".$resp."', '".$data."', '".$idsuporte."')";
	if($executa_sql = mysql_query($sql, $con)){
	//buscar o maxid e inserir na tabela respostas
		echo "Registro incluido com sucesso";
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"Registro incluido com sucesso!\");
</SCRIPT>";
if($fecha = 'sim'){
		echo "<script>
		window.close();
		</script>";
}else{
 		header("Location: ../inicio.php");	
        }
	}else{
		echo "Houve um erro ao incluir o registro, Tente novamente.";
  		echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";	 
	 }
}
?>

