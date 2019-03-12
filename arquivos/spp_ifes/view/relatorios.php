<?php
include_once("../controller/sessao_adm.php");
include_once("header.html");
include_once("../controller/funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(ProjetosTempo);
	<?php include_once("../graficos/ProjetosTempo.php"); ?>
	</script>

	<script type="text/javascript">
	google.charts.setOnLoadCallback(ProjetosEmpresa);
	<?php include_once("../graficos/ProjetosEmpresa.php"); ?>
	</script>

	<script type="text/javascript">
	google.charts.setOnLoadCallback(ProjetosTipoEmpresa);
	<?php include_once("../graficos/ProjetosTipoEmpresa.php"); ?>
	</script>

	<script type="text/javascript">
	google.charts.setOnLoadCallback(ProjetosProspectador);
	<?php include_once("../graficos/ProjetosProspectador.php"); ?>
	</script>

</head>
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Relatórios</h1>
			</div>

			<label><h5>Total de projetos:                   </h5></label> <?php echo totalProjetos(); ?> <br>
			<!-- <label><h5>Total de produtos:                   </h5></label> <?php echo totalProdutos(); ?> <br> -->
			<label><h5>Empresa com mais projetos:   </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_empresa.php" role='button'><?php $empresa = empresaMaisProjetos(); echo $empresa . ' (' . numProjetosEmpresa($empresa) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
			<label><h5>Maior prospectador:               </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_prospectador.php" role='button'><?php $usuario = maiorProspectador(); echo $usuario . ' (' . numProjetosUsuario($usuario) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->

			<div id="ProjetosTempo" style="width: 900px; height: 500px"></div>
			<div id="ProjetosEmpresa" style="width: 900px; height: 500px;"></div>
			<div id="ProjetosTipoEmpresa" style="width: 900px; height: 500px;"></div>
			<div id="ProjetosProspectador" style="width: 900px; height: 500px;"></div>

		</div>
	</body>
</html>