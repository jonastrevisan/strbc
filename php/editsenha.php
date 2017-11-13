<?php
ob_start();
include("verifica.php");
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
<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<title>Sindicato dos Trabalhadores Rurais de Barracão</title>
<style type="text/css">
.caixas{
	border-left-width: 0px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 1px;
	border-bottom-color:#000;
}
</style>

</head>
<body>
<center>
<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3>Atualização de Senha</h3></font>

<br>
<form action="gravasenha.php" method="post" name="formsenha">
<table border="1">
<tr><td align="center">Usuario:</td><td>sindicato</td></tr>
<tr><td>Informe a senha atual:</td><td> <input type="password" name="senhaatual" size="20"></td></tr>
<tr><td>Informe a nova senha:</td><td> <input type="password" name="senhanova" size="20"></td></tr>
<tr><td>Informe novamente a nova senha:</td><td> <input type="password" name="senhanova2" size="20"></td></tr>
<tr><td colspan=2><input type="submit" value="Salvar"></td></tr>

</table>
</form>

</center>
</body>
</html>