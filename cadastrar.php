<!DOCTYPE html>

<?php
 require_once'classes/usuarios.php';

 $u = new Usuario();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login Restaurante</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
</head>

<body>
    <div id="corpo-form-cad">
        <h1>Cadastrar Usuário</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="E-mail" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" Value="Cadastrar">
        </form>
    </div>
    <?php  
    	//Verificar se clicou no botão
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarsenha = addslashes($_POST['confSenha']);
            //Verificar os campos do form

            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha))
            {

                $u->conectar("project_restaurante","localhost","root","");
                if($u->msgErro == "")
                {
                    if($senha == $confirmarsenha)
                    {
                        if($u->cadastrar($nome,$telefone,$email,$senha))
                        {
                        	?>
                        		<div id="msg-sucesso">Cadastrado com sucesso! Acesse para entrar!</div>
                        	<?php
                        }
                        else
                        {
                        	?>
                        	<div class="msg-erro">Email já cadastrado!</div>
                            <?php
                        }
                    }
                    else
                    {

                    	?>
                        <div class="msg-erro">Senha e confirmar senha não correspondem!</div>
                       <?php
                    }
                }
                    else{
                            echo "Erro: ".$u->msgErro;
                    }
                }else
                {	
                	?>
                    <div class="msg-erro">Preencha todos os campos!</div>
                    <?php
                }
        }

    ?> 
</body>

</html>