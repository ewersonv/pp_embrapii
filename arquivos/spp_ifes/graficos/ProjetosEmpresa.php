<?php
	$query = "SELECT COUNT(P.fk_id_empresa) AS qtd, E.nome as nome_empresa
	FROM PROJETO P
	INNER JOIN EMPRESA E
	ON E.id = P.fk_id_empresa
	GROUP BY E.nome
	ORDER BY E.nome";
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