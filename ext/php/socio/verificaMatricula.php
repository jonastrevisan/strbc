<?php
// chama o arquivo de conexão com o bd
include ("../../conecta.php");
include ("util/funcoes.php");
$value = $_POST['matricula'];
$queryString = "SELECT COUNT(matricula) as countm FROM socio where matricula = " . $value;

$conecta = new conecta();
$query = $conecta->query($queryString);
$socios = array();
while ($socio = $query->fetch_assoc()) {
    $socios[] = $socio;
}
if ($socios[0]['countm'] > 0) {
    // Existe Socio, Matricula encontrada
    echo json_encode(array(
        "success" => false
    ));
} else {
    // Matricula nao encontrada
    echo json_encode(array(
        "success" => true
    ));
}
/*
 * //consulta total de linhas na tabela
 * $queryTotal = mysql_query("SELECT count(matricula) as num FROM socio where ativo = 'S'") or die(mysql_error());
 * $row = mysql_fetch_assoc($queryTotal);
 * $total = $row['num'];
 * //converte a array inteira para utf8
 * $contatos = convertSociosToUtf8($contatos);
 * echo json_encode(array(
 * "success" => mysql_errno() == 0,
 * "total" => $total,
 * "socios" => $contatos
 * ));
 * }
 * else{
 * $queryString ="";
 * $queryNumber="";
 * if(empty($numerico)){
 * $queryString = "SELECT * FROM socio where ativo = 'S' and $field LIKE '%".$value."%' ORDER BY matricula ASC LIMIT $start, $limit";
 * $queryNumber= "SELECT count(matricula) as num FROM socio where ativo = 'S' and $field LIKE '%".$value."%'";
 * }
 * elseif($numerico == "eq"){
 * $queryString = "SELECT * FROM socio where ativo = 'S' and $field = $value ORDER BY matricula ASC LIMIT $start, $limit";
 * $queryNumber= "SELECT count(matricula) as num FROM socio where ativo = 'S' and $field = $value";
 * }
 * elseif($numerico == "lt"){
 * $queryString = "SELECT * FROM socio where ativo = 'S' and $field <= $value ORDER BY matricula ASC LIMIT $start, $limit";
 * $queryNumber= "SELECT count(matricula) as num FROM socio where ativo = 'S' and $field <= $value";
 * }
 * elseif($numerico == "gt"){
 * $queryString = "SELECT * FROM socio where ativo = 'S' and $field >= $value ORDER BY matricula ASC LIMIT $start, $limit";
 * $queryNumber= "SELECT count(matricula) as num FROM socio where ativo = 'S' and $field >= $value";
 * }
 * $query = mysql_query($queryString) or die(mysql_error());
 * $contatos = array();
 * while($contato = mysql_fetch_assoc($query)) {
 * $contatos[] = $contato;
 * }
 *
 * $queryTotal = mysql_query($queryNumber) or die(mysql_error());//and $field = $value
 * $row = mysql_fetch_assoc($queryTotal);
 * $total = $row['num'];
 *
 * //converte a array inteira para utf8
 * $contatos = convertSociosToUtf8($contatos);
 * //encoda para formato JSON
 * echo json_encode(array(
 * "success" => mysql_errno() == 0,
 * "total" => $total,
 * "socios" => $contatos,
 *
 * ));
 * }
 */
?>