<?php
//Incluir o ficheiro charts.php, sem ele nada funcionava
include "charts.php";

//Aqui está a dar os dados necessários ao gráfico
$chart [ 'chart_data' ] = array ( array ( "",         "Janeiro", "Fevereiro", "Marco", "Abril" ),
                                  array ( "2005",     0,     12,     15,     167  ),
                                  array ( "2006",   200,     341,     423,     555  )
                                );

//Envia o gráfico para ser mostrado no ecrã
SendChartData ( $chart );

?>