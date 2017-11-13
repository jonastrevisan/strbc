<?php

ob_start();

include("verifica.php");
include("conecta.php");
$mavalidar = $_GET["avalidar"];
if($mavalidar <> ""){
//inicio valida matricula 
$sqlvalida = "SELECT matricula, nome, cidadeatual FROM socio WHERE matricula = '".$mavalidar."'";

$executa_sqlvalida = mysql_query($sqlvalida, $con);
$matricula = "";
$nome = '';
$cidadeatual = '';
while($linha_da_consultavalida = mysql_fetch_array($executa_sqlvalida)){
	$matricula = $linha_da_consultavalida["matricula"];
	$nome = $linha_da_consultavalida["nome"];
	If($linha_da_consultavalida["cidadeatual"] == 1){
		$cidadeatual = 	'Barracão - PR';
	}elseif($linha_da_consultavalida["cidadeatual"] == 2){
		$cidadeatual = 	'Bom Jesus do Sul - PR';
	}elseif($linha_da_consultavalida["cidadeatual"] == 3){
		$cidadeatual = 	'Dionisio Cerqueira - SC';
	}
}

if($matricula <> ""){
	if($matricula > 0){
		$mavalidar = '';
	$msg = 'Este número de matricula('.$matricula.') já esta cadastrado em nome de '.$nome.' cujo cidade atual é '.$cidadeatual.'. Não é possivel cadastra-lo novamente. Para edita-lo acesse o menu principal/Editar e localize pelo cadastro do mesmo.' ;	
	echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"".$msg."\");
</SCRIPT>";
}}

//fim valida matricula
//inicio coloca devolta valor campos
echo '<script>
document.formnovosocio.admimes.value = '.$_GET["admissaom"].
'</script>';
//fim coloca devolta valor campos
}
?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<link rel="icon" type="image/png" href="../images/letra_j.png" />
<title>Cadastro novo socio</title>

<style type="text/css">

.caixas{
	border-left-width: 0px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 1px;
	border-bottom-color:#000;
}

</style>


