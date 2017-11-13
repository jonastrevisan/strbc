<?php
include("php/verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sindicato</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/letra_j.png" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<link rel="stylesheet" href="css/tamanho_div.css" type="text/css" />
<script language="JavaScript" src="js/jquery-1.3.2.js" type="text/javascript"></script>
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
    p.invis {
	display:none
}
p.correct {
	display:inline;
	color:green
}
p.incorrect {
	display:inline;
	color:red
}
p.higher {
	display:inline;
	color:red
}
p.lower {
	display:inline;
	color:red
}
/*The following are for the drop down menu example, onMouseOver Example 2 */
    .menuActuator a {
	color:#666666;
	font-weight:bold;
	text-decoration:none;
	background-color:#cccccc;
	background-color:#cccccc;
}
.menu {
	color:#666666;
	background-color:#CFCFCF;
	border:2px solid #aaaaaa;
	line-height:130%;
}
.menu ul {
	margin:0px;
	padding:0px;
	margin-left:17px;
}
td div {
	/* this makes TDs a container with their own coordinate system.
         absolutely-positioned elements will be offset relative to them */
      position:relative;
}
.alphalist {
	list-style-type: upper-alpha;
}
-->
</style>
<script type="text/javascript" src="ypslideoutmenu.js"></script>
<script type="text/javascript">
// Settings for drop-down menu
        var myMenu1 = new ypSlideOutMenu("menu1", "down", 0, 0, 200, 210)
        var myMenu2 = new ypSlideOutMenu("menu2", "down", 0, 0, 350, 130)
        var myMenu3 = new ypSlideOutMenu("menu3", "down", 0, 0, 150, 90)
</script>
<style type="text/css">
#menu1Container {
	visibility:hidden;
	left:0px;
	top:0px;
	overflow:hidden;
	z-index:10000;
}
#menu1Container, #menu1Content {
	position:absolute;
	width:280px;
	height:110px;
	clip:rect(0 280 110 0);
}
</style>
<style type="text/css">
#menu2Container {
	visibility:hidden;
	left:0px;
	top:0px;
	overflow:hidden;
	z-index:10000;
}
#menu2Container, #menu2Content {
	position:absolute;
	width:200px;
	height:130px;
	clip:rect(0 200 130 0);
}
</style>
<style type="text/css">
#menu3Container {
	visibility:hidden;
	left:0px;
	top:0px;
	overflow:hidden;
	z-index:10000;
}
#menu3Container, #menu3Content {
	position:absolute;
	width:150px;
	height:90px;
	clip:rect(0 150 90 0);
}
</style>
<!-- teste mouse on-->
<script type="text/javascript">

function pesquisarav(){
	location.href='php/pesqav.php?pesqavtxt='+document.getElementById('pesqavtxt').value;
}

</script>
</head>

<body>

    
    
    
    
    
    
    
<?php 
include("php/popups.php");
$retornomsg = $_GET["msg"];
if($retornomsg <> ""){
echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"".$retornomsg."\");
</SCRIPT>";
}
?>
<!--<SCRIPT LANGUAGE="JavaScript">
alert ("Olá. O seu sistema está passando por Evoluções. Estamos trabalhando para tornar o sistema cada vez melhor. Você pode continuar usando o sistema normalmente. E por medidas de segurança sugerimos a você que faça uma nova senha Clicando em Criar nova senha, nesta mesma pagina. Caso você ja tenha efetuado a criação da mesma, desconsidere esta mensagem, lembrando que a mesma não será mais exibida 24 horas apos a criação da nova senha. Gratos pela compreenção, Tenham um Bom dia!");
</SCRIPT>

<body onLoad=alert("Olá. O seu sistema está passando por Evoluções. Estamos trabalhando para tornar o sistema cada vez melhor. Você pode continuar usando o sistema normalmente. E por medidas de segurança sugerimos a você que faça uma nova senha Clicando em Criar nova senha, nesta mesma pagina. Caso você ja tenha efetuado a criação da mesma, desconsidere esta mensagem, lembrando que a mesma não será mais exibida 24 horas apos a criação da nova senha. Gratos pela compreenção, Tenham um Bom dia!")>-->
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<!--<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />-->
<style type="text/css">
body {
	background-color: #EFEFEF;
}
</style>


<div class="navbar navbar-inverse nav">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#" name="top">STRBC</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="#"><i class="icon-home"></i> </a></li>
					
				</ul>
				<ul class="nav pull-right">
					<li><a href="#"></a></li>
                  	<li class="divider-vertical"></li>
					<li class="dropdown">
						<a  href="php/logoof.php" ><i class="icon-off icon-white"></i> Sair <strong class="caret"></strong></a>
						
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->










