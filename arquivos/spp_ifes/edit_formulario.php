<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
/* TABELA PROPOSTA */
$result_proposta = "SELECT * FROM proposta WHERE id_proposta = '$id'";
$resultado_proposta = mysqli_query($conn, $result_proposta);
$row_proposta = mysqli_fetch_assoc($resultado_proposta);

/* TABELA EMPRESA */
$result_empresa = "SELECT * FROM empresa WHERE id_empresa = '$id'";
$resultado_empresa = mysqli_query($conn, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

/* TABELA PROJETO */
$result_projeto = "SELECT * FROM projeto WHERE id_projeto = '$id'";
$resultado_projeto = mysqli_query($conn, $result_projeto);
$row_projeto = mysqli_fetch_assoc($resultado_projeto);

/* TABELA PESSOA */
$result_pessoa = "SELECT * FROM pessoa WHERE id_pessoa = '$id'";
$resultado_pessoa = mysqli_query($conn, $result_pessoa);
$row_pessoa = mysqli_fetch_assoc($resultado_pessoa);

/* TABELA PRODUTO */
$result_produto = "SELECT * FROM produto WHERE id_produto = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
		<link href="css/product.css" rel="stylesheet">
		<title>SPP - IFES</title>		
	</head>
	<body>
		<nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
				<a class="py-2 d-none d-md-inline-block" href="index.php">Início</a>
				<a class="py-2 d-none d-md-inline-block" href="listar.php">Listar propostas</a>
				<a class="py-2 d-none d-md-inline-block"href="cadastrar.php">Nova Proposta</a>
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<div class="container">
			<div class="py-5 text-center">
				<h1>Preencher proposta</h1>
			</div>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

			/* USAR ENCODE NO FORM PARA OS DADOS SEREM EXIBIDOS CORRETAMENTE */

			?>
			<form method="POST" action="proc_edit_formulario.php">
				<div class="col-md-6 mb-3">
					<input type="hidden" name="id" value="<?php echo utf8_encode($row_proposta['id_proposta']); ?>">

					<label><b>Nome do produto: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Descrição do produto: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Digite o nome completo"/><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Justificativa: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Nome da empresa: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>CNPJ: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Tipo de empresa: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Tipo de proposta: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Prospectado por: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Representante do(a): </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Email: </b></label><br>
					<input type="email" class="form-control" name="email" value="<?php echo utf8_encode($row_pessoa['email']); ?>"><br><br>

					<label><b>Telefone: </b></label><br>
					<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row_proposta['resumo_proposta']); ?>"><br><br>

					<label><b>Riscos: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Restrições: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Partes interessadas: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Equipe do projeto: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Entregas: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Cronograma: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Premissas: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Efeitos do projeto: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Requisitos: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<label><b>Custos: </b></label><br>
					<textarea class="form-control" name="nome" rows="5" cols="80" /><?php echo utf8_encode($row_proposta['resumo_proposta']); ?></textarea><br><br>

					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" value="1" id="checkbox">
						<label class="custom-control-label" for="checkbox">Análise finalizada?</label> <br><br>
					</div>

					<div class="py-5 text-center">
						<button class="btn btn-outline-secondary" href="#">Editar</button>
					</div>
				</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>