<?php

ob_start();

include("conecta.php");

include("verifica.php");



$tipopesquisa = $_GET["tipopesquisa"];

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



</head>

<body>

<center>

<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3>Controle de Cobran&ccedil;a</h3></font>



<br>

<form action="cadcob.php" method="post" name="formcobranca">

<table border="1">

<!--anos preenchidos na tabela-->

<?php

$sql = "SELECT DISTINCT ano FROM cobranca WHERE socioid = '".$matricula."' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">M&Ecirc;S</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){

 $contador = $contador + 1;

  echo "<td>".$linha_da_consulta["ano"]."</td>";

if($contador == $contlinhas){

	

	

 }

 

}

echo "<td>Informe o ano: <input type=\"text\" name=\"ano\" size=\"8\"><br>Pagos:<input type=\"radio\" name=\"pago\" value=\"simpago\">N&atilde;o Pagos:<input type=\"radio\" name=\"pago\" value=\"naopago\"><input type=\"hidden\" value=\"".$matricula."\" name=\"idsocio\"><input type=\"submit\" value=\"Cadastrar\"></td>";

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

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

	  echo "<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];

	  }else{

		echo "<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  

	  }

	  echo "</td>";

if($contador == $contlinhas){

	echo "</tr>";

 }

}

?>







 



</table>

</form>



<!--Benef&iacute;cio obtido do Sindicato



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