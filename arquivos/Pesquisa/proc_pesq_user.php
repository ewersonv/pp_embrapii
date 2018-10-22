<?php
//Incluir a conexão com banco de dados
include_once 'conexao.php';

$empresas = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_emp = "SELECT * FROM l15kp_empresa WHERE nome_empresa LIKE '%$empresas%' LIMIT 10";
$resultado_emp = mysqli_query($conn, $result_emp);

if(($resultado_emp) AND ($resultado_emp->num_rows != 0 )){
	while($row_emp = mysqli_fetch_assoc($resultado_emp)){
		echo "<li>".$row_emp['nome_empresa']."</li>";
	}
}else{
	echo "Nenhuma empresa encontrada";
}