<?php
session_start();
include_once("funcoes.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
		<link href="css/product.css" rel="stylesheet">
		<title>SPP - IFES</title>
		<style>
			#grad1 {
				height: 100%;
				background-color: #F5F5F5; /* For browsers that do not support gradients */
				background-image: linear-gradient(100deg,#F5F5F5,#E0E0E0); /* Standard syntax (must be last) */
			}
		</style>
	</head>
	<body id="grad1">
	
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	
		<nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
				<a class="py-2 d-none d-md-inline-block" href="index.html">Início</a>
				<a class="py-2 d-none d-md-inline-block"href="cadastrar.php">Nova Proposta</a>
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<div class="container">
			<div class="py-5 text-center">
				<h1>Propostas para prospecção</h1>
			</div>

				<?php
					include_once("exibir_listar.php")
				?>

		</div>
	</body>
</html>