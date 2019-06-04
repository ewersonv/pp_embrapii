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
				<h2 class="mb-0">
					<a class="text-dark">Relatórios</a>
				</h2>
			</div>

			<table class="table table-bordered">
			<tbody>
				<tr>
				<td>Total de projetos</td>
				<td class="text-center"><?php $qtd = totalProjetos(); echo $qtd;?></td>
				</tr>
				<tr>
				<td>Análises finalizadas</td>
				<td class="text-center"><?php echo numAnalisesFinalizadas(); ?></td>
				</tr>
				<tr>
				<td>Prospectadores cadastrados</td>
				<td class="text-center"><?php echo totalUsuarios(); ?></td>
				</tr>
				<tr>
				<td>Prospectadores ativos</td>
				<td class="text-center"><?php echo totalUsuariosAtivos(); ?></td>
				</tr>
				<tr>
				<td>Empresa com mais projetos</td>
				<td class='btn btn-sm btn-outline-dark' role='button' style='width:100%' onclick="qtdEmpresa(<?php echo $qtd; ?>)">
				<?php $_SESSION['submit'] = 1; $empresa = empresaMaisProjetos(); echo utf8_encode($empresa) . ' (' . numProjetosEmpresa($empresa) . ')'; ?>
				</a>
				</td>
				</tr>
				<tr>
				<td>Maior prospectador</td>
				<td class='btn btn-sm btn-outline-dark' role='button' style='width:100%' onclick="qtdProspectador(<?php echo $qtd; ?>)">
				<?php $_SESSION['submit'] = 1; $usuario = maiorProspectador(); echo utf8_encode($usuario) . ' (' . numProjetosUsuario($usuario) . ')'; ?>
				</td>
				</tr>
			</tbody>
			</table>

			<br>
			
			<div id="ProjetosTempo" class="chart" ></div>
			<div id="ProjetosEmpresa" class="chart" ></div>
			<div id="ProjetosTipoEmpresa" class="chart" ></div>
			<div id="ProjetosProspectador" class="chart" ></div>
		
		</div>
	<script>
		function qtdEmpresa(qtd)
		{
			if (qtd > 0) {
				location.href = 'relatorio_empresa.php';
			}
		}
		function qtdProspectador(qtd)
		{
			if (qtd > 0) {
				location.href = 'relatorio_prospectador.php';
			}
		}
	</script>
	</body>
</html>