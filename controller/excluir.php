<?php

    require_once '../model/conexao.class.php';
    require_once '../model/crud.class.php';

    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    $crud = new crud('produto'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $id = $_GET['id']; //pega id para exclusao caso exista
    $crud->excluir("id = $id"); // exclui o registro com o id que foi passado

    $con->disconnect(); // fecha a conexao
echo "<script language='javaScript'>alert('excluido com sucesso!!!')</script>";
    //header("Location:../view/index.php"); // redireciona para a listagem
	echo "<script language='javaScript'>window.location.href='../view/index.php'</script>";

?>