<script>
function validamatricula(){
var vmatricula = document.getElementById("matricula").value;

var admianoindex
var myselectadmiano=document.formnovosocio.admiano
for (var i=0; i<myselectadmiano.options.length; i++){
 if (myselectadmiano.options[i].selected==true){
  admianoindex = i;
  break
 }
}

var esdatoindex
var myselectestado=document.formnovosocio.estado
for (var i=0; i<myselectestado.options.length; i++){
 if (myselectestado.options[i].selected==true){
  esdatoindex = i;
  break
 }
}
var cidadeatualindex
var myselectcidadeatual=document.formnovosocio.cidadeatual
for (var i=0; i<myselectcidadeatual.options.length; i++){
 if (myselectcidadeatual.options[i].selected==true){
  cidadeatualindex = i;
  break
 }
}
//CAPTURA DT NASCIMENTO 
var nascdiaindex
var myselectnascdia=document.formnovosocio.nascdia
for (var i=0; i<myselectnascdia.options.length; i++){
 if (myselectnascdia.options[i].selected==true){
  nascdiaindex = i;
  break
 }
}
var nascmesindex
var myselectnascmes=document.formnovosocio.nascmes
for (var i=0; i<myselectnascmes.options.length; i++){
 if (myselectnascmes.options[i].selected==true){
  nascmesindex = i;
  break
 }
}
var nascanoindex
var myselectnascano=document.formnovosocio.nascano
for (var i=0; i<myselectnascano.options.length; i++){
 if (myselectnascano.options[i].selected==true){
  nascanoindex = i;
  break
 }
}
//CAPTURA ESTADO CIVIL
var estcivilindex
var myselectestcivil=document.formnovosocio.estcivil
for (var i=0; i<myselectestcivil.options.length; i++){
 if (myselectestcivil.options[i].selected==true){
  estcivilindex = i;
  break
 }
}

//location.href='precadnovosocio.php?avalidar='+vmatricula;
location.href='precadnovosocio.php?avalidar='+vmatricula+
'&admissaod='+document.formnovosocio.admidia.value+
'&admissaom='+document.formnovosocio.admimes.value+
'&admissaoa='+admianoindex+
'&inscricao='+document.formnovosocio.inscricao.value+
'&nome='+document.formnovosocio.nome.value+
'&natural='+document.formnovosocio.natural.value+

'&estado='+esdatoindex+
'&cidadeatual='+cidadeatualindex+
'&nascdia='+nascdiaindex+
'&nascmes='+nascmesindex+
'&nascano='+nascanoindex+
'&estcivil='+estcivilindex+

'&rg='+document.formnovosocio.rg.value+
'&serie='+document.formnovosocio.serie.value+
'&prsocial='+document.formnovosocio.prsocial.value+
'&cpf='+document.formnovosocio.cpf.value+
'&certrese='+document.formnovosocio.certrese.value+
'&pai='+document.formnovosocio.pai.value+
'&nacpai='+document.formnovosocio.nacpai.value+
'&mae='+document.formnovosocio.mae.value+
'&nacmae='+document.formnovosocio.nacmae.value+
'&propriedade1='+document.formnovosocio.propriedade1.value+
'&proprietario1='+document.formnovosocio.proprietario1.value+
'&endprop1='+document.formnovosocio.endprop1.value+
'&dataadmi1='+document.formnovosocio.dataadmi1.value+
'&propriedade2='+document.formnovosocio.propriedade2.value+
'&proprietario2='+document.formnovosocio.proprietario2.value+
'&endprop2='+document.formnovosocio.endprop2.value+
'&dataadmi2='+document.formnovosocio.dataadmi2.value+
'&depnome1='+document.formnovosocio.depnome1.value+
'&deppar1='+document.formnovosocio.deppar1.value+
'&depnas1='+document.formnovosocio.depnas1.value+
'&depnome2='+document.formnovosocio.depnome2.value+
'&deppar2='+document.formnovosocio.deppar2.value+
'&depnas2='+document.formnovosocio.depnas2.value+
'&depnome3='+document.formnovosocio.depnome3.value+
'&deppar3='+document.formnovosocio.deppar3.value+
'&depnas3='+document.formnovosocio.depnas3.value+
'&depnome4='+document.formnovosocio.depnome4.value+
'&deppar4='+document.formnovosocio.deppar4.value+
'&depnas4='+document.formnovosocio.depnas4.value+
'&depnome5='+document.formnovosocio.depnome5.value+
'&deppar5='+document.formnovosocio.deppar5.value+
'&depnas5='+document.formnovosocio.depnas5.value+
'&obs='+document.formnovosocio.obs.value
;
}
</script>
<script> 
function validarInteiro(){ 
	var vmatricula = document.getElementById("matricula").value;
    //tento converter a inteiro. 
    //se era um inteiro não lhe afeta, se não era tenta converte-lo 
    valor = parseInt(vmatricula); 

    //Comprovo se é um valor numérico 
    if (isNaN(valor)) { 
       //então (não é número) devolvo o valor cadeia vazia 
       
	   alert ("Matricula deve ser um número!"); 
       //seleciono o texto 
       document.getElementById("matricula").select() ;
       //coloco outra vez o foco 
       document.getElementById("matricula").focus() ;
	   //return 0; 
    }else{ 
       //Em caso contrário (Se era um número) devolvo o valor 
	   validamatricula() ;
       //return valor; 
    } 
} 

function validacampos(valor,nomecampo){
switch(nomecampo)
{
case "nome":
var nomestring = "";
nomestring = valor;
if(valor.replace(/^\s+|\s+$/g,"") == ''){
	alert("O campo nome deve ser Preenchido!");	
	document.formnovosocio.nome.select() ;
    document.formnovosocio.nome.focus() ;
}
break;
	
}
}
</script> 
<?php

