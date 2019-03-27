<?php
include_once("../controller/sessao.php");
include_once("header.php");
$_SESSION['submit'] = 0;
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
            echo "<a href='cadastrar_prospectador.php'>Cadastrar novo prospectador</a><br>";
            echo "<a href='consultar_prospectador.php'>Consultar prospectadores</a><br>";
        }
        ?>
        
    </div>
</body>
</html>