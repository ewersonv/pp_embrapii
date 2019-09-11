<?php
include_once("../controller/sessao.php");
include_once("header.php");
include_once("../model/propostas/exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="css/listar.css">
	</head>
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h2 class="mb-0">
					<a class="text-dark">Resultados</a>
				</h2>
			</div>
			
            <?php
				$_SESSION['submit'] = 1;
                // Processamento da pesquisa
				include_once("../controller/proc_pesquisa.php");
			?>

		</div>
	</body>
</html>