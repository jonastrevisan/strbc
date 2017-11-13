<?php
// chama o arquivo de conexão com o bd
include ("../../../conecta.php");

$field = empty($_REQUEST['filter'][0]['field']) ? null : $_REQUEST['filter'][0]['field'];
$value = empty($_REQUEST['dataPesquisa']) ? null : $_REQUEST['dataPesquisa'];
$numerico = empty($_REQUEST['filter'][0]['data']['comparison']) ? null : $_REQUEST['filter'][0]['data']['comparison'];
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];
$type = empty($_REQUEST['filter'][0]['data']['type']) ? null : $_REQUEST['filter'][0]['data']['type'];
$valorPesquisa = empty($_REQUEST['filter'][0]['data']['value']) ? null : $_REQUEST['filter'][0]['data']['value'];
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];

$value = date("Y-m-d", strtotime($value));
$dia = date("d", strtotime($value));
$mes = date("m", strtotime($value));
$ano = date("Y", strtotime($value));

$conecta = new conecta();

// se data e valor de pesquisa não forem nullo
if (empty($valorPesquisa)) {
    
    $queryString = "SELECT 
						DEVE.SOCIOID, 
						MIN(DEVE.ANO) AS DESDEANO,
						(CASE (SELECT MIN(DEVM.MESN) FROM COBRANCA_DEV AS DEVM	 WHERE DEVM.SOCIOID = DEVE.SOCIOID AND DEVM.ANO = DEVE.ANO)
								 	WHEN 1 Then 'Janeiro'
								 	WHEN 2 Then 'Fevereiro'
								 	WHEN 3 Then 'Marco'
								 	WHEN 4 Then 'Abril'
								 	WHEN 5 Then 'Maio'
								 	WHEN 6 Then 'Junho'
								 	WHEN 7 Then 'Julho'
								 	WHEN 8 Then 'Agosto'
								 	WHEN 9 Then 'Setembro'
								 	WHEN 10 Then 'Outubro'
								 	WHEN 11 Then 'Novembro'
								 	WHEN 12 Then 'Dezembro'
								 END) AS DESDEMES, 	
					     SUM(VALOR) AS TOTAL,    
					     S.NOME 
					FROM 
						(SELECT DEV.IDPAGTO, DEV.SOCIOID, DEV.ANO, DEV.MES, DEV.DATAPAGTO, DEV.VALOR, DEV.SITUACAO, DEV.MESN  
							FROM 
								COBRANCA_DEV AS DEV 
 							WHERE 
						 	(    
						        (DEV.ANO < YEAR(NOW()))    	OR    (DEV.ANO = YEAR(NOW()) AND DEV.MESN < MONTH(NOW()) )
						        
						    ) AND 
						 	((DEV.ANO >= $ano) OR (DEV.ANO = $ano AND DEV.MESN >= $mes))
						) AS DEVE
     						INNER JOIN 
     					socio S ON (DEVE.SOCIOID = S.MATRICULA AND S.ATIVO = 'S')
					GROUP BY 
						DEVE.SOCIOID 
					ORDER BY 
						S.NOME ASC 
					LIMIT $start,  $limit";
    
    $query = $conecta->query($queryString);
    $contatos = array();
    
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    // consulta total de linhas na tabela
    $query="SELECT 	count(distinct DEVE.SOCIOID) as num FROM
						(SELECT DEV.IDPAGTO, DEV.SOCIOID, DEV.ANO, DEV.MES, DEV.DATAPAGTO, DEV.VALOR, DEV.SITUACAO, DEV.MESN
							FROM
								COBRANCA_DEV AS DEV
 							WHERE
						 	(
						        (DEV.ANO < YEAR(NOW()))    	OR    (DEV.ANO = YEAR(NOW()) AND DEV.MESN < MONTH(NOW()) )
						        
						    ) AND
						 	((DEV.ANO >= $ano) OR (DEV.ANO = $ano AND DEV.MESN >= $mes))
						) AS DEVE
     						INNER JOIN
     					socio S ON (DEVE.SOCIOID = S.MATRICULA AND S.ATIVO = 'S')";
    $queryTotal = $conecta->query($query);
    $row = $queryTotal->fetch_assoc();
    $total = $row['num'];
    //echo $query;
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "total" => $total,
        "data" => $contatos,
        "date" => $value
    ));
} else {
    $queryString = "";
    $queryNumber = "";
    
    $queryString = "SELECT 
						DEVE.SOCIOID, 
						MIN(DEVE.ANO) AS DESDEANO,
						(CASE (SELECT MIN(DEVM.MESN) FROM COBRANCA_DEV AS DEVM	 WHERE DEVM.SOCIOID = DEVE.SOCIOID AND DEVM.ANO = DEVE.ANO)
								 	WHEN 1 Then 'Janeiro'
								 	WHEN 2 Then 'Fevereiro'
								 	WHEN 3 Then 'Marco'
								 	WHEN 4 Then 'Abril'
								 	WHEN 5 Then 'Maio'
								 	WHEN 6 Then 'Junho'
								 	WHEN 7 Then 'Julho'
								 	WHEN 8 Then 'Agosto'
								 	WHEN 9 Then 'Setembro'
								 	WHEN 10 Then 'Outubro'
								 	WHEN 11 Then 'Novembro'
								 	WHEN 12 Then 'Dezembro'
								 END) AS DESDEMES, 	
					     SUM(VALOR) AS TOTAL,    
					     S.NOME 
					FROM 
						(SELECT DEV.IDPAGTO, DEV.SOCIOID, DEV.ANO, DEV.MES, DEV.DATAPAGTO, DEV.VALOR, DEV.SITUACAO, DEV.MESN  
							FROM 
								COBRANCA_DEV AS DEV 
 							WHERE 
						 	(    
						        (DEV.ANO < YEAR(NOW()))    	OR    (DEV.ANO = YEAR(NOW()) AND DEV.MESN < MONTH(NOW()) )
						        
						    ) AND 
						 	((DEV.ANO >= $ano) OR (DEV.ANO = $ano AND DEV.MESN >= $mes)) 
						) AS DEVE
     						INNER JOIN 
     					socio S ON (DEVE.SOCIOID = S.MATRICULA AND S.ATIVO = 'S')
					WHERE 
						S.NOME LIKE '%" . $valorPesquisa . "%' 
					GROUP BY 
						DEVE.SOCIOID 
					ORDER BY 
						S.NOME ASC 
					LIMIT $start,  $limit";
    
    $query = $conecta->query($queryString);
    $contatos = array();
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    
    $queryTotal = $conecta->query("SELECT 	count(distinct DEVE.SOCIOID) as num FROM 
						(SELECT DEV.IDPAGTO, DEV.SOCIOID, DEV.ANO, DEV.MES, DEV.DATAPAGTO, DEV.VALOR, DEV.SITUACAO, DEV.MESN  
							FROM 
								COBRANCA_DEV AS DEV 
 							WHERE 
						 	(    
						        (DEV.ANO < YEAR(NOW()))    	OR    (DEV.ANO = YEAR(NOW()) AND DEV.MESN < MONTH(NOW()) )
						        
						    ) AND 
						 	((DEV.ANO >= $ano) OR (DEV.ANO = $ano AND DEV.MESN >= $mes)) 
						) AS DEVE
     						INNER JOIN 
     					socio S ON (DEVE.SOCIOID = S.MATRICULA AND S.ATIVO = 'S')
     					WHERE 
						S.NOME LIKE '%" . $valorPesquisa . "%'") or die(mysql_error());
    // and $field = $value
    $row = $queryTotal->fetch_assoc();
    $total = $row['num'];
    //echo $queryTotal;
    // encoda para formato JSON
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "total" => $total,
        "data" => $contatos,
        "datanascimento" => $value,
        "valorPesquisa" => $valorPesquisa
    ));
}
?>