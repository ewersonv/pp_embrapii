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
		<div class="text-left">
            <br><br><br><br>
            <h3>Alterar senha</h3><br>

            <form name="formulario" class="align center" style="float:center" method="POST" action="../controller/proc_alterar_senha.php">
                <label>Senha atual:</label>
                <input class="form-control" type="password" name="atual" style="max-width:400px;" placeholder="******"><br>

                <label>Nova senha:</label>
                <input class="form-control" type="password" name="nova" style="max-width:400px;" placeholder="******"><br>
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Confirmar</button><br>
                
            </form>
        </div>
    </div>
</body>
</html>