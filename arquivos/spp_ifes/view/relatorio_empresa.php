
<?php
include_once("header.html");
include_once("../controller/funcoes.php");
include_once("../controller/exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
	
				<h1>Projetos <?php $nome = empresaMaisProjetos(); echo '- ' . $nome; ?></h1>
			</div>

		<?php
            // Resultados a serem exibidos na página
			$result = getProjetosEmpresaMax($inicio, $qnt_result_pg);

			// Paginação - Somar a quantidade de formulários
			$qtd_total = numProjetosEmpresa($nome);
			
			// Nome da página para ser redirecionado
			$nome_pagina = 'relatorio_empresa.php';
            include_once("../controller/exibir_projetos.php")
		?>
		
		</div>
	</body>
</html>