//inicio coloca devolta valor campos
echo '<script>
function teste(){
document.formnovosocio.matricula.value = "'.$mavalidar.'"; 

document.formnovosocio.admidia[1].selected = "0";
document.formnovosocio.admidia['.$_GET["admissaod"].'].selected = "1";
document.formnovosocio.admimes[1].selected = "0";
document.formnovosocio.admimes['.$_GET["admissaom"].'].selected = "1";
document.formnovosocio.admiano[0].selected = "0";
document.formnovosocio.admiano['.$_GET["admissaoa"].'].selected = "1";

document.formnovosocio.inscricao.value = "'.$_GET["inscricao"].'";
document.formnovosocio.nome.value = "'.$_GET["nome"].'";
document.formnovosocio.natural.value = "'.$_GET["natural"].'";

document.formnovosocio.estado[0].selected = "0";
document.formnovosocio.estado['.$_GET["estado"].'].selected = "1";
document.formnovosocio.cidadeatual[0].selected = "0";
document.formnovosocio.cidadeatual['.$_GET["cidadeatual"].'].selected = "1";
document.formnovosocio.nascdia[0].selected = "0";
document.formnovosocio.nascdia['.$_GET["nascdia"].'].selected = "1";
document.formnovosocio.nascmes[0].selected = "0";
document.formnovosocio.nascmes['.$_GET["nascmes"].'].selected = "1";
document.formnovosocio.nascano[0].selected = "0";
document.formnovosocio.nascano['.$_GET["nascano"].'].selected = "1";
document.formnovosocio.estcivil[0].selected = "0";
document.formnovosocio.estcivil['.$_GET["estcivil"].'].selected = "1";

document.formnovosocio.rg.value = "'.$_GET["rg"].'";
document.formnovosocio.serie.value = "'.$_GET["serie"].'";
document.formnovosocio.prsocial.value = "'.$_GET["prsocial"].'";
document.formnovosocio.cpf.value = "'.$_GET["cpf"].'";
document.formnovosocio.certrese.value = "'.$_GET["certrese"].'";
document.formnovosocio.pai.value = "'.$_GET["pai"].'";
document.formnovosocio.nacpai.value = "'.$_GET["nacpai"].'";
document.formnovosocio.mae.value = "'.$_GET["mae"].'";
document.formnovosocio.nacmae.value = "'.$_GET["nacmae"].'";
document.formnovosocio.propriedade1.value = "'.$_GET["propriedade1"].'";
document.formnovosocio.proprietario1.value = "'.$_GET["proprietario1"].'";
document.formnovosocio.endprop1.value = "'.$_GET["endprop1"].'";
document.formnovosocio.dataadmi1.value = "'.$_GET["dataadmi1"].'";
document.formnovosocio.propriedade2.value = "'.$_GET["propriedade2"].'";
document.formnovosocio.proprietario2.value = "'.$_GET["proprietario2"].'";
document.formnovosocio.endprop2.value = "'.$_GET["endprop2"].'";
document.formnovosocio.dataadmi2.value = "'.$_GET["dataadmi2"].'";
document.formnovosocio.depnome1.value = "'.$_GET["depnome1"].'";
document.formnovosocio.deppar1.value = "'.$_GET["deppar1"].'";
document.formnovosocio.depnas1.value = "'.$_GET["depnas1"].'";
document.formnovosocio.depnome2.value = "'.$_GET["depnome2"].'";
document.formnovosocio.deppar2.value = "'.$_GET["deppar2"].'";
document.formnovosocio.depnas2.value = "'.$_GET["depnas2"].'";
document.formnovosocio.depnome3.value = "'.$_GET["depnome3"].'";
document.formnovosocio.deppar3.value = "'.$_GET["deppar3"].'";
document.formnovosocio.depnas3.value = "'.$_GET["depnas3"].'";
document.formnovosocio.depnome4.value = "'.$_GET["depnome4"].'";
document.formnovosocio.deppar4.value = "'.$_GET["deppar4"].'";
document.formnovosocio.depnas4.value = "'.$_GET["depnas4"].'";
document.formnovosocio.depnome5.value = "'.$_GET["depnome5"].'";
document.formnovosocio.deppar5.value = "'.$_GET["deppar5"].'";
document.formnovosocio.depnas5.value = "'.$_GET["depnas5"].'";
document.formnovosocio.obs.value = "'.$_GET["obs"].'";

}
</script>';
//fim coloca devolta valor campos

