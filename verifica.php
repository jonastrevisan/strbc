<?php
ob_start();
session_start();
if( !isset($_SESSION['usuario']) )
	header("Location: errologin.php");
?>	