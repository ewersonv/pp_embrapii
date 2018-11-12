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
					<input type="hidden" name="id" value="<?php echo utf8_encode($row['id_proposta']); ?>">

					<label><b>Nome do produto: </b></label><br>
					<input type="text" class="form-control" name="nome_produto" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['nome_produto']); ?>"><br><br>

					<label><b>Resumo da proposta: </b></label><br>
					<textarea type="text" class="form-control" name="resumo_proposta" rows="5" cols="80" /><?php echo utf8_encode($row['resumo_proposta']); ?></textarea><br><br>

					<label><b>Justificativa: </b></label><br>
					<textarea type="text" class="form-control" name="justificativa" rows="5" cols="80" /><?php echo utf8_encode($row['justificativa']); ?></textarea><br><br>

					<label><b>Nome da empresa: </b></label><br>
					<input type="text" class="form-control" name="nome_empresa" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['nome_empresa']); ?>"><br><br>

					<label><b>CNPJ: </b></label><br>
					<input type="text" class="form-control" name="cnpj" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['cnpj']); ?>"><br><br>

					<label><b>Tipo de empresa: </b></label><br>
					<div class="custom-control custom-radio">
						<input name="tipo_empresa" type="radio" class="custom-control-input" checked required>
						<label class="custom-control-label" value="MEI/ME" <?php echo (utf8_encode($row['tipo_empresa'])=='MEI/ME')?'checked':'' ?>>MEI/ME</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input name="tipo_empresa" type="radio" class="custom-control-input" >
						<label class="custom-control-label" value="EPP" <?php echo (utf8_encode($row['tipo_empresa'])=='EPP')?'checked':'' ?>>EPP</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input name="tipo_empresa" type="radio" class="custom-control-input" >
						<label class="custom-control-label" value="Médio/Grande porte" <?php echo (utf8_encode($row['tipo_empresa'])=='Médio/Grande porte')?'checked':'' ?>>Médio/Grande porte</label> <br><br>
					</div>

					<label><b>Tipo de proposta: </b></label><br>
					<div class="custom-control custom-radio">
						<input name="tipo_proposta" type="radio" class="custom-control-input" checked required>
						<label class="custom-control-label" value="Projeto de inovação tecnológico" <?php echo (utf8_encode($row['tipo_proposta'])=='Projeto de inovação tecnológico')?'checked':'' ?>>Projeto de inovação tecnológico</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input name="tipo_proposta" type="radio" class="custom-control-input" >
						<label class="custom-control-label" value="Prestação de serviço tecnológico" <?php echo (utf8_encode($row['tipo_proposta'])=='Prestação de serviço tecnológico')?'checked':'' ?>>Prestação de serviço tecnológico</label> <br><br>
					</div>

					<label><b>Prospectado por: </b></label><br>
					<input type="text" class="form-control" name="nome_pessoa" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['nome_pessoa']); ?>"><br><br>

					<label><b>Representante do(a): </b></label><br>
					<input type="text" class="form-control" name="tipo_representante" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['tipo_representante']); ?>"><br><br>

					<label><b>Cargo: </b></label><br>
					<input type="text" class="form-control" name="cargo" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['cargo']); ?>"><br><br>

					<label><b>Email: </b></label><br>
					<input type="email" class="form-control" name="email" value="<?php echo utf8_encode($row['email']); ?>"><br><br>

					<label><b>Telefone: </b></label><br>
					<input type="text" class="form-control" name="telefone" placeholder="Digite o nome completo" value="<?php echo utf8_encode($row['telefone']); ?>"><br><br>

					<label><b>Riscos: </b></label><br>
					<textarea type="text" class="form-control" name="riscos" rows="5" cols="80" /><?php echo utf8_encode($row['riscos']); ?></textarea><br><br>

					<label><b>Restrições: </b></label><br>
					<textarea type="text" class="form-control" name="restricoes" rows="5" cols="80" /><?php echo utf8_encode($row['restricoes']); ?></textarea><br><br>

					<label><b>Partes interessadas: </b></label><br>
					<textarea type="text" class="form-control" name="partes_interessadas" rows="5" cols="80" /><?php echo utf8_encode($row['partes_interessadas']); ?></textarea><br><br>

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

					<label><b>Requisitos: </b></label><br>
					<textarea type="text" class="form-control" name="requisitos" rows="5" cols="80" /><?php echo utf8_encode($row['requisitos']); ?></textarea><br><br>

					<label><b>Custos: </b></label><br>
					<textarea type="text" class="form-control" name="custo" rows="5" cols="80" /><?php echo utf8_encode($row['custo']); ?></textarea><br><br>

					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" value="1" id="checkbox">
						<label class="custom-control-label" for="checkbox">Análise finalizada?</label> <br><br>
					</div>

					<div class="py-5 text-center">
						<button class="btn btn-dark" href="#">Editar</button>
					</div>
				</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>