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
			<!-- <label><h5>Total de produtos:                   </h5></label> <?php echo totalProdutos(); ?> <br> -->
			<label><h5>Empresa com mais projetos:   </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_empresa.php" role='button'><?php $empresa = empresaMaisProjetos(); echo $empresa . ' (' . numProjetosEmpresa($empresa) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->
			<label><h5>Maior prospectador:               </h5></label><a class='btn btn-sm btn-outline-dark' href="relatorio_prospectador.php" role='button'><?php $pessoa = maiorProspectador(); echo $pessoa . ' (' . numProjetosPessoa($pessoa) . ')'; ?></a> <br> <!-- Alt+2+5+5 em vez de "espaço"-->

			<div id="piechart_3d" style="width: 900px; height: 500px;"></div>

			<?php
			$query = "SELECT COUNT(projeto.id_empresa) AS qtd, nome_empresa
			FROM projeto
			INNER JOIN empresa
			ON empresa.id_empresa = projeto.id_empresa
			GROUP BY nome_empresa
			ORDER BY COUNT(projeto.id_empresa)";
			$result = mysqli_query(connect(), $query);

			while($row = mysqli_fetch_assoc($result)){
				$empresas[] = utf8_encode($row['nome_empresa']);
				$qtd[] = $row['qtd'];
			}

			?>
		
		</div>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
      	google.charts.load("current", {packages:["corechart"]});
      	google.charts.setOnLoadCallback(drawChart);
      	function drawChart() {
        	var data = google.visualization.arrayToDataTable([
				['Empresas', 'Quantidade de projetos'],
				<?php
				for($i = 0; $i<count($empresas) ; $i++){
				?>
				['<?php echo $empresas[$i] ?>',   <?php echo $qtd[$i] ?>],
				<?php } ?>
			]);

        	var options = {
          	title: 'Número de projetos por empresa',
			backgroundColor: 'transparent',
          	is3D: true,
        	};

        	var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        	chart.draw(data, options);
      	}
    	</script>
	</body>
</html>
	