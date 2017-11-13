<?php
ob_start();
include("conecta.php");
include("verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />

<title>Pagamento</title>

</head>



<body>

<center>

<?php
  $matricula = $_GET["matricula"];

  $idpagto = $_GET["idpagto"];

  

  ?>

<font face="Georgia, Times New Roman, Times, serif" color="#000099">

<h4>Pagamento</h4></font>

<br>

<form name="formfornecedor" action="pagar.php" method="post">

<table border="1">

<tr><td align="right">Pagamento</td>

<td>Valor (R$)</td>



<td>Acao</td>

</tr>

<tr><td><input type="hidden" name="matricula" value="<?php echo $matricula; ?>" /><input type="hidden" name="idpagto" value="<?php echo $idpagto; ?>" /> <?php echo $idpagto; ?>  

    </td>

    <td><input type="text" name="valor" value="5.00"/> </td>

    <td><input type="submit"  value="Salvar" ></td>

    

  



</table></form>

    







</center>

</body>

</html>

