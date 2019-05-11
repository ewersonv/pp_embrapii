<?php
include_once("../controller/sessao_adm.php");
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/funcoes.php");
include_once("../model/relatorios/funcoes_relatorios.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	
	<link href="css/relatorios.css" rel="stylesheet">
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(ProjetosTempo);
	<?php
	$_SESSION['submit'] = 1;
	include_once("../model/relatorios/ProjetosTempo.php");
	?>
	</script>

	<script type="text/javascript">
	google.charts.setOnLoadCallback(ProjetosEmpresa);
	<?php
	$_SESSION['submit'] = 1;
	include_once("../model/relatorios/ProjetosEmpresa.php");
	?>
	</script>

	<script type="text/javascript">
	google.charts.setOnLoadCallback(ProjetosTipoEmpresa);
	<?php
	$_SESSION['submit'] = 1;
	include_once("../model/relatorios/ProjetosTipoEmpresa.php");
	?>
	</script>

	<script type="text/javascript">
	google.charts.setOnLoadCallback(ProjetosProspectador);
	<?php
	$_SESSION['submit'] = 1;
	include_once("../model/relatorios/ProjetosProspectador.php");
	?>
	$(window).resize(function(){
		ProjetosTempo();
		ProjetosEmpresa();
		ProjetosTipoEmpresa();
		ProjetosProspectador();
	});
	</script>

</head>
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Relatórios</h1>
			</div>

			<label><h5>Total de projetos:                   </h5></label> <?php echo totalProjetos(); ?> <br>
			<label><h5>Análises finalizadas:              </h5></label> <?php echo numAnalisesFinalizadas(); ?> <br>
			<label><h5>Prospectadores cadastrados:</h5></label> <?php echo totalUsuarios(); ?> <br>
			<label><h5>Prospectadores ativos:     </h5></label> <?php echo totalUsuariosAtivos(); ?> <br>
			<!-- <label><h5>Total de produtos:                   </h5></label> <?php echo totalProdutos(); ?> <br> -->
			<label><h5>Empresa com mais projetos:   </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_empresa.php" role='button'><?php $_SESSION['submit'] = 1; $empresa = empresaMaisProjetos(); echo $empresa . ' (' . numProjetosEmpresa($empresa) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
			<label><h5>Maior prospectador:               </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_prospectador.php" role='button'><?php $_SESSION['submit'] = 1; $usuario = maiorProspectador(); echo $usuario . ' (' . numProjetosUsuario($usuario) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->


			<div class="row">
				<div class="clearfix"></div>
					<div id="ProjetosTempo" class="chart" ></div>
					<div id="ProjetosEmpresa" class="chart" ></div>
					<div id="ProjetosTipoEmpresa" class="chart" ></div>
					<div id="ProjetosProspectador" class="chart" ></div>
				</div>
			</div>
		
		</div>

	</body>
</html>