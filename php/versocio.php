<?php
ob_start();
include("conecta.php");
include("verifica.php");
  //Prepara e executa a string de consulta ao BD
  $sql = "SELECT matricula FROM socio";
  $executa_sql = mysql_query($sql, $con);
 
  $numero_linhas_consultas = mysql_num_rows($executa_sql);
  //prepara o html para receber dados
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script>
function selected(x)
{
	document.getElementById(x).checked = true;
}
</script>
<meta charset= ISO-8859-1"  />
<link rel="icon" type="image/png" href="../images/letra_j.png" />
<title>Sindicato</title>
</head>
<body>
<center>
  <form action="<?php 
$tipopesquisa = $_GET["tipopesquisa"];
if($tipopesquisa == "desfiliar"){
	echo "desfiliar.php";	
}else if ($tipopesquisa == "pesquisa"){
	echo "vendosocio.php";
}else if($tipopesquisa == "carteira"){
	echo "carteira.php";
	}else if($tipopesquisa == "edicao"){
	echo "vendosocio.php";}
	?>" name="pesquisando" method="get">
    <table border="0" >
      <tr>
        <td align="right" colspan="3"><font face="Verdana, Geneva, sans-serif" color="#333333" size="-1"><b>Sócios Cadastrados: <?php echo $numero_linhas_consultas; ?></b></font></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3"><b>
          <h4> Pesquisar por:
            <hr color="#030303">
            </hr>
          </h4>
          </b>
        <td></td>
          </td>
      </tr>
      <tr>
        <td align="center"><input type="radio" value="m1" name="selecionado" id="m1" /></td>
        &nbsp;&nbsp;
        <td></td>
        <td align="center"><input type="radio" value="n1" name="selecionado" id="n1"/></td>
      </tr>
      
      <!--socios de barracao..........-->
      <tr bgcolor="#D8D8D8">
        <td colspan=4><font face="Georgia, Times New Roman, Times, serif" color="#6633CC">Sócios de Barracão</font></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td align="left">Matrícula:
          <select name="matricula1" onfocus="selected('m1')">
            <?php
$sql = "SELECT matricula, ativo FROM socio where cidadeatual = 1 ORDER BY matricula";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["matricula"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["matricula"]."</option>";
  }
?>
          </select></td>
        <td>&nbsp;&nbsp;</td>
        <td align="right">Nome:
          <select name="nome1" onfocus="selected('n1')">
            <?php
$sql = "SELECT nome, ativo FROM socio where cidadeatual = 1 ORDER BY nome";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["nome"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["nome"]."</option>";
  }
?>
          </select>
          <input type="hidden" value="<?php 
$tipopesquisa = $_GET["tipopesquisa"];
if($tipopesquisa == "pesquisa"){
	echo "pesquisa";
}else if($tipopesquisa == "edicao"){
	echo "edicao";
}else if($tipopesquisa == "desfiliar"){
	echo "desfiliar";	
}else if($tipopesquisa == "carteira"){
    echo "carteira";
	}
	?>" 
name="tipopesquisa"></td>
      </tr>
      <!--fim socios de barracao..........-->
      <tr>
        <td colspan="4"><br></td>
      </tr>
      
      <!--socios de Bom jesus do sul..........-->
      <tr>
        <td align="center"><input type="radio" value="m2" name="selecionado"  id="m2"/></td>
        &nbsp;&nbsp;
        <td></td>
        <td align="center"><input type="radio" value="n2" name="selecionado"  id="n2"/></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td colspan=4><font face="Georgia, Times New Roman, Times, serif" color="#6633CC">Sócios de Bom Jesus do Sul</font></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td align="left">Matrícula:
          <select name="matricula2" onfocus="selected('m2')">
            <?php
$sql = "SELECT matricula, ativo FROM socio where cidadeatual = 2 ORDER BY matricula";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["matricula"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["matricula"]."</option>";
  }
?>
          </select></td>
        <td>&nbsp;&nbsp;</td>
        <td align="right">Nome:
          <select name="nome2" onfocus="selected('n2')">
            <?php
$sql = "SELECT nome, ativo FROM socio where cidadeatual = 2 ORDER BY nome";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["nome"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["nome"]."</option>";
  }
?>
          </select>
          <input type="hidden" value="<?php 
$tipopesquisa = $_GET["tipopesquisa"];
if($tipopesquisa == "pesquisa"){
	echo "pesquisa";
}else if($tipopesquisa == "edicao"){
	echo "edicao";
}else if($tipopesquisa == "desfiliar"){
	echo "desfiliar";	
}else if($tipopesquisa == "carteira"){
    echo "carteira";
	}
	?>" 
