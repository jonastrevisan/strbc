<?php
include("../verifica.php");
include("../php/conecta.php");

 $_usuario = $_SESSION['usuario'];
		?>
        
        <?php


    require_once '../model/conexao.class.php';
    require_once '../model/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    @$getId = $_GET['id'];  //pega id para ediçao caso exista
    if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
        $consulta = mysql_query("SELECT * FROM produto WHERE id = + $getId");
        $campo = mysql_fetch_array($consulta);
    }
    
    /*?> if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $descricao = $_POST['descricao']; //pega o elemento com o pelo NAME 
        $crud = new crud('produto');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir("nome,descricao", "'$nome','$descricao'"); // utiliza a funçao INSERIR da classe crud
        header("Location: index.php"); // redireciona para a listagem
    }<?php */

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
        $nome = $_POST['nome']; //pega o elemento com o pelo NAME
        $descricao = $_POST['descricao']; //pega o elemento com o pelo NAME
        $crud = new crud('produto'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->atualizar("nome='$nome',descricao='$descricao'", "id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
       // header("Location: index.php"); // redireciona para a listagem
    }

?>
        
        
         <?php
                    $consulta = mysql_query("SELECT * FROM produto"); // query que busca todos os dados da tabela PRODUTO
                    while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
                ?>
                    <tr>
                        <td>
                            <?php echo $campo['nome']; // mostrando o campo NOME da tabela ?>
                        </td>
                        <td>
                            <?php echo $campo['descricao']; // mostrando o campo DESCRICAO da tabela ?>
                        </td>
                        <td>
                            <a href="formulario.php?id=<?php echo $campo['id']; //pega o campo ID para a ediçao ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="../controller/excluir.php?id=<?php echo $campo['id'];  //pega o campo ID para a exclusao ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
        
        
        
        
        
        
        
        
        
        
        
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
<title>Pagina usuário</title>
<link rel="icon" type="image/png" href="images/letra_j.png" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/DT_bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap-dropdown.js"></script>


<script type="text/javascript" src="../bootstrap/js/bootstrap-modal.js"></script>




</head>

<body>


<div class="navbar">
		  <div class="navbar-inner" style="-webkit-border-radius: 0; -moz-border-radius: 0; border-radius: 0;">
		    <div class="container">
		      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </a>
		      <a class="brand" href="#">Usuario</a>
		      <div class="nav-collapse">
		        <ul class="nav">
                 <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Minha conta <b class="caret"></b></a>
		            <ul class="dropdown-menu">
		              <li> 
                     <a href="pagina_usuario.php?id=<?php echo $campo['id']; //pega o campo ID para a ediçao ?>">
                                Editar
                            </a>
                      
                      <a class="btn" data-toggle="modal" href="#betaModal">Alterar senha</a></li>
		             
		              <li class="divider"></li>
		              <li class="nav-header">------</li>
		              <li><a href="#">-----</a></li>
		              
		            </ul>
		          </li>
		          <li class="active"><a href="#"><i class="icon-home icon-white"></i> -- </a></li>
		          <li><a href="../usuario/relatorio_pag_cliente.php">Meus pagamentos</a></li>
		          <li><a href="../php/suporte.php">Sugest&otilde;es|reclamac&otilde;es</a></li>
                 
                  
		          <li><a href="#">--</a></li>
		          <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Minha conta <b class="caret"></b></a>
		            <ul class="dropdown-menu">
		              <li> <a class="btn" data-toggle="modal" href="#betaModal">Alterar senha</a></li>
		              
		              <li class="divider"></li>
		              <li class="nav-header">------</li>
		              <li><a href="#">-----</a></li>
		              
		            </ul>
		          </li>
		        </ul>
				  <?php /*?><form class="navbar-search pull-right" action="">
	          <input type="text" class="search-query span2" placeholder="Search">
	        </form><?php */?>
		        <ul class="nav pull-right">
		        	<li class="dropdown">
		        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bem   vindo,<?php $_SESSION['usuario'] ?> <b class="caret"></b></a>
		        		<ul class="dropdown-menu">
		        	    <li><a  href="../php/logoof.php"><i class="icon-off"></i> Logout</a></li>
		        		<li><a  data-toggle="modal" href="#betaModal"><i class="icon-wrench"></i> Alterar senha</a></li>
		        		</ul>
		        	</li>
		        </ul>
		      </div><!-- /.nav-collapse -->
		    </div><!-- /.container -->
		  </div><!-- /navbar-inner -->
		</div>
        
        
       
        
  
<div id="betaModal" class="modal hide fade">
    <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h3>Alterar senha</h3>
    </div>
<div class="modal-body">
    <div class="row-fluid">
        <div class="span12">
            <div class="span6">
            <div class="logowrapper">
                <img class="logoicon" src="" alt="App Logo"/>
            </div>
            </div>
            <div class="span6">
                <form class="form-horizontal" method="post" action="<?php echo $PHP_SELF; ?>">
                    <p class="help-block">Usuario</p>
                    <div class="input-prepend">
                        <span class="add-on">*</span><input class="prependedInput" size="16" type="text">
                    </div>
                     <p class="help-block">Senha antiga</p>
                    <div class="input-prepend">
                        <span class="add-on">*</span><input class="prependedInput" name="senha_antiga" size="16" type="text">
                    </div>
                    <p class="help-block">Nova senha</p>
                    <div class="input-prepend">
                        <span class="add-on">*</span><input class="prependedInput" name="nova_senha" size="16" type="text">
                    </div>
                  	<hr>
                    <div class="help-block">
                        <button type="submit"  name="editar" value="Editar" class="btn btn-large btn-info">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="modal-footer">
        <p><i>STRBC</i></p>
    </div>
</div>
 
 
<?php /*?> <?php 
 
 $_antiga_senha  = $_POST["senha_antiga"];

	$_nova_senha  = $_POST["nova_senha"];
 
 
 
 
 
$query = mysql_query("SELECT usuarioo FROM users WHERE usuarioo =\"".$_usuario."\" " );
    $conta = mysql_num_rows($query);
        if($conta == '0' or null or ''){
            echo "<script language=javascript> alert(\"usuario nvalido!\"); </script> " ;
        }else{
           $query = mysql_query("UPDATE users SET senhaa=\"".$_nova_senha."\", WHERE  usuarioo =\"".           $_usuario."\"");
		   	   
           
		   
		    echo "<script language=javascript> alert(\"Senha alterada com sucessso!!!\"); </script> " ;
		}
 
 
 
 
 
 
 
 
 
 
 
 
 
  ?>
 
 <?php */?>
 
 
 
 
 
 
 
</body>
</html>
