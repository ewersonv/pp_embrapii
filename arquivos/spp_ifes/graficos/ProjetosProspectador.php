<?php
	$result = projetosProspectador();

	$aux = [];
	$qtd = [];
	while($row = mysqli_fetch_assoc($result))
	{
		$aux[] = utf8_encode($row['nome_usuario']);
		$qtd[] = $row['qtd'];
	}
?>
function ProjetosProspectador() {
	var data = google.visualization.arrayToDataTable([
		['Pessoa', 'Quantidade de projetos'],
		<?php
		for($i = 0; $i<count($aux) ; $i++){
		?>
		['<?php echo $aux[$i] ?>',   <?php echo $qtd[$i] ?>],
		<?php } ?>
	]);

	var options = {
		title: 'Número de projetos por prospectador',
		backgroundColor: 'transparent',
		is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('ProjetosProspectador'));
	chart.draw(data, options);
}