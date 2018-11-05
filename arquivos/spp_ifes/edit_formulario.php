<?php
session_start();
include_once("conexao.php");
include_once("sql_edit_formulario.php");
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
				<a class="py-2 d-none d-md-inline-block" href="index.html">Início</a>
				<a class="py-2 d-none d-md-inline-block" href="listar.php">Listar propostas</a>
				<a class="py-2 d-none d-md-inline-block"href="cadastrar.php">Nova Proposta</a>
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<div class="container">
			<div class="py-5 text-center">
				<h1>Preencher proposta</h1>
			</div>
			
			<!-- USAR ENCODE NO FORM PARA OS DADOS SEREM EXIBIDOS CORRETAMENTE -->

			<form method="POST" action="proc_edit_formulario.php">
				<div class="col-md-12 mb-3">
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
					<div class="custom-control custom-radio">
						<input id="MEI/ME" name="tipo_empresa" type="radio" class="custom-control-input" checked required>
						<label class="custom-control-label" for="MEI/ME">MEI/ME</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="EPP" name="tipo_empresa" type="radio" class="custom-control-input" required>
						<label class="custom-control-label" for="EPP">EPP</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="Médio/Grande porte" name="tipo_empresa" type="radio" class="custom-control-input" required>
						<label class="custom-control-label" for="Médio/Grande porte">Médio/Grande porte</label> <br><br>
					</div>

					<label><b>Tipo de proposta: </b></label><br>
					<div class="custom-control custom-radio">
						<input id="Projeto de inovação tecnológico" name="tipo_proposta" type="radio" class="custom-control-input" checked required>
						<label class="custom-control-label" for="Projeto de inovação tecnológico">Projeto de inovação tecnológico</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="Prestação de serviço tecnológico" name="tipo_proposta" type="radio" class="custom-control-input" required>
						<label class="custom-control-label" for="Prestação de serviço tecnológico">Prestação de serviço tecnológico</label> <br><br>
					</div>

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