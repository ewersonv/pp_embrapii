<?php
include_once("../controller/sessao.php");
include_once("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body id="grad1">
	<div class="container">
		<div class="py-5 text-center">
            <h2 class="mb-0">
				<a class="text-dark">Configurações</a>
			</h2>
        </div>
        
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>


        <div class="list-group">
            <a href="alterar_senha.php" class="list-group-item list-group-item-action">Alterar senha</a>
            <a href="alterar_telefone.php" class="list-group-item list-group-item-action">Alterar telefone</a>
            <?php
            if($_SESSION['tipo'] == 1){
                echo "<a href='cadastrar_prospectador.php' class='list-group-item list-group-item-action'>Cadastrar novo prospectador</a>";
                echo "<a href='consultar_prospectadores.php' class='list-group-item list-group-item-action'>Consultar prospectadores</a>";
            }
            ?>
        </div>
        
    </div>
</body>
</html>