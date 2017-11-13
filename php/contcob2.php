<?php

ob_start();

include("conecta.php");

include("verifica.php");



$tipopesquisa = $_GET["tipopesquisa"];
$contadoranos = 0;
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

<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />

<title>Cadastro novo sócio</title>

<style type="text/css">

.caixas{

	border-left-width: 0px;

	border-top-width: 0px;

	border-right-width: 0px;

	border-bottom-width: 1px;

	border-bottom-color:#000;

}

</style>
<!--inicio scripts visual-->
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
<!--fim scripts visual-->
<style type="text/css">
.table td{
padding:3px;	
}
select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
display: inline-block;
/*height: 20px;*/
padding: 0px 0px;
margin-bottom: 0px;
font-size: 14px;
line-height: 20px;
color: #555555;
vertical-align: middle;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
width:auto;
}
</style>
<script type="text/javascript">
function todospagosnovo(chk)
{
	if(!!(document.getElementById("gravanovo"))){
		document.getElementById("gravanovo").disabled = '';
	}
	if(chk.checked == true){
		for (var i=1;i<13;i++)
		{ 
			document.getElementById("N"+i.toString()).checked = true;
		}	
	}else{
		for (var i=1;i<13;i++)
		{ 
			document.getElementById("N"+i.toString()).checked = false;
		}
	}
	//desativapagos(chk);
	//desativaapagar(chk);
	verificacheckes();
  //document.formcobranca.submit();
}
function todospagos(chk,ano)
{
	if(!!(document.getElementById("imprimerecibo"))){
		document.getElementById("imprimerecibo").disabled = '';
	}
	if(chk.checked == true){
		for (var i=1;i<13;i++)
		{ 
			if(!!(document.getElementById("ck"+ano+i.toString()+"p"))){
			document.getElementById("ck"+ano+i.toString()+"p").checked = true;
			}
		}	
	}else{
		for (var i=1;i<13;i++)
		{ 
			if(!!(document.getElementById("ck"+ano+i.toString()+"p"))){
			document.getElementById("ck"+ano+i.toString()+"p").checked = false;
			}
		}
	}
  //document.formcobranca.submit();
  //desativaapagar(chk);
  //desativapagosnovo(chk);
  verificacheckes();
}
function todosapagar(chk,ano)
{
	if(!!(document.getElementById("efetuapagto"))){
		document.getElementById("efetuapagto").disabled = '';
	}
	if(chk.checked == true){
		for (var i=1;i<13;i++)
		{ 
			if(!!(document.getElementById("ck"+ano+i.toString()+"a")) ){
			document.getElementById("ck"+ano+i.toString()+"a").checked = true;
			}
		}	
	}else{
		for (var i=1;i<13;i++)
		{ 
			if(!!(document.getElementById("ck"+ano+i.toString()+"a")) ){
			document.getElementById("ck"+ano+i.toString()+"a").checked = false;
			}
		}
	}
	//desativapagos(chk);
	//desativapagosnovo(chk);
	verificacheckes();
  //document.formcobranca.submit();
}
</script>
</head>

<body>

<center>

<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3>Controle de Cobran&ccedil;a</h3></font>



<br>

<form action="cadcob.php" method="post" name="formcobranca">

<table border="1" style="width:auto;" class="table table-striped table-bordered table table-hover">

<!--anos preenchidos na tabela-->

<?php

