<?php
ob_start();


include ("../../../conecta.php");
// include("../../../verifica.php");
/**
 * ****************
 */
$matricula = $_POST["matricula"];

$admissao = ($_POST["admissao"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["admissao"]))));

$ativo = (empty($_POST["ativo"])  ? "" : $_POST["ativo"]);


$certificadoreserv = $_POST["certificadoreserv"];
$cidadeatual = $_POST["cidadeatual"];
$cpf = $_POST["cpf"];

$dataemissao1 = ($_POST["dataemissao1"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["dataemissao1"]))));
$dataemissao2 = ($_POST["dataemissao2"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["dataemissao2"]))));
$datanasc1 = ($_POST["datanasc1"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanasc1"]))));
$datanasc2 = ($_POST["datanasc2"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanasc2"]))));
$datanasc3 = ($_POST["datanasc3"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanasc3"]))));
$datanasc4 = ($_POST["datanasc4"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanasc4"]))));
$datanasc5 = ($_POST["datanasc5"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanasc5"]))));
$datanasc6 = (empty($_POST["datanasc6"]) ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanasc6"]))));
$datanascimento = ($_POST["admissao"] == "" ? "" : date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datanascimento"]))));
$endereco1 = $_POST["endereco1"];
$endereco2 = $_POST["endereco2"];
$estado = $_POST["estado"];
$estcivil = $_POST["estcivil"];
$inscricao = $_POST["inscricao"];
$mae = $_POST["mae"];
$matricula = $_POST["matricula"];
$nacionalidademae = $_POST["nacionalidademae"];
$nacionalidadepai = $_POST["nacionalidadepai"];
$naturalidade = $_POST["naturalidade"];
$nome = $_POST["nome"];
$nomedependente1 = $_POST["nomedependente1"];
$nomedependente2 = $_POST["nomedependente2"];
$nomedependente3 = $_POST["nomedependente3"];
$nomedependente4 = $_POST["nomedependente4"];
$nomedependente5 = $_POST["nomedependente5"];
$nomedependente6 = empty($_POST["nomedependente6"])?"":$_POST["nomedependente6"];
$obs = empty($_POST["obs"])?"":$_POST["obs"];
$pai = $_POST["pai"];
$parentesco1 = $_POST["parentesco1"];
$parentesco2 = $_POST["parentesco2"];
$parentesco3 = $_POST["parentesco3"];
$parentesco4 = $_POST["parentesco4"];
$parentesco5 = $_POST["parentesco5"];
$parentesco6 = empty($_POST["parentesco6"])?"":$_POST["parentesco6"];
$propriedade1 = $_POST["propriedade1"];
$propriedade2 = $_POST["propriedade2"];
$proprietario1 = $_POST["proprietario1"];
$proprietario2 = $_POST["proprietario2"];
$prsocial = $_POST["prsocial"];
$rg = $_POST["rg"];
$serie = $_POST["serie"];
$sexo = $_POST["sexo"];

$conecta = new conecta();

if (! isset($matricula) || is_null($matricula)) {
    $datacad = date("Y-m-d");
    $sql = "INSERT INTO socio (matricula, admissao, inscricao, nome, naturalidade, estado, datanascimento,estcivil, rg, serie, prsocial, cpf, certificadoreserv, pai, nacionalidadepai, mae, nacionalidademae, propriedade1, proprietario1, endereco1, dataemissao1, propriedade2, proprietario2, endereco2, dataemissao2,nomedependente1, nomedependente2, nomedependente3, nomedependente4, nomedependente5, nomedependente6, parentesco1, parentesco2, parentesco3, parentesco4, parentesco5, parentesco6, datanasc1, datanasc2, datanasc3, datanasc4, datanasc5,datanasc6, obs, cidadeatual, datacad ,sexo) VALUES ('" . $matricula . "', '" . $admissao . "', '" . $inscricao . "', '" . $nome . "','" . $naturalidade . "', '" . $estado . "', '" . $datanascimento . "', '" . $estcivil . "', '" . $rg . "', '" . $serie . "', '" . $prsocial . "', '" . $cpf . "', '" . $certificadoreserv . "', '" . $pai . "', '" . $nacionalidadepai . "', '" . $mae . "', '" . $nacionalidademae . "', '" . $propriedade1 . "', '" . $proprietario1 . "', '" . $endereco1 . "', '" . $dataemissao1 . "', '" . $propriedade2 . "', '" . $proprietario2 . "', '" . $endereco2 . "', '" . $dataemissao2 . "', '" . $nomedependente1 . "', '" . $nomedependente2 . "', '" . $nomedependente3 . "', '" . $nomedependente4 . "', '" . $nomedependente5 . "','" . $nomedependente6 . "', '" . $parentesco1 . "', '" . $parentesco2 . "', '" . $parentesco3 . "', '" . $parentesco4 . "', '" . $parentesco5 . "','" . $parentesco6 . "', '" . $datanasc1 . "', '" . $datanasc2 . "','" . $datanasc3 . "', '" . $datanasc4 . "','" . $datanasc5 . "', '" . $datanasc6 . "', '" . $obs . "', '" . $cidadeatual . "', '" . $datacad . "','" . $sexo . "')";
    $query = $conecta->query($sql);
    $sucesso = mysql_errno() == 0;
    
    echo json_encode(array(
        "success" => $sucesso,
        "data" => "Novo Socio"
    ));
} else {
    $sql = "UPDATE socio SET admissao='" . $admissao . "', inscricao='" . $inscricao . "', nome='" . $nome . "', naturalidade='" . $naturalidade . "', estado='" . $estado . "', datanascimento='" . $datanascimento . "',estcivil='" . $estcivil . "', rg='" . $rg . "', serie='" . $serie . "', prsocial='" . $prsocial . "', cpf='" . $cpf . "', certificadoreserv='" . $certificadoreserv . "', pai='" . $pai . "', nacionalidadepai='" . $nacionalidadepai . "', mae='" . $mae . "', nacionalidademae='" . $nacionalidademae . "', propriedade1='" . $propriedade1 . "', proprietario1='" . $proprietario1 . "', endereco1='" . $endereco1 . "', dataemissao1='" . $dataemissao1 . "', propriedade2='" . $propriedade2 . "', proprietario2='" . $proprietario2 . "', endereco2='" . $endereco2 . "', dataemissao2='" . $dataemissao2 . "',nomedependente1='" . $nomedependente1 . "', nomedependente2='" . $nomedependente2 . "', nomedependente3='" . $nomedependente3 . "', nomedependente4='" . $nomedependente4 . "', nomedependente5='" . $nomedependente5 . "', nomedependente6='" . $nomedependente6 . "', parentesco1='" . $parentesco1 . "', parentesco2='" . $parentesco2 . "', parentesco3='" . $parentesco3 . "', parentesco4='" . $parentesco4 . "', parentesco5='" . $parentesco5 . "', parentesco6='" . $parentesco6 . "', datanasc1='" . $datanasc1 . "', datanasc2='" . $datanasc2 . "', datanasc3='" . $datanasc3 . "', datanasc4='" . $datanasc4 . "', datanasc5='" . $datanasc5 . "',datanasc6='" . $datanasc6 . "', obs='" . $obs . "', cidadeatual='" . $cidadeatual . "',sexo='" . $sexo . "' WHERE matricula='" . $matricula . "'";
    
    $query = $conecta->query($sql);
    $sucesso = mysql_errno() == 0;
    
    echo json_encode(array(
        "success" => $sucesso,
        "data" => "Atualizou",
        "datee" => $datanascimento
    ));
}

?>
