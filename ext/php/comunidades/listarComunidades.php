     <?php
         //chama o arquivo de conexão com o bd
      include("../../../conecta.php");
    //include("conectar.php");
     
    
        $queryString = "SELECT DISTINCT  endereco1 as linha, endereco2 as linha FROM  socio ";
         $query = mysql_query($queryString) or die(mysql_error());
         $contatos = array();
         while($contato = mysql_fetch_assoc($query)) {
             $contatos[] = $contato;
         }
        
         echo json_encode(array(
             "success" => mysql_errno() == 0,
              "data" => $contatos
         ));
             
   
    
?>