$sql = "SELECT DISTINCT ano FROM cobranca WHERE socioid = '".$matricula."' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">M&Ecirc;S</td>";
$primeiroano = 0;
$ultimoano = 0;
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;
if($contador == 1){
	$primeiroano = 	$linha_da_consulta["ano"];
}
  echo '<td onmouseover="ck'.$linha_da_consulta["ano"].'pagos.style.fontSize=\'15px\', ck'.$linha_da_consulta["ano"].'apagar.style.fontSize=\'15px\'" onmouseout="ck'.$linha_da_consulta["ano"].'pagos.style.fontSize=\'10px\', ck'.$linha_da_consulta["ano"].'apagar.style.fontSize=\'10px\'">
  <center><input size="1" id="in'.$linha_da_consulta["ano"].'e" type="text" class="caixas" value="'.$linha_da_consulta["ano"].'" readonly></center>
  <input type="checkbox" onclick="javascript:todospagos(this,\''.$linha_da_consulta["ano"].'\');" id="cke'.$linha_da_consulta["ano"].'p"> 
  <font id="ck'.$linha_da_consulta["ano"].'pagos" style="font-size: 10px; font-weight: bold;">Todos Pagos</font>
  <br>
  <input type="checkbox" onclick="javascript:todosapagar(this,\''.$linha_da_consulta["ano"].'\');" id="cke'.$linha_da_consulta["ano"].'a"> 
  <font id="ck'.$linha_da_consulta["ano"].'apagar" style="font-size: 10px; font-weight: bold;">Todos a Pagar</font>
  </td>';
$contadoranos = $contadoranos + 1;
if($contador == $contlinhas){
	$ultimoano = $linha_da_consulta["ano"];
	

	

 }

 

}

echo '<td style="background-color:#E8E8E8;">Informe o ano: <input type="text" id="anonovo" name="ano" size="8" onblur="javascript:validaano(this.value);"><br><input type="checkbox" onclick="javascript:todospagosnovo(this);" name="todospagon" id="todospagon"> Todos Pagos<input type="hidden" value="'.$matricula.'" name="idsocio"></td>';

	echo "</tr>";

?>



<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Janeiro' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Janeiro</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'1p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'1a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N1" id="N1" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?>

<!--fevereiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Fevereiro' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Fevereiro</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'2p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'2a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N2" id="N2" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?>

<!--Marco preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Marco' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Marco</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'3p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'3a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N3" id="N3" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--abril preenchidos na tabela-->

<!--abril preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Abril' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Abril</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'4p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'4a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N4" id="N4" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--maio preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Maio' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Maio</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'5p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'5a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N5" id="N5" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--junho preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Junho' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Junho</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'6p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'6a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N6" id="N6" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--julho preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Julho' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Julho</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'7p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'7a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N7" id="N7" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--agosto preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Agosto' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Agosto</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'8p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'8a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N8" id="N8" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--setembro preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Setembro' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Setembro</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'9p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'9a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N9" id="N9" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--outubro preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Outubro' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Outubro</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'10p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'10a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N10" id="N10" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--novembro preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Novembro' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Novembro</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'11p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'11a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 		class="caixas" value="5" readonly> <input type="checkbox" name="N11" id="N11" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}

?><!--dezembro preenchidos na tabela-->

<!--janeiro preenchidos na tabela-->

<?php

$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = 'Dezembro' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">Dezembro</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>";

  if($linha_da_consulta["situacao"] == "pago"){

	  echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'12p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo '<input type="checkbox" id="ck'.$linha_da_consulta["ano"].'12a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){
	echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" class="caixas" value="5" readonly> <input type="checkbox" name="N12" id="N12" value="true" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
	echo "</tr>";

 }

}
echo '<tr><td Rowspan="2" style="vertical-align:middle;">Ações</td><td colspan="'.$contadoranos.'"><input type="submit" id="efetuapagto" value="Efetuar Pagamento" style="width:100%;" disabled="disabled"></td><td Rowspan="2" style="vertical-align:middle; background-color:#E8E8E8;"><input type="submit"  id="gravanovo" value="Gravar Novas Cobranças" style="width:100%;" disabled="disabled"></td></tr>';
echo '<tr><td colspan="'.$contadoranos.'"><input type="submit" id="imprimerecibo" value="Imprimir Recibos" style="width:100%;" disabled="disabled"></td></tr>';
?>

