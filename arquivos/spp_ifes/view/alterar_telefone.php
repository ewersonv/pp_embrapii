<?php
include_once("../controller/sessao.php");
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
            <h3>Alterar telefone</h3><br>

            <form name="formulario" class="align center" style="float:center" method="POST" action="../controller/proc_alterar_telefone.php">
                <label>Insira o novo telefone:</label>
                <input class="form-control" type="text" name="telefone" style="max-width:400px;" placeholder="27999998888"><br>
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Confirmar</button><br>
                
            </form>
        </div>
    </div>
</body>
</html>