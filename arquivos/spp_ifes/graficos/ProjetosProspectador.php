<?php
	$query = "SELECT COUNT(P.fk_id_usuario) AS qtd, U.nome as nome_usuario
	FROM PROJETO P
	INNER JOIN USUARIO U
	ON U.id = P.fk_id_usuario
	GROUP BY U.nome
	ORDER BY U.nome";
	$result = mysqli_query(connect(), $query);

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