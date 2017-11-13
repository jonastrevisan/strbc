<?php
include("conecta.php");

$idsuporte = $_GET["idsuporte"];
$tipo = $_GET["tipo"];

$sql = "SELECT titulo FROM suporte WHERE idsuporte =".$idsuporte;

$executa_sql = mysql_query($sql, $con);
$titulo = 'Sem titulo!';
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  $titulo = $linha_da_consulta["titulo"];
}

$sql = "SELECT idresposta, nome, texto, data, respostas.idsuporte, titulo, ativo FROM respostas LEFT JOIN suporte on respostas.idsuporte = suporte.idsuporte WHERE respostas.idsuporte = ".$idsuporte." ORDER BY  respostas.idresposta ASC";
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
<title>Suporte</title>
<link rel="icon" type="image/png" href="images/letra_j.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="../images/letra_j.png" />
<style type="text/css"></style>
<meta charset= ISO-8859-1"  />
</head>
<body>
<SCRIPT LANGUAGE="JavaScript">
alert ("Este chamado encontra-se em aberto, a equipe de Suporte respondeu, Analise a resposta e se possivel responder para darmos continuidade ou Encerrarmos o mesmo!");
</SCRIPT>
<center>
<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3><?php echo $titulo; ?></h3></font>

<form action="responder.php?fecha=sim" name="formresponder" method="post">
  
<?php 
$ativo = "S";
$executa_sql = mysql_query($sql, $con);
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<table class=\"table\"  style=\"margin-left:40px;margin-bottom:0px;\">
  <tr><td >Data ";

if($linha_da_consulta["data"] == "0000-00-00")  { echo ""; } else echo $data_nova = implode(preg_match("~\/~", $linha_da_consulta["data"]  ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $linha_da_consulta["data"] ) == 0 ? "-" : "/", $linha_da_consulta["data"] )));

echo "</td></tr> 
<tr>
<td>";
if($linha_da_consulta["nome"] == "Suporte"){
	echo "<img src=\"../imgs/user_suit.png\" />";
}else{
	echo "<img src=\"../imgs/user_comment.png\" />";
}
echo $linha_da_consulta["nome"]."</td>
<td><textarea class=\"span9\" name=\"resp\" rows=\"5\"  readonly>".$linha_da_consulta["texto"]."</textarea>
				
	</td></tr>
	</table>"
;
$ativo = $linha_da_consulta["ativo"];
}


//for ($i = 1; $i <= 10; $i++) {
//    echo "<table>
//<tr><td></td><td align=\"right\">data</td></tr> 
//<tr>
//<td>nome</td>
//<td><textarea name=\"resp\" rows=\"3\" cols=\"90\" //readonly>texto</textarea></td></tr>
//</table>
//<hr/>"
//;
//}
?>   
<?php 
if($ativo == "S"){
 echo "<table bgcolor=\"#87CEFF\" class=\"table\" style=\"margin-left:40px;margin-bottom:0px;\">
<tr><td></td><td align=\"right\">Data ".date("d-m-Y")."<input type=\"hidden\" value=\"".date("Y-m-d")."\" name=\"data\">
<input type=\"hidden\" value=\"".$idsuporte."\" name=\"idsuporte\"> 
</td></tr> 
<tr>
<td>
<input type=\"hidden\" value=\"Usuario\" name=\"nome\">
<img src=\"../imgs/user_comment.png\" />";
echo "Usuario";	
echo "
</td>
<td>";
 
if($idsuporte == 0){
echo "Informe um titulo para o suporte: <input name=\"titulo\" type=\"text\" class=\"caixas\" size=\"80\" value=\"\" ><br>";	
}
echo "<textarea name=\"resp\" class=\"span9\" rows=\"4\" placeholder=\"Escreva aqui sua resposta..\" maxlength=\"500\"></textarea></td></tr>
</table>";
}else{
	echo "Este chamado encontra-se encerrado. Se deseja abrir um novo chamado acesse o Módulo de Suporte e clique em Abrir nova Solicitação.";	
}
?><center>
    <?php 
	if($ativo == "S"){
	if($tipo == "visualizar"){
	echo "<button type=\"submit\" class=\"btn btn-info\" name=\"btsalvar\">Responder</button>";
}else{
	echo "<button type=\"submit\" class=\"btn btn-info\" name=\"btsalvar\">Solicitar Suporte</button>";
}} ?>

</form><br>
  <br>


Imprimir<br>
<img src="../imgs/printer.png" width="20" height="20" onClick="javascript:window.print();" alt="Clique aqui para imprimir">
</center>
</body>
</html>