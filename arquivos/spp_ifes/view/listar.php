<?php
include_once("../controller/sessao.php");
include_once("header.html");
include_once("../controller/funcoes.php");
include_once("../controller/exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
		
				<?php if (isset($_SESSION['message'])): ?>
					<div class="msg">
						<?php 
							echo $_SESSION['message'];
							unset($_SESSION['message']);
						?>
					</div>
				<?php endif ?>

				<h1>Propostas para prospecção</h1>

				<a class='btn btn btn-outline-success' href='../controller/download_propostas.php' role='button'>Baixar propostas</a></p>
			
			</div>
			
			<?php
				// Resultados a serem exibidos na página
				$result = getAllProjetos($inicio, $qnt_result_pg);

				// Paginação - Pegar a quantidade de formulários
				$qtd_total = totalProjetos();

				// Nome da página para ser redirecionado
				$nome_pagina = 'listar.php';
				include_once("../controller/exibir_projetos.php");
			?>

		</div>
	</body>
</html>