?>
</head>

<body>

<center>

<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3>Cadastro de Novo Sócio</h3></font>



<br>

<form action="cadnovosocio.php" name="formnovosocio" method="post">

  <table border="0">

    <tr>

      <td colspan="2">.........................</td>

      <td colspan="8"><b>

        <h2>Sindicato dos Trabalhadores Rurais de Barrac&atilde;o</h2>

      </b></td>

    </tr>

    <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8" align="left">Matr&iacute;cula n&deg;:

          <input name="matricula" id="matricula" type="text" class="caixas" size="21" onBlur="validarInteiro()" ><?php 
if($mavalidar == ""){
	if($msg <> ""){
		echo '<img src="../imgs/exclamation.png" width="20" title="'.$msg.'" alt="'.$msg.'">';
	}
}
?>

          Admiss&atilde;o:

          <select name="admidia" class="caixas">

            <option value="<?php 

			if(date('d') >= 1 && date('d') <= 9){

			//echo "0";

			echo date('d');}else{echo date('d');} ?>" selected><?php if(date('d') >= 1 && date('d') <= 9){

			//echo "0";

			echo date('d');}else{echo date('d');}?></option>

			<option value="01">01</option>

            <option value="02">02</option>

            <option value="03">03</option>

            <option value="04">04</option>

            <option value="05">05</option>

            <option value="06">06</option>

            <option value="07">07</option>

            <option value="08">08</option>

            <option value="09">09</option>

            <option value="10">10</option>

<?php

for($x = "11"; $x <= "31"; $x++){

	echo "<option value=\"".$x."\">".$x."</option>";

}

?>

</select>

/

<select name="admimes">

<?php

if(date('m') == "01"){$mesagora = "JAN";}

if(date('m') == "02"){$mesagora = "FEV";}

if(date('m') == "03"){$mesagora = "MAR";}

if(date('m') == "04"){$mesagora = "ABR";}

if(date('m') == "05"){$mesagora = "MAI";}

if(date('m') == "06"){$mesagora = "JUN";}

if(date('m') == "07"){$mesagora = "JUL";}

if(date('m') == "08"){$mesagora = "AGO";}

if(date('m') == "09"){$mesagora = "SET";}

if(date('m') == "10"){$mesagora = "OUT";}

if(date('m') == "11"){$mesagora = "NOV";}

if(date('m') == "12"){$mesagora = "DEZ";}

echo "<option value=\"".date('m')."\" selected>".$mesagora."</option>";

?>

  <option value="01">JAN</option>

  <option value="02">FEV</option>

  <option value="03">MAR</option>

  <option value="04">ABR</option>

  <option value="05">MAI</option>

  <option value="06">JUN</option>

  <option value="07">JUL</option>

  <option value="08">AGO</option>

  <option value="09">SET</option>

  <option value="10">OUT</option>

  <option value="11">NOV</option>

  <option value="12">DEZ</option>

</select>

/

<select name="admiano">

<?php

for($x = 1950; $x <= 2010; $x++){

	echo "<option value=\"".$x."\">".$x."</option>";

}

?>

  <option value="2011">2011</option>
  <option value="2012">2012</option>
  <option value="2013">2013</option>
    <option value="2014" selected>2014</option>

</select>

Inscri&ccedil;&atilde;o n&deg;:

<input name="inscricao" type="text" class="caixas" size="19"></td>

    </tr>

    <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8">Nome:

        <input name="nome" type="text" class="caixas" size="105" onBlur="validacampos(this.value,'nome')" ></td>

    </tr>

    <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8">Natural de:

          <input name="natural" type="text" class="caixas" size="66">

          Estado:

          <select name="estado">

          <option value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>

          <option value="AC" >AC</option>

          <option value="AL" >AL</option>

          <option value="AM" >AM</option>

          <option value="AP" >AP</option>

          <option value="BA" >BA</option>

          <option value="CE" >CE</option>

          <option value="DF" >DF</option>

          <option value="ES" >ES</option>

          <option value="GO" >GO</option>

          <option value="MA" >MA</option>

          <option value="MG" >MG</option>

          <option value="MS" >MS</option>

          <option value="MT" >MT</option>

          <option value="PA" >PA</option>

          <option value="PB" >PB</option>

          <option value="PE" >PE</option>

          <option value="PI" >PI</option>

          <option value="PR" >PR</option>

          <option value="RJ" >RJ</option>

          <option value="RN" >RN</option>

          <option value="RO" >RO</option>

          <option value="RR" >RR</option>

          <option value="RS" >RS</option>

          <option value="SC" >SC</option>

          <option value="SE" >SE</option>

          <option value="SP" >SP</option>

          <option value="TO" >TO</option>

        </select>

