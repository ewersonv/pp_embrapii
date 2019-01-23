<?php
include_once("header.html");
include_once("../controller/funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Relatórios</h1>
			</div>

			<label><h5>Total de projetos:                   </h5></label> <?php echo totalProjetos(); ?> <br>
			<label><h5>Total de produtos:                   </h5></label> <?php echo totalProdutos(); ?> <br>
			<label><h5>Empresa com mais projetos:   </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_empresa.php" role='button'><?php $empresa = empresaMaisProjetos(); echo $empresa . ' (' . numProjetosEmpresa($empresa) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
			<label><h5>Maior prospectador:               </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_prospectador.php" role='button'><?php $pessoa = maiorProspectador(); echo $pessoa . ' (' . numProjetosPessoa($pessoa) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
		</div>
	</body>
</html>
	