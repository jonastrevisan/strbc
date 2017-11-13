<?php
ob_start();
include("conecta.php");
include("verifica.php");

$tipopesquisa = $_GET["tipopesquisa"];


/*if($tipopesquisa == "pesquisa"){
	echo "pesquisando";
}else{
	echo "editando";
}*/

$selecionado = $_GET["selecionado"];
if($selecionado == m){
$matricula = $_GET["matricula"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}else{
$nome = $_GET["nome"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}

  //Prepara e executa a string de consulta ao BD
    $executa_sql = mysql_query($sql, $con);

  //prepara o html para receber dados
  
  
  //carrega dados em table e inputs
  while($linha_da_consulta = mysql_fetch_array($executa_sql)){
	  /*//exemplo
   echo "<tr><td align=\"right\">Mensagem:</td><td align=\"left\"><textarea name=\"texto\" cols=\"50\" rows=\"5\">".$linha_da_consulta["mensagem"]."</textarea></td></tr>";
  //fim exemplo*/
  $matricula = $linha_da_consulta["matricula"];
  $dep1= $linha_da_consulta["nomedependente1"];
  $dep2 = $linha_da_consulta["nomedependente2"];
  $dep3 = $linha_da_consulta["nomedependente3"];
  $dep4 = $linha_da_consulta["nomedependente4"];
  $dep5 = $linha_da_consulta["nomedependente5"];
  $dep6 = $linha_da_consulta["nomedependente6"];
  $nasc1 = $linha_da_consulta["datanasc1"];
  $nasc2 = $linha_da_consulta["datanasc2"];
  $nasc3 = $linha_da_consulta["datanasc3"];
  $nasc4 = $linha_da_consulta["datanasc4"];
  $nasc5 = $linha_da_consulta["datanasc5"];
  $nasc6 = $linha_da_consulta["datanasc6"];
  $socio = $linha_da_consulta["nome"];
  
  $residente = $linha_da_consulta["endereco1"];
  
  $admitido = $linha_da_consulta["admissao"];
  $estcivil = $linha_da_consulta["estcivil"];
   $datanasc = $linha_da_consulta["datanascimento"];
  

  }
// fim carrega dados   

/*
//conversor de data
-----------------------------------------------------------------------
$data_nova = implode(preg_match("~\/~", $data) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $data) == 0 ? "-" : "/", $data)));
========================================================================

*/

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Carteira Socio</title>
</head>

<body>
<center>
<table border="2"><tr><td>
<table border="0"><tr>
<!--table 1-->
<td><table border="0">
<tr><td>Dependentes</td><td>Nascimento</td></tr>
<tr>
  <td><input name="dep7" type="text" class="caixas" size="25" value="<?php echo $dep1; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td><td><input name="nasc7" type="text" class="caixas" size="15" value="<?php if($nasc1 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc1 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc1 ) == 0 ? "-" : "/", $nasc1 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr>
  <td><input name="dep8" type="text" class="caixas" size="25" value="<?php echo $dep2; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td><td><input name="nasc8" type="text" class="caixas" size="15" value="<?php if($nasc2 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc2 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc2 ) == 0 ? "-" : "/", $nasc2 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr>
  <td><input name="dep9" type="text" class="caixas" size="25" value="<?php echo $dep3; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td><td><input name="nasc9" type="text" class="caixas" size="15" value="<?php if($nasc3 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc3 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc3 ) == 0 ? "-" : "/", $nasc3 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr>
  <td><input name="dep10" type="text" class="caixas" size="25" value="<?php echo $dep4; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td><td><input name="nasc10" type="text" class="caixas" size="15" value="<?php if($nasc4 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc4 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc4 ) == 0 ? "-" : "/", $nasc4 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr>
  <td><input name="dep11" type="text" class="caixas" size="25" value="<?php echo $dep5; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td><td><input name="nasc11" type="text" class="caixas" size="15" value="<?php if($nasc5 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc5) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc5) == 0 ? "-" : "/", $nasc5)));


 ; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr>
  <td><input name="dep12" type="text" class="caixas" size="25" value="<?php echo $dep6; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td><td><input name="nasc12" type="text" class="caixas" size="15" value="<?php  if($nasc6 == "0000-00-00"){ echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc6) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc6) == 0 ? "-" : "/", $nasc6)));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr><td colspan="2" align="center"><table border="1"><tr><td>ESTA CARTEIRINHA E SOMENTE VALIDA QUANDO EM <BR />DIA AS MENSALIDADES</td></tr></table></td></tr>
