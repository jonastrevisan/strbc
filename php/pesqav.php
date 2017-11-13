<?php
ob_start();
include("conecta.php");
include("verifica.php");

$texto = $_GET["pesqavtxt"];
//prepara o sql <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
if(is_numeric($texto)){
	$sql = "SELECT matricula, nome FROM socio WHERE matricula = ".$texto;
}else{
	$texto = trim($texto);
	$sql = "SELECT matricula, nome FROM socio WHERE nome LIKE '%".$texto."%'";
}

$executa_sql = mysql_query($sql, $con);
?>
<html>
<head>
<script language="JavaScript">
<!--
function verfonte()
{
if (event.button==2)
{
window.alert('Este recurso foi desativado')
}
}
document.onmousedown=verfonte
// -->
</script>
<title>Pesquisa Avançada - Inteligencia Artificial</title>
<meta charset= ISO-8859-1"  />
<link rel="icon" type="image/png" href="images/letra_j.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/DT_bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
</head>
<body>
<center>
  <font face="Georgia, Times New Roman, Times, serif" color="#000099">
  <h3>Pesquisa Avançada</h3>
  </font><Br>
  <font face="Georgia, Times New Roman, Times, serif" color="#000099" size="3">Por: </font><?php echo $texto; ?><br>
  <?php 
$numero_linhas_consultas = mysql_num_rows($executa_sql);
echo "Numero de registros encontrados: ".$numero_linhas_consultas;
if($numero_linhas_consultas == 0){
	header("Location: ../inicio.php?msg=Nenhum Registro encontrado por '".$texto."'!");
}
?>
<div class="clearfix"></div>
<div class="container">
  <div class="row">
    <div class="clearfix"></div>
   

 <div id="preview">
  <table  class="table-striped table-bordered table table-hover">
    <tr>
      <td align="center"><b>Matricula</b></td>
      <td align="center"><b>Nome</b></td>
    </tr>
    <?php
//carrega os dados<<<<<<<<<<<<<<<<<<<<<<
if($texto <> ""){  
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
	if($numero_linhas_consultas == 1){
		header("Location: vendosocio.php?selecionado=m&matricula=".$linha_da_consulta["matricula"]."&tipopesquisa=pesquisa");
	}else{
	echo "<tr>";
	echo "<td><a href=\"vendosocio.php?selecionado=m&matricula=".$linha_da_consulta["matricula"]."&tipopesquisa=pesquisa\">".$linha_da_consulta["matricula"]."</a></td>";
	echo "<td><a href=\"vendosocio.php?selecionado=m&matricula=".$linha_da_consulta["matricula"]."&tipopesquisa=pesquisa\">".$linha_da_consulta["nome"]."</a></td>";
  echo "</tr>";
	}
 }  
}
?>
  </table>
  </div>
   </div>
</div>
</div>
  
  
 
</center>
<img src="../imgs/voltar2.gif" width="100" onClick="location.href='../inicio.php'" alt="Clique aqui para Voltar">
<br><br>
</body>
</html>