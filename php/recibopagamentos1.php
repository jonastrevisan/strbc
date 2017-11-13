<?php
include('extenso.php');
$valor = 850;
echo '
<center>
<table border="0"><tr><td>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<table border="1"><tr><td>
<table border="0">
<tr><td colspan="2"><font face="Georgia, Times New Roman, Times, serif" color="#A9A9A9">
<h2>Declara de Pagamento</h2>
</font></td><td align="right"><table border="0"><tr><td bgcolor="#CCCCCC" align="right"><font face="Georgia, Times New Roman, Times, serif" size="-1">
R$</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$valor.',00</b></td></tr></table></td></tr>
<tr><td align="right">Recebemos de </td><td colspan="2" bgcolor="#CCCCCC"><b>Sindicato dos Trabalhadores Rurais de Barrac&atilde;o - PR</b></td></tr>
<tr><td align="right">A quantia de </td><td colspan="2" bgcolor="#CCCCCC"><b>';
 
echo 'Oitocentos e cinquenta reais</b></td></tr>
<tr><td align="right">Referente a </td><td colspan="2" bgcolor="#CCCCCC"><b>Mensalidade/manutenção (Integrais) Sistema ref Período de 1º de Março de 2012 a 30 de Janeiro de 2013 <Br>
Mensalidade/manutenção (Parcial) Sistema ref Período de 1º de Fevereiro de 2013 a 28 de Fevereiro de 2013 
</b></td></tr>
<tr><td rowspan="4"><img src="../imgs/STRLOGO.jpg" alt="Sindicato dos Trabalhadores Rurais de Barracao"  height="125" width="200"/></td><td colspan="2" align="center">Barrac&atilde;o (PR), <u>'.date("d",strtotime($datapagto)).'</u> de <u>';
 
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
echo '
</u> de <u> '.date("Y",strtotime($datapagto)).'
</u></td></tr>
<tr><td colspan="2"><Br />&nbsp;</td></tr>
<tr><td colspan="2" align="center">_________________________________________</td></tr>
<tr><td colspan="2"></td></tr>
<tr><td colspan="3" align="center"><font face="Georgia, Times New Roman, Times, serif" size="-1">Sindicato dos Trabalhadores Rurais de Barrac&atilde;o - PR</font><br /><font face="Georgia, Times New Roman, Times, serif" size="-1">Rua Para&iacute;ba, 20 - Centro - CEP 85700-000</font><br /><font face="Georgia, Times New Roman, Times, serif" size="-1">Barrac&atilde;o - Paran&aacute; - Tel (49) 3644 1066</font></td></tr>
<tr><td></td><td></td><td></td></tr>
</table>
</td></tr></table></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.
</td></tr></table>
';
?>