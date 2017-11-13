<?php
//salvar despesas
include("../../../conecta.php");
if($_POST["acao"] == "salvar")
{ 
    $data=$_POST["data"];
    $obj =  json_decode(stripslashes($data));
    echo "adicionadoasdfasdf";
    echo $obj->categoria;
}
elseif($_POST["acao"] == "editar")
{
    echo "editado";
    
}
elseif($_POST["acao"] == "deletar")
{
    echo "deletado";
}
else{
    echo "acao nao informada";
}
?>