<script>
function desativaapagar(chk)
{
	//se marcado cheke this entao desativa senao valida e ativa
	if(chk.checked == true){
		for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++)
		{ 
			for(var i=1; i<13; i++){
				if(!!(document.getElementById("ck"+ano+i.toString()+"a"))){
				document.getElementById("ck"+ano+i.toString()+"a").checked = false;
				document.getElementById("ck"+ano+i.toString()+"a").disabled = 'disabled';
				}
			}
			if(!!(document.getElementById("cke"+ano+"a"))){
				document.getElementById("cke"+ano+"a").checked = false;
				document.getElementById("cke"+ano+"a").disabled = 'disabled';
			}
		}
		if(!!(document.getElementById("efetuapagto"))){
			document.getElementById("efetuapagto").disabled = 'disabled';
		}	
	}else{
		for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++)
		{
			for (var i=1;i<13;i++)
			{ 
				if(!!(document.getElementById("ck"+ano+i.toString()+"a"))){
				document.getElementById("ck"+ano+i.toString()+"a").checked = false;
				document.getElementById("ck"+ano+i.toString()+"a").disabled = '';
				}
			}
			if(!!(document.getElementById("cke"+ano+"a"))){
				document.getElementById("cke"+ano+"a").checked = false;
				document.getElementById("cke"+ano+"a").disabled = '';
			}
		}
	}
  //document.formcobranca.submit();
}
function desativapagos(chk)
{
	//se marcado cheke this entao desativa senao valida e ativa
	if(chk.checked == true){
		for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++)
		{ 
			for(var i=1; i<13; i++){
				if(!!(document.getElementById("ck"+ano+i.toString()+"p"))){
				document.getElementById("ck"+ano+i.toString()+"p").checked = false;
				document.getElementById("ck"+ano+i.toString()+"p").disabled = 'disabled';
				}
			}
			if(!!(document.getElementById("cke"+ano+"p"))){
				document.getElementById("cke"+ano+"p").checked = false;
				document.getElementById("cke"+ano+"p").disabled = 'disabled';
			}
		}	
		if(!!(document.getElementById("imprimerecibo"))){
			document.getElementById("imprimerecibo").disabled = 'disabled';
		}
	}else{
		for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++)
		{
			for (var i=1;i<13;i++)
			{ 
				if(!!(document.getElementById("ck"+ano+i.toString()+"p"))){
				document.getElementById("ck"+ano+i.toString()+"p").checked = false;
				document.getElementById("ck"+ano+i.toString()+"p").disabled = '';
				}
			}
			if(!!(document.getElementById("cke"+ano+"p"))){
				document.getElementById("cke"+ano+"p").checked = false;
				document.getElementById("cke"+ano+"p").disabled = '';
			}
		}
	}
  //document.formcobranca.submit();
}
function desativapagosnovo(chk)
{
	//se marcado cheke this entao desativa senao valida e ativa
	if(chk.checked == true){
			for(var i=1; i<13; i++){
				if(!!(document.getElementById("N"+i.toString()))){
				 document.getElementById("N"+i.toString()).checked = false;
				 document.getElementById("N"+i.toString()).disabled = 'disabled';
				}
			}	
			if(!!(document.getElementById("todospagon"))){
			 document.getElementById("todospagon").checked = false;
			 document.getElementById("todospagon").disabled = 'disabled';
			}
		if(!!(document.getElementById("gravanovo"))){
			document.getElementById("gravanovo").disabled = 'disabled';
		}
	}else{
		for (var i=1;i<13;i++)
		{ 
			if(!!(document.getElementById("N"+i.toString()))){
			 document.getElementById("N"+i.toString()).checked = false;
			 document.getElementById("N"+i.toString()).disabled = '';
			}
		}
		if(!!(document.getElementById("todospagon"))){
			 document.getElementById("todospagon").checked = false;
			 document.getElementById("todospagon").disabled = '';
		}
	}
  //document.formcobranca.submit();
}
function desmarcatodos(ano,tipo)
{
	if(tipo == 'a'){
		if(!!(document.getElementById("efetuapagto"))){
			document.getElementById("efetuapagto").disabled = '';
		}
	}
	if(tipo == 'p'){
		if(!!(document.getElementById("imprimerecibo"))){
			document.getElementById("imprimerecibo").disabled = '';
		}	
	}
	if(tipo == 'n'){
		if(!!(document.getElementById("gravanovo"))){
			document.getElementById("gravanovo").disabled = '';
		}	
	}
	
	//se marcado cheke this entao desativa senao valida e ativa
	if(ano == 'todos'){
		if(!!(document.getElementById("todospagon"))){
			 document.getElementById("todospagon").checked = false;
		}
	return	
	}
	if(!!(document.getElementById("cke"+ano+tipo))){
	 document.getElementById("cke"+ano+tipo).checked = false;
	}
}










