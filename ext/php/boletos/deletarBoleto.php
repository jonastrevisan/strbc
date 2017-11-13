<?php
   // include("../conectar.php");
	  include("../../../conecta.php");
	 $id=$_POST["id"];
	//consulta sql
	$query = sprintf("DELETE FROM boletos WHERE id='".$id."'",
		mysql_real_escape_string($id));

	$rs = mysql_query($query);

	echo json_encode(array(
		"success" => mysql_errno() == 0
	));
     
?>