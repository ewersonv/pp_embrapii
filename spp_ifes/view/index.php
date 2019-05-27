<?php
include_once("../controller/sessao.php");
$_SESSION['submit'] = 0;
include_once("header.php");
include_once("../controller/router.php");
?>

<html id="grad1" lang="pt-br">
	<body>
		<div class="container">
			<div class="py-5 text-center">
				<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>

				<h1 class="mb-0">
					<br><a class="text-dark">Pesquisar projetos</a><br><br>
				</h1>

				<div class="row justify-content-md-center">
            		<div class="col-md-auto">
						<form name="formulario" style="float:center" method="POST" action="pesquisa.php">
								<input class="form-control mr-sm-2" style="min-width: 345px;" type="text" name="nome_projeto" placeholder="Nome do projeto"> <br>
								<input class="form-control mr-sm-2" style="min-width: 345px;" type="text" name="nome_produto" placeholder="Nome do produto"> <br>
								<input class="form-control mr-sm-2" style="min-width: 345px;" type="text" name="nome_empresa" placeholder="Nome da empresa"> <br>
								<?php
								if($_SESSION['tipo'] == 1) // Usuário comum não pode ver propostas de outros prospectadores
								{
									echo "<input class='form-control mr-sm-2' style='min-width: 345px;' type='text' name='nome_usuario' placeholder='Nome do prospectador'> <br>";
								}
								?>
								<br><button class="btn btn-dark my-2 my-sm-0" type="button" onclick="validateAndSend()">Pesquisar</button>
						</form>
					</div>
				</div>

			</div>
		</div>
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
	</body>
</html>