<?php
ob_start();
include("conecta.php");
include("verifica.php");

$selecionado = $_GET["selecionado"];

if($selecionado == m){
$matricula = $_GET["matricula"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n){
$nome = $_GET["nome"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}
if($selecionado == m1){
$matricula = $_GET["matricula1"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n1){
$nome = $_GET["nome1"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}
if($selecionado == m2){
$matricula = $_GET["matricula2"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n2){
$nome = $_GET["nome2"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}
if($selecionado == m3){
$matricula = $_GET["matricula3"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n3){
$nome = $_GET["nome3"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}



$executa_sql = mysql_query($sql, $con);



while($linha_da_consulta = mysql_fetch_array($executa_sql)){

  $matriculasocio = $linha_da_consulta["matricula"];

  $nomesocio = $linha_da_consulta["nome"];

  $endereco1 = $linha_da_consulta["endereco1"]; 

  }

  

  ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

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

<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<link rel="icon" type="image/png" href="../images/letra_j.png" />
<title>Desfiliar</title>

<style type="text/css">

.caixas {	border-left-width: 0px;

	border-top-width: 0px;

	border-right-width: 0px;

	border-bottom-width: 0px;

	border-bottom-color:#000;

}

</style>

</head>





<body>
<?php 
$sql = "UPDATE socio SET ativo='N' WHERE matricula='".$matriculasocio."';";

if($executa_sql = mysql_query($sql, $con)){
  echo "<SCRIPT LANGUAGE=\"JavaScript\"> alert (\"Gravado como desfiliado com sucesso!\")</SCRIPT>";
}else{
  echo "<SCRIPT LANGUAGE=\"JavaScript\"> alert (\"Pedido será gerado mas Houve um erro ao geristrar como desfiliado! Tente novamente se desejar registrar como desfiliado\")</SCRIPT>";
  }
?>

<center>

<table border="0"><tr><td>

 <table border="0">

<tr>

<td><img src="../imgs/STRLOGO.jpg" height="100" /></td>

<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><center><table border="0">

<tr><td><font size="+1"><b><u>SINDICATO DOS TRABALHADORES RURAIS DE BARRAC&Atilde;O</u></b></font></td></tr>

<tr><td><b>Fundado em 24 de Agosto de 1964</b></td></tr>

<tr><td><b>Carta Sindical n&deg; 4214&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CNPJ: 75.665.893/0001-93</b></td></tr>

<tr><td><b>Rua Para&iacute;ba, 20 - 85700-000 - Fone: (049) 3644 1066 - Barrac&atilde;o - PR </b></td></tr>

<tr><td><b>Filiado &aacute; FETAEP       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sindbarracao@temais.com.br</b></td></tr> </table></td></tr>

</table><center>

______________________________________________________________________________________________

<br /><br />

<tr><td align="center"><b><u>PEDIDO DE DESFILIAC&Atilde;O</u></b>

<BR /><br /></td></tr><tr><td align="left">



Barrac&atilde;o - PR, <?php echo date("d")." de ";

if(date("m") == 1){echo "Janeiro";}else if(date("m") == 2){echo "Fevereiro";}else if(date("m") == 3){echo "Marco";}else if(date("m") == 4){echo "Abril";}else if(date("m") == 5){echo "Maio";}else if(date("m") == 6){echo "Junho";}else if(date("m") == 7){echo "Julho";}else if(date("m") == 8){echo "Agosto";}else if(date("m") == 9){echo "Setembro";}else if(date("m") == 10){echo "Outubro";}else if(date("m") == 11){echo "Novembro";}else if(date("m") == 12){echo "Dezembro";}

echo " de ".date("Y"); ?><!-- 11 de novembro de 2010--><br /><br /></td></tr><tr><td align="left">

Prezados Senhores,

<br /><br /></td></tr><tr>

  <td align="left"><font size="+1">

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eu, <?php echo $nomesocio; ?>, portador da matricula n&uacute;mero <?php echo $matriculasocio; ?><br />

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;que trabalho na empresa <?php echo $endereco1; ?>,<br />

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exercendo a fun&ccedil;&atilde;o de trabalhador rural,<br />

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;venho por livre e espont&acirc;nea vontade solicitar o meu desligamento do quadro<br />

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Associativo do Sindicato Dos Trabalhadores Rurais De Barrac&atilde;o pelo seguinte<br />

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;motivo: 

    <input name="motivo" type="text" class="caixas" size="85" value="n&atilde;o ocupa." />

    <br />

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="motivo" type="text" class="caixas" size="95" value="" /><br /><br />

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atenciosamente,</font> <br /><br /><br /><br /><br /><br /><br /><br /><br />

  </p></td></tr><tr><td><table border="0"><tr><td></td><td align="center">

________________________________________________<br />

<h5><?php echo $nomesocio; ?></h5>

<br /><br /><br /><br /><br /></td></tr><tr><td align="center">

________________________________________________<br />

<h5>Presidente / Respons&aacute;vel</h5>

<br /><br /><br /><br /><br /><br /><br /><br /><br /></td><td></td></tr></table><table><td>

<center>

______________________________________________________________________________________________<br />

<b>STR BARRAC&Atilde;O &reg;</b>

</center>

</td>

</tr></table>

</body>

</html>

