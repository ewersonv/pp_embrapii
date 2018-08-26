<?php
session_start();
?>
<DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Polo de Inovação - IFES Campus Vitória</title>
	</head>
	<body>
		<h1>Formulário de prospecção</h1>
		<?php
		if(isset($_SESSION['msg']))
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
		<form method="POST" action="processa.php">
			<label>Você é representante: </label><br>
			<input type="checkbox" name="cb1" value="Representante da empresa" />da empresa<br>
			<input type="checkbox" name="cb2" value="Representante do Polo de Inovação" />do Polo de Inovação<br><br>
			
			<label>Seu nome: </label>
			<input type="text" name="nome" placeholder="Nome completo"><br><br>

			<label>Email: </label>
			<input type="email" name="email" placeholder="abcd@email.com"><br><br>

			<label>Telefone: </label>
			<input type="number" name="telefone" placeholder="2799998888"><br><br>

			<input type="submit" value="Enviar">
		</form>
	</body>
</html>