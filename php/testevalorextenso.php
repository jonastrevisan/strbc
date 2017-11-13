<?php
ob_start();
include("conecta.php");
include("verifica.php");
include("extenso.php");

$valor = 15;
$dim = extenso($valor); 
$dim = ereg_replace(" E "," e ",ucwords($dim)); 

echo $dim;

?>