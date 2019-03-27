<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/product.css" rel="stylesheet">
		<title>SPP - Ifes</title>
		<style>
			#grad1 {
				height: 100%;
				background-color: #F5F5F5; /* For browsers that do not support gradients */
				background-image: linear-gradient(100deg,#F5F5F5,#E0E0E0); /* Standard syntax (must be last) */
			}
		</style>
	</head>
	<body id="grad1">
		<nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2 d-none d-md-inline-block" href="index.php">Início</a>
				<a class="py-2 d-none d-md-inline-block" href="listar.php">Listar propostas</a>
				<a class="py-2 d-none d-md-inline-block"href="nova_proposta.php">Nova Proposta</a>
				<?php
				if ($_SESSION['tipo'] == 1)
				{
					echo "<a class='py-2 d-none d-md-inline-block' href='relatorios.php'>Relatórios</a>";
				}
				?>
				<a class="py-2 d-none d-md-inline-block" href="configuracoes.php">Configurações</a>
				<a class="py-2 d-none d-md-inline-block" href="sair.php">Sair</a>
			</div>
		</nav>			
	</body>
</html>