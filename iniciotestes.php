<?php
include("php/verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sindicato</title>
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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33791445-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>




<!-- teste mouse on-->
<style type="text/css">
<!--
    /*These 4 are for the onFocus and onClick examples */
    p.invis     {display:none}
    p.correct   {display:inline; color:green}
    p.incorrect {display:inline; color:red}
    p.higher {display:inline; color:red}
    p.lower {display:inline; color:red}
	
    /*The following are for the drop down menu example, onMouseOver Example 2 */
    .menuActuator a {
            color:#666666;
            font-weight:bold;
            text-decoration:none;
            background-color:#cccccc;
            background-color:#cccccc;}
    .menu {
            color:#666666;
            background-color:#cccccc;
            border:2px solid #aaaaaa;
            line-height:130%;}
    .menu ul {
        margin:0px;
        padding:0px;
        margin-left:17px;}
    td div {

/* this makes TDs a container with their own coordinate system.
         absolutely-positioned elements will be offset relative to them */
      position:relative;}
      .alphalist
        {
        list-style-type: upper-alpha;
        }
-->
 </style>
 
 <script type="text/javascript" src="ypslideoutmenu.js"></script>

<script type="text/javascript">
// Settings for drop-down menu
        var myMenu1 = new ypSlideOutMenu("menu1", "down", 0, 0, 250, 90)
        var myMenu2 = new ypSlideOutMenu("menu2", "down", 0, 0, 200, 130)
        var myMenu3 = new ypSlideOutMenu("menu3", "down", 0, 0, 150, 90)
</script><style type="text/css">#menu1Container { visibility:hidden; left:0px; top:0px; overflow:hidden; z-index:10000; }#menu1Container, #menu1Content { position:absolute; width:250px; height:90px; clip:rect(0 250 90 0); }</style><style type="text/css">#menu2Container { visibility:hidden; left:0px; top:0px; overflow:hidden; z-index:10000; }#menu2Container, #menu2Content { position:absolute; width:200px; height:130px; clip:rect(0 200 130 0); }</style><style type="text/css">#menu3Container { visibility:hidden; left:0px; top:0px; overflow:hidden; z-index:10000; }#menu3Container, #menu3Content { position:absolute; width:150px; height:90px; clip:rect(0 150 90 0); }</style>
<!-- teste mouse on-->
</head>

<body>
<!--<SCRIPT LANGUAGE="JavaScript">
alert ("Olá. O seu sistema está passando por Evoluções. Estamos trabalhando para tornar o sistema cada vez melhor. Você pode continuar usando o sistema normalmente. E por medidas de segurança sugerimos a você que faça uma nova senha Clicando em Criar nova senha, nesta mesma pagina. Caso você ja tenha efetuado a criação da mesma, desconsidere esta mensagem, lembrando que a mesma não será mais exibida 24 horas apos a criação da nova senha. Gratos pela compreenção, Tenham um Bom dia!");
</SCRIPT>

<body onLoad=alert("Olá. O seu sistema está passando por Evoluções. Estamos trabalhando para tornar o sistema cada vez melhor. Você pode continuar usando o sistema normalmente. E por medidas de segurança sugerimos a você que faça uma nova senha Clicando em Criar nova senha, nesta mesma pagina. Caso você ja tenha efetuado a criação da mesma, desconsidere esta mensagem, lembrando que a mesma não será mais exibida 24 horas apos a criação da nova senha. Gratos pela compreenção, Tenham um Bom dia!")>-->

<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<style type="text/css">
body {
	background-color: #EFEFEF;
}
</style>
<center>
  <table border="0">
    <tr>
      <td colspan="2"><img src="imgs/STRLOGO.jpg" alt="Sindicato dos Trabalhadores Rurais de Barracao" height="150" width="300"/></td>
    </tr>
  </table>
  <br />
  <br />
  <table border="0">
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Cadastro de Sócio</font></td>
      <td></td><td rowspan="7" colspan="2" align="center"><font color="#4169E1"><b>Mensagens (Informativos e lembretes..)</b></font><Br /><textarea name="info" rows="10" cols="50" readonly><?php 
include("php/conecta.php");
$sql = "SELECT id, informativo 
FROM informativos
WHERE flagmostrar = 'S'
LIMIT 0 , 1";

$id = 0;

$executa_sql = mysql_query($sql, $con);
$texto = 'Nenhum Informativo para o momento..';
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  $id = $linha_da_consulta["id"];
  //if ($id == 0){
	//echo 'Nenhum Informativo para o momento..';
	//alert('teste');
  //}else{
	$texto = $linha_da_consulta["informativo"];
//	alert('teste2');
 // }
}
echo $texto;
 	  ?></textarea></td>
    </tr>
    <tr>
      <td><img src="imgs/group_add.png" /></td>
      <td colspan="2" align="left"><a href="php/precadnovosocio.php" target="_top">Cadastrar novo Sócio</a></td>
    </tr>
    <tr>
      <td><img src="imgs/group_go.png"/></td>
      <td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=pesquisa">Pesquisar Sócio</a></td>
    </tr>
    <tr>
      <td><img src="imgs/group_edit.png"/></td>
      <td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=edicao">Editar Sócio</a></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Pesquisa Avan&ccedil;ada</font></td>
      <td></td>
    </tr>
    <tr>
      <td colspan="3"><img src="imgs/magnifier.png"/><input name="arg" type="text" class="caixas" size="40" value="teste" onmouseover="ypSlideOutMenu.showMenu(&#39;menu1&#39;);" onmouseout="ypSlideOutMenu.hideMenu(&#39;menu1&#39;)">

        <div class="td_div">
        <div id="menu1Container" style="visibility: hidden;">
        <div id="menu1Content" class="menu" style="top: -90px;">
        Neste campo de busca avançada você pode informar o nome completo ou parte do nome do sócio desejado, ou o número da matricula.
        </div>
        </div>
        </div><center>
        <input type="button" value="Pesquisar" name="btpesq" onclick="location.href='emconstrucao.html'"></center></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Carteira de Sócio</font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/book_open.png"/></td>
      <td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=carteira">Visualizar Carteira</a></td><td><?php if($id <> 0){echo "<input type=\"button\" value=\"Confirmo Ter Lido\" name=\"li\" onclick=\"location.href='php/msglido.php?id=".$id."'\">"; }?></td><td align="right"><!--<a href="emconstrucao.html"  >Ler mais...</a>--></td>
    </tr>
    
    <!--<tr><td colspan="2" align="left"><br />
