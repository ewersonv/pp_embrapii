<?php
include_once("header.html");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1 class="mb-0">
					<br><br><br><a class="text-dark">Pesquisar projetos</a><br><br>
				</h1>

				<form class="align center mt-2 mt-md-0" method="POST" action="pesquisa.php">
					<label>Nome da empresa:</label>
							<input class="form-control mr-sm-2" type="text" name="nome_empresa" style="min-width:400px;" placeholder="Pesquisar empresa">
					<label>Nome do prospectador:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_pessoa" style="min-width:400px;" placeholder="Pesquisar prospectador">
					<label>Nome do produto:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_produto" style="min-width:400px;" placeholder="Pesquisar produto">
					<label>Nome do projeto:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_projeto" style="min-width:400px;" placeholder="Pesquisar projeto">
				</form>

				<br><button class="btn btn-dark my-2 my-sm-0" type="submit" href="pesquisa.php">Pesquisar</button>

			</div>
		</div>
	</body>
</html>