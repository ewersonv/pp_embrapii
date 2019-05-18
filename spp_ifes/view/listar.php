<?php
include_once("../controller/sessao.php");
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/funcoes.php");
include_once("../model/propostas/funcoes_propostas.php");
include_once("../model/propostas/funcoes_exibicao.php");
$_SESSION['submit'] = 1; /* submit = 1 para incluir exibicao.php */
include_once("../model/propostas/exibicao.php");
$_SESSION['submit'] = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
		
				<?php 
				if (isset($_SESSION['msg'])): ?>
					<div class="msg">
						<?php 
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						?>
					</div>
				<?php endif ?>

				<h1 class="mb-0">
					<a class="text-dark">Propostas</a>
				</h1>
			
			</div>
			
			<?php
				// Resultados a serem exibidos na página
				$result = getAllProjetos($inicio, $qnt_result_pg);

				// Paginação - Pegar a quantidade de formulários
				$qtd_total = totalProjetos();

				// Nome da página para ser redirecionado
				$nome_pagina = 'listar.php';
				$_SESSION['submit'] = 1;
				include_once("../controller/exibir_projetos.php");
			?>

		</div>
	</body>
</html>