<div class="cBoxTop">
<center><center><h1><b>Sindicato dos Trabalhadores Rurais de Barracão</b></h1></center>
 <!-- <img src="imgs/STRLOGO.jpg" alt="Sindicato dos Trabalhadores Rurais de Barracao" height="150" width="300"/> -->
   
</center>
</div>
   <div class="cBoxLeft">
  <ul id="menu">
    <li class="header" style="font-size:24px">Menu</li>
   
   
    <li class="parent" style="background:#D5D5D5"><a href="#" title=""><img src="imgs/user.png" />Cadastro</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="php/precadnovosocio.php" title=""><img src="imgs/group_add.png" /> Cadastrar novo Sócio</a></li>
        <li class="marginTop"><a href="php/versocio.php?id=nenhum&tipopesquisa=pesquisa" ><img src="imgs/group_go.png"/> Pesquisar</a></li>
        <li class="marginTop"><a href="php/versocio.php?id=nenhum&tipopesquisa=edicao"><img src="imgs/group_edit.png"/> Editar</a></li>
      </ul>
    </li>
   
   
    <li class="parent" style="background:#D5D5D5"><a href="#" title=""><img src="imgs/book_open.png"/> Cateira de Sócio</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="php/versocio.php?id=nenhum&tipopesquisa=carteira" title=""><img src="imgs/book_open.png"/> Visualizar Carteira</a></li>
      </ul>
    </li>
   
   
   
    <li class="parent" style="background:#D5D5D5"><a href="#" ><img src="imgs/group_delete.png"/> Pedido de Desfiliação</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="php/versocio.php?id=nenhum&tipopesquisa=desfiliar" title="">Pedido de desfiliação</a></li>
      </ul>
   </li>
   
    <li class="parent" style="background:#D5D5D5"><a href="#" title=""><img src="imgs/script.png"/> Relatórios</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="php/relatoriosocios.php" title=""><img src="imgs/script.png"/> Relatório de Sócios</a></li>
        <li class="marginTop"><a href="php/relatoriosocios.php?ativo=N" title=""><img src="imgs/script.png"/> Relatório de Desfiliados</a></li>
        <li class="marginTop"><a href="php/relatoriosd.php?rel=1" title=""><img src="imgs/script.png"/> Sócios Sem Controle de Cobrança cadastrado no Sistema</a></li>
        <li class="marginTop"><a href="php/relatoriosd.php?rel=2" title=""><img src="imgs/script.png"/> Sócios Com Cobranças pendentes no Sistema</a></li>
      </ul>
    </li>
   
   
   
    <li class="parent" style="background:#D5D5D5"><a href="#" ><img src="imgs/chart_bar.png"/> Graficos</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="grafico.php" title=""><img src="imgs/chart_bar.png"/> Gráfico de valores anuais</a>         </li>
      </ul>
     
    </li>
     
      <li class="parent" style="background:#D5D5D5"><a href="#" ><img src="imgs/dinheiro.png"/> Financeiro</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="Pagamentos.php" title=""><img src="imgs/dinheiro.png"/> Relatório dos Pagamentos</a></li>
        <!--<li class="marginTop"><a href="images/recibo1.pdf" title=""><img src="imgs/dinheiro.png"/> Recibo de Pagamento do Sistema 1/1</a></li>
        <li class="marginTop"><a href="images/cheque_1.jpg" title=""><img src="imgs/dinheiro.png"/> Anexo Cheque para Consulta <br />(ref a Parte Recibo de Pagamento do Sistema 1/1)</a></li>-->
         <!--<li class="marginTop"><a href="images/20-12.pdf" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Dezembro/2012</a> </li>
         <li class="marginTop"><a href="images/01-13.pdf" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Janeiro/2013</a> </li>
         <li class="marginTop"><a href="emconstrucao.html" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Fevereiro/2013</a> </li>-->
         <!--<li class="marginTop"><a href="emconstrucao.html" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Março/2013</a> </li>-->
         <!--<li class="marginTop"><a href="images/STRBC - 20130420.pdf" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Abril/2013</a> </li>-->
         <li class="marginTop"><a href="images/STRBC - 20130520.pdf" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Maio/2013</a> </li>
         <li class="marginTop"><a href="images/STRBC - 20130620.pdf" title=""><img src="imgs/printer.png"/>  Imprimir Boleto do Sistema Vencimento Junho/2013</a> </li>
         
        </ul>
     </li>
     
     
       <li class="parent" style="background:#D5D5D5"><a href="#" ><img src="imgs/date_next.png"/> Aniversários</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="aniversariante.php" title=""><img src="imgs/date_next.png"/> Aniversáriantes do mês</a></li>
       
        </ul>
     </li>
     
     
     <li class="parent" style="background:#D5D5D5"><a href="#" ><img src="imgs/user_comment.png"/> Suporte</a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="php/suporte.php" title=""><img src="imgs/user_comment.png"/> Solicitação de Suporte</a></li>
       
       </ul>
     </li>
     
    <!--  <li class="parent" style="background:#D5D5D5"><a href="#" ><img src="http://findicons.com/files/icons/982/dellipack_2/16/plus.png"/>Sistema </a>
      <ul class="sub-menu">
        <li class="marginTop"><a href="Ext/index.html" title=""><img src="http://findicons.com/files/icons/982/dellipack_2/16/plus.png"/> Novo Sistema</a></li>
       </ul>
     </li>-->
     
     
     
     
     
     
     
     
     
      
  </ul>
