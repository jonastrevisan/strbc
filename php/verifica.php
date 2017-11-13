<?php ob_start();
if (!isset($_SESSION))
{
        session_start();
}
//session_start();
if( !isset($_SESSION['usuario']) )
	header("Location: errologin.php");
?>	