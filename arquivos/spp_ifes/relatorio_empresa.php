
<?php
include_once("site.html");
include_once("funcoes.php");
include_once("exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
<<<<<<< HEAD
    
    <div class="container">
		<div class="py-5 text-center">
		    <h1>Projetos <?php $empresa = empresaMaisProjetos(); echo $empresa; ?></h1>
=======
	
		<h1>Projetos <?php $nome = empresaMaisProjetos(); echo $nome; ?></h1>
>>>>>>> relatorio prospec + separar exibir_projetos
		</div>

		<?php
            // Resultados a serem exibidos na página
			$result = getProjetosEmpresaMax($inicio, $qnt_result_pg);

			// Paginação - Somar a quantidade de formulários
			$qtd_total_paginas = numProjetosEmpresa($nome);
			
			// Nome da página para ser redirecionado
			$nome_pagina = 'relatorio_empresa.php';
            include_once("exibir_projetos.php")
        ?>
    </div>
	</body>
</html>