</table></td>



<!--table 2-->
<td><table border="0"><tr><td><img src="../imgs/STRLOGO.jpg" height="105"></td><td align="center"> <font size="2">
 <h3><b><u>SINDICATO DOS TRABALHADORES<br /> RURAIS DE BARRACAO</u></b></h3>Rua Paraiba, no 20 - Centro - 85700-000<br/>
 Barracão - PR - CNPJ: 75.665.893/001-93<br />
 E-mail sindicatob@smo.com.br - Fone (0xx493644-1066)<br /><h3><b><u>CARTEIRA DE SÓCIO</u></b></h3></font></td></tr><tr><td colspan="2"><table border="0">
<tr><td align="left">Matrícula:</td><td align="left"><input name="matricula2" type="text" class="caixas" size="6" value="<?php echo $matricula; ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Admitido em.
  <input name="admitido2" type="text" class="caixas" size="15" value="<?php  if($admitido == "0000-00-00") { echo ""; } else{echo  $data_nova = implode(preg_match("~\/~", $admitido) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $admitido) == 0 ? "-" : "/", $admitido)));


;} ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";

} ?> /></td></tr>
<tr><td align="left">Socio</td><td align="left"><input name="socio2" type="text" class="caixas" size="40" value="<?php echo $socio; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr><td align="left">Residente:</td><td align="left"><input name="residente2" type="text" class="caixas" size="30" value="<?php echo $residente; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr><td align="left">Data Nasc.:</td><td align="left"><input name="datanasc2" type="text" class="caixas" size="21" value="<?php  if($datanasc == "0000-00-00") { echo ""; } else{echo $data_nova = implode(preg_match("~\/~", $datanasc ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc ) == 0 ? "-" : "/", $datanasc )));


;  } ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> />
  Est. Civil.:
  <input name="estcivil2" type="text" class="caixas" size="15" value="<?php echo $estcivil; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?> /></td></tr>
<tr><td colspan="2"><BR /><b><u>ASS. PRESIDENTE:</u></b>_____________________________________</td></tr>
</table></td></tr></table></td></tr></table>
</td></tr></table>


<table border="2"><tr><td>
<br /><br />
<img src="../imgs/STRLOGO.jpg" height="105" />
<table border="0">
<tr><td colspan="2">DEPENDENTES</td><td >NASCIMENTO</td></tr>
<tr><td colspan="2"><input name="dep1" type="text" class="caixas" size="25" value="<?php echo $dep1; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td><input name="nasc1" type="text" class="caixas" size="15" value="<?php if($nasc1 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc1 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc1 ) == 0 ? "-" : "/", $nasc1 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td><td></td>

<td colspan="3" rowspan="3">&nbsp;</td><td colspan="9"> <font size="2"><center>
 <h3>SINDICATO DOS TRABALHADORES<br /> RURAIS DE BARRACAO</h3> <br>Rua Paraiba, no 20 - Centro - 85700-000<br/>Brracao - PR - CNPJ: 75.665.893/001-93<br />E-mail sindicatob@smo.com.br - Fone (0xx493644-1066)</center></font></td></tr>

<tr><td colspan="2"><input name="dep2" type="text" class="caixas" size="25" value="<?php echo $dep2; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td><input name="nasc2" type="text" class="caixas" size="15" value="<?php if($nasc2 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc2 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc2 ) == 0 ? "-" : "/", $nasc2 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td><td></td><td colspan="9">
<h2><u><center>Carteira de socio</center><u/><h2></td></tr>

