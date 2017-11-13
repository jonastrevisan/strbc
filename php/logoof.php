<?php

session_start();

unset($_SESSION['usuario']);

header("Location: ../index_original.php");

?>