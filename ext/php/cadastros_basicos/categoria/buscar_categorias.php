<?php
include("../../../../conecta.php");

        $queryString = "SELECT * FROM categoria";
           $query = mysql_query($queryString) or die(mysql_error());
    
           $contatos = array();
    
           while($contato = mysql_fetch_assoc($query)) {
             $contatos[] = $contato;
           }
                   echo json_encode(array(
                       "success" => mysql_errno() == 0,
                       "data" => $contatos));
    
   
?>