name="tipopesquisa"></td>
      </tr>
      <!--fim socios de barracao..........-->
      <tr>
        <td colspan="4"><br></td>
      </tr>
      
      <!--socios de barracao..........-->
      <tr>
        <td align="center"><input type="radio" value="m3" name="selecionado"  id="m3"/></td>
        &nbsp;&nbsp;
        <td></td>
        <td align="center"><input type="radio" value="n3" name="selecionado"  id="n3"/></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td colspan=4><font face="Georgia, Times New Roman, Times, serif" color="#6633CC">Sócios de Dionisio Cerqueira</font></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td align="left">Matrícula:
          <select name="matricula3" onfocus="selected('m3')">
            <?php
$sql = "SELECT matricula, ativo FROM socio where cidadeatual = 3 ORDER BY matricula";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["matricula"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["matricula"]."</option>";
  }
?>
          </select></td>
        <td>&nbsp;&nbsp;</td>
        <td align="right">Nome:
          <select name="nome3" onfocus="selected('n3')">
            <?php
$sql = "SELECT nome, ativo FROM socio where cidadeatual = 3 ORDER BY nome";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["nome"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["nome"]."</option>";
  }
?>
          </select>
          <input type="hidden" value="<?php 
$tipopesquisa = $_GET["tipopesquisa"];
if($tipopesquisa == "pesquisa"){
	echo "pesquisa";
}else if($tipopesquisa == "edicao"){
	echo "edicao";
}else if($tipopesquisa == "desfiliar"){
	echo "desfiliar";	
}else if($tipopesquisa == "carteira"){
    echo "carteira";
	}
	?>" 
name="tipopesquisa"></td>
      </tr>
      <!--fim socios de barracao..........-->
      <tr>
        <td colspan="4"><br></td>
      </tr>
      
      <!--socios de barracao..........-->
      <tr>
        <td align="center"><input type="radio" value="m" name="selecionado"  id="m4"/></td>
        &nbsp;&nbsp;
        <td></td>
        <td align="center"><input type="radio" value="n" name="selecionado"  id="n4" /></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td colspan=4><font face="Georgia, Times New Roman, Times, serif" color="#6633CC">Sócios sem cidade ainda informada</font></td>
      </tr>
      <tr bgcolor="#D8D8D8">
        <td align="left">Matrícula:
          <select name="matricula" onfocus="selected('m4')">
            <?php
$sql = "SELECT matricula, ativo FROM socio where cidadeatual is null ORDER BY matricula";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["matricula"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["matricula"]."</option>";
  }
?>
          </select></td>
        <td>&nbsp;&nbsp;</td>
        <td align="right">Nome:
          <select name="nome" onfocus="selected('n4')">
            <?php
$sql = "SELECT nome, ativo FROM socio where cidadeatual is null ORDER BY nome";
  $executa_sql = mysql_query($sql, $con);
 while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<option value=\"".$linha_da_consulta["nome"]."\"";
  if($linha_da_consulta["ativo"] == "N"){
	echo " style=\"background-color: red\"";
  }
  echo ">".$linha_da_consulta["nome"]."</option>";
  }
?>
          </select>
          <input type="hidden" value="<?php 
$tipopesquisa = $_GET["tipopesquisa"];
if($tipopesquisa == "pesquisa"){
	echo "pesquisa";
}else if($tipopesquisa == "edicao"){
	echo "edicao";
}else if($tipopesquisa == "desfiliar"){
	echo "desfiliar";	
}else if($tipopesquisa == "carteira"){
    echo "carteira";
	}
	?>" 
name="tipopesquisa"></td>
      </tr>
      <!--fim socios de barracao..........-->
      <tr>
        <td colspan="4"><br></td>
      </tr>
      <tr>
        <td colspan="3" align="center">&nbsp;</td>
      <tr>
        <td colspan="3" align="center"><input type="submit" class="btn btn-success"  value="<?php 

$tipopesquisa = $_GET["tipopesquisa"];

if($tipopesquisa == "pesquisa"){
	echo "Pesquisar";
}else if($tipopesquisa == "edicao"){
	echo "Editar";
}else if($tipopesquisa == "desfiliar"){
	echo "Gerar Pedido de desfiliação e Salvar como Desfiliado";	
}else if($tipopesquisa == "carteira"){
    echo "Gerar Carteira de Sócio";
	}
	?>
" />
      </tr>
        </td>
        </tr>
    </table>
  </form>
</center>
<br>
<center>
  <img   src="../imgs/arrow_undo.png" align="center" width="25" onClick="location.href='../inicio.php'" alt="Clique aqui para Voltar" title="Clique aqui para voltar">
</center>
<br>
<br>
</body>
</html>