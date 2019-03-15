<?php
    $result = projetosTipoEmpresa();

    $aux = [];
	$qtd = [];
    while($row = mysqli_fetch_assoc($result))
    {
        $aux[] = utf8_encode($row['tipo_empresa']);
        $qtd[] = $row['qtd'];
    }
?>
function ProjetosTipoEmpresa() {
    var data = google.visualization.arrayToDataTable([
        ['Tipo de empresa', 'Quantidade de projetos'],
        <?php
        for($i = 0; $i<count($aux) ; $i++){
        ?>
        ['<?php echo $aux[$i] ?>',   <?php echo $qtd[$i] ?>],
        <?php } ?>
    ]);

    var options = {
        title: 'Número de projetos por tipo de empresa',
        backgroundColor: 'transparent',
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('ProjetosTipoEmpresa'));
    chart.draw(data, options);
}