function verificacheckes()
{
	var ultimoelemento;
	//primeiro verifica os titulos se algum marcado, mantem os demais desativados e Return
	for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++){
		if(!!(document.getElementById("cke"+ano+"p"))){
			if(document.getElementById("cke"+ano+"p").checked == true){
				desativaapagar(document.getElementById("cke"+ano+"p"));
				desativapagosnovo(document.getElementById("cke"+ano+"p"));
				return 
			}
		}
		if(!!(document.getElementById("cke"+ano+"a"))){
			if(document.getElementById("cke"+ano+"a").checked == true){
				desativapagos(document.getElementById("cke"+ano+"a"));
				desativapagosnovo(document.getElementById("cke"+ano+"a"));
				return 
			}
		}
	}
	//verifica pagos novo por meses 
	for(var i=1; i<13; i++){
		if(!!(document.getElementById("N"+i.toString()))){
			if(document.getElementById("N"+i.toString()).checked == true){
				desativapagos(document.getElementById("N"+i.toString()));
				desativaapagar(document.getElementById("N"+i.toString()));
				return
			}
		}
	}
	//verifica os pagamentos ano x meses 
	for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++){
		for(var i=1; i<13; i++){
			if(!!(document.getElementById("ck"+ano+i.toString()+"p"))){
				if(document.getElementById("ck"+ano+i.toString()+"p").checked == true){
					desativaapagar(document.getElementById("ck"+ano+i.toString()+"p"));
					desativapagosnovo(document.getElementById("ck"+ano+i.toString()+"p"));
					return 
				}
			}
			if(!!(document.getElementById("ck"+ano+i.toString()+"a"))){
				ultimoelemento = document.getElementById("ck"+ano+i.toString()+"a");
				if(document.getElementById("ck"+ano+i.toString()+"a").checked == true){
					desativapagos(document.getElementById("ck"+ano+i.toString()+"a"));
					desativapagosnovo(document.getElementById("ck"+ano+i.toString()+"a"));
					return 
				}
			}
		}
	}
	
	//se chegou aki entao libera todos 
	if(!!(document.getElementById("todospagon"))){
		document.getElementById("todospagon").checked = false;
		document.getElementById("todospagon").disabled = '';
	}
	for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++){
		if(!!(document.getElementById("cke"+ano+"p"))){
			document.getElementById("cke"+ano+"p").checked = false;
			document.getElementById("cke"+ano+"p").disabled = '';
		}
		if(!!(document.getElementById("cke"+ano+"a"))){
			document.getElementById("cke"+ano+"a").checked = false;
			document.getElementById("cke"+ano+"a").disabled = '';
		}
	}
	for(var i=1; i<13; i++){
		if(!!(document.getElementById("N"+i.toString()))){
			document.getElementById("N"+i.toString()).checked = false;
			document.getElementById("N"+i.toString()).disabled = '';
		}
		for (var ano=<?php echo $primeiroano; ?>;ano<<?php echo $ultimoano+1; ?>;ano++){
			if(!!(document.getElementById("ck"+ano+i.toString()+"p"))){
				document.getElementById("ck"+ano+i.toString()+"p").checked = false;
				document.getElementById("ck"+ano+i.toString()+"p").disabled = '';
			}
			if(!!(document.getElementById("ck"+ano+i.toString()+"a"))){
				document.getElementById("ck"+ano+i.toString()+"a").checked = false;
				document.getElementById("ck"+ano+i.toString()+"a").disabled = '';
			}
		}
	}
	if(!!(document.getElementById("efetuapagto"))){
		document.getElementById("efetuapagto").disabled = 'disabled';
	}
	if(!!(document.getElementById("imprimerecibo"))){
		document.getElementById("imprimerecibo").disabled = 'disabled';
	}
	if(!!(document.getElementById("gravanovo"))){
		document.getElementById("gravanovo").disabled = 'disabled';
	}
