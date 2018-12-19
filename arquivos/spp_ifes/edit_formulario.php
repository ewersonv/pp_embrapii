<?php
session_start();
include_once("sql_edit_formulario.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
		<link href="css/product.css" rel="stylesheet">
		<title>SPP - IFES</title>
		<style>
			#grad1 {
				height: 100%;
				background-color: #F5F5F5; /* For browsers that do not support gradients */
				background-image: linear-gradient(100deg,#F5F5F5,#E0E0E0); /* Standard syntax (must be last) */
			}
		</style>
	</head>
	<body id="grad1">
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
					<input type="hidden" name="id" value="<?php echo utf8_encode($row['id_projeto']); ?>">

					<label><b>Nome do projeto: </b></label><br>
					<input type="text" class="form-control" name="nome_projeto" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['nome_projeto']); ?>"><br><br>

					<label><b>Nome do produto que será desenvolvido: </b></label><br>
					<input type="text" class="form-control" name="nome_produto" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['nome_produto']); ?>"><br><br>
					
					<label><b>Descrição do produto: </b></label><br>
					<textarea type="text" class="form-control" name="descricao_produto" rows="5" cols="80" /><?php echo utf8_encode($row['descricao_produto']); ?></textarea><br><br>
					
					<label><b>Nome da empresa: </b></label><br>
					<input type="text" class="form-control" name="nome_empresa" readonly="readonly" value="<?php echo utf8_encode($row['nome_empresa']); ?>"><br><br>

					<label><b>CNPJ: </b></label><br>
					<input type="text" class="form-control" name="cnpj" readonly="readonly" value="<?php echo utf8_encode($row['cnpj']); ?>"><br><br>

					<label><b>Tipo de empresa: </b></label><br>
					<div class="custom-control custom-radio">
						<input id="MEI/ME" name="tipo_empresa" type="radio" class="custom-control-input">
						<label class="custom-control-label" for="MEI/ME" value="MEI/ME" <?php echo (utf8_encode($row['tipo_empresa'])=='MEI/ME')?'checked':'' ?>>MEI/ME</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="EPP" name="tipo_empresa" type="radio" class="custom-control-input">
						<label class="custom-control-label" for="EPP" value="EPP"<?php echo (utf8_encode($row['tipo_empresa'])=='EPP')?'checked':'' ?>>EPP</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="MEI/ME" name="tipo_empresa" type="radio" class="custom-control-input">
						<label class="custom-control-label" for="Médio/Grande porte" value="Médio/Grande porte"<?php echo (utf8_encode($row['tipo_empresa'])=='Médio/Grande porte')?'checked':'' ?>>Médio/Grande porte</label> <br><br>
					</div>

					<label><b>Prospectado por: </b></label><br>
					<input type="text" class="form-control" name="nome_pessoa" readonly="readonly" value="<?php echo utf8_encode($row['nome_pessoa']); ?>"><br><br>
					
					<label><b>Email: </b></label><br>
					<input type="email" class="form-control" name="email" readonly="readonly" value="<?php echo utf8_encode($row['email']); ?>"><br><br>

					<label><b>Telefone: </b></label><br>
					<input type="text" class="form-control" name="telefone" readonly="readonly" value="<?php echo utf8_encode($row['telefone']); ?>"><br><br>

					<label><b>Riscos: </b></label><br>
					<textarea type="text" class="form-control" name="riscos" rows="5" cols="80" /><?php echo utf8_encode($row['riscos']); ?></textarea><br><br>

					<label><b>Partes interessadas: </b></label><br>
					<textarea type="text" class="form-control" name="interessados" rows="5" cols="80" /><?php echo utf8_encode($row['interessados']); ?></textarea><br><br>

					<label><b>Viabilidade: </b></label><br>
					<textarea type="text" class="form-control" name="viabilidade" rows="5" cols="80" /><?php echo utf8_encode($row['viabilidade']); ?></textarea><br><br>

					<label><b>Equipe do projeto: </b></label><br>
					<textarea type="text" class="form-control" name="equipe" rows="5" cols="80" /><?php echo utf8_encode($row['equipe']); ?></textarea><br><br>

					<label><b>Entregas: </b></label><br>
					<textarea type="text" class="form-control" name="entregas" rows="5" cols="80" /><?php echo utf8_encode($row['entregas']); ?></textarea><br><br>

					<label><b>Cronograma: </b></label><br>
					<textarea type="text" class="form-control" name="cronograma" rows="5" cols="80" /><?php echo utf8_encode($row['cronograma']); ?></textarea><br><br>

					<label><b>Premissas: </b></label><br>
					<textarea type="text" class="form-control" name="premissas" rows="5" cols="80" /><?php echo utf8_encode($row['premissas']); ?></textarea><br><br>

					<label><b>Efeitos do projeto: </b></label><br>
					<textarea type="text" class="form-control" name="efeitos" rows="5" cols="80" /><?php echo utf8_encode($row['efeitos']); ?></textarea><br><br>

					<label><b>Custo: </b></label><br>
					<textarea type="text" class="form-control" name="custo" rows="5" cols="80" /><?php echo utf8_encode($row['custo']); ?></textarea><br><br>

					<label><b>Anotações complementares: </b></label><br>
					<textarea type="text" class="form-control" name="anotacoes_complementares" rows="5" cols="80" /><?php echo utf8_encode($row['anotacoes_complementares']); ?></textarea><br><br>

					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" value="1" id="checkbox">
						<label class="custom-control-label" for="checkbox">Análise finalizada?</label> <br><br>
					</div>

					<div class="py-5 text-center">
						<button class="btn btn-dark" href="proc_edit_formulario.php">Preencher</button>
					</div>
				</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>