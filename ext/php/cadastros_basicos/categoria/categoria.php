<?php
    include("../../../../conecta.php");
    if($_POST["acao"] == "adicionar")
    {
        $info = $_POST['data'];
    
        $data = json_decode(stripslashes($info));
    
        $descricao = $data->descricao;
        $cd_categoria=$data->cd_categoria;
    if($cd_categoria > 0)
    {
         $queryString = "update categoria set descricao='".$descricao."' where cd_categoria = '".$cd_categoria."'";
               $query = mysql_query($queryString) or die(mysql_error());
                   echo json_encode(array("success" => mysql_errno() == 0));
    }
    else
    {
         $queryString = "insert into categoria(descricao) values('".$descricao."')";
               $query = mysql_query($queryString) or die(mysql_error());
                   echo json_encode(array("success" => mysql_errno() == 0));
    }
    
    } 
    
    
    elseif($_POST["acao"] == "deletar")
    {
         $info = $_POST['data'];
    
        $data = json_decode(stripslashes($info));
        $cd_categoria=$data->cd_categoria;
    
         $queryString = "delete from categoria where cd_categoria = ".$cd_categoria."";
               $query = mysql_query($queryString) or die(mysql_error());
    
               $contatos = array();
    
               while($contato = mysql_fetch_assoc($query)) {
                 $contatos[] = $contato;
               }
                       echo json_encode(array(
                           "success" => mysql_errno() == 0,
                           "data" => $contatos));
    
    }
    else{
        echo "acão nao informado";
    }
?>

