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
        <a href="alterar_telefone.php">Alterar telefone</a><br>
        <?php
        if($_SESSION['tipo'] == 1){
            $link = 'cadastrar_prospectador.php';
            echo "<a href='$link'>Cadastrar novo prospectador</a><br>";
        }
        ?>
        
    </div>
</body>
</html>