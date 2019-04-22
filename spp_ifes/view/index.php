<?php
include_once("../controller/sessao.php");
$_SESSION['submit'] = 0;

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}

include_once("header.php");
?>

<html lang="pt-br">
	<body id="grad1" class="center-form">
		<div class="container">
			<div class="py-5 text-center">
				<h1 class="mb-0">
					<br><br><a class="text-dark">Pesquisar projetos</a><br><br>
				</h1>


				<form name="formulario" class="center-form" style="float:center" method="POST" action="pesquisa.php">
					<div style="align-center;width: 500px;margin-left: 280px;">
						<input class="form-control mr-sm-2" style="max-width: 400px;" type="text" name="nome_projeto" placeholder="Nome do projeto"> <br>
						<input class="form-control mr-sm-2" style="max-width: 400px;" type="text" name="nome_produto" placeholder="Nome do produto"> <br>
						<input class="form-control mr-sm-2" style="max-width: 400px;" type="text" name="nome_empresa" placeholder="Nome da empresa"> <br>
						<?php
						if($_SESSION['tipo'] == 1) // Usuário comum não pode ver propostas de outros prospectadores
						{
							echo "<input class='form-control mr-sm-2' style='max-width: 400px;' type='text' name='nome_usuario' placeholder='Nome do prospectador'> <br>";
						}
						?>
					</div>
						<br><button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="validateAndSend()">Pesquisar</button>
				</form>

				
			</div>
		</div>
	</body>
	<script>
		function validateAndSend() {
			if (formulario.nome_empresa.value == '' && formulario.nome_usuario.value == '' && formulario.nome_produto.value == '' && formulario.nome_projeto.value == '') {
				alert('Você precisa preencher pelo menos um campo.');
				return false;
			}
			else {
				<?php $_SESSION['submit'] = 1; ?>
				formulario.submit();
			}
		}
	</script>
</html>
<style>
	body.center-form {
		min-height: 100vh;
	}

	div.center-form {
		position: relative;
		min-height: 100vh;
	}
	div.center-form > form {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translateY(-50%) translateX(-50%);
	}

	label {
		display: inline-block;
		width: 180px;
		text-align: right;
	}​

	input{
		max-width: 400px;
	}

	::-webkit-input-placeholder {
		font-style: italic;
	}
	:-moz-placeholder {
		font-style: italic;  
	}
	::-moz-placeholder {
		font-style: italic;  
	}
	:-ms-input-placeholder {  
		font-style: italic; 
	}
</style>

