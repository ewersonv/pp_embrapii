<?php
	$query = "SELECT COUNT(id_projeto) AS qtd, MONTH(created) as mes
	FROM projeto
	WHERE created >= '2018-11-12'
	GROUP BY MONTH(created)
	ORDER BY created";
	$result = mysqli_query(connect(), $query);

	$aux = [];
	$qtd = [];
	while($row = mysqli_fetch_assoc($result))
	{
		$mes = utf8_encode($row['mes']);
		$aux[] = trocaMes($mes);
		$qtd[] = $row['qtd'];
	}
?>
function ProjetosTempo() {
	var data = google.visualization.arrayToDataTable([
		['Mês', 'Quantidade de projetos'],
		<?php
		for($i = 0; $i<count($aux) ; $i++){
		?>
		['<?php echo $aux[$i] ?>',   <?php echo $qtd[$i] ?>],
		<?php } ?>
	]);

	var options = {
		title: 'Número de projetos prospectados por mês',
		backgroundColor: 'transparent',
		curveType: 'function',
    	legend: { position: 'bottom' }
	};

	var chart = new google.visualization.LineChart(document.getElementById('ProjetosTempo'));
	chart.draw(data, options);
}