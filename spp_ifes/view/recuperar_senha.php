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

        <?php // Mensagem de erro
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
                    <br><br><h5>Informe seu email e CPF para recuperar a senha</h5><br>
                </div>
                
                <!-- Login Form -->
                <form name="formulario" method="POST" action="../controller/valida_recuperar_senha.php">
                    <input type="text" id="login" class="fadeIn second" name="email" placeholder="Digite seu email">
                    <input type="text" id="cpf" class="fadeIn third" name="cpf" placeholder="CPF (apenas números)" maxlength="11">
                    <input type="button" class="fadeIn fourth" name="btnLogin" value="Recuperar" onclick="validate()">
                </form>

                <!-- Remind Password -->
                <div id="formFooter">
                    <a class="underlineHover" href="login.php">Voltar</a>
                </div>
            </div>
        </div>
    <script>
        function validate() {
            if (formulario.email.value == '')
            {
                formulario.email.focus();
                return false;
            }
            if (formulario.cpf.value == '')
            {
                formulario.cpf.focus();
                return false;
            }
            else
            {
                <?php $_SESSION['submit'] = 1; ?>
                formulario.submit();
            }
        }
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>