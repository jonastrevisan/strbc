<?php
    
    ob_start();
    
    include("conecta.php");
        $matricula = $_GET["matricula"];
    $sql = "SELECT * FROM socio WHERE matricula = '".$matricula."'";
     $executa_sql = mysql_query($sql, $con);
    while($linha_da_consulta = mysql_fetch_array($executa_sql)){
    $matricula = $linha_da_consulta["matricula"];
    $admissao =$linha_da_consulta["admissao"]== "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["admissao"])); 
    $inscricao = $linha_da_consulta["inscricao"];
    $nomee = $linha_da_consulta["nome"];
    $naturalidade = $linha_da_consulta["naturalidade"];
    $estado = $linha_da_consulta["estado"];
    $datanascimento =$linha_da_consulta["datanascimento"]== "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanascimento"]));
    $estcivil = $linha_da_consulta["estcivil"];
    $rg = $linha_da_consulta["rg"];
    $serie = $linha_da_consulta["serie"];
    $prsocial = $linha_da_consulta["prsocial"];
    $cpf = $linha_da_consulta["cpf"];
    $certificadoreserv = $linha_da_consulta["certificadoreserv"];
    $pai = $linha_da_consulta["pai"];
    $nacionalidadepai = $linha_da_consulta["nacionalidadepai"];
    $mae = $linha_da_consulta["mae"];
    $nacionalidademae = $linha_da_consulta["nacionalidademae"];
    $propriedade1 = $linha_da_consulta["propriedade1"];
    $proprietario1 = $linha_da_consulta["proprietario1"];
    $endereco1 = $linha_da_consulta["endereco1"];
    $dataemissao1 =$linha_da_consulta["dataemissao1"]== "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["dataemissao1"]));
    $propriedade2 = $linha_da_consulta["propriedade2"];
    $proprietario2 = $linha_da_consulta["proprietario2"];
    $endereco2 = $linha_da_consulta["endereco2"];
    $dataemissao2 =$linha_da_consulta["dataemissao2"]== "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["dataemissao2"]));
    $nomedependente1 = $linha_da_consulta["nomedependente1"];
    $nomedependente2 = $linha_da_consulta["nomedependente2"];
    $nomedependente3 = $linha_da_consulta["nomedependente3"];
    $nomedependente4 = $linha_da_consulta["nomedependente4"];
    $nomedependente5 = $linha_da_consulta["nomedependente5"];
    $nomedependente6 = $linha_da_consulta["nomedependente6"];
    $parentesco1 = $linha_da_consulta["parentesco1"];
    $parentesco2 = $linha_da_consulta["parentesco2"];
    $parentesco3 = $linha_da_consulta["parentesco3"];
    $parentesco4 = $linha_da_consulta["parentesco4"];
    $parentesco5 = $linha_da_consulta["parentesco5"];
    $parentesco6 = $linha_da_consulta["parentesco6"];
    $datanasc1 = $linha_da_consulta["datanasc1"] == "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanasc1"]));
    $datanasc2 =$linha_da_consulta["datanasc2"] == "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanasc2"]));
    $datanasc3 =$linha_da_consulta["datanasc3"] == "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanasc3"]));
    $datanasc4 =$linha_da_consulta["datanasc4"] == "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanasc4"]));
    $datanasc5 =$linha_da_consulta["datanasc5"] == "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanasc5"]));
    $datanasc6 =$linha_da_consulta["datanasc6"] == "0000-00-00"?"": date("d/m/Y", strtotime($linha_da_consulta["datanasc6"]));
    $obs = $linha_da_consulta["obs"];
    $cidadeatual = $linha_da_consulta["cidadeatual"];
          }
    
?>
<html>
        <head>
        <title>Detalhamento socio</title>
        <style type="text/css">
