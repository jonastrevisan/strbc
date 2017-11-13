
 <?php
// chama o arquivo de conexão com o bd
include ("../../conecta.php");
// include("conectar.php");
$conecta = new conecta();
$queryString = "SELECT * FROM boletos";
$query = $conecta->query($queryString);
$contatos = array();
while ($contato = $query->fetch_assoc()) {
    $contatos[] = $contato;
}

echo json_encode(array(
    "success" => mysql_errno() == 0,
    "data" => $contatos
));

?>