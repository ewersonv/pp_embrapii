<?php
session_start();
?>
<DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>
	</head>
	<body>
		<h1>Cadastrar Empresa</h1>
		<?php
		if(isset($_SESSION['msg']))
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
		<form method="POST" action="processa.php">
			<label>Nome da empresa: </label>
			<input type="text" name="nome" placeholder="Digite o nome da empresa"><br><br>

			<label>Nome do representante: </label>
			<input type="text" name="nome_rep" placeholder="Digite o nome do representante"><br><br>

			<label>CNPJ: </label>
			<input type="number" name="cnpj" placeholder="Apenas números"><br><br>

			<label>Email: </label>
			<input type="email" name="email" placeholder="Digite o email"><br><br>

			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>