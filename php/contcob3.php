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
	var naoexiste;
	naoexiste = 0;
	for (var i=1;i<13;i++)
	{ 
		if(!(document.getElementById("ck"+ano+i.toString()+"p")) ){
			naoexiste = naoexiste + 1;
		}
	}
	if(naoexiste == 12){
		alert("Não existem titulos Pagos para este ano("+ano+")!");
		chk.checked = false;
		return
	}
	
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
function pausecomp(millis)
 {
  var date = new Date();
  var curDate = null;
  do { curDate = new Date(); }
  while(curDate-date < millis);
}
function somealert(){
	document.getElementById("alertamn").innerHTML = '';
}
function todosapagar(chk,ano)
{
	var naoexiste;
	naoexiste = 0;
	for (var i=1;i<13;i++)
	{ 
		if(!(document.getElementById("ck"+ano+i.toString()+"a")) ){
			naoexiste = naoexiste + 1;
		}
	}
	if(naoexiste == 12){
		alert("Não existem titulos a Pagar para este ano("+ano+")!");
		chk.checked = false;
		return
	}
		
	if(!!(document.getElementById("efetuapagto"))){
		document.getElementById("efetuapagto").disabled = '';
	}
	if(chk.checked == true){
		if(!(document.getElementById("alertam"))){
		document.getElementById("alertamn").innerHTML ='<div id="alertam" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" onclick="javascript:somealert();">×</button><strong>Atenção!</strong> Os titulos selecionados serão baixados no valor R$ 5,00 cada.</div>';
		}
		for (var i=1;i<13;i++)
		{ 
			if(!!(document.getElementById("ck"+ano+i.toString()+"a")) ){
			document.getElementById("ck"+ano+i.toString()+"a").checked = true;
			}else{
				
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

<form action="cadcob2.php" method="post" name="formcobranca">

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
$meses = array('Janeiro','Fevereiro','Marco','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
$count = count($meses);
for($i = 0; $i < $count; $i++){
	//echo $meses[$i].$i;
	$sql = "SELECT * FROM cobranca WHERE socioid = '".$matricula."' and mes = '".$meses[$i]."' order by ano";

 $executa_sql = mysql_query($sql, $con);

 $contlinhas = mysql_num_rows($executa_sql);

 $contador = 0;

 echo "<tr><td align=\"center\">".$meses[$i]."</td>";

 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
 $contador = $contador + 1;
  echo "<td>";
  if($linha_da_consulta["situacao"] == "pago"){
	  echo '<input type="checkbox" name="pagos[]" value="'.$linha_da_consulta["idpagto"].'" id="ck'.$linha_da_consulta["ano"].($i+1).'p" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'p\');verificacheckes();"> '."<a href=\"recibo.php?idpagto=".$linha_da_consulta["idpagto"]."\" alt=\"Clique aqui para imprimir o Recibo\"><img src=\"../imgs/printer.png\" /></a>"." ".$linha_da_consulta["valor"];
	  }else{
		echo '<input type="checkbox" name="apagar[]" value="'.$linha_da_consulta["idpagto"].'" id="ck'.$linha_da_consulta["ano"].($i+1).'a" onclick="javascript:desmarcatodos(\''.$linha_da_consulta["ano"].'\',\'a\');verificacheckes();"> '."<a href=\"pagando.php?idpagto=".$linha_da_consulta["idpagto"]."&matricula=".$matricula."\"><img src=\"../imgs/money.png\" /> Pagar</a>";  
	  }

	  echo "</td>";

	}	
	if($contador == $contlinhas || $contador == 0){
		echo '<td style="background-color:#E8E8E8;"><center>R$ <input size="1" type="text" 				class="caixas" value="5.00" readonly> <input type="checkbox" name="N[]" value="'.($i+1).'" id="N'.($i+1).'" onclick="javascript:desmarcatodos(\'todos\',\'n\');verificacheckes();"> Pago</center></td>';
		echo "</tr>";
	 }
}

?>
<?php

echo '<tr><td Rowspan="2" style="vertical-align:middle;">Ações</td><td colspan="'.$contadoranos.'"><input type="button" id="efetuapagto" value="Efetuar Pagamento" onClick="javascript:botao(\'pagar\');" style="width:100%;" disabled="disabled"></td><td Rowspan="2" style="vertical-align:middle; background-color:#E8E8E8;"><input type="button"  id="gravanovo" value="Gravar Novas Cobranças" onClick="javascript:botao(\'novo\');" style="width:100%;" disabled="disabled"></td></tr>';
echo '<tr><td colspan="'.$contadoranos.'"><input type="button" id="imprimerecibo" value="Imprimir Recibos" onClick="javascript:botao(\'pago\');" style="width:100%;" disabled="disabled"></td></tr>';
?>
<input type="hidden" name="tipocob" id="tipocob" value="">
<script>
function botao(tipo){
if(tipo == 'novo'){
	if(validaano(document.getElementById("anonovo").value) == -1){
		return	
	}
	document.getElementById("tipocob").value = 'novo';
	document.formcobranca.submit();
return	
}
if(tipo == 'pago'){
	document.getElementById("tipocob").value = 'pagos';
	document.formcobranca.submit();
return	
}
if(tipo == 'pagar'){
	document.getElementById("tipocob").value = 'apagar';
	document.formcobranca.submit();
return	
}
}

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
		if(!(document.getElementById("alertam"))){
		document.getElementById("alertamn").innerHTML ='<div id="alertam" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" onclick="javascript:somealert();">×</button><strong>Atenção!</strong> Os titulos selecionados serão baixados no valor R$ 5,00 cada.</div>';
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
		return -1
	}
	if(ano.toString() != ''){
		if(isNaN(ano)){
			alert("Informação invalida, Informe um ano");
			document.getElementById("anonovo").value = "";
			return -1
		}else{
			if(!!(document.getElementById("gravanovo"))){
				document.getElementById("gravanovo").disabled = '';
			}
		}		
	}else{
		alert("Não foi informado o ano. Verifique!");
		return -1	
	}
	if(!!(document.getElementById("todospagon"))){
		document.getElementById("todospagon").disabled = '';
		document.getElementById("todospagon").focus();
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
		if(!!(document.getElementById("N"+i.toString()))){
			//document.getElementById("N"+i.toString()).checked = false;
			document.getElementById("N"+i.toString()).disabled = '';
		}
	}
	if(!!(document.getElementById("efetuapagto"))){
		document.getElementById("efetuapagto").disabled = 'disabled';
	}
	if(!!(document.getElementById("imprimerecibo"))){
		document.getElementById("imprimerecibo").disabled = 'disabled';
	}
	//fim 
	return 1
}
function desmarcatudo(){
	desativaapagar(document.getElementById("auxiliar"));
	desativapagos(document.getElementById("auxiliar"));
	desativapagosnovo(document.getElementById("auxiliar"));
}
</script>
</table>
</form>
<div id="alertamn" style="size:50%;"></div>
<!--Benef&iacute;cio obtido doo Sindicato
<form name="nenhum" action="" method="post">
<table border="0">
<tr><td rowspan="5"><textarea cols="100" rows="5" name="beneficio"></textarea><br>Demitido em _____/______/_______ <br>Motivo <textarea cols="94" rows="2" name="motivodemissao"></textarea></td></tr>
</table>
</form>
<br>
-->
</center>
<input type="checkbox" name="auxiliar" id="auxiliar" style="visibility:hidden;">
<script>
demarcatudo();
</script>
</body>
</html>