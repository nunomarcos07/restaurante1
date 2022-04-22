
<!DOCTYPE html>

<?php  
	session_start();
	if (!isset($_SESSION['id_usuario'])) {
		header("location: login.php");
		exit;
	}


?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard</title>
    <link rel="stylesheet" href="css/deshboard.css">
</head>
<body>
    <input type="checkbox" id="check">
    <!--header começo-->
    <header>
        <label for="check">
            <ion-icon name="menu-outline" id="sidebar_btn"></ion-icon>
        </label>
        <div class="left">
            <h3>ANJAP <span>RESTAURANTE</span></h3>
        </div>
        <div class="right">
            
			<a href="sair.php" class="sair_btn">Sair</a>
            <label class="name-user">Nuno Marcos</label>
        </div>
    </header>
    <!--header final-->
    <!--sidebar começo-->
    <div class="sidebar">
        <center>
            <img src="img/img-1.jpg" class="image" alt="">
            <h2>Admin</h2>
        </center>
        <a href="#"><ion-icon name="desktop-outline"></ion-icon><span>Painel de Controle</span></a>
        <a href="#"><ion-icon name="calendar-clear-outline"></ion-icon><span>Cadastrar</span></a>
        <a href="#"><ion-icon name="camera-outline"></ion-icon><span>Listagem</span></a>
        <a href="#"><ion-icon name="information-circle-outline"></ion-icon><span>Sobre</span></a>
        <a href="#"><ion-icon name="settings-outline"></ion-icon><span>Configuração</span></a>
    </div>
    <!--sidebar final-->
    <div class="content"></div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>