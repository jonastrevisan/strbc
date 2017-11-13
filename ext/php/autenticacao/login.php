<?php
ob_start();

include ("../../../conecta.php");

$us = $_GET["usuario"];
$se = $_GET["senha"];

if (! empty($us) && ! empty($se)) {
    $conecta = new conecta();
    $query = $conecta->query("SELECT nome,admin FROM users WHERE usuarioo =\"" . $us . "\" and senhaa =\"" . $se . "\"");
    $conta = mysqli_num_rows($query);
    
    if ($conta == '0') {
        echo json_encode(array(
            "success" => false,
            "admin" => "",
            "ticket" => "",
            "mensagem" => "a"
        
        ));
    } else {
        while ($res = $query->fetch_assoc()) {
            session_start();
            session_cache_expire(480);
            $cache_expire = session_cache_expire();
            $ses_id = session_id();
            $admin = $res['admin'];
            if ($res['admin'] == 'S') {
                // session_start();
                /* Define o limitador de cache para 'private' */
                session_cache_limiter('private');
                $cache_limiter = session_cache_limiter();
                
                /* Define o limite de tempo do cache em 30 minutos */
                
                $_SESSION['usuario'] = $us;
                
                echo json_encode(array(
                    "success" => true,
                    "admin" => "S",
                    "ticket" => $ses_id,
                    // "ticket" => "9ssuv84946ayyova",
                    "mensagem" => "b"
                ));
            } else {
                // session_start();
                $ses_id = session_id();
                $_SESSION['usuario'] = $us;
                
                echo json_encode(array(
                    "success" => true,
                    "admin" => "N",
                    "ticket" => $ses_id,
                    "mensagem" => "c"
                ));
            }
        }
    }
} else {
    echo json_encode(array(
        "success" => false,
        "ticket" => "",
        "mensagem" => "Usuario ou senha nao foram informados"
    ));
}

?>