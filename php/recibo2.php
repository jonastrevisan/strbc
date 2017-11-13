<?php
//exemplos abaixo 
//$valor = 15;
//$dim = extenso($valor); 
//$dim = ereg_replace(" E "," e ",ucwords($dim)); 
//echo $dim;

//SELECT idpagto, socioid, ano, mes, datapagto, situacao, nome FROM `cobranca` left join socio on cobranca.socioid = socio.matricula where idpagto = 1
function recibos($idpagto){
	include("conecta.php");
$sql = "SELECT idpagto, socioid, ano, mes, datapagto, valor, situacao, nome FROM cobranca left join socio on cobranca.socioid = socio.matricula where idpagto = ".$idpagto;
$executa_sql = mysql_query($sql, $con);
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
	$socioid = $linha_da_consulta["socioid"];
	$ano = $linha_da_consulta["ano"];
	$mes = $linha_da_consulta["mes"];
	$datapagto = $linha_da_consulta["datapagto"];
	$valor = ''.$linha_da_consulta["valor"].'';
	$situacao = $linha_da_consulta["situacao"];
	$nome = $linha_da_consulta["nome"];
}

?>
<center>
<table border="0"><tr><td>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<table border="1"><tr><td>
<table border="0">
<tr><td colspan="2"><font face="Georgia, Times New Roman, Times, serif" color="#A9A9A9">
<h2>RECIBO</h2></font></td><td align="right"><table border="0"><tr><td bgcolor="#CCCCCC" align="right"><font face="Georgia, Times New Roman, Times, serif" size="-1">
R$</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $valor; 
//$imprimi0 = 1; 
//$pos = strpos($valor, ',');
//if($pos === false){
//	$pos = strpos($valor, '.');
//	if($pos === false){
//		$imprimi0 = 0;
//	}else{
//		$imprimi0 = 1;	
//	}
//}else{
//	$imprimi0 = 2;
//}
//if($imprimi0 == 0){
//	echo $valor.",00";
//}
//if($imprimi0 == 1){
//	$valor = ereg_replace('.',',',$valor);
//	echo $valor;
//	$valor = ereg_replace(',','.',$valor);
//}
//if($imprimi0 == 2){
//	echo $valor;
//	$valor = ereg_replace(',','.',$valor);
//}

?></b></td></tr></table></td></tr>
<tr><td align="right">Recebemos de </td><td colspan="2" bgcolor="#CCCCCC"><b><?php echo $nome." (".$socioid.")";
?></b></td></tr>
<tr><td align="right">A quantia de </td><td colspan="2" bgcolor="#CCCCCC"><b><?php 
$dim = extenso($valor); 
$dim = ereg_replace(" E "," e ",ucwords($dim)); 
echo $dim;
?></b></td></tr>
<tr><td align="right">Referente a </td><td colspan="2" bgcolor="#CCCCCC"><b>Mensalidade M&ecirc;s <?php echo $mes; ?>/<?php echo $ano; ?> (Contribui&ccedil;&atilde;o Sindical Rural)</b></td></tr>
<tr><td rowspan="4"><img src="../imgs/STRLOGO.jpg" alt="Sindicato dos Trabalhadores Rurais de Barracao"  height="125" width="200"/></td><td colspan="2" align="center">Barrac&atilde;o (PR), <u><?php echo date("d",strtotime($datapagto)); ?></u> de <u><?php 
If(date("m",strtotime($datapagto)) == 01){
	echo "Janeiro";
}
If(date("m",strtotime($datapagto)) == 02){
	echo "Fevereiro";
}
If(date("m",strtotime($datapagto)) == 03){
	echo "Mar&ccedil;o";
}
If(date("m",strtotime($datapagto)) == 04){
	echo "Abril";
}
If(date("m",strtotime($datapagto)) == 05){
	echo "Maio";
}
If(date("m",strtotime($datapagto)) == 06){
	echo "Junho";
}
If(date("m",strtotime($datapagto)) == 07){
	echo "Julho";
}
If(date("m",strtotime($datapagto)) == 08){
	echo "Agosto";
}
If(date("m",strtotime($datapagto)) == 09){
	echo "Setembro";
}
If(date("m",strtotime($datapagto)) == 10){
	echo "Outubro";
}
If(date("m",strtotime($datapagto)) == 11){
	echo "Novembro";
}
If(date("m",strtotime($datapagto)) == 12){
	echo "Dezembro";
}
?>
</u> de <u> <?php echo date("Y",strtotime($datapagto)); ?>
</u></td></tr>
<tr><td colspan="2"><Br />&nbsp;</td></tr>
<tr><td colspan="2" align="center">_________________________________________</td></tr>
<tr><td colspan="2"></td></tr>
<tr><td colspan="3" align="center"><font face="Georgia, Times New Roman, Times, serif" size="-1">Sindicato dos Trabalhadores Rurais de Barrac&atilde;o - PR</font><br /><font face="Georgia, Times New Roman, Times, serif" size="-1">Rua Para&iacute;ba, 20 - Centro - CEP 85700-000</font><br /><font face="Georgia, Times New Roman, Times, serif" size="-1">Barrac&atilde;o - Paran&aacute; - Tel (49) 3644 1066</font></td></tr>
<tr><td></td><td></td><td></td></tr>
</table>
</td></tr></table></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.
</td></tr></table>

<?php

}

?>