<!DOCTYPE html>
<?php
 require_once'classes/usuarios.php';

 $u = new Usuario();

/*$listlogged = $u->logged($_SESSION['id_usuario']);
echo $listlogged['nome'];*/

?>

<html lang = "pt-br">
<head>
	<meta charset="utf-8">
	<title>Login Restaurante</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<div id="corpo-form">
	<h1>Acesse sua conta</h1>
	<form method="POST">
		<input type="email" name="email" placeholder="Usuário">
		<input type="password" name="senha" placeholder="Senha">
		<input type="submit" Value="Acessar">
		<a href="cadastrar.php">Ainda não é inscrito? <Strong> Cadastra-se</Strong></a>
	</form>
</div>

<?php  
 if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha))
            {
            	$u->conectar("project_restaurante","localhost","root","");

	            		if($u->msgErro == "")
	            		{	            		               	 		
		              		if($u->logar($email,$senha))
		              		{
		              			header("location: deshboard.php");
		              		}
		               		else
		            		{
		            			?>
		                        <div class="msg-erro">Email e Senha incorretos!</div>
		                    	<?php
		            		}
	            		}
	            		else
	            		{
	            			echo "Erro: ".$u->msgErro;
	            		}
	            	}else
	            	{       
	            		?>
						<div class="msg-erro">Preencha todos os campos!</div>
	                    <?php
	}   			}
?>
</body>
</html>

          