<?php

ob_start();

include("conecta.php");

$sis = $_GET['sistema'];



if( $sis == 'desktop'){

	$us  = $_GET["loginnsistema"];

	$se  = $_GET["senhaasistema"];

}else{

	$us  = $_POST["loginn"];

	$se  = $_POST["senhaa"];

}


$query = mysql_query("SELECT nome,admin FROM users WHERE usuarioo =\"".$us."\" and senhaa =\"".$se."\"" );
    $conta = mysql_num_rows($query);
        if($conta == '0'){
            header ("location:errologin.php");
        }else{
            while($res = mysql_fetch_array($query))
			{

               $admin = $res['admin'];
							if($res['admin'] == 'S')
					   {
							//$result = mysql_fetch_assoc($res);		
							session_start();
				
							//unset($_SESSION['usuario']);
				
							//$_SESSION['usuario'] = $result;
				
							$_SESSION['usuario'] = $us;
				
							header("Location: ../inicio.php");
            			}
		else
		             {
					   //$result = mysql_fetch_assoc($res);		
						session_start();
			
						//unset($_SESSION['usuario']);
			
						//$_SESSION['usuario'] = $result;
			
						$_SESSION['usuario'] = $us;
				
						header("Location: ../view/pagina_usuario.php");	
	                 }
			}
		}
		echo $res;

?>