<?php

// chama o arquivo de conexão com o bd
include ("conectar.php");
// $start = $_REQUEST['start'];

// $limit = $_REQUEST['limit'];
$queryString = "SELECT matricula, nome, ativo FROM socio";
// consulta sql
$query = mysql_query($queryString) or die(mysql_error());

$contatos = array();

while ($contato = mysql_fetch_assoc($query)) {
    
    $contatos[] = $contato;
}

// consulta total de linhas na tabela

// $queryTotal = mysql_query('SELECT count(*) as num FROM contact') or die(mysql_error());

// $row = mysql_fetch_assoc($queryTotal);

// $total = $row['num'];

// encoda para formato JSON

echo json_encode(array(
    
    "success" => mysql_errno() == 0,
    
    // "total" => $total,
    
    "socios" => $contatos

));

// echo '[{"sexo":"M","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"João da Silva","phone":"35","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"F","name":"Maria Amélia","phone":"22","userAccessTicket":null,"objectTOAType":"entity"},{"sexo":"M","name":"Silvana Garcia","phone":"28","userAccessTicket":null,"objectTOAType":"entity"}]';

?>