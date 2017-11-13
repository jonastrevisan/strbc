<?php

ob_start();

include("conecta.php");

include("verifica.php");

 $sql = "SELECT ano, SUM( valor ) AS valor

FROM cobranca

WHERE ano >2007

and situacao = 'pago'

GROUP BY ano

ORDER BY ano";

 

  $executa_sql = mysql_query($sql, $con);

 $contador = 0;

while($row = mysql_fetch_array($executa_sql))

  {

$contador = $contador + 1;

 

  $ano[$contador] = $row["ano"];

$valor[$contador] = $row["valor"];



  }




 

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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

      google.load("visualization", "1", {packages:["corechart"]});

      google.setOnLoadCallback(drawChart);

	  

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

       ['Ano','R$'],

<?php for ($i = 1; $i<= $contador; $i++){

	if ($i < $contador){

          echo '[\''.$ano[$i].'\','.$valor[$i].'],';

	}else{

		  echo '[\''.$ano[$i].'\','.$valor[$i].']';

	} }?>			

        ]);



        var options = {

          title: 'Valores recebidos das mensalidades',

          hAxis: {title: 'Ano Totalizado', titleTextStyle: {color: 'blue'}}

        };



        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);

      }

    </script>
    </head>

    <body>
<center>
 <h3> Valores mensalidades pagas</h3>
      <font size="3" face="Verdana, Geneva, sans-serif">
  <pre>O gr&aacute;fico demonstra os valores referentes &agrave;s mensalidades pagas anualmente pelos associados, 

sendo totalizada a soma dos valores registrados no sistema durante o ano.

</pre>
  </font>
      <div id="chart_div" style="width: 900px; height: 500px;"> </div>
    </center>
<center>
      <br/>
      <br/>
      <a style="font-size:16px; font-family:Verdana, Geneva, sans-serif" href="inicio.php"><b><img src="imgs/house_go.png" style="margin-right:5px;">Pagina incial</b></a><br/>
      <br/>
      <img src="../imgs/printer.png" width="20" height="20" onClick="javascript:window.print();" alt="Clique aqui para imprimir"><a style="font-size:16px; font-family:Verdana, Geneva, sans-serif"></a>
    </center>
      <br/>
  <br/>

</body>
</html>