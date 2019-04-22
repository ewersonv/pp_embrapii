<?php
	if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
	{
		header("Location: ../view/index.php");
	}
	else /* se a página foi acessada via submit da página anterior */
	{
		$_SESSION['submit'] = 0;
	
		$result = projetosTempo();

		$aux = [];
		$qtd = [];
		while($row = mysqli_fetch_assoc($result))
		{
			$mes = utf8_encode($row['mes']);
			$aux[] = trocaMes($mes);
			$qtd[] = $row['qtd'];
		}
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