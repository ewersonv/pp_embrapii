<?php
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
		<nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
				<a class="py-2 d-none d-md-inline-block" href="listar.php">Listar propostas</a>
				<a class="py-2 d-none d-md-inline-block"href="cadastrar.php">Nova Proposta</a>
				<a class="py-2 d-none d-md-inline-block" href="relatorios.php">Relatórios</a>
			</div>
        </nav>
        <?php
        
            echo "<b>Total de projetos: </b>" . totalProjetos() . "<br>";
            echo "<b>Total de produtos: </b>" . totalProdutos() . "<br>";
            echo "<b>Empresa com mais projetos: </b>" . empresaMaisProjetos() . "<br>";
            echo "<b>Maior prospectador: </b>" . maiorProspectador() . "<br>";

        ?>