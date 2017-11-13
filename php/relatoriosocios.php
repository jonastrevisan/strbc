<?php
ob_start();
include("conecta.php");
include("verifica.php");

$ativo = $_GET["ativo"];

if($ativo == "N"){
	$sql = "SELECT matricula, nome, rg, cpf FROM socio WHERE ativo = 'N' ORDER BY nome";
}else{
	$sql = "SELECT matricula, nome, rg, cpf FROM socio WHERE ativo = 'S' ORDER BY nome";
}

  //Prepara e executa a string de consulta ao BD
    $executa_sql = mysql_query($sql, $con);

  //prepara o html para receber dados
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
<title>Relatório de Sócios</title>
<style type="text/css">
/*.caixas {
	border-left-width: 0px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 1px;
	border-bottom-color:#000; */
}
</style>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<meta charset= ISO-8859-1"  />
<link rel="icon" type="image/png" href="../images/letra_j.png" />
</head>
<body>
<center>
<font face="Georgia, Times New Roman, Times, serif" color="#000099">
<h3>
  <?php if($ativo == "N"){
	echo "Relatório de Desfiliados";
	}else{
	echo "Relatório de Sócios";
} ?>
</h3>
</font>
<div class="span2 bs-docs-sidebar"></div>
<div class="accordion-inner paddind span9">
  <center>
    <table border="1" class="table-striped table-bordered table table-hover">
      <tr>
      	<td><b>Acoes</b></td>
        <td><b>Matricula</b></td>
        <td><b>Nome</b></td>
        <td><b>RG</b></td>
        <td><b>CPF</b></td>
      </tr>
      <?php  
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo '<tr>';
  echo '<td>';
  if($ativo == "N"){
	  echo '<a href="socioativo.php?matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=relatorio"><img src="../imgs/user_add.png" title="Tornar Socio" alt="Tornar Socio">Tornar Sócio Novamente</a>
	  <a href="vendosocio.php?selecionado=m&matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=pesquisa"><img src="../imgs/folder_user.png" title="Visualizar" alt="Visualizar">Visualizar</a>';
  }else{
	  echo '<a href="vendosocio.php?selecionado=m&matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=pesquisa"><img src="../imgs/folder_user.png" title="Visualizar" alt="Visualizar">Visualizar</a>';
  }
  echo '</td>';
  echo '<td><a href="vendosocio.php?selecionado=m&matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=pesquisa">'.$linha_da_consulta["matricula"]."</a></td>";
  echo '<td><a href="vendosocio.php?selecionado=m&matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=pesquisa">'.$linha_da_consulta["nome"].'</a></td>';
  echo '<td><a href="vendosocio.php?selecionado=m&matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=pesquisa">'.$linha_da_consulta["rg"].'</a></td>';
  echo '<td><a href="vendosocio.php?selecionado=m&matricula='.$linha_da_consulta["matricula"].'&tipopesquisa=pesquisa">'.$linha_da_consulta["cpf"].'</a></td></tr>';
  }
// fim carrega dados   
?>
    </table>
  </center>
</div>
<div class="span11"> <br>
  <center>
    <img src="../imgs/printer.png" width="20" height="20" onClick="javascript:window.print();" title="Clique aqui para imprimir" alt="Clique aqui para imprimir">
  </center>
  <br>
  <img   src="../imgs/arrow_undo.png" align="left" width="25" onClick="location.href='../inicio.php'" alt="Clique aqui para Voltar" title="Clique aqui para voltar"><br>
<br>
<br> </div>

</body>
</html>