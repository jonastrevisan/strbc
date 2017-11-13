<?php
ob_start();
include("conecta.php");
include("verifica.php");

$rel = $_GET["rel"];
//prepara o sql <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
switch ($rel) {
    case "":
        echo "Relatorio Invalido";
        break;
    case "1":
        $sql = "SELECT matricula, nome FROM socio WHERE matricula NOT IN (SELECT socioid FROM cobranca) ORDER BY nome";
        break;
    case "2":
        $sql = "select
socioid,
nome,
sum(valor) as total,  
case
      when mes = 'Janeiro' then concat('01/01/',ano)
when mes = 'Fevereiro' then concat('01/02/',ano)
when mes = 'Março' then concat('01/03/',ano)
when mes = 'Abril' then concat('01/04/',ano)
when mes = 'Maio' then concat('01/05/',ano)
when mes = 'Junho' then concat('01/06/',ano)
when mes = 'Julho' then concat('01/07/',ano)
when mes = 'Agosto' then concat('01/08/',ano)
when mes = 'Setembro' then concat('01/09/',ano)
when mes = 'Outubro' then concat('01/10/',ano)
when mes = 'Novembro' then concat('01/11/',ano)
when mes = 'Dezembro' then concat('01/12/',ano)
end as mes
from 
cobranca left join socio on cobranca.socioid = socio.matricula
where situacao = 'aberto' and 
case
      when mes = 'Janeiro' then concat(ano,'-01-01')
when mes = 'Fevereiro' then concat(ano,'-02-01')
when mes = 'Março' then concat(ano,'-03-01')
when mes = 'Abril' then concat(ano,'-04-01')
when mes = 'Maio' then concat(ano,'-05-01')
when mes = 'Junho' then concat(ano,'-06-01')
when mes = 'Julho' then concat(ano,'-07-01')
when mes = 'Agosto' then concat(ano,'-08-01')
when mes = 'Setembro' then concat(ano,'-09-01')
when mes = 'Outubro' then concat(ano,'-10-01')
when mes = 'Novembro' then concat(ano,'-11-01')
when mes = 'Dezembro' then concat(ano,'-12-01')
end < curdate()
group by 
socioid,
nome  
order by total desc";
        break;
}
    $executa_sql = mysql_query($sql, $con);
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<meta charset= ISO-8859-1"  />
<link rel="icon" type="image/png" href="../images/letra_j.png" />
<script language="JavaScript">
<!--
function verfonte()
{
if (event.button==2)
{
window.alert('Este recurso foi desativado')
}
}
document.onmousedown=verfonte
// -->
</script>
<title>Relatório</title>

<meta charset= ISO-8859-1"  />
</head>
<body>
<div class="span2 bs-docs-sidebar"></div>
<div class="accordion-inner paddind span9">
<center>
<font face="Georgia, Times New Roman, Times, serif" color="#000099"><h3>	<?php 
//monta o titulo<<<<<<<<<<<<<<<<<<<<< 
switch ($rel) {
    case "":
        echo "Relatorio Invalido";
        break;
    case "1":
        echo "Relatório de Sócio Sem Controle de Cobrança Cadastrado no Sistema";
        break;
    case "2":
        echo "Relatório de Sócios Com  Cobranças pendentes no Sistema e seus respectivos valores";
        break;
}
?></h3></font>
<?php 
$numero_linhas_consultas = mysql_num_rows($executa_sql);
echo "Numero de registros encontrados: ".$numero_linhas_consultas;
?>
<table border="1" class="table-striped table-bordered table table-hover">
<?php 
//monta o cabecalho do relatorio<<<<<<<<<<<<<<<<<<<<<<
switch ($rel) {
    case "":
        echo "";
        break;
    case "1":
        echo "<tr>
      <td><b>Matricula</b></td>
      <td><b>Nome</b></td>
    </tr>";
        break;
    case "2":
        echo "<tr>
      <td><b>Matricula</b></td>
      <td><b>Nome</b></td>
      <td><b>Valor Total R$</b></td>
      <td><b>Vencimento mais antigo</b></td>
    </tr>";
        break;
}
?>

<?php
//carrega os dados<<<<<<<<<<<<<<<<<<<<<<
if($rel <> ""){  
while($linha_da_consulta = mysql_fetch_array($executa_sql)){
  echo "<tr>";
  $c = 1;
  foreach ($linha_da_consulta as $campo) {
	$c = $c - 1; 
	if($c == 0){
      echo "<td>".$campo."</td>";
	  $c = 2;
	}
  }
  echo "</tr>";
 }  
}
?>  
</table>
</center>
</div>
<div class="span11">
<center>
<br>
<img src="../imgs/printer.png" width="20" height="20" title="Clique aqui para imprimir" onClick="javascript:window.print();" alt="Clique aqui para imprimir">

</center>

<img   src="../imgs/arrow_undo.png" align="left" width="25" onClick="location.href='../inicio.php'" alt="Clique aqui para Voltar" title="Clique aqui para voltar">
<br><br>
</div>
</body>
</html>