<tr><td colspan="2"><input name="dep3" type="text" class="caixas" size="25" value="<?php echo $dep3; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td><input name="nasc3" type="text" class="caixas" size="15" value="<?php if($nasc3 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc3 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc3 ) == 0 ? "-" : "/", $nasc3 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td><td></td><td width="60"></td><td width="10"></td><td width="10"></td><td width="113"></td><td width="3"></td><td width="6"></td><td width="0"></td></tr>

<tr><td colspan="2"><input name="dep4" type="text" class="caixas" size="25" value="<?php echo $dep4; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td><input name="nasc4" type="text" class="caixas" size="15" value="<?php if($nasc4 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc4 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc4 ) == 0 ? "-" : "/", $nasc4 )));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td><td>a</td><td>Matricula:</td><td colspan="3"><input name="matricula" type="text" class="caixas" size="6" value="<?php echo $matricula; ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td><td></td><td>Admitido em.</td>

<td colspan="3"><input name="admitido" type="text" class="caixas" size="21" value="<?php  if($admitido == "0000-00-00") { echo ""; } else{echo  $data_nova = implode(preg_match("~\/~", $admitido) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $admitido) == 0 ? "-" : "/", $admitido)));


;} ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";

} ?>></td></tr>

<tr><td colspan="2"><input name="dep5" type="text" class="caixas" size="25" value="<?php echo $dep5; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td><input name="nasc5" type="text" class="caixas" size="15" value="<?php if($nasc5 == "0000-00-00") { echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc5) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc5) == 0 ? "-" : "/", $nasc5)));


 ; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td><td></td><td>Socio</td>

<td colspan="9"><input name="socio" type="text" class="caixas" size="40" value="<?php echo $socio; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td></tr>

<tr><td colspan="2"><input name="dep6" type="text" class="caixas" size="25" value="<?php echo $dep6; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td><input name="nasc6" type="text" class="caixas" size="15" value="<?php  if($nasc6 == "0000-00-00"){ echo ""; }else{ echo $data_nova = implode(preg_match("~\/~", $nasc6) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $nasc6) == 0 ? "-" : "/", $nasc6)));


; } ?>" <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td>

<td></td><td>Residente:</td><td colspan="9"><input name="residente" type="text" class="caixas" size="30" value="<?php echo $residente; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td></tr>


<tr><td colspan="3" rowspan="2"><table border="1"><tr><td><center>ESTA CARTEIRINHA E SOMENTE VALIDA QUANDO EM <BR />DIA AS MENSALIDADES</center></td></tr></table></td><td></td><td>Data Nasc.:</td>

<td colspan="4"><input name="datanasc" type="text" class="caixas" size="21" value="<?php  if($datanasc == "0000-00-00") { echo ""; } else{echo $data_nova = implode(preg_match("~\/~", $datanasc ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc ) == 0 ? "-" : "/", $datanasc )));


;  } ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>>Est. Civil.:<input name="estcivil" type="text" class="caixas" size="15" value="<?php echo $estcivil; ?>"  <?php if($tipopesquisa == "carteira"){
	echo "readonly";
}else{
	echo "";
} ?>></td></tr>

<tr><td></td><td></td><td></td><td></td><td></td></tr>

<tr><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>

<tr><td colspan="2"></td><td></td><td></td>
<td colspan="8">ASS. PRESIDENTE._____________________________________</td></tr>
  




</table>
</table></tr></td>
<br />
<br />

<center>
<?php 
	
	echo "<br>Imprimir<br>
<img src=\"imgs/impressora.jpg\" width=\"61\" height=\"53\" onClick=\"javascript:window.print();\" alt=\"Clique aqui para imprimir\">";

?></center>
</center>
</body>
</html>
