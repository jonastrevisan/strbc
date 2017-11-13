<?php
ob_start();
include ("../conectar.php");

$sis = $_GET['sistema'];

if ($sis == 'desktop') {
    
    $us = $_GET["loginnsistema"];
    
    $se = $_GET["senhaasistema"];
} else {
    
    $us = $_POST["loginn"];
    
    $se = $_POST["senhaa"];
}

$query = mysql_query("SELECT nome,admin FROM users WHERE usuarioo =\"" . $us . "\" and senhaa =\"" . $se . "\"");

$conta = mysql_num_rows($query);

$query = mysql_query($query) or die(mysql_error());

if ($conta == '0') 
{
    
    echo json_encode(array(
        
        "success" => mysql_errno() == 0,
        
        // "total" => $total,
        
        "socios" => $contatos
    
    ));
}

$contatos = array();

while ($contato = mysql_fetch_assoc($query)) {
    
    $contatos[] = $contato;
}

echo json_encode(array(
    
    "success" => mysql_errno() == 0,
    
    // "total" => $total,
    
    "socios" => $contatos

));

?>