.caixas {
	border-left-width: 0px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 1px;
	border-bottom-color:#000;
}
</style>
        <link rel="icon" type="image/png" href="images/letra_j.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body>
        <center>
          <font face="Georgia, Times New Roman, Times, serif" color="#000099">
          <h3>
            <?php
                        echo "Vendo Socio";
                    ?>
          </h3>
          </font>
          <form action="editarsocio.php" name="formvendosocio" method="post">
            <table border="0">
              <tr>
                <td><table border="0" style="width:100%;">
                    <tr>
                    <td colspan="2">.........................</td>
                    <td colspan="8"><b>
                      <h2>Sindicato dos Trabalhadores Rurais de Barrac&atilde;o</h2>
                      </b></td>
                  </tr>
                    <tr>
                    <td>|</td>
                    <td align="right">|</td>
                    <td colspan="8" align="left">Matr&iacute;cula n&deg;:
                        <input name="matricula" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo $matricula; ?>" readonly>
                        Admiss&atilde;o:
                        <input name="admissao" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo $admissao ?>">
                        Inscri&ccedil;&atilde;o n&deg;:
                        <input name="inscricao" style="width:23.5%;" type="text" class="caixas" size="19" value="<?php echo $inscricao; ?>"></td>
                  </tr>
                    <tr>
                    <td>|</td>
                    <td align="right">|</td>
                    <td colspan="8">Nome:
                        <input name="nome" type="text" style="width:93.25%;" class="caixas" size="105" value="<?php echo $nomee; ?>"></td>
                  </tr>
                    <tr>
                    <td>|</td>
                    <td align="right">|</td>
                    <td colspan="8">Natural de:
                        <input name="natural" style="width:auto;" type="text" class="caixas" size="66" value="<?php echo $naturalidade; ?>">
                        Estado:
                        <input name="estado" style="width:25%;" type="text" class="caixas" size="21" value="<?php echo $estado; ?>"></td>
                  </tr>
                    <tr>
                    <td>|</td>
                    <td align="right">|</td>
                    <td colspan="8">Cidade atual:
                        <select name="cidadeatual" style="Height:20px;">
                        <option value="<?php echo $cidadeatual; ?>" selected>
                          <?php
                                                    
                                                    if($cidadeatual == 1){
                                                    echo 'Barrac&atilde;o - PR';
                                                    }
                                                    if($cidadeatual == 2){
                                                    echo 'Bom Jesus do Sul - PR';
                                                    }
                                                    if($cidadeatual == 3){
                                                    echo 'Dionisio Cerqueira - SC';
                                                    }
                                                ?>
                          </option>
                      </select></td>
                  </tr>
                    <tr>
                    <td colspan="2">.........................</td>
                    <td colspan="8">Data de Nascimento:
                        <input name="datanascimento" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo  $datanascimento  ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado Civil:
                        <input name="estcivil" style="width:auto;" type="text" class="caixas" size="21" value="<?php echo $estcivil; ?>"></td>
                  </tr>
                  </table></td>
              </tr>
              <tr>
                <td><table>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="8">RG n&deg;:
                        <input name="rg" style="width:auto;" type="text" class="caixas" size="35" value="<?php echo $rg; ?>">
                        S&eacute;rie:
                        <input name="serie" style="width:auto;" type="text" class="caixas" size="18" value="<?php echo $serie; ?>">
                        Pr. Social:
                        <input name="prsocial" style="width:auto;" type="text" class="caixas" size="28" value="<?php echo $prsocial; ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="8">CPF n&deg;:
                        <input name="cpf" style="width:auto;" type="text" class="caixas" size="44" value="<?php echo $cpf; ?>">
                        Certificado de Reservista n&deg;:
                        <input name="certrese" style="width:auto;" type="text" class="caixas" size="28" value="<?php echo $certificadoreserv; ?>"></td>
                  </tr>
                    <tr>
                    <td rowspan="2" align="center"><b>Filia&ccedil;&atilde;o</b></td>
                    <td rowspan="2" align="right"><h4>{</h4></td>
                    <td colspan="8">Pai:
                        <input name="pai" style="width:48.3%;" type="text" class="caixas" size="57" value="<?php echo $pai; ?>">
                        Nacionalidade:
                        <input name="nacpai" style="width:32.5%;" type="text" class="caixas" size="34" value="<?php echo $nacionalidadepai; ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="8">M&atilde;e:
                        <input name="mae" style="width:auto;" type="text" class="caixas" size="55" value="<?php echo $mae; ?>">
                        Nacionalidade:
                        <input name="nacmae" style="width:32.5%;" type="text" class="caixas" size="34" value="<?php echo $nacionalidademae; ?>"></td>
                  </tr>
                    <tr>
                    <td rowspan="4" align="center"><b>Empresa</b> <br>
                        onde exerce<br>
                        a profiss&atilde;o</td>
                    <td rowspan="2"><h4>1</h4></td>
                    <td colspan="8">Propriedade:
                        <input name="propriedade1" style="width:40%;" type="text" class="caixas" size="47" value="<?php echo $propriedade1; ?>">
                        Propriet&aacute;rio:
                        <input name="proprietario1" style="width:35%;" type="text" class="caixas" size="37" value="<?php echo $proprietario1; ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="8">Endere&ccedil;o:
                        <input id="tags" class="tagss ui-autocomplete-input" autocomplete="off" name="endprop1" style="width:42.5%;" type="text" class="caixas" size="50" value="<?php echo $endereco1; ?>">
                        <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span> Data da Admiss&atilde;o:
                        <input name="dataadmi1" style="width:28.75%;" type="text" class="caixas" size="30" value="<?php  echo  $dataemissao1 ?>"></td>
                  </tr>
                    <tr>
                    <td rowspan="2"><h4>2</h4></td>
                    <td colspan="8">Propriedade:
                        <input name="propriedade2" style="width:40%;" type="text" class="caixas" size="47" value="<?php echo $propriedade2; ?>">
                        Propriet&aacute;rio:
                        <input name="proprietario2" style="width:35%;" type="text" class="caixas" size="37" value="<?php echo $proprietario2; ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="8">Endere&ccedil;o:
                        <input id="tags" class="tagss ui-autocomplete-input" autocomplete="off" name="endprop2" style="width:42.5%;" type="text" class="caixas" size="50" value="<?php echo $endereco2; ?>">
                        <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span> Data da Admiss&atilde;o:
                        <input name="dataadmi2" style="width:28.75%;" type="text" class="caixas" size="30" value="<?php   echo  $dataemissao2 ?>"></td>
                  </tr>
                  </table></td>
              </tr>
              <tr>
                <td><table>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="4" align="center">Nomes</td>
                    <td colspan="2" align="center">Parentesco</td>
                    <td align="center">Data Nascimento</td>
                  </tr>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="4" align="center"><input name="depnome1" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente1; ?>"></td>
                    <td colspan="2"><input name="deppar1" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco1; ?>"></td>
                    <td colspan="2"><input name="depnas1" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $datanasc1;
                                                                                                                                                                                                                                                                         ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="4" align="center"><input name="depnome2" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente2; ?>"></td>
                    <td colspan="2"><input name="deppar2" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco2; ?>"></td>
                    <td colspan="2"><input name="depnas2" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $datanasc2  ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="2">Dependentes:</td>
                    <td colspan="4" align="center"><input name="depnome3" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente3; ?>"></td>
                    <td colspan="2"><input name="deppar3" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco3; ?>"></td>
                    <td colspan="2"><input name="depnas3" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo  $datanasc3 ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="4" align="center"><input name="depnome4" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente4; ?>"></td>
                    <td colspan="2"><input name="deppar4" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco4; ?>"></td>
                    <td colspan="2"><input name="depnas4" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $datanasc4  ?>"></td>
                  </tr>
                    <tr>
                    <td colspan="2"></td>
                    <td colspan="4" align="center"><input name="depnome5" style="width:auto;" type="text" class="caixas" size="50" value="<?php echo $nomedependente5; ?>"></td>
                    <td colspan="2"><input name="deppar5" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $parentesco5; ?>"></td>
                    <td colspan="2"><input name="depnas5" style="width:auto;" type="text" class="caixas" size="30" value="<?php echo $datanasc5  ?>"></td>
                  </tr>
                  </table></td>
              </tr>
              <tr>
                <td><table style="width:100%;">
                    <tr>
                    <td colspan="2">Obs.:</td>
                    <td colspan="8"><textarea name="obs" style="width:100%;" rows="3" cols="90"><?php echo $obs; ?></textarea></td>
                  </tr>
                  </table></td>
              </tr>
            </table>
            <?php
                    if($tipopesquisa == "edicao"){
                    
                                                                                                                                                                                                                                                                                               echo "<input type=\"submit\" value=\"Salvar Edicao\" name=\"btsalvar\">";
                    
                                                                                                                                                                                                                                                                                           }else{
                    
                                                                                                                                                                                                                                                                                               echo "";
                    
                                                                                                                                                                                                                                                                                           }
                ?>
          </form>
          <?php
                if($tipopesquisa == "pesquisa"){
                                        include("contcob3.php");
                        echo "<br>
                                    <img src=\"../imgs/printer.png\" width=\"20\" height=\"20\" onClick=\"javascript:window.print();\" 
                    title=\"Clique aqui para imprimir\" alt=\"Clique aqui para imprimir\" >";
                                    }else{
                                        echo "";
                                    }
            ?>
        </center>
</body>
</html>
