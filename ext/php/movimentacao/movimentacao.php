<?php
include("../../../conecta.php");
if($_POST["acao"] == "baixadocumento")
{
    $info = $_POST['data'];
    
        $data = json_decode(stripslashes($info));
        $cd_tipo_documento=$data->cd_tipo_documento;
    
         $queryString = "update tipo_documento set descricao='".$descricao."' where cd_tipo_documento = '".$cd_tipo_documento."'";
               $query = mysql_query($queryString) or die(mysql_error());
    
               $contatos = array();
    
               while($contato = mysql_fetch_assoc($query)) {
                 $contatos[] = $contato;
               }
                       echo json_encode(array(
                           "success" => mysql_errno() == 0,
                           "data" => $contatos));
    
}
elseif($_POST["acao"] == "editar")
{
    echo "editado";
    
}
elseif($_POST["acao"] == "deletar")
{
    echo "deletado";
}
elseif($_POST["acao"] == "deletar")
{
    echo "deletado";
}
else{
    echo "acao nao informada";
}
?>