//	dasativapagos(document.getElementById("auxiliar"));
	//desativaapagar(document.getElementById("auxiliar"));
	//desativapagosnovo(document.getElementById("auxiliar"));
	//dasativapagos(ultimoelemento);
  //document.formcobranca.submit();
}
function validaano(ano){
	if(!!(document.getElementById("in"+ano+"e"))){
		alert("Prezado Usuário, o ano informado ("+ano+") já esta cadastrado. Verifique!");
		document.getElementById("anonovo").value = "";
		return
	}
	//libera todos os flag menos do novo 
	for (var anof=<?php echo $primeiroano; ?>;anof<<?php echo $ultimoano+1; ?>;anof++){
		if(!!(document.getElementById("cke"+anof+"p"))){
			document.getElementById("cke"+anof+"p").checked = false;
			document.getElementById("cke"+anof+"p").disabled = '';
		}
		if(!!(document.getElementById("cke"+anof+"a"))){
			document.getElementById("cke"+anof+"a").checked = false;
			document.getElementById("cke"+anof+"a").disabled = '';
		}
	}
	for(var i=1; i<13; i++){
		for (var anof=<?php echo $primeiroano; ?>;anof<<?php echo $ultimoano+1; ?>;anof++){
			if(!!(document.getElementById("ck"+anof+i.toString()+"p"))){
				document.getElementById("ck"+anof+i.toString()+"p").checked = false;
				document.getElementById("ck"+anof+i.toString()+"p").disabled = '';
			}
			if(!!(document.getElementById("ck"+anof+i.toString()+"a"))){
				document.getElementById("ck"+anof+i.toString()+"a").checked = false;
				document.getElementById("ck"+anof+i.toString()+"a").disabled = '';
			}
		}
	}
	if(!!(document.getElementById("efetuapagto"))){
		document.getElementById("efetuapagto").disabled = 'disabled';
	}
	if(!!(document.getElementById("imprimerecibo"))){
		document.getElementById("imprimerecibo").disabled = 'disabled';
	}
	if(!!(document.getElementById("gravanovo"))){
		document.getElementById("gravanovo").disabled = 'disabled';
	}	
	//fim 
	//if(ano <> ''){
		//if(parseFloat(ano) == ano){
			//if(!!(document.getElementById("gravanovo"))){
				//document.getElementById("gravanovo").disabled = '';
			//}	
		//}else
		//	alert("Informação invalida, Informe um ano");
		//}		
	//}
}
</script>




 



</table>

</form>


<!--Benef&iacute;cio obtido doo Sindicato



<form name="nenhum" action="" method="post">

<table border="0">

<tr><td rowspan="5"><textarea cols="100" rows="5" name="beneficio"></textarea><br>Demitido em _____/______/_______ <br>Motivo <textarea cols="94" rows="2" name="motivodemissao"></textarea></td></tr>

</table>









</form>

<br>

-->



</center>











</body>

</html>