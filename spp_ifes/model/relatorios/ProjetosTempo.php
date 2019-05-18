<?php
	if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
	{
		header("Location: ../view/index.php");
	}
	else /* se a página foi acessada via submit da página anterior */
	{
		$_SESSION['submit'] = 0;
	
		$result = projetosUltimosMeses();

		$mesAtual = date("n");
		$meses = [];
		$qtd = [];
		$mes = $mesAtual;

		$row = mysqli_fetch_assoc($result);

		for ($i = 0; $i < 6; $i++)
		{
			$meses[] = trocaMes($mes);
			if (utf8_encode($row['mes']) == $mes)
			{
				$qtd[] = utf8_encode($row['qtd']);
				$row = mysqli_fetch_assoc($result);
			}
			else
			{
				$qtd[] = 0;
			}
			$mes = $mes - 1;
			if ($mes < 1)
			{
				$mes = 12;
			}
		}
	}
?>
function ProjetosTempo() {
	var data = google.visualization.arrayToDataTable([
		['Mês', 'Quantidade de projetos'],
		<?php
		for($i = count($meses)-1; $i >= 0 ; $i--){
		?>
		['<?php echo $meses[$i] ?>',   <?php echo $qtd[$i] ?>],
		<?php } ?>
	]);

	var options = {
		title: 'Número de projetos prospectados nos últimos 6 meses',
		backgroundColor: 'transparent',
		curveType: '',
    	legend: { position: 'bottom' }
	};

	var chart = new google.visualization.LineChart(document.getElementById('ProjetosTempo'));
	chart.draw(data, options);
}