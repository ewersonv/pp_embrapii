<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
		<link href="css/product.css" rel="stylesheet">
		<title>SPP - IFES</title>		
	</head>
	<body>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
				<a class="py-2 d-none d-md-inline-block" href="listar.php">Listar propostas</a>
				<a class="py-2 d-none d-md-inline-block"href="cadastrar.php">Nova Proposta</a>
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<div class="container">
			<div class="py-5 text-center">
				<h2>SPP - IFES</h2> <br><br><br><br>

				<form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
				</form>

			</div>
		</div>
	</body>
</html>