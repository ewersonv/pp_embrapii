<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>SPP - IFES</title>		
	</head>
	<body>
		<a href="cadastrar.php">Cadastrar</a><br>
		<a href="listar.php">Listar</a><br>
		<h1>Propostas para prospecção</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Campo "Pesquisar"
		echo "<i>Pesquisar propostas</i>" . "<br>","<br>","<br>";

		//Campo "Gráficos"
		echo "<i>Relatórios em forma de gráficos</i>" . "<br>","<br>","<br>";


		?>		
	</body>
</html>