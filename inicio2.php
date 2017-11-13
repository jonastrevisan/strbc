<?php
include("php/verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Sindicato</title>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33791445-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33791445-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<SCRIPT LANGUAGE="JavaScript">

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
var Today=new Date();
var ThisDay=Today.getDay();
var ThisDate=Today.getDate();
var ThisMonth=Today.getMonth()+1;
var ThisYear=Today.getFullYear();  //included if you wish to insert the year
function DayTxt (DayNumber) {
var Day=new Array();
Day[0]="Sunday";
Day[1]="Monday";
Day[2]="Tuesday";
Day[3]="Wednesday";
Day[4]="Thursday";
Day[5]="Friday";
Day[6]="Saturday";
return Day[DayNumber];
}
var DayName=DayTxt(ThisDay);
function MonthTxt (MonthNumber) {
var Month=new Array();
Month[1]="January";
Month[2]="February";
Month[3]="March";
Month[4]="April";
Month[5]="May";
Month[6]="June";
Month[7]="July";
Month[8]="August";
Month[9]="September";
Month[10]="October";
Month[11]="November";
Month[12]="December";
return Month[MonthNumber];
}
var MonthName=MonthTxt(ThisMonth);
var d = new Date();
var h = d.getHours();
document.write("<TABLE BORDER=0  BGCOLOR=white  WIDTH=75 HEIGHT=85 align=left>"+"<TD>"+"<p align=center>"+"<img src=imgs/date.png>"+"<font size=-2 >"+DayName+"<br>"+"<font color=blach size=+3 >"+ThisDate+"</font>"+"<br>"+MonthName+"<br>"+"</b>"+"</font>"+"</p>"+"</TD>"+"</TR>"+"</TABLE>");
if (h < 2) document.write("<P ALIGN=left>"+"<b>"+"Bom dia! Sim, é meia-noite caminho."+"</b>"+"</P>");
else if (h < 3) document.write("<P ALIGN=left>"+"<b>"+"Bom dia! Cedo ou trabalhando até tarde?"+"</b>"+"</P>");
else if (h < 7) document.write("<P ALIGN=left>"+"<b>"+"Bom dia! Até bem cedo!"+"</b>"+"</P>");
else if (h < 12) document.write("<P ALIGN=left>"+"<b>"+"Bom dia!"+"</b>"+"</P>");
else if (h < 17) document.write("<P ALIGN=left>"+"<b>"+"Boa Tarde!"+"</b>"+"</P>");
else if (h < 23) document.write("<P ALIGN=left>"+"<b>"+"Boa Noite!"+"</b>"+"</P>");
else document.write("<P ALIGN=center>"+"<b>"+""+"</b>"+"</P>");
//  End -->
</script>
<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />


<style type="text/css">
body {
	background-color: #EFEFEF;
}
</style>

<center><table border="0"><tr><td colspan="2"><img src="imgs/topo02.png" alt="Sindicato dos Trabalhadores Rurais de Barracao" width="700"/></td></tr></table>
<br /><br />
<table border="0">
  
  
  
  <tr>
  <td colspan="2" align="left"><br />
  <font color="#000000" face="Verdana, Geneva, sans-serif">Cadastro de Sócio</font></td>
  <td></td></tr>
<tr>
<td><img src="imgs/group_add.png" /></td>
<td colspan="2" align="left"><a href="php/precadnovosocio.php" target="_top">Cadastrar novo Sócio</a></td></tr><tr><td><img src="imgs/group_go.png"/></td><td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=pesquisa">Pesquisar Sócio</a></td></tr>
<tr><td><img src="imgs/group_edit.png"/></td><td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=edicao">Editar Sócio</a></td></tr>

<tr><td colspan="2" align="left"><br /><font color="#000000" face="Verdana, Geneva, sans-serif">Carteira de Sócio</font></td><td></td></tr>
<tr><td><img src="imgs/book_open.png"/></td>

<td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=carteira">Visualizar Carteira</a></td></tr>

<!--<tr><td colspan="2" align="left"><br />
<font color="#000000" face="Verdana, Geneva, sans-serif">Controle de Cobranca</font></td><td></td></tr>
<tr><td></td><td colspan="2" align="left"><a href="">Por Socio</a></td></tr>
<tr><td></td>
<td colspan="2" align="left"><a href="">Por Mes</a></td></tr>
<tr><td></td><td colspan="2" align="left"><a href="">Por Ano</a></td></tr>-->

<tr><td colspan="2" align="left"><br />
<font color="#000000" face="Verdana, Geneva, sans-serif">Pedido de Desfiliação</font></td><td></td></tr>
<tr>
<td><img src="imgs/group_delete.png"/></td>
<td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=desfiliar">Pedido de desfiliação</a></td></tr>

<tr><td colspan="2" align="left"><br />
  <font color="#000000" face="Verdana, Geneva, sans-serif">Gráficos </font></td>
  <td></td></tr>
<tr>
  <td><img src="imgs/chart_bar.png"/></td>
<td colspan="2" align="left"><a href="grafico.php"  >Gráfico de valores anuais</a></td></tr>
<tr><td colspan="2" align="left"><br />
  <font color="#000000" face="Verdana, Geneva, sans-serif">Financeiro </font></td>
  <td></td></tr>
<tr>
  <td><img src="imgs/dinheiro.png"/></td>
<td colspan="2" align="left"><a href="Pagamentos.php"  >Relatório dos Pagamentos</a></td></tr>


<tr><td colspan="2" align="left"><br />
  <font color="#000000" face="Verdana, Geneva, sans-serif">Aniversários</font></td>
  <td></td></tr>
<tr>
  <td><img src="imgs/date_next.png"/></td>
<td colspan="2" align="left"><a href="aniversariante.php">Aniversáriantes do mês</a></td></tr>

</table>
<br />
<br /><table border="0"><tr><td>
<a href="php/logoof.php"><img src="imgs/door_out.png" alt="Loggof-Sair do Sistema" width="20" height="20" border="0"/></a></td><td><a href="php/logoof.php">Sair do Sistema</a></td></tr></table>

</center>

</body>

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

</html>
