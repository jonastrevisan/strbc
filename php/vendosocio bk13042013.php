<?php

ob_start();

include("conecta.php");

include("verifica.php");


$salvo = $_GET["salvo"];
$msg = $_GET["msg"];
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
}
if($selecionado == n){
$nome = $_GET["nome"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}
if($selecionado == m1){
$matricula = $_GET["matricula1"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n1){
$nome = $_GET["nome1"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}
if($selecionado == m2){
$matricula = $_GET["matricula2"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n2){
$nome = $_GET["nome2"];
$sql = "SELECT * FROM socio WHERE nome = '".$nome."'";
}
if($selecionado == m3){
$matricula = $_GET["matricula3"];
$sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
}
if($selecionado == n3){
$nome = $_GET["nome3"];
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

  $admissao = $linha_da_consulta["admissao"];

  $inscricao = $linha_da_consulta["inscricao"];

  $nomee = $linha_da_consulta["nome"];

  $naturalidade = $linha_da_consulta["naturalidade"];

  $estado = $linha_da_consulta["estado"];

  $datanascimento = $linha_da_consulta["datanascimento"];

  $estcivil = $linha_da_consulta["estcivil"];

  $rg = $linha_da_consulta["rg"];

  $serie = $linha_da_consulta["serie"];

  $prsocial = $linha_da_consulta["prsocial"];

  $cpf = $linha_da_consulta["cpf"];

  $certificadoreserv = $linha_da_consulta["certificadoreserv"];

  $pai = $linha_da_consulta["pai"];

  $nacionalidadepai = $linha_da_consulta["nacionalidadepai"];

  $mae = $linha_da_consulta["mae"];

  $nacionalidademae = $linha_da_consulta["nacionalidademae"];

  $propriedade1 = $linha_da_consulta["propriedade1"];

  $proprietario1 = $linha_da_consulta["proprietario1"];

  $endereco1 = $linha_da_consulta["endereco1"];

  $dataemissao1 = $linha_da_consulta["dataemissao1"];

  $propriedade2 = $linha_da_consulta["propriedade2"];

  $proprietario2 = $linha_da_consulta["proprietario2"];

  $endereco2 = $linha_da_consulta["endereco2"];

  $dataemissao2 = $linha_da_consulta["dataemissao2"];

  $nomedependente1 = $linha_da_consulta["nomedependente1"];

  $nomedependente2 = $linha_da_consulta["nomedependente2"];

  $nomedependente3 = $linha_da_consulta["nomedependente3"];

  $nomedependente4 = $linha_da_consulta["nomedependente4"];

  $nomedependente5 = $linha_da_consulta["nomedependente5"];

  $nomedependente6 = $linha_da_consulta["nomedependente6"];

  $parentesco1 = $linha_da_consulta["parentesco1"];

  $parentesco2 = $linha_da_consulta["parentesco2"];

  $parentesco3 = $linha_da_consulta["parentesco3"];

  $parentesco4 = $linha_da_consulta["parentesco4"];

  $parentesco5 = $linha_da_consulta["parentesco5"];

  $parentesco6 = $linha_da_consulta["parentesco6"];

  $datanasc1 = $linha_da_consulta["datanasc1"];

  $datanasc2 = $linha_da_consulta["datanasc2"];

  $datanasc3 = $linha_da_consulta["datanasc3"];

  $datanasc4 = $linha_da_consulta["datanasc4"];

  $datanasc5 = $linha_da_consulta["datanasc5"];

  $datanasc6 = $linha_da_consulta["datanasc6"];

  $obs = $linha_da_consulta["obs"];
  
  $cidadeatual = $linha_da_consulta["cidadeatual"];

  }

// fim carrega dados   

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

<meta charset= ISO-8859-1"  />

</head>

<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="#">STRBC.Com</a>
 	  <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav">
                      <li <?php if($tipopesquisa ==	'pesquisa'){echo ' class="active"';} ?>><a href="../inicio.php">Inicio</a></li>
                      <li <?php if($tipopesquisa ==	'edicao'){echo ' class="active"';} ?>><a href="vendosocio.php?selecionado=m1&matricula1=<?php echo $matricula; ?>&tipopesquisa=edicao">Editar</a></li>
                      <!--<li><a href="#">Link</a></li>-->
                      <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="nav-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>-->
                    </ul>
                    <!--<form class="navbar-search pull-left" action="">
                      <input type="text" class="search-query span2" placeholder="Search">
                    </form>-->
                    <!--<ul class="nav pull-right">
                      <li><a href="#">Link</a></li>
                      <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </li>
                    </ul>-->
                  </div>
      <!-- Everything you want hidden at 940px or less, place within here -->
    </div>
  </div>
</div>
<?php if($msg <> ""){
echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"".$msg."\");
</SCRIPT>";
}
?>

<?php if($salvo == "s"){
echo "<SCRIPT LANGUAGE=\"JavaScript\">
alert (\"Salvo Com Sucesso!\");
</SCRIPT>";
}
?>

<center>

<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3><?php if($tipopesquisa == "pesquisa"){

	//echo "Resultado de Pesquisa";

}else if($tipopesquisa == "edicao"){

	echo "Editando Socio";

	}else{

	echo "Cadastro de Novo Socio";

} ?></h3></font>





<form action="editarsocio.php" name="formvendosocio" method="post">
<table border="0">
<tr><td>
  <table border="0" style="width:100%;">

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

          <input name="matricula" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo $matricula; ?>" readonly>

          Admiss&atilde;o:

          <input name="admissao" style="width:auto;" type="text" class="caixas" size="21" value="<?php if($admissao == "0000-00-00")  { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $admissao  ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $admissao ) == 0 ? "-" : "/", $admissao )));?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

Inscri&ccedil;&atilde;o n&deg;:

<input name="inscricao" style="width:23.5%;" type="text" class="caixas" size="19" value="<?php echo $inscricao; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8">Nome:

        <input name="nome" type="text" style="width:93.25%;" class="caixas" size="105" value="<?php echo $nomee; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8">Natural de:

          <input name="natural" style="width:auto;" type="text" class="caixas" size="66" value="<?php echo $naturalidade; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

          Estado:

        <input name="estado" style="width:25%;" type="text" class="caixas" size="21" value="<?php echo $estado; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>
    
    <tr>

      <td>|</td>

      <td align="right">|</td>

      <td colspan="8">Cidade atual:

<select name="cidadeatual" style="Height:20px;">
	<option value="<?php echo $cidadeatual; ?>" selected><?php 
	if($cidadeatual == 1){
	echo 'Barrac&atilde;o - PR';
	}
	if($cidadeatual == 2){
	echo 'Bom Jesus do Sul - PR';
	}
	if($cidadeatual == 3){
	echo 'Dionisio Cerqueira - SC';
	}
	?></option>
    <?php if($tipopesquisa == "pesquisa"){
	echo "";
}else{
	echo "<option value=\"1\" >Barrac&atilde;o - PR</option>
	<option value=\"2\" >Bom Jesus do Sul - PR</option>
    <option value=\"3\" >Dionisio Cerqueira - SC</option>";
} ?>
	
        </select>
        
</td>

    </tr>

    <tr>

      <td colspan="2">.........................</td>

      <td colspan="8">Data de Nascimento:

          <input name="datanascimento" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo $data_nova = implode(preg_match("~\/~", $datanascimento ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanascimento ) == 0 ? "-" : "/", $datanascimento )));





; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado Civil:

<input name="estcivil" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo $estcivil; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    </table>
</td></tr>
<tr><td>
    <table>

    <tr>

      <td colspan="2"></td>

      <td colspan="8">RG n&deg;:

        <input name="rg" style="width:auto;" type="text" class="caixas" size="35" value="<?php echo $rg; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

        S&eacute;rie:

        <input name="serie" style="width:auto;" type="text" class="caixas" size="18" value="<?php echo $serie; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

Pr. Social:

<input name="prsocial" style="width:auto;" type="text" class="caixas" size="28" value="<?php echo $prsocial; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="2"></td>

      <td colspan="8">CPF n&deg;:

        <input name="cpf" style="width:auto;" type="text" class="caixas" size="44" value="<?php echo $cpf; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

        Certificado de Reservista n&deg;:

        <input name="certrese" style="width:auto;" type="text" class="caixas" size="28" value="<?php echo $certificadoreserv; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td rowspan="2" align="center"><b>Filia&ccedil;&atilde;o</b></td><td rowspan="2" align="right"><h4>{</h4></td>

      <td colspan="8">Pai:

        <input name="pai" style="width:48.3%;" type="text" class="caixas" size="57" value="<?php echo $pai; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>> Nacionalidade:

        <input name="nacpai" style="width:32.5%;" type="text" class="caixas" size="34" value="<?php echo $nacionalidadepai; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="8">M&atilde;e:

        <input name="mae" style="width:auto;" type="text" class="caixas" size="55" value="<?php echo $mae; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>> Nacionalidade:

        <input name="nacmae" style="width:32.5%;" type="text" class="caixas" size="34" value="<?php echo $nacionalidademae; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td rowspan="4" align="center"><b>Empresa</b> <br>onde exerce<br> 

        a profiss&atilde;o</td>

      <td rowspan="2"><h4>1</h4></td>

      <td colspan="8">Propriedade:

        <input name="propriedade1" style="width:40%;" type="text" class="caixas" size="47" value="<?php echo $propriedade1; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

        Propriet&aacute;rio:

        <input name="proprietario1" style="width:35%;" type="text" class="caixas" size="37" value="<?php echo $proprietario1; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="8">Endere&ccedil;o:

        <input name="endprop1" style="width:42.5%;" type="text" class="caixas" size="50" value="<?php echo $endereco1; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

        Data da Admiss&atilde;o:

        <input name="dataadmi1" style="width:28.75%;" type="text" class="caixas" size="30" value="<?php if($dataemissao1 == "0000-00-00") { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $dataemissao1  ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $dataemissao1 ) == 0 ? "-" : "/", $dataemissao1 ))); ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td rowspan="2"><h4>2</h4></td>

      <td colspan="8">Propriedade:

        <input name="propriedade2" style="width:40%;" type="text" class="caixas" size="47" value="<?php echo $propriedade2; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

        Propriet&aacute;rio:

        <input name="proprietario2" style="width:35%;" type="text" class="caixas" size="37" value="<?php echo $proprietario2; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="8">Endere&ccedil;o:

        <input name="endprop2" style="width:42.5%;" type="text" class="caixas" size="50" value="<?php echo $endereco2; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>>

        Data da Admiss&atilde;o:

        <input name="dataadmi2" style="width:28.75%;" type="text" class="caixas" size="30" value="<?php if($dataemissao2 == "0000-00-00") { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $dataemissao2  ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $dataemissao2 ) == 0 ? "-" : "/", $dataemissao2 ))); ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    </table>
</td></tr>
<tr><td>
    <table>

    <tr>

      <td colspan="2"></td>

      <td colspan="4" align="center">Nomes</td>

      <td colspan="2" align="center">Parentesco</td>

      <td align="center">Data Nascimento</td>

    </tr>

    <tr>

      <td colspan="2"> </td>

      <td colspan="4" align="center"><input name="depnome1" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente1; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="deppar1" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco1; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="depnas1" style="width:auto;" type="text" class="caixas" size="30" value="<?php if($datanasc1 == "0000-00-00") { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $datanasc1 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc1 ) == 0 ? "-" : "/", $datanasc1 )));

 ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="2"></td>

      <td colspan="4" align="center"><input name="depnome2" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente2; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="deppar2" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco2; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="depnas2" style="width:auto;" type="text" class="caixas" size="30" value="<?php if($datanasc2 == "0000-00-00") { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $datanasc2 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc2 ) == 0 ? "-" : "/", $datanasc2 )));





; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="2">Dependentes:</td>

      <td colspan="4" align="center"><input name="depnome3" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente3; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="deppar3" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco3; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="depnas3" style="width:auto;" type="text" class="caixas" size="30" value="<?php if($datanasc3 == "0000-00-00") { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $datanasc3 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc3 ) == 0 ? "-" : "/", $datanasc3 )));





; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="2"></td>

      <td colspan="4" align="center"><input name="depnome4" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente4; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="deppar4" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco4; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="depnas4" style="width:auto;" type="text" class="caixas" size="30" value="<?php if($datanasc4 == "0000-00-00") { echo ""; }else echo $data_nova = implode(preg_match("~\/~", $datanasc4 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc4 ) == 0 ? "-" : "/", $datanasc4 )));





; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    <tr>

      <td colspan="2"></td>

      <td colspan="4" align="center"><input name="depnome5" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente5; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="deppar5" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco5; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

      <td colspan="2"><input name="depnas5" style="width:auto;" type="text" class="caixas" size="30" value="<?php if($datanasc5 == "0000-00-00") { echo ""; }else echo $data_nova = implode(preg_match("~\/~", $datanasc5 ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $datanasc5 ) == 0 ? "-" : "/", $datanasc5 )));





; ?>" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>></td>

    </tr>

    </table>
</td></tr>
<tr><td>
    <table style="width:100%;">

    <tr>

      <td colspan="2">Obs.:</td>

      <td colspan="8"><textarea name="obs" style="width:100%;" rows="3" cols="90" <?php if($tipopesquisa == "pesquisa"){

	echo "readonly";

}else{

	echo "";

} ?>><?php echo $obs; ?></textarea></td>

    </tr>

  </table>
</td></tr>
</table>
    

    <?php if($tipopesquisa == "edicao"){

	echo "<input type=\"submit\" value=\"Salvar Edicao\" name=\"btsalvar\">";

}else{

	echo "";

} ?>

</form>

<?php if($tipopesquisa == "pesquisa"){

	include("contcob3.php");

	echo "<br>

<img src=\"../imgs/printer.png\" width=\"20\" height=\"20\" onClick=\"javascript:window.print();\" title=\"Clique aqui para imprimir\" alt=\"Clique aqui para imprimir\" >";

}else{

	echo "";

} ?>

<br><br>

<img src="../imgs/arrow_undo.png" width="20" onClick="location.href='../inicio.php'" title="Clique aqui para Voltar" alt="Clique aqui para Voltar">


<br><br>
</center>

</body>

</html>