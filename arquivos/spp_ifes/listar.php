<?php
session_start();
include_once("conexao.php");
include_once("funcoes.php");

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

			<!-- 
			<div class="row mb-2">
				<div class="col-md-6">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
					<p class="card-text mb-auto">AAA</p>
					<p class="card-text mb-auto">AAA</p>
					<p class="card-text mb-auto">AAA</p>
					<p class="card-text mb-auto">AAA</p>
					<h5 class="mb-0">
						<a class="text-dark">Código: </a>
					</h5>
					<a class="mb-1 text-muted">Nov 12</a>
					<p class="card-text mb-auto">AAA</p>
					<a role='button' class='btn btn-sm btn-outline-secondary' href="#">Preencher</a>
					</div>
					<img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" >
				</div>
				</div>
				<div class="col-md-6">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
					<strong class="d-inline-block mb-2 text-success">Design</strong>
					<h3 class="mb-0">
						<a class="text-dark" href="#">Post title</a>
					</h3>
					<div class="mb-1 text-muted">Nov 11</div>
					<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
					<a href="#">Continue reading</a>
					</div>
					<img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" >
				</div>
				</div>
			</div>
			</div>
			-->


		</div>
	</body>
</html>