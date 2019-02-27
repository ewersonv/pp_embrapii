<?php
session_start();
if(empty($_SESSION['id'])){
	$_SESSION['msg'] = "Faça login para acessar a plataforma";
	header("Location: login.php");
}
include_once("header.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body id="grad1">
	<div class="container">
		<div class="py-5 text-center">
            <h1>Configurações</h1>
        </div>
        
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        
        <a href="alterar_senha.php">Alterar senha</a><br>
        <a href="cadastrar_prospectador.php">Cadastrar novo prospectador</a><br>
        
    </div>
</body>
</html>