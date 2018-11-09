<?php
session_start();
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
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<div class="container">
      		<div class="py-5 text-center">
			  <h1>Nova proposta</h1>
			</div>

				<form method="POST" action="proc_cad_formulario.php">
					<div class="col-md-12 mb-3">
						<label><b>Nome do produto: </b></label><br>
						<input type="text" class="form-control" name="nome" placeholder="Nome completo" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Descrição do produto: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Descrição completa do produto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Justificativa: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Justificativa para criação do produto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Nome da empresa: </b></label><br>
						<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>CNPJ: </b></label><br>
						<input type="text" class="form-control" name="nome" placeholder="Apenas números" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Tipo de empresa: </b></label><br>
						<div class="custom-control custom-radio">
                			<input id="MEI/ME" name="tipo_empresa" type="radio" class="custom-control-input" checked required>
							<label class="custom-control-label" for="MEI/ME">MEI/ME</label> <br>
						</div>
						<div class="custom-control custom-radio">
                			<input id="EPP" name="tipo_empresa" type="radio" class="custom-control-input" checked required>
							<label class="custom-control-label" for="EPP">EPP</label> <br>
						</div>
						<div class="custom-control custom-radio">
                			<input id="Médio/Grande porte" name="tipo_empresa" type="radio" class="custom-control-input" checked required>
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
						<input type="text" class="form-control" name="nome" placeholder="Nome completo" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Representante do(a): </b></label><br>
						<input type="text" class="form-control" name="nome" placeholder="Nome do órgão" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Email: </b></label><br>
						<input type="email" class="form-control" name="email" placeholder="abcd@email.com" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Telefone: </b></label><br>
						<input type="text" class="form-control" name="nome" placeholder="27888889999" required><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Riscos: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Riscos inerentes ao andamento/execução do projeto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Restrições: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Restrições quanto a implementação do projeto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Partes interessadas: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Empresas que tem interesse no projeto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Equipe do projeto: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Pessoas envolvidas no projeto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Entregas: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Entregas do projeto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Cronograma: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Datas para realização de entregas" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Premissas: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Datas para realização de entregas" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Efeitos do projeto: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Datas para realização de entregas" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Requisitos: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Datas para realização de entregas" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<label><b>Custos: </b></label><br>
						<textarea class="form-control" name="nome" rows="5" cols="80" placeholder="Custo total e detalhado do projeto" required></textarea><br><br>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>

						<div class="py-5 text-center">
							<button class="btn btn-outline-secondary" href="#">Cadastrar</button>
						</div>
					</div>
				</form>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>