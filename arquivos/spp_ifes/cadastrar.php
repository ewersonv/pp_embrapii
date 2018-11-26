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
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<div class="container">
      		<div class="py-5 text-center">
			  <h1>Nova proposta</h1>
			</div>

				<form method="POST" action="proc_cad_formulario.php">
					<div class="col-md-12 mb-3">

						<label><b>Nome do projeto: </b></label><br>
						<input type="text" class="form-control" name="nome_produto" placeholder="Nome completo" required><br><br>
						<div class="invalid-feedback">
							Campo "Nome do produto" inválido.
						</div>

						<label><b>Resumo da proposta: </b></label><br>
						<textarea type="text" class="form-control" name="resumo_proposta" rows="5" cols="80" placeholder="Resumo com os pontos mais importantes sobre a proposta" required/></textarea><br><br>
						<div class="invalid-feedback">
							Campo "Resumo da proposta" inválido.
						</div>

						<label><b>Justificativa: </b></label><br>
						<textarea type="text" class="form-control" name="justificativa" rows="5" cols="80" placeholder="Justificativa para criação do produto"/></textarea><br><br>						

						<label><b>Nome da empresa: </b></label><br>
						<input type="text" class="form-control" name="nome_empresa" placeholder="Digite o nome completo" required><br><br>
						<div class="invalid-feedback">
							Campo "Nome da empresa" inválido.
						</div>

						<label><b>CNPJ: </b></label><br>
						<input type="text" class="form-control" name="cnpj" placeholder="Apenas números" required><br><br>
						<div class="invalid-feedback">
							Campo "CNPJ" inválido.
						</div>

						<label><b>Tipo de empresa: </b></label><br>
						<div class="custom-control custom-radio">
							<input id="MEI/ME" name="tipo_empresa" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="MEI/ME" value="MEI/ME">MEI/ME</label> <br>
						</div>
						<div class="custom-control custom-radio">
							<input id="EPP" name="tipo_empresa" type="radio" class="custom-control-input">
							<label class="custom-control-label" for="EPP" value="EPP">EPP</label> <br>
						</div>
						<div class="custom-control custom-radio">
							<input id="Médio/Grande porte" name="tipo_empresa" type="radio" class="custom-control-input">
							<label class="custom-control-label" for="Médio/Grande porte" value="Médio/Grande porte">Médio/Grande porte</label> <br><br>
						</div>

						<label><b>Tipo de proposta: </b></label><br>
						<div class="custom-control custom-radio">
							<input id="Projeto de inovação tecnológico" name="tipo_proposta" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="Projeto de inovação tecnológico" >Projeto de inovação tecnológico</label> <br>
						</div>
						<div class="custom-control custom-radio">
							<input id="Prestação de serviço tecnológico" name="tipo_proposta" type="radio" class="custom-control-input" >
							<label class="custom-control-label" for="Prestação de serviço tecnológico" >Prestação de serviço tecnológico</label> <br><br>
						</div>

						<label><b>Prospectado por: </b></label><br>
						<input type="text" class="form-control" name="nome_pessoa" placeholder="Digite o nome completo" required><br><br>
						<div class="invalid-feedback">
							Campo "Prospectado por" inválido.
						</div>

						<label><b>Representante do(a): </b></label><br>
						<div class="custom-control custom-radio">
							<input id="Ifes" name="tipo_representante" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="Ifes" value="Ifes">Ifes</label> <br>
						</div>
						<div class="custom-control custom-radio">
							<input id="Empresa" name="tipo_representante" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="Empresa" value="Empresa">Empresa</label> <br><br>
						</div>

						<label><b>Cargo: </b></label><br>
						<input type="text" class="form-control" name="cargo" placeholder="Cargo que ocupa na instituição" ><br><br>

						<label><b>Email: </b></label><br>
						<input type="email" class="form-control" name="email" placeholder="abcd@email.com" required><br><br>
						<div class="invalid-feedback">
							Campo "Email" inválido.
						</div>

						<label><b>Telefone: </b></label><br>
						<input type="text" class="form-control" name="telefone" placeholder="27888889999"><br><br>

						<label><b>Riscos: </b></label><br>
						<textarea type="text" class="form-control" name="riscos" rows="5" cols="80" placeholder="Riscos inerentes ao andamento/execução do projeto"/></textarea><br><br>

						<label><b>Restrições: </b></label><br>
						<textarea type="text" class="form-control" name="restricoes" rows="5" cols="80" placeholder="Restrições quanto a implementação do projeto"/></textarea><br><br>

						<label><b>Partes interessadas: </b></label><br>
						<textarea type="text" class="form-control" name="partes_interessadas" rows="5" cols="80" placeholder="Empresas que tem interesse no projeto"/></textarea><br><br>

						<label><b>Equipe do projeto: </b></label><br>
						<textarea type="text" class="form-control" name="equipe" rows="5" cols="80" placeholder="Pessoas envolvidas no projeto"/></textarea><br><br>

						<label><b>Entregas: </b></label><br>
						<textarea type="text" class="form-control" name="entregas" rows="5" cols="80" placeholder="Entregas do projeto"/></textarea><br><br>

						<label><b>Cronograma: </b></label><br>
						<textarea type="text" class="form-control" name="cronograma" rows="5" cols="80" placeholder="Datas para realização das entregas"/></textarea><br><br>

						<label><b>Premissas: </b></label><br>
						<textarea type="text" class="form-control" name="premissas" rows="5" cols="80" placeholder="Pontos de partida para realização do projeto"/></textarea><br><br>

						<label><b>Efeitos do projeto: </b></label><br>
						<textarea type="text" class="form-control" name="efeitos" rows="5" cols="80" placeholder="Efeitos do projeto ao ser implementado com sucesso"/></textarea><br><br>

						<label><b>Requisitos: </b></label><br>
						<textarea type="text" class="form-control" name="requisitos" rows="5" cols="80" placeholder="Pontos necessários para realização do projeto"/></textarea><br><br>

						<label><b>Custos: </b></label><br>
						<textarea type="text" class="form-control" name="custo" rows="5" cols="80" placeholder="Custo total e detalhado do projeto"/></textarea><br><br>

						<div class="py-5 text-center">
							<button class="btn btn-dark" href="#">Cadastrar</button>
						</div>
					</div>
				</form>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>