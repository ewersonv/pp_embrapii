<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
		<title>SPP - Ifes</title>
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	</head>
    <body>
        
        <div class="wrapper fadeInDown">
        
        <?php // Mensagem de erro no login
            if(isset($_SESSION['msg'])){
                echo "<div class='text-center'>";
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                echo "</div>";
            }
        ?>
            <div id="formContent">
                 <!-- Icon -->
                <div class="fadeIn first">
                    <img src="img/LOGO_POLO-vertical-JPEG.jpg" id="icon" alt="User Icon" />
                </div>
                
                <!-- Login Form -->
                <form method="POST" action="../controller/valida.php">
                    <input type="text" id="login" class="fadeIn second" name="email" placeholder="Digite seu email">
                    <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Digite a sua senha">
                    <input type="submit" class="fadeIn fourth" name="btnLogin" value="Entrar">
                </form>

                <!-- Remind Password -->
                <div id="formFooter">
                    <a class="underlineHover" href="recuperar_senha.php">Esqueceu sua senha?</a>
                </div>
            </div>
        </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>