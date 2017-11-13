<?php
ob_start();
include("conecta.php");
include("verifica.php");

$sql = "SELECT idsuporte, titulo, ativo FROM suporte ORDER BY idsuporte";
$executa_sql = mysql_query($sql, $con);
?>
<html>
<head>
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
<title>Suporte</title>
<link rel="icon" type="image/png" href="images/letra_j.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/DT_bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<style type="text/css">
.caixas {
	border-left-width: 0px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 1px;
	border-bottom-color:#000;
}
</style>
<script type="text/javascript" charset="utf-8">
			/* Default class modification */
			$.extend( $.fn.dataTableExt.oStdClasses, {
				"sSortAsc": "header headerSortDown",
				"sSortDesc": "header headerSortUp",
				"sSortable": "header"
			} );

			/* API method to get paging information */
			$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
			{
				return {
					"iStart":         oSettings._iDisplayStart,
					"iEnd":           oSettings.fnDisplayEnd(),
					"iLength":        oSettings._iDisplayLength,
					"iTotal":         oSettings.fnRecordsTotal(),
					"iFilteredTotal": oSettings.fnRecordsDisplay(),
					"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
					"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
				};
			}

			/* Bootstrap style pagination control */
			$.extend( $.fn.dataTableExt.oPagination, {
				"bootstrap": {
					"fnInit": function( oSettings, nPaging, fnDraw ) {
						var oLang = oSettings.oLanguage.oPaginate;
						var fnClickHandler = function ( e ) {
							e.preventDefault();
							if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
								fnDraw( oSettings );
							}
						};

						$(nPaging).addClass('pagination').append(
							'<ul>'+
								'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
								'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
							'</ul>'
						);
						var els = $('a', nPaging);
						$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
						$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
					},

					"fnUpdate": function ( oSettings, fnDraw ) {
						var iListLength = 5;
						var oPaging = oSettings.oInstance.fnPagingInfo();
						var an = oSettings.aanFeatures.p;
						var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

						if ( oPaging.iTotalPages < iListLength) {
							iStart = 1;
							iEnd = oPaging.iTotalPages;
						}
						else if ( oPaging.iPage <= iHalf ) {
							iStart = 1;
							iEnd = iListLength;
						} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
							iStart = oPaging.iTotalPages - iListLength + 1;
							iEnd = oPaging.iTotalPages;
						} else {
							iStart = oPaging.iPage - iHalf + 1;
							iEnd = iStart + iListLength - 1;
						}

						for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
							// Remove the middle elements
							$('li:gt(0)', an[i]).filter(':not(:last)').remove();

							// Add the new list items and their event handlers
							for ( j=iStart ; j<=iEnd ; j++ ) {
								sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
								$('<li '+sClass+'><a href="#">'+j+'</a></li>')
									.insertBefore( $('li:last', an[i])[0] )
									.bind('click', function (e) {
										e.preventDefault();
										oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
										fnDraw( oSettings );
									} );
							}

							// Add / remove disabled classes from the static elements
							if ( oPaging.iPage === 0 ) {
								$('li:first', an[i]).addClass('disabled');
							} else {
								$('li:first', an[i]).removeClass('disabled');
							}

							if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
								$('li:last', an[i]).addClass('disabled');
							} else {
								$('li:last', an[i]).removeClass('disabled');
							}
						}
					}
				}
			} );

			/* Table initialisation */
			$(document).ready(function() {
				$('#example').dataTable( {
					"sDom": "<'row'<'span8'l><'span8'f>r>t<'row'<'span8'i><'span8'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page"
					}
				} );
			} );
		</script>
<meta charset= ISO-8859-1"  />
</head>
<body>
<center>
  <font face="Georgia, Times New Roman, Times, serif" color="#000099">
  <h3>Suporte</h3>
  </font>
</center>
<br><center>
<?php 
$numero_linhas_consultas = mysql_num_rows($executa_sql);
echo "Numero de Solicitações encontradas: ".$numero_linhas_consultas;
?></center>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
    <div class="accordion-inner paddind">
    			
    <table   class="table table-striped table-bordered table table-hover" id="example" >
      <tr>
        <td><b>Ações</b></td>
        <td><b>Titulo</b></td>
        <td><b>Aberto</b></td>
      </tr>
      <?php
//carrega os dados<<<<<<<<<<<<<<<<<<<<<<
$cor = '';
		while($linha_da_consulta = mysql_fetch_array($executa_sql)){
		  if($linha_da_consulta["ativo"] == 'N'){
			$cor = ' style="background-color:#EEEEEE"';  
		  }else{
			$cor = '';  
		  }
		  echo "<tr>";
		  echo "<td ".$cor."><a href=\"versuporte.php?idsuporte=".$linha_da_consulta["idsuporte"]."&tipo=visualizar\" target=\"_top\"><img src=\"../imgs/eye.png\" /> Visualizar</a>						</td>";
			  echo "<td ".$cor."><a href=\"versuporte.php?idsuporte=".$linha_da_consulta["idsuporte"]."&tipo=visualizar\" target=\"_top\">".$linha_da_consulta["titulo"]."</a></td>";
			  echo "<td ".$cor.">";
			  If($linha_da_consulta["ativo"] == 'S'){
				echo "Sim"; 
			  }else{
				echo "Não";  
			  }
			  echo "</td>";
			  echo "</tr>";
			 }  

		?>
      <tr>
        <td><a href="versuporte.php?idsuporte=0" target="_top"><img src="../imgs/add.png" /> Abrir nova Solicitação</a></td>
        <td>--</td>
        <td>--</td>
      </tr>
    </table>

</div>



	<center>
  		<div > <br>
   			<br>
   				 <img src="../imgs/printer.png" width="20" height="20" onClick="javascript:window.print();" alt="Clique aqui para imprimir"> 
	<br><br>
		<img src="../imgs/arrow_undo.png" width="20" onClick="location.href='../inicio.php'" alt="Clique aqui para Voltar"></div></center>
</body>
</html>