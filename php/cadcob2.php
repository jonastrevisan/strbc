<?php
ob_start();
  include("conecta.php");
  include("verifica.php");

$ano = null;
$pago = null;

  //recebendo informacoes do form
$tipo = $_POST["tipocob"];
$idsocio = $_POST["idsocio"];

if($tipo == 'novo'){
	
	$ano = $_POST["ano"];
	$N = $_POST["N"];
	$Ntodos = array('','aberto','aberto','aberto','aberto','aberto','aberto','aberto','aberto','aberto','aberto','aberto','aberto');
	$dtpagto = array('','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL');
	
	if(isset($N)) {
             // Faz um loop no Array de checkbox
             // A função count retorna a quantidade de checkbox selecionado
        for($i = 0; $i < count($N); $i++) {
			$Ntodos[$N[$i]] = 'pago';	
			$dtpagto[$N[$i]] = date("Y-m-d");
        }
    }
/*
	for($i = 1; $i < count($Ntodos); $i++) {
            echo $Ntodos[$i].$i;
			echo $dtpagto[$i].$i;
        }

	if($pago == "simpago"){
		$datapagto = date("Y-m-d");
		$situacao = "pago";
	}else if($pago == "naopago"){
		$datapagto = "NULL";
		$situacao = "aberto";
	}
*/
if(is_null($ano)){
	header("Location: vendosocio.php?selecionado=m&matricula=".$idsocio."&tipopesquisa=pesquisa&msg=Informacoes incorretas para cadastro de controle de cobranca! Tente novamente.");
}else{

$sqlteste = "SELECT DISTINCT ano FROM  cobranca WHERE socioid = ".$idsocio;
$executa_sqlteste = mysql_query($sqlteste, $con);
$naoexiste = 1; //1 = nao existe , 0 = existe

while($linha_da_consulta = mysql_fetch_array($executa_sqlteste)){
	if($linha_da_consulta["ano"] == $ano){
		$naoexiste = 0;	
	}
  }

if($naoexiste == 0){
	header("Location: vendosocio.php?selecionado=m&matricula=".$idsocio."&tipopesquisa=pesquisa&msg=O ano informado para cadastro de controle de cobranca ja esta cadastrado! Verifique.");
}else{

  //Prepara e executa a string de consulta ao BD
  $sql = "INSERT INTO `cobranca` (`idpagto`, `socioid`, `ano`, `mes`, `datapagto`, `valor`, `situacao`) VALUES 
  (NULL, '".$idsocio."', '".$ano."', 'Janeiro', '".$dtpagto[1]."', '5.00', '".$Ntodos[1]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Fevereiro', '".$dtpagto[2]."', '5.00', '".$Ntodos[2]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Marco', '".$dtpagto[3]."', '5.00', '".$Ntodos[3]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Abril', '".$dtpagto[4]."', '5.00', '".$Ntodos[4]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Maio', '".$dtpagto[5]."', '5.00', '".$Ntodos[5]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Junho', '".$dtpagto[6]."', '5.00', '".$Ntodos[6]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Julho', '".$dtpagto[7]."', '5.00', '".$Ntodos[7]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Agosto', '".$dtpagto[8]."', '5.00', '".$Ntodos[8]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Setembro', '".$dtpagto[9]."', '5.00', '".$Ntodos[9]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Outubro', '".$dtpagto[10]."', '5.00', '".$Ntodos[10]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Novembro', '".$dtpagto[11]."', '5.00', '".$Ntodos[11]."'),
  (NULL, '".$idsocio."', '".$ano."', 'Dezembro', '".$dtpagto[12]."', '5.00', '".$Ntodos[12]."')
  ;";


  			if($executa_sql = mysql_query($sql, $con)){
  				echo "Registro incluido com sucesso";
  				header("Location: vendosocio.php?selecionado=m&matricula=".$idsocio."&tipopesquisa=pesquisa");
  			}else{
  				echo "Houve um erro ao incluir o registro";
  				echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";
  			}
		}
	}

}elseif($tipo == 'pagos'){
	//emitir recibos
	$N = $_POST["pagos"];
	if(isset($N)) {
             // Faz um loop no Array de checkbox
             // A função count retorna a quantidade de checkbox selecionado
		include("extenso.php");
		include("recibo2.php");
        for($i = 0; $i < count($N); $i++) {
			recibos($N[$i]);
			//include("../recibo.php?idpagto=8382");
        }
		echo '<br /><br />
<a href="javascript:window.print();">Imprimir</a><br />

<img src="../imgs/printer.png" width="20" height="20" onClick="javascript:window.print();" alt="Clique aqui para imprimir">
</center>
<br /><br />
<img src="../imgs/voltar2.gif" width="100" onClick="location.href=\'vendosocio.php?selecionado=m&matricula='.$idsocio.'&nome=&tipopesquisa=pesquisa\'" alt="Clique aqui para Voltar a Ficha">

</body>
</html>';
    }else{
		echo "nenhum titulo selecionado para emitir recibo. Verifique!";	
	}
	
}elseif($tipo == 'apagar'){
  //recebendo informacoes do form
  $N = $_POST["apagar"];
  $idpagtos = '';
	if(isset($N)) {
             // Faz um loop no Array de checkbox
             // A função count retorna a quantidade de checkbox selecionado
		include("extenso.php");
		include("recibo2.php");
        for($i = 0; $i < count($N); $i++) {
			//recibos($N[$i]);
			//include("../recibo.php?idpagto=8382");
			$idpagtos = $idpagtos.$N[$i];
			if($i != count($N)-1){
			$idpagtos = $idpagtos.',';	
			}
        }
	}
	//echo $idpagtos;
	
  	//$idpagto = $_POST["idpagto"];
	$datapagto = date("Y-m-d");

  $sql = "UPDATE cobranca SET datapagto='".$datapagto."', valor='5.00', situacao='pago' WHERE idpagto in(".$idpagtos.");";

  if($executa_sql = mysql_query($sql, $con)){
  echo "Registro incluido com sucesso";
	//header("Location: recibo.php?idpagto=".$idpagto);
	for($i = 0; $i < count($N); $i++) {
			recibos($N[$i]);
			//include("../recibo.php?idpagto=8382");
			//$idpagtos = $idpagtos.$N[$i];
			//if($i != count($N)-1){
			//$idpagtos = $idpagtos.',';	
			//}
        }
  }else{
  echo "Houve um erro ao incluir o registro";
  echo "<a href=\"javascript:history.go(-2)\">Voltar</a>";
  }
}
?>

