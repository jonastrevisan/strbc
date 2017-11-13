<?php
ob_start();

include ("php/conecta.php");

$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];

$queryString = "SELECT * FROM socio where matricula < 1000";

// consulta sql
$query = mysql_query($queryString) or die(mysql_error());

// faz um looping e cria um array com os campos da consulta
$contatos = array();
while ($contato = mysql_fetch_assoc($query)) {
    $contatos[] = $contato;
}

// encoda para formato JSON
echo json_encode(array(
    "success" => mysql_errno() == 0,
    "contatos" => $contatos
));
?>



 /*  $books = array(
        array(
            "title" => "Professional JavaScript",
            "forumtitle" => "Nicholas C. Zakas"
        ),
        array(
            "title" => "JavaScript: The Definitive Guide",
            "forumtitle" => "David Flanagan"
        ),
        array(
            "title" => "High Performance JavaScript",
            "forumtitle" => "Nicholas C. Zakas"
        )
    );
    $jsonresult = array();
    
    for($i = 1; $i <= 10; $i++)
    {
    $person = array();
    $person["title"] = "jonas"+ $i;
    $person["forumtitle"] = "jonas"+ $i;
     $jsonresult[]=$person;
    
    }
     echo json_encode( $books );
    */
?>


       