</td>

    </tr>
    
        <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8">Cidade atual:
          <select name="cidadeatual">

          <option value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
	<option value="1" >Barracão - PR</option>
	<option value="2" >Bom Jesus do Sul - PR</option>
    <option value="3" >Dionisio Cerqueira - SC</option>
        </select>

</td>

    </tr>

    <tr>

      <td colspan="2">.........................</td>

      <td colspan="8">Data de Nascimento:

          <select name="nascdia" class="caixas">

          <option value="" selected></option>

            <option value="01">01</option>

            <option value="02">02</option>

            <option value="03">03</option>

            <option value="04">04</option>

            <option value="05">05</option>

            <option value="06">06</option>

            <option value="07">07</option>

            <option value="08">08</option>

            <option value="09">09</option>

            <option value="10">10</option>

<?php

for($x = "11"; $x <= "31"; $x++){

	echo "<option value=\"".$x."\">".$x."</option>";

}

?>

          </select>

/

<select name="nascmes">

<option value="" selected></option>

  <option value="01">JAN</option>

  <option value="02">FEV</option>

  <option value="03">MAR</option>

  <option value="04">ABR</option>

  <option value="05">MAI</option>

  <option value="06">JUN</option>

  <option value="07">JUL</option>

  <option value="08">AGO</option>

  <option value="09">SET</option>

  <option value="10">OUT</option>

  <option value="11">NOV</option>

  <option value="12">DEZ</option>

</select>

/

<select name="nascano">

<option value=""></option>

<?php
$anoatual = date('Y');
for($x = 1900; $x <= $anoatual; $x++){

	echo "<option value=\"".$x."\">".$x."</option>";

}

?>

</select>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado Civil:<select name="estcivil">

<option value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>

  <option value="Solteiro(a)">Solteiro(a)</option>

  <option value="Casado(a)">Casado(a)</option>

  <option value="Separado(a)">Separado(a)</option>

  <option value="Divorciado(a)">Divorciado(a)</option>

  <option value="Viuvo(a)">Vi&uacute;vo(a)</option>

</select>

</td>

    </tr>

    </table>

    <table>

    <tr>

      <td colspan="2"></td>

      <td colspan="8">RG n&deg;:

        <input name="rg" type="text" class="caixas" size="35">

        S&eacute;rie:

        <input name="serie" type="text" class="caixas" size="18">

Pr. Social:

