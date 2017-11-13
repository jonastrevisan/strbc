<?

include("conecta.php");
//conexao com o banco de dados



//condições para cadastrar
if($acao == "cadastrar") {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

$sql = mysql_query("INSERT INTO users ('', '$nome','$email','$senha')");

		echo "<script>alert('Cadastro realizado com sucesso')</script>";
		echo "<script> window.location = 'index.php?acao=listar'</script>";
}
//condições para editar
if($acao == "alterar") {
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

$sql = mysql_query("UPDATE usuario set nome = '$nome', email = '$email', senha = '$senha' where id = '$id'");
	echo "<script>alert('Usuario alterado com sucesso!')</script>";
	echo "<script> window.location = 'index.php?acao=listar'</script>";

}
//condição para excluir
if($acao == "excluir") {

$sql = mysql_query("DELETE FROM usuario where id='$id'");
	echo "<script>alert('Usuario exluido com sucesso!')</script>";
	echo "<script> window.location = 'index.php?acao=listar'</script>";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro</title>
<script language="javascript">
function confirmaExclusao(aURL) {
if(confirm('Você tem certeza que deseja excluir este registro?')) {
location.href = aURL;
}
}

function confirmaAlteracao(aURL) {
if(confirm('Você tem certeza que deseja alterar este registro?')) {
location.href = aURL;
}
}
</script>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td><? if($acao == "cad_form") { ?></td>
  </tr>
  <tr>
    <td><h3 align="center">Cadastrar usuario</h3></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="index.php?acao=cadastrar">
      <table width="400" border="0" align="center">
        <tr>
          <td width="147"><div align="right">Nome: </div></td>
          <td width="243"><label>
            <input type="text" name="nome" id="nome" />
          </label></td>
        </tr>
        <tr>
          <td><div align="right">Email:</div></td>
          <td><label>
            <input type="text" name="email" id="email" />
          </label></td>
        </tr>
        <tr>
          <td><div align="right">Senha:</div></td>
          <td><label>
            <input type="password" name="senha" id="senha" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <label>
            <input type="submit" name="button" id="button" value="Cadastrar" />
            </label>
          </div></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td><? } ?><? if($acao == "alt_form") { ?></td>
  </tr>
  <tr>
    <td><h3 align="center">Alterar usuario</h3></td>
  </tr>
  <tr>
    <td><form id="form2" name="form2" method="post" action="index.php?acao=alterar">
      <table width="400" border="0" align="center">
        <tr><? 
  		$sql_usu = mysql_query("SELECT * FROM users where id='$id'");
		$dados_usu = mysql_fetch_array($sql_usu);?>
                <? 
  		//$id = $_GET['id'];
//$sql_usu = mysql_query("SELECT * FROM usuario where id='$id'");
//$dados_usu =mysql_fetch_array($sql_usu);?>
        
          <td width="147"><div align="right">Nome: </div></td>
          <td width="243"><label>
            <input name="nome" type="text" id="nome" value="<?=$dados_usu[nome] ?>" />
          </label></td>
        </tr>
        <tr>
          <td><div align="right">Email:</div></td>
          <td><label>
            <input name="email" type="text" id="email" value="<?=$dados_usu[email] ?>" />
          </label></td>
        </tr>
        <tr>
          <td><div align="right">Senha:</div></td>
          <td><label>
            <input name="senha" type="password" id="senha" value="<?=$dados_usu[senha] ?>" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
              <label>
              <input type="submit" name="button" id="button" value="Alterar" />
              </label>
              <input name="id" type="hidden" id="id" value="<?=$dados_usu[id]?>" />
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><? } ?><? if($acao == "listar") { ?></td>
  </tr>
  <tr>
    <td><div align="center">
      <h3>Listar usuarios</h3>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form id="form3" name="form3" method="post" action="">
        <label>
          <input name="acao" type="hidden" id="acao" value="cad_form" />
          <input type="submit" name="button" id="button" value="Cadastrar usuario" />
          </label>
      </form>
      </div></td>
  </tr>
  <tr>
    <td><table width="40%" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td colspan="3" bgcolor="#CCCCCC"><strong>Nome</strong></td>
        </tr>
      <?
        $res = mysql_query("SELECT * FROM usuario order by id desc");
		while ($da_re = mysql_fetch_array($res)) {?>
      <tr>
        <td width="70%"><?=$da_re[nome] ?></td>
        <td width="16%"><div align="center"><a href="index.php?acao=alt_form&id=<? echo $da_re['id']; ?>">Alterar</a></div></td>
        <td width="14%"><div align="center"><a href="javascript:confirmaExclusao('index.php?id=<?php echo $da_re['id']; ?>&acao=excluir')">Excluir</a></div></td>
      </tr>
      <? } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
<? } ?>