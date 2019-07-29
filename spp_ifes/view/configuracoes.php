<?php
include_once("../controller/sessao.php");
include_once("header.php");
?>
<!DOCTYPE html>
<html id="grad1">
<head>
    <meta charset="utf-8">
</head>
<body>
	<div class="container">
		<div class="py-5 text-center">
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>

            <h2 class="mb-0">
				<a class="text-dark">Configurações</a>
			</h2>
        </div>

        <div class="list-group" style="margin: auto; max-width: 70%; box-shadow: 0 10px 20px rgba(0,0,0,0.15), 0 6px 6px rgba(0,0,0,0.05);">
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