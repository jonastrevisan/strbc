<?php
ob_start();
include("conecta.php");
include("verifica.php");
 $sql = "SELECT ano, COUNT( distinct socioid ) as nSocio 
FROM cobranca
WHERE ano >2009
AND situacao =  'pago'
GROUP BY ano
ORDER BY ano";
 
  $executa_sql = mysql_query($sql, $con);
 $contador = 0;
while($row = mysql_fetch_array($executa_sql))
  {
$contador = $contador + 1;
 
  $ano[$contador] = $row["ano"];
$valor[$contador] = $row["nSocio"];

  }

echo("</br><h1>Valores recebidos das mensalidades.<h1>");
 
?>
<?php
include("conecta.php");
include("verifica.php");
 $sqlx = "SELECT obs, COUNT(matricula) as num_matricula FROM socio";
  $executa_sqlx = mysql_query($sqlx, $con);
 $contadorx = 0;
while($rowx = mysql_fetch_array($executa_sqlx)){
$contadorx = $contadorx + 1;
  $totalx[$contadorx] = $rowx["num_matricula"];

  } ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
<?php 




for ($i = 1; $i<= $contador; $i++){
	if ($i < $contador){
          echo '[\'Ano :'.$ano[$i].'\','.(($valor[$i]/$totalx[$contadorx])* 100).'],';
	}else{
		  echo '[\'Ano :'.$ano[$i].'\','.(($valor[$i]/$totalx[$contadorx])* 100).']';
	} }?>			        ]);

        var options = {'title':'Valor em porcentagem das mensalidades pagas por ano',
                       'width':800,
                       'height':700};

     
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body><center> <font size="3" face="Verdana, Geneva, sans-serif">
  <pre>Grafico Tpo pizza
</pre></font>
    <div id="chart_div" style="width: 900px; height: 500px;">
    </div>
</center>
  </body>
</html>