</div>
<div class="cBoxContent">
<center>
<label style="font-size:20px; color:#21809E" >Mensagens e notificações</label><br />
 <textarea name="info" class="span4" rows="10" style="min-height:100%;min-width:80%;"  readonly><?php 
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
 	  ?>
</textarea>
<br />
<?php if($id <> 0){echo "<input type=\"button\" value=\"Confirmo Ter Lido\" name=\"li\" onclick=\"location.href='php/msglido.php?id=".$id."'\">"; }?>
<br /><br /><br /><br /><table border="0"><tr><td>
<form action="php/pesqav.php" name="pesqavancada" method="get">
<label style="font-size:20px;"><b>Pesquisa avancada</b> </label><br />
          <img src="imgs/magnifier.png"/>
          <input name="pesqavtxt" style="height:20px;font-size:17px;width:250px;" type="text" class="caixas" size="40" value="" onmouseover="ypSlideOutMenu.showMenu(&#39;menu1&#39;);" onmouseout="ypSlideOutMenu.hideMenu(&#39;menu1&#39;)" id="pesqavtxt" maxlength="50">
          <div class="td_div">
            <div id="menu1Container" style="visibility: hidden;">
              <div id="menu1Content" class="menu" style="top: -90px;background-color:#FBFBFB"> Neste campo de "Pesquisa Avançada" você pode informar o nome completo ou parte do nome do Sócio desejado, ou o número da Matricula. Para pesquisar preencha o campo e pressione Enter. </div>
            </div>
          </div>
        </form>
        </td></tr></table>
</center>
</div>


<br />

<di>

</div>
  <br />
  
   
    
    
    <!--<tr><td colspan="2" align="left"><br />
<font color="#000000" face="Verdana, Geneva, sans-serif">Controle de Cobranca</font></td><td></td></tr>
<tr><td></td><td colspan="2" align="left"><a href="">Por Socio</a></td></tr>
<tr><td></td>
<td colspan="2" align="left"><a href="">Por Mes</a></td></tr>
<tr><td></td><td colspan="2" align="left"><a href="">Por Ano</a></td></tr>-->
    
  
   
     
    
    
    
    <!--
<tr><td colspan="2" align="left"><br />
  <font color="#000000" face="Verdana, Geneva, sans-serif">Atualizar senha</font></td>
  <td></td></tr>
<tr>
  <td><img src="imgs/exclamation.png"/></td>
<td colspan="2" align="left"><a href="php/editsenha.php">Atualizar senha!</a></td></tr>
-->

  <br />
  <br />
  <?php 
//codigo comentado ref a lembrete de pagamento
//$sqllembrete = "SELECT informativo 
//FROM informativos
//WHERE flagmostrar = 'P' and lido = 'N' 
//LIMIT 0 , 1";

//$executa_sqllembrete = mysql_query($sqllembrete, $con);
//$texto2 = '';
//while($linha_da_consultalembrete = mysql_fetch_array($executa_sqllembrete)){
//	$texto2 = $linha_da_consultalembrete["informativo"];
//}
//if($texto2 <> ''){
//	echo '<input type="checkbox" onclick="location.href=\'php/ocultalembrete.php?oculta=true\'" style="margin-left:20px;">Ocultar Lembrete';
//	echo '<MARQUEE DIRECTION="LEFT" scrolldelay="150"> <FONT SIZE="3" COLOR="Blue" FACE="COMIC SANS MS"><B> '.$texto2.' </B></FONT></MARQUEE>';	
//}else{
//	echo '<input type="checkbox" onclick="location.href=\'php/ocultalembrete.php?oculta=false\'" checked="checked" style="margin-left:20px;">Ocultar Lembrete';
//}
 	  ?>
<br />

<br />
<br />
<br />
<br />


</body>
<script language="JavaScript" type="text/javascript">
  	$(function() {
  		// Evento de clique do elemento: ul#menu li.parent > a
  		$('ul#menu li.parent > a').click(function() {
  			// Expande ou retrai o elemento ul.sub-menu dentro do elemento pai (ul#menu li.parent)
  			$('ul.sub-menu', $(this).parent()).slideToggle('fast', function() {
  				// Depois de expandir ou retrair, troca a classe 'aberto' do <a> clicado       
  				$(this).parent().toggleClass('aberto');
  			});
			return false;
  		});
  	});
  </script>
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
