<?php
 $arquivo= $_POST["arquivo"];
 unlink($arquivo);  
 echo json_encode(array(
		"success" => true
	));
?>