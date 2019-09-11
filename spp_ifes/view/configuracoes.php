<?php
include_once("../controller/sessao.php");
include_once("header.php");
?>
<!DOCTYPE html>
<html id="grad1">
<head>
    <meta charset="utf-8">
    <link href="css/configuracoes.css" rel="stylesheet">
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

            <h2 class="mb-0 text-dark">Configurações</h2>
        </div>

        <div class="list-group">
            <a id="config-item" href="alterar_senha.php" class="list-group-item list-group-item-action">Alterar senha</a>
            <a id="config-item" href="alterar_telefone.php" class="list-group-item list-group-item-action">Alterar telefone</a>
            <?php
            if($_SESSION['tipo'] == 1){
                echo "<a id='config-item' href='cadastrar_prospectador.php' class='list-group-item list-group-item-action'>Cadastrar novo prospectador</a>";
                echo "<a id='config-item' href='consultar_prospectadores.php' class='list-group-item list-group-item-action'>Consultar prospectadores</a>";
            }
            ?>
        </div>
        
    </div>
</body>
</html>