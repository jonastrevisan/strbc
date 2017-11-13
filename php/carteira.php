<?php
ob_start();
include ("../conecta.php");
include ("verifica.php");
$tipopesquisa = empty($_GET["tipopesquisa"])?null: $_GET["tipopesquisa"];
$selecionado = empty($_GET["selecionado"])?null: $_GET["selecionado"];

if ($selecionado == 'm') {
    $matricula = $_GET["matricula"];
    $sql = "SELECT * FROM socio WHERE matricula = '" . $matricula . "'";
}
if ($selecionado == 'n') {
    $nome = $_GET["nome"];
    $sql = "SELECT * FROM socio WHERE nome = '" . $nome . "'";
}
if ($selecionado == 'm1') {
    $matricula = $_GET["matricula1"];
    $sql = "SELECT * FROM socio WHERE matricula = '" . $matricula . "'";
}
if ($selecionado == 'n1') {
    $nome = $_GET["nome1"];
    $sql = "SELECT * FROM socio WHERE nome = '" . $nome . "'";
}
if ($selecionado == 'm2') {
    $matricula = $_GET["matricula2"];
    $sql = "SELECT * FROM socio WHERE matricula = '" . $matricula . "'";
}
if ($selecionado == 'n2') {
    $nome = $_GET["nome2"];
    $sql = "SELECT * FROM socio WHERE nome = '" . $nome . "'";
}
if ($selecionado == 'm3') {
    $matricula = $_GET["matricula3"];
    $sql = "SELECT * FROM socio WHERE matricula = '" . $matricula . "'";
}
if ($selecionado == 'n3') {
    $nome = $_GET["nome3"];
    $sql = "SELECT * FROM socio WHERE nome = '" . $nome . "'";
}
$conecta = new conecta();
$executa_sql = $conecta->query($sql);
while ($linha_da_consulta = $executa_sql->fetch_assoc()) {
    
    /*
     * //exemplo
     *
     * echo "<tr><td align=\"right\">Mensagem:</td><td align=\"left\"><textarea name=\"texto\" cols=\"50\" rows=\"5\">".$linha_da_consulta["mensagem"]."</textarea></td></tr>";
     *
     * //fim exemplo
     */
    // $linha_da_consulta["admissao"]== "0000-00-00" || empty($linha_da_consulta["datanasc6"])?"": date("d/m/Y", strtotime($linha_da_consulta["admissao"]));
    $matricula = $linha_da_consulta["matricula"];
    $dep1 = $linha_da_consulta["nomedependente1"];
    $dep2 = $linha_da_consulta["nomedependente2"];
    $dep3 = $linha_da_consulta["nomedependente3"];
    $dep4 = $linha_da_consulta["nomedependente4"];
    $dep5 = $linha_da_consulta["nomedependente5"];
    $dep6 = $linha_da_consulta["nomedependente6"];
    $nasc1 = $linha_da_consulta["datanasc1"] == "0000-00-00" || empty($linha_da_consulta["datanasc1"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanasc1"]));
    $nasc2 = $linha_da_consulta["datanasc2"] == "0000-00-00" || empty($linha_da_consulta["datanasc2"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanasc2"]));
    $nasc3 = $linha_da_consulta["datanasc3"] == "0000-00-00" || empty($linha_da_consulta["datanasc3"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanasc3"]));
    $nasc4 = $linha_da_consulta["datanasc4"] == "0000-00-00" || empty($linha_da_consulta["datanasc4"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanasc4"]));
    $nasc5 = $linha_da_consulta["datanasc5"] == "0000-00-00" || empty($linha_da_consulta["datanasc5"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanasc5"]));
    $nasc6 = $linha_da_consulta["datanasc6"] == "0000-00-00" || empty($linha_da_consulta["datanasc6"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanasc6"]));
    $socio = $linha_da_consulta["nome"];
    $residente = $linha_da_consulta["endereco1"];
    $admitido = $linha_da_consulta["admissao"] == "0000-00-00" || empty($linha_da_consulta["admissao"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["admissao"]));
    $estcivil = $linha_da_consulta["estcivil"];
    $datanasc = $linha_da_consulta["datanascimento"] == "0000-00-00" || empty($linha_da_consulta["datanascimento"]) ? "" : date("d/m/Y", strtotime($linha_da_consulta["datanascimento"]));
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carteira Socio</title>
<link rel="icon" type="image/png" href="images/letra_j.png" />
</head>

<body>
	<center>
		<table border="2" style="border-spacing: 0px;">
			<tr>
				<td>
					<table border="0" style="border-spacing: 0px;">
						<tr>
							<td>
								<table border="0" style="border-spacing: 0px;">
									<tr>
										<td align="left">Dependentes</td>
										<td align="left">Nascimento</td>
									</tr>
									<tr>
										<td align="left"><input name="dep7" type="text" class="caixas"
											size="25" value="<?php echo $dep1; ?>" readonly
											style="margin: 0px;" /></td>
										<td align="left"><input name="nasc7" type="text"
											class="caixas" size="15" value="<?php echo $nasc1 ?>"
											readonly style="margin: 0px;" /></td>
									</tr>
									<tr>
										<td align="left"><input name="dep8" type="text" class="caixas"
											size="25" value="<?php echo $dep2; ?>" readonly
											style="margin: 0px;" /></td>
										<td align="left"><input name="nasc8" type="text"
											class="caixas" size="15" value="<?php echo $nasc2 ?>"
											readonly style="margin: 0px;" /></td>
									</tr>
									<tr>
										<td align="left"><input name="dep9" type="text" class="caixas"
											size="25" value="<?php echo $dep3; ?>" readonly
											style="margin: 0px;" /></td>
										<td align="left"><input name="nasc9" type="text"
											class="caixas" size="15" value="<?php echo $nasc3 ?>"
											readonly style="margin: 0px;" /></td>
									</tr>
									<tr>
										<td align="left"><input name="dep10" type="text"
											class="caixas" size="25" value="<?php echo $dep4; ?>"
											readonly style="margin: 0px;" /></td>
										<td align="left"><input name="nasc10" type="text"
											class="caixas" size="15" value="<?php echo $nasc4 ?>"
											readonly style="margin: 0px;" /></td>
									</tr>
									<tr>
										<td align="left"><input name="dep11" type="text"
											class="caixas" size="25" value="<?php echo $dep5; ?>"
											readonly style="margin: 0px;" /></td>
										<td align="left"><input name="nasc11" type="text"
											class="caixas" size="15" value="<?php echo $nasc5  ?>"
											readonly style="margin: 0px;" /></td>
									</tr>
									<tr>
										<td align="left"><input name="dep12" type="text"
											class="caixas" size="25" value="<?php echo $dep6; ?>"
											readonly style="margin: 0px;" /></td>
										<td align="left"><input name="nasc12" type="text"
											class="caixas" size="15" value="<?php  echo $nasc6 ?>"
											readonly style="margin: 0px;" /></td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<table border="1" style="border-spacing: 0px; width: 100%;">
												<tr>
													<td><font size="2">ESTA CARTEIRINHA E SOMENTE VALIDA <br />
															QUANDO EM DIA AS MENSALIDADES
													</font></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>

							<!--table 2-->
							<td style="width: 50%;">
								<table border="0" style="border-spacing: 0px;">
									<tr>
										<td width="80"><img src="../imgs/STRLOGO.jpg" height="80" /></td>
										<td align="center" style="width: 232px;"><font size="2"><b><u>SINDICATO
														DOS TRABALHADORES<br /> RURAIS DE BARRACÃO
												</u></b></font><br /> <font size="2">Rua Paraiba, no 20 -
												Centro - 85700-000<br /> Barracão/PR - CNPJ:
												75.665.893/001-93<br /> E-mail sindicatob@smo.com.br <br />
												Fone (0xx493644-1066)
										</font><br /> <font size="2"><b><u>CARTEIRA DE SÓCIO</u></b></font></td>
									</tr>
									<tr>
										<td colspan="2">
											<table border="0" style="border-spacing: 0px;">
												<tr>
													<td align="right">Matrícula</td>
													<td align="left"><input name="matricula2" type="text"
														class="caixas" size="6" value="<?php echo $matricula; ?>"
														readonly style="margin: 0px;" /> &nbsp;Admitido em <input
														name="admitido2" type="text" class="caixas" size="10"
														value="<?php  echo $admitido ?>" readonly
														style="margin: 0px;" /></td>
												</tr>
												<tr>
													<td align="right">Sócio</td>
													<td align="left"><input name="socio2" type="text"
														class="caixas" size="37" value="<?php echo $socio; ?>"
														readonly style="margin: 0px;" /></td>
												</tr>
												<tr>
													<td align="right">&nbsp;&nbsp;&nbsp;Residente</td>
													<td align="left"><input name="residente2" type="text"
														class="caixas" size="37" value="<?php echo $residente; ?>"
														readonly style="margin: 0px;" /></td>
												</tr>
												<tr>
													<td align="right">Data Nasc.</td>
													<td align="left"><table border="0"
															style="border-spacing: 0px; width: 100%;">
															<tr>
																<Td><input name="datanasc2" type="text" class="caixas"
																	size="10" value="<?php  echo $datanasc ?>" readonly
																	style="margin: 0px;" /></Td>
																<td>Est. Civil</td>
																<td><input name="estcivil2" type="text" class="caixas"
																	size="10" value="<?php echo $estcivil; ?>" readonly
																	style="margin: 0px; width: 100%;" /></td>
															</tr>
														</table></td>
												</tr>
												<tr>
													<td colspan="2"><br /> <u><font size="2">ASS. PRESIDENTE:</font></u>__________________________</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br /> <br />
		<center>
                <?php
                echo "<br>
                    <img src=\"../imgs/printer.png\" title=\"Imprimir\" onClick=\"javascript:window.print();\" >";
                ?>
            </center>
	</center>
</body>
</html>
