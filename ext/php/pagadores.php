   <?php
// chama o arquivo de conexão com o bd
include ("../../conecta.php");
$queryString = "SELECT matricula, nome, ativo FROM socio where ativo = 'S' ORDER BY matricula  limit 0,200 ";
$query = mysql_query($queryString) or die(mysql_error());

$contatos = array();
while ($contato = mysql_fetch_assoc($query)) {
    $contatos[] = $contato;
}

// consulta total de linhas na tabela
$queryTotal = mysql_query("SELECT count(matricula) as num FROM socio where ativo = 'S'") or die(mysql_error());
$row = mysql_fetch_assoc($queryTotal);
$total = $row['num'];

// $oArray=array_map(htmlentities,$contatos);
function _convert($content)
{
    if (! mb_check_encoding($content, 'UTF-8') or ! ($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))) {
        
        $content = mb_convert_encoding($content, 'UTF-8');
        
        if (mb_check_encoding($content, 'UTF-8')) {
            // log('Converted to UTF-8');
        } else {
            // log('Could not converted to UTF-8');
        }
    }
    return $content;
}

function convertArrayKeysToUtf8(array $array)
{
    foreach ($array as $key => $value) {
        $array[$key]['nome'] = _convert($array[$key]['nome']);
    }
    return $array;
}

$contatos = convertArrayKeysToUtf8($contatos);
echo json_encode(array(
    "success" => mysql_errno() == 0,
    "total" => $total,
    "socios" => $contatos
));
?>