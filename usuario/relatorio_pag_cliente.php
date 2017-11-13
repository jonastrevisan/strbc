<?php

ob_start();


include("../php/conecta.php");

include("../php/verifica.php");

 $sql = "SELECT * 
FROM  cobranca 
WHERE  socioid =672";

 

  $executa_sql = mysql_query($sql, $con);

 $contador = 0;

while($row = mysql_fetch_array($executa_sql))

  {

$contador = $contador + 1;

  $nome[$contador] = $row["mes"];

$data[$contador] = $row["situacao"];
  }
?>
<html>
<head>



<link rel="icon" type="image/png" href="images/letra_j.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
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
<link rel="icon" type="image/png" href="images/letra_j.png" />
<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<style type="text/css">
body {
/*background-color: #EFEFEF;*/
}
</style>
</head>

<body >
<center>
  <h1>Pagamentos</h1>
</center>
<div class="clearfix"></div>
<div class="container">
  <div class="row">
    <div class="clearfix"></div>
   
    <div id="preview">
      
        <table class="table-striped table-bordered table table-hover"  >
          <tr>
            <td> mês: </td>
            <td> Situação: </td>
          </tr>
          <?php for ($i = 1; $i<= $contador; $i++){

	if ($i < $contador){	



   echo "<tr><td ><img src=../imgs/user.png>  ".$nome[$i]."</td><td><img src=../imgs/date.png>  ".$data_nova = implode(preg_match("~\/~", $data[$i] ) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $data[$i] ) == 0 ? "-" : "/", $data[$i] ))). "</td></tr>";	  

	}}?>
        </table>
      
    </div>
  </div>
</div>
</div>
<!-- /container -->

<center>
  <hr>
  <a style="font-size:16px; font-family:Verdana, Geneva, sans-serif" href="inicio.php"><b><img src="imgs/house_go.png" style="margin-right:5px;">Pagina incial</b></a><br/>
  <br/>
  
  
  <img src="../imgs/printer.png" width="20" height="20" onClick="javascript:window.print();" alt="Clique aqui para imprimir"><a style="font-size:16px; font-family:Verdana, Geneva, sans-serif"> Imprimir</a>
</center>
<br><br>
</body>
</html>