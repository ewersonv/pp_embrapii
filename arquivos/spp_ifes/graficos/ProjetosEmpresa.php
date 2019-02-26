<?php
	$query = "SELECT COUNT(projeto.id_empresa) AS qtd, nome_empresa
	FROM projeto
	INNER JOIN empresa
	ON empresa.id_empresa = projeto.id_empresa
	GROUP BY nome_empresa
	ORDER BY nome_empresa";
	$result = mysqli_query(connect(), $query);

	$aux = [];
	$qtd = [];
	while($row = mysqli_fetch_assoc($result))
	{
		$aux[] = utf8_encode($row['nome_empresa']);
		$qtd[] = $row['qtd'];
	}
?>
function ProjetosEmpresa() {
	var data = google.visualization.arrayToDataTable([
		['Empresas', 'Quantidade de projetos'],
		<?php
		for($i = 0; $i<count($aux) ; $i++){
		?>
		['<?php echo $aux[$i] ?>',   <?php echo $qtd[$i] ?>],
		<?php } ?>
	]);

	var options = {
		title: 'Número de projetos por empresa',
		backgroundColor: 'transparent',
		is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('ProjetosEmpresa'));
	chart.draw(data, options);
}