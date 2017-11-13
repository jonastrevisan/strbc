<?php
    include("../../../conecta.php");
    if($_POST["acao"] == "salvar")
    {
        echo "adicionado";
    }
    elseif($_POST["acao"] == "buscar")
        { 
            $queryString = "SELECT matricula, nome, ativo FROM socio where ativo = 'S' ORDER BY matricula ASC ";
               $query = mysql_query($queryString) or die(mysql_error());
    
               $contatos = array();
    
               while($contato = mysql_fetch_assoc($query)) {
                 $contatos[] = $contato;
               }
                       echo json_encode(array(
                           "success" => mysql_errno() == 0,
                           "socios" => $contatos));
    
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

