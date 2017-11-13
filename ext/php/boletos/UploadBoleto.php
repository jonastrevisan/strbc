<?php
    //include("../conectar.php");
     include("../../../conecta.php");
    $dir = "../../image/boleto/";
    $caminhoFoto = $dir.$_FILES['uploadedFile']['name'];
    $descricao=$_REQUEST['DESCRICAO'];
    $pago= $_REQUEST['pagou'];
    if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $caminhoFoto)){
    
         $sql = "insert into boletos (descricao,nome_imagem,pago) values('".$descricao."','".$_FILES['uploadedFile']['name']."','".$pago."')";
           $query = mysql_query($sql) or die(mysql_error());
          $sucesso=mysql_errno() == 0;
    
     $queryString = "SELECT * FROM boletos";
         $query = mysql_query($queryString) or die(mysql_error());
         $boletos = array();
         while($boleto = mysql_fetch_assoc($query)) {
             $boletos[] = $boleto;
         }
        echo json_encode(array(
        "success" => $sucesso,
        "data" => $boletos
        ));
    } 
    else{
        echo json_encode(array(
        "success" => false,
        ));
    }   
    
    
    
       /* 
    if (isset($_FILES)) {
        $temp_file_name = $_FILES['uploadedFile']['tmp_name'];
        $original_file_name = $_FILES['uploadedFile']['name'];
    
        echo '{"success": true, "msg": "'.$original_file_name.'"}';
    
    } else {
        echo '{"success": false, "msg": "No Files"}';
    }
    
        */
    
    
        /*
        // Repassa a variável do upload 
        $arquivo = isset($_FILES["uploadedFile"]) ? $_FILES["uploadedFile"] : FALSE; 
        // Caso a variável $arquivo contenha o valor FALSE, esse script foi acessado 
        // diretamente, então mostra um alerta para o usuário 
        if(!$arquivo) {
             echo "Não acesse esse arquivo diretamente!"; 
             } 
        // Imagem foi enviada, então a move para o diretório desejado 
        else {
             // Diretório para onde o arquivo será movido
              $diretorio = "../../image/boleto/"; // Move o arquivo 
              // Lembrando que se $arquivo não fosse declarado no começo do script, 
              // você estaria usando $_FILES["arquivo"]["tmp_name"] e $_FILES["arquivo"]["name"] 
              if (move_uploaded_file($arquivo["tmp_name"], $diretorio . $arquivo["name"])) 
              { 
                  echo "Arquivo Enviado com sucesso!";
                   print_r($arquivo);
                   echo '<br>';
    
                    echo '<br>';
                   echo 'Diretorio :';
                    print_r($_FILES["arquivo"]['tmp_name']);
    
                     echo '<br>';
                   echo 'Nome :';
                    print_r($_FILES["arquivo"]['name']);
    
                     echo '<br>';
                   echo 'Tamanho :';
                    print_r($_FILES["arquivo"]['size']);
    
                    echo '<br>';
                   echo 'Tamanho :';
                    print_r($_FILES["arquivo"]['error']);
                    echo '<br>';
                   echo 'Tipo da imagem :';
                    print_r($_FILES["arquivo"]['type']);
    
                     echo '<br>';
                   echo 'Diretorio + nome :';
    
                   //echo $diretorio+''+$_FILES["arquivo"]['name'];
                    //print_r($_FILES["arquivo"]['type']);
    
    
                   } 
              else {
                  // print_r($arquivo);
                   echo '{"succes":true}'; 
                   } }
        */
        //haaha 
        //para deletar o arquivo apenas isso ==>
    
        //unlink("boleto/Strbcs1web_background04.png");  
    
    
                   //TODO: Salvar o caminho + nome_arquivo para adicionar na image_URL
?>
