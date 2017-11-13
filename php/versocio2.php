<?php
include("conecta.php");
include("verifica.php");
  //Prepara e executa a string de consulta ao BD
  $sql = "SELECT * FROM socio";
  
  $executa_sql = mysql_query($sql, $con);
  
  $numero_linhas_consultas = mysql_num_rows($executa_sql);

    
  //prepara o html para receber dados
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<title>Sindicato</title>
</head>
<body>
<center>
<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3>Pesquisar Sócio<hr></hr></h3></font>
<form action="<?php 
$tipopesquisa = $_GET["tipopesquisa"];
if($tipopesquisa == "desfiliar"){
	echo "desfiliar.php";	
}else if ($tipopesquisa == "pesquisa"){
	echo "vendosocio.php";
}else if($tipopesquisa == "carteira"){
	echo "carteira.php";
	}else if($tipopesquisa == "edicao"){
	echo "vendosocio.php";}
	?>" name="pesquisando" method="get">
    
<table border="0">
<tr><td align="right" colspan="3"><font face="Verdana, Geneva, sans-serif" color="#333333" size="-1"><b>Sócios Cadastrados: <?php echo $numero_linhas_consultas; ?></b></font></td><td></td></tr>
<tr><td></td><td colspan="3"><b><h3>
Pesquisar por:<hr color="#030303"></hr></h3></b><td></td></td></tr>
<tr><td align="center"><input type="radio" value="m" name="selecionado" /></td>&nbsp;&nbsp;<td></td><td align="center"><input type="radio" value="n" name="selecionado" /></td></tr>
<tr><td align="left">Matrícula:
<select name="matricula">
<?php
$sql = "SELECT * FROM socio ORDER BY matricula";
  $executa_sql = mysql_query($sql, $con);
  
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["matricula"]."\">".$linha_da_consulta["matricula"]."</option>";
  }
?>
</select>
</td><td>&nbsp;&nbsp;</td>
<td align="right">Nome:
  <select name="nome">
<?php
$sql = "SELECT * FROM socio ORDER BY nome";
  $executa_sql = mysql_query($sql, $con);
  
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["nome"]."\">".$linha_da_consulta["nome"]."</option>";
  }
?>
</select>
<input type="hidden" value="<?php 
$tipopesquisa = $_GET["tipopesquisa"];

if($tipopesquisa == "pesquisa"){
	echo "pesquisa";
}else if($tipopesquisa == "edicao"){
	echo "edicao";
}else if($tipopesquisa == "desfiliar"){
	echo "desfiliar";	
}else if($tipopesquisa == "carteira"){
    echo "carteira";
	}
	
	?>" 
name="tipopesquisa">
</td></tr>
<tr>
<td colspan="3" align="center">&nbsp;</td><tr>
<td colspan="3" align="center"><input type="submit"  style="background-color:#D9D9D9"  value="Pesquisar" /></tr></td></tr></table>


</form> 

</center>
</body>
</html>
