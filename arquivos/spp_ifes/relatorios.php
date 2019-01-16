<?php
include_once("site.html");
include_once("funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Relatórios</h1>
			</div>

			<label><b>Total de projetos: </b></label> <?php echo totalProjetos(); ?> <br>
			<label><b>Total de produtos: </b></label> <?php echo totalProdutos(); ?> <br>
			<label><b>Empresa com mais projetos: </b></label><a class="py-2 d-none d-md-inline-block" href="relatorio_empresa.php"><?php $empresa = empresaMaisProjetos(); echo $empresa . ' (' . numProjetosEmpresa($empresa) . ')'; ?> </a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
			<label><b>Maior prospectador: </b></label><a class="py-2 d-none d-md-inline-block" href="relatorio_prospectador.php"><?php $pessoa = maiorProspectador(); echo $pessoa . ' (' . numProjetosPessoa($pessoa) . ')'; ?> </a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
		</div>
	</body>
</html>
	