<?php
ob_start();
include("conecta.php");
include("verifica.php");

//<script language="Javascript">
//   var width = 300;
//   var height = 400;
//   var left = 2;
//   var top = 2;
//URL = "sua-pagina.html";
//   window.open(URL,'Minha-pagina', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
//<script>

$sql = "select * from respostas where idresposta in (select max(idresposta) from respostas group by idsuporte) and nome = 'Suporte' and texto not like 'Este log%'";
$executa_sql = mysql_query($sql, $con);
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
/*echo "<script language=\"Javascript\">
   var width = 300;
   var height = 400;
   var left = 2;
   var top = 2;
URL = \"http://strbc.com/php/versuporte.php?idsuporte=".$linha_da_consulta["idsuporte"]."&tipo=visualizar\";
   window.open(URL,'Sindicato', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
</script>";*/
echo "<a  id=\"mylink\" name=\"mylink\" href=\"http://localhost:82/php/versuportepop.php?idsuporte=".$linha_da_consulta["idsuporte"]."&tipo=visualizar\" target=\"_new\"></a>";
echo "<script language=\"Javascript\">document.getElementById('mylink').click();</script>";

}

?>