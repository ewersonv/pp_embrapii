
<?php
include_once("../controller/sessao_adm.php");
include_once("header.php");
include_once("../model/relatorios/funcoes_relatorios.php");
include_once("../model/conexao.php");
include_once("../model/funcoes.php");
include_once("../model/propostas/exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h2 class="mb-0">
					<a class="text-dark">Projetos <?php $nome = empresaMaisProjetos(); echo '- ' . utf8_encode($nome); ?></a>
				</h2>
			</div>

		<?php
            // Resultados a serem exibidos na página
			$result = getProjetosEmpresaMax($inicio, $qnt_result_pg);

			// Paginação - Somar a quantidade de formulários
			$qtd_total = numProjetosEmpresa($nome);
			
			// Nome da página para ser redirecionado
			$nome_pagina = 'relatorio_empresa.php';
			include_once("../controller/exibir_projetos.php");
		?>
		
		</div>
	</body>
</html>