<input name="prsocial" type="text" class="caixas" size="28"></td>

    </tr>

    <tr>

      <td colspan="2"></td>

      <td colspan="8">CPF n&deg;:

        <input name="cpf" type="text" class="caixas" size="44">

        Certificado de Reservista n&deg;:

        <input name="certrese" type="text" class="caixas" size="28"></td>

    </tr>

    <tr>

      <td rowspan="2" align="center"><b>Filia&ccedil;&atilde;o</b></td><td rowspan="2" align="right"><h2>{</h2></td>

      <td colspan="8">Pai:

        <input name="pai" type="text" class="caixas" size="57">Nacionalidade:

        <input name="nacpai" type="text" class="caixas" size="34"></td>

    </tr>

    <tr>

      <td colspan="8">M&atilde;e:

        <input name="mae" type="text" class="caixas" size="55">

        Nacionalidade:

        <input name="nacmae" type="text" class="caixas" size="34"></td>

    </tr>

    <tr>

      <td rowspan="4" align="center"><b>Empresa</b> <br>onde exerce<br> 

        a profiss&atilde;o</td>

      <td rowspan="2"><h2>1</h2></td>

      <td colspan="8">Propriedade:

        <input name="propriedade1" type="text" class="caixas" size="47">

        Propriet&aacute;rio:

        <input name="proprietario1" type="text" class="caixas" size="37"></td>

    </tr>

    <tr>

      <td colspan="8">Endere&ccedil;o:
       
       <input name="endprop1" type="text" class="caixas" size="50"> 

        Data da Admiss&atilde;o:

        <input name="dataadmi1" type="text" class="caixas" size="30"></td>

    </tr>

    <tr>

      <td rowspan="2"><h2>2</h2></td>

      <td colspan="8">Propriedade:

        <input name="propriedade2" type="text" class="caixas" size="47">

        Propriet&aacute;rio:

        <input name="proprietario2" type="text" class="caixas" size="37"></td>

    </tr>

    <tr>

      <td colspan="8">Endere&ccedil;o:

        <input name="endprop2" type="text" class="caixas" size="50">

        Data da Admiss&atilde;o:

        <input name="dataadmi2" type="text" class="caixas" size="30"></td>

    </tr>

    </table>

    <table>

    <tr>

      <td colspan="2"></td>

      <td colspan="4" align="center">Nomes</td>

      <td colspan="2" align="center">Parentesco</td>

      <td align="center">Data Nascimento</td>

    </tr>

    <tr>

      <td colspan="2"> </td>

      <td colspan="4" align="center"><input name="depnome1" type="text" class="caixas" size="50"></td>

      <td colspan="2"><input name="deppar1" type="text" class="caixas" size="30"></td>

      <td colspan="2"><input name="depnas1" type="text" class="caixas" size="30"></td>

    </tr>

    <tr>

      <td colspan="2"><p>&nbsp;&nbsp;</p></td>

      <td colspan="4" align="center"><input name="depnome2" type="text" class="caixas" size="50"></td>

      <td colspan="2"><input name="deppar2" type="text" class="caixas" size="30"></td>

      <td colspan="2"><input name="depnas2" type="text" class="caixas" size="30"></td>

    </tr>

    <tr>

      <td colspan="2">Dependentes:</td>

      <td colspan="4" align="center"><input name="depnome3" type="text" class="caixas" size="50"></td>

      <td colspan="2"><input name="deppar3" type="text" class="caixas" size="30"></td>

      <td colspan="2"><input name="depnas3" type="text" class="caixas" size="30"></td>

    </tr>

    <tr>

      <td colspan="2">&nbsp;</td>

      <td colspan="4" align="center"><input name="depnome4" type="text" class="caixas" size="50"></td>

      <td colspan="2"><input name="deppar4" type="text" class="caixas" size="30"></td>

      <td colspan="2"><input name="depnas4" type="text" class="caixas" size="30"></td>

    </tr>

    <tr>

      <td colspan="2"></td>

      <td colspan="4" align="center"><input name="depnome5" type="text" class="caixas" size="50"></td>

      <td colspan="2"><input name="deppar5" type="text" class="caixas" size="30"></td>

      <td colspan="2"><input name="depnas5" type="text" class="caixas" size="30"></td>

    </tr>

    </table>

    <table>

    <tr>

      <td colspan="2">Obs.:</td>

      <td colspan="8"><textarea name="obs" rows="3" cols="90"></textarea></td>

    </tr>

  </table>

    
<?php 
if($mavalidar <> ""){
    echo '<input type="submit" value="Salvar" name="btsalvar">';
}

?>
</form>

<br>

<br>

<br>

<img src="../imgs/printer.png"  width="20" height="20" title="Clique aqui para imprimir" onClick="javascript:window.print();" alt="Clique aqui para imprimir">


<br>
<br>


<img src="../imgs/arrow_undo.png" width="20" onClick="location.href='../inicio.php'" title="Clique aqui para Voltar" alt="Clique aqui para Voltar">


</center>


<br>
<br>


<script>
teste();
</script>
</body>

</html>