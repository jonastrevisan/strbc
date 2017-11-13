<?php
    include("../../../../conecta.php");
    if($_POST["acao"] == "adicionar")
    {
        $info = $_POST['data'];
    
        $data = json_decode(stripslashes($info));
    
        $descricao = $data->descricao;
        $cd_tipo_documento=$data->cd_tipo_documento;
    if($cd_tipo_documento > 0)
    {
         $queryString = "update tipo_documento set descricao='".$descricao."' where cd_tipo_documento = '".$cd_tipo_documento."'";
               $query = mysql_query($queryString) or die(mysql_error());
                   echo json_encode(array("success" => mysql_errno() == 0));
    }
    else
    {
         $queryString = "insert into tipo_documento(descricao) values('".$descricao."')";
               $query = mysql_query($queryString) or die(mysql_error());
                   echo json_encode(array("success" => mysql_errno() == 0));
    }
    
    } 
    
    
    elseif($_POST["acao"] == "deletar")
    {
         $info = $_POST['data'];
    
        $data = json_decode(stripslashes($info));
        $cd_tipo_documento=$data->cd_tipo_documento;
    
         $queryString = "delete from tipo_documento where cd_tipo_documento = '".$cd_tipo_documento."'";
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

