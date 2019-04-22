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
	
				<h1>Projetos <?php $nome = maiorProspectador(); echo '- ' . $nome; ?></h1>
			</div>

		<?php
            // Resultados a serem exibidos na página
			$result = getProjetosProspectadorMax($inicio, $qnt_result_pg);

			// Paginação - Somar a quantidade de formulários
			$qtd_total = numProjetosUsuario($nome);

			// Nome da página para ser redirecionado
			$nome_pagina = 'relatorio_prospectador.php';
			include_once("../controller/exibir_projetos.php");
		?>
		
		</div>
	</body>
</html>