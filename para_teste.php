<?php
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
       ['Ano','%'],
<?php for ($i = 1; $i<= $contador; $i++){
	if ($i < $contador){
          echo '[\'Ano :'.$ano[$i].'\','.round((($valor[$i]/$totalx[$contadorx])* 100),2).'],';
	}else{
		  echo '[\'Ano :'.$ano[$i].'\','.round((($valor[$i]/$totalx[$contadorx])* 100),2).']';
	} }?>			
        ]);

        var options = {
          title: 'Valores recebidos das mensalidades',
          hAxis: {title: 'Ano Totalizado', titleTextStyle: {color: 'orange'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body><center> <font size="3" face="Verdana, Geneva, sans-serif">
  <pre>O gr&aacute;fico demonstra os valores referentes &agrave;s mensalidades pagas anualmente pelos associados, 
sendo totalizada a soma dos valores registrados no sistema durante o ano.
Em breve estaremos com mais novidades em nosso sistema, aguarde.
</pre></font>
    <div id="chart_div" style="width: 900px; height: 500px;">
    </div>
</center>
<center>
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=-26.253536,-53.636142&amp;num=1&amp;hl=pt-BR&amp;ie=UTF8&amp;ll=-26.253608,-53.635683&amp;spn=0.001306,0.002642&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q=-26.253536,-53.636142&amp;num=1&amp;hl=pt-BR&amp;ie=UTF8&amp;ll=-26.253608,-53.635683&amp;spn=0.001306,0.002642&amp;t=m&amp;z=14&amp;iwloc=A&amp;source=embed" tabindex="_blank" style="color:#0000FF;text-align:left">Nossa Localização</a></small>
 </center>
  </body>
</html>