<font color="#000000" face="Verdana, Geneva, sans-serif">Controle de Cobranca</font></td><td></td></tr>
<tr><td></td><td colspan="2" align="left"><a href="">Por Socio</a></td></tr>
<tr><td></td>
<td colspan="2" align="left"><a href="">Por Mes</a></td></tr>
<tr><td></td><td colspan="2" align="left"><a href="">Por Ano</a></td></tr>-->
    
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Pedido de Desfiliação</font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/group_delete.png"/></td>
      <td colspan="2" align="left"><a href="php/versocio.php?id=nenhum&tipopesquisa=desfiliar">Pedido de desfiliação</a></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Relatórios </font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/script.png"/></td>
      <td colspan="2" align="left"><a href="php/relatoriosocios.php"  >Relatório de Sócios</a></td>
    </tr>
    <tr>
      <td><img src="imgs/script.png"/></td>
      <td colspan="2" align="left"><a href="php/relatoriosocios.php?ativo=N"  >Relatório de Desfiliados</a></td>
    </tr>
    <tr>
      <td><img src="imgs/script.png"/></td>
      <td colspan="3" align="left"><a href="php/relatoriosd.php?rel=1"  >Relatório de Sócios Sem Controle de Cobrança cadastrado no Sistema</a></td>
    </tr>
    <tr>
      <td><img src="imgs/script.png"/></td>
      <td colspan="3" align="left"><a href="php/relatoriosd.php?rel=2"  >Relatório de Sócios Com  Cobranças pendentes no Sistema<BR> e seus respectivos valores</a></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Gráficos </font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/chart_bar.png"/></td>
      <td colspan="2" align="left"><a href="grafico.php"  >Gráfico de valores anuais</a></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Financeiro </font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/dinheiro.png"/></td>
      <td colspan="2" align="left"><a href="Pagamentos.php"  >Relatório dos Pagamentos</a></td>
    </tr>
    <tr>
    <tr>
      <td><img src="imgs/printer.png"/></td>
      <td colspan="2" align="left"><a href="images/20-12.pdf" target="_blank" >Imprimir Boleto do Sistema</a></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Aniversários</font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/date_next.png"/></td>
      <td colspan="2" align="left"><a href="aniversariante.php">Aniversáriantes do mês</a></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><br />
        <font color="#000000" face="Verdana, Geneva, sans-serif">Suporte</font></td>
      <td></td>
    </tr>
    <tr>
      <td><img src="imgs/user_comment.png"/></td>
      <td colspan="2" align="left"><a href="php/suporte.php">Solicitação de Suporte</a></td>
    </tr>
    
    <!--
<tr><td colspan="2" align="left"><br />
  <font color="#000000" face="Verdana, Geneva, sans-serif">Atualizar senha</font></td>
  <td></td></tr>
<tr>
  <td><img src="imgs/exclamation.png"/></td>
<td colspan="2" align="left"><a href="php/editsenha.php">Atualizar senha!</a></td></tr>
-->
    
  </table>
  <br />
  <br />
  <table border="0">
    <tr>
      <td><a href="php/logoof.php"><img src="imgs/door_out.png" alt="Loggof-Sair do Sistema" width="20" height="20" border="0"/></a></td>
      <td><a href="php/logoof.php">Sair do Sistema</a></td>
    </tr>
  </table>
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
