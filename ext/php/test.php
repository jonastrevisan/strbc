<?php
// chama o arquivo de conexão com o bd
include ("../../conecta.php");


// $field = $_REQUEST['filter'][0]['field'];
$value = empty($_REQUEST['dataPesquisa']) ? null : $_REQUEST['dataPesquisa'];
// $type = $_REQUEST['filter'][0]['data']['type'];
// $numerico = $_REQUEST['filter'][0]['data']['comparison'];
$valorPesquisa =empty($_REQUEST['filter'][0]['data']['value']) ? null : $_REQUEST['filter'][0]['data']['value'];
// $start = $_REQUEST['start'];
// $limit = $_REQUEST['limit'];

$value = date("Y-m-d", strtotime($value));
$dia = date("d", strtotime($value));
$mes = date("m", strtotime($value));
$ano = date("Y", strtotime($value));

$conecta = new conecta();

$queryString = "SELECT 
						DEVE.SOCIOID, 
						MAX(DEVE.ANO) AS ATEANO,
						(CASE 	(	SELECT 
										MAX(DEVM.MESN) 
									FROM 
										(select 
											`cobranca`.`idpagto` AS `IDPAGTO`,
											`cobranca`.`socioid` AS `SOCIOID`,
											`cobranca`.`ano` AS `ANO`,
											`cobranca`.`mes` AS `MES`,
											`cobranca`.`datapagto` AS `DATAPAGTO`,
											`cobranca`.`valor` AS `VALOR`,
											`cobranca`.`situacao` AS `SITUACAO`,
											(case `cobranca`.`mes` 
												when 'Janeiro' then 1 
												when 'Fevereiro' then 2 
												when 'Marco' then 3 
												when 'Abril' then 4 
												when 'Maio' then 5 
												when 'Junho' then 6 
												when 'Julho' then 7 
												when 'Agosto' then 8 
												when 'Setembro' then 9 
												when 'Outubro' then 10 
												when 'Novembro' then 11 
												when 'Dezembro' then 12 end) AS `MESN` 
											from 
												`cobranca` 
											where 
												(`cobranca`.`situacao` = 'pago')
										) AS DEVM	 
									WHERE 
										DEVM.SOCIOID = DEVE.SOCIOID AND DEVM.ANO = DEVE.ANO
								)
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
								 END) AS ATEMES,
								 
					     S.NOME 
					FROM 
						(SELECT DEV.IDPAGTO, DEV.SOCIOID, DEV.ANO, DEV.MES, DEV.DATAPAGTO, DEV.VALOR, DEV.SITUACAO, DEV.MESN  
							FROM 
								(		select 
											`cobranca`.`idpagto` AS `IDPAGTO`,
											`cobranca`.`socioid` AS `SOCIOID`,
											`cobranca`.`ano` AS `ANO`,
											`cobranca`.`mes` AS `MES`,
											`cobranca`.`datapagto` AS `DATAPAGTO`,
											`cobranca`.`valor` AS `VALOR`,
											`cobranca`.`situacao` AS `SITUACAO`,
											(case `cobranca`.`mes` 
												when 'Janeiro' then 1 
												when 'Fevereiro' then 2 
												when 'Marco' then 3 
												when 'Abril' then 4 
												when 'Maio' then 5 
												when 'Junho' then 6 
												when 'Julho' then 7 
												when 'Agosto' then 8 
												when 'Setembro' then 9 
												when 'Outubro' then 10 
												when 'Novembro' then 11 
												when 'Dezembro' then 12 end) AS `MESN` 
											from 
												`cobranca` 
											where 
												(`cobranca`.`situacao` = 'pago')
										) AS DEV 
 							WHERE 
						 	
						 	((DEV.ANO > $ano) OR (DEV.ANO = $ano AND DEV.MESN >= $mes))
						) AS DEVE
     						INNER JOIN 
     					socio S ON (DEVE.SOCIOID = S.MATRICULA AND S.ATIVO = 'S')
					GROUP BY 
						DEVE.SOCIOID 
					ORDER BY 
						S.NOME ASC";
$query = $conecta->query($queryString);
$contatos = array();

while ($contato =  $query->fetch_assoc()) {
    $contatos[] = $contato;
}

echo json_encode(array(
    "success" => mysql_errno() == 0,
    "total" => 0,
    "data" => $contatos,
    "date" => $value
));

?>