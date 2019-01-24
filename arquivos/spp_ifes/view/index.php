<?php
include_once("header.html");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1 class="mb-0">
					<br><a class="text-dark">Pesquisar projetos</a><br><br>
				</h1>

				<form name="formulario" class="align center mt-2 mt-md-0" method="POST" action="pesquisa.php">
					<label>Nome da empresa:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_empresa" style="min-width:400px;" placeholder="Pesquisar empresa">
					<label>Nome do prospectador:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_pessoa" style="min-width:400px;" placeholder="Pesquisar prospectador">
					<label>Nome do produto:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_produto" style="min-width:400px;" placeholder="Pesquisar produto">
					<label>Nome do projeto:</label>
						<input class="form-control mr-sm-2" type="text" name="nome_projeto" style="min-width:400px;" placeholder="Pesquisar projeto">
					<br><button class="btn btn-success my-2 my-sm-0" type="button" onclick="validateAndSend()">Pesquisar</button>
				</form>
			</div>
		</div>
		<script>
			function validateAndSend() {
				if (formulario.nome_empresa.value == '' && formulario.nome_pessoa.value == '' && formulario.nome_produto.value == '' && formulario.nome_projeto.value == '') {
					alert('Você precisa preencher pelo menos um campo.');
					return false;
				}
				else {
					formulario.submit();
				}
			}
		</script>
	</body>
</html>