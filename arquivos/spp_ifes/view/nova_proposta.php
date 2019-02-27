<?php
session_start();
if(empty($_SESSION['id'])){
	$_SESSION['msg'] = "Faça login para acessar a plataforma";
	header("Location: login.php");
}
include_once("header.html");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Nova proposta</h1>
			</div>

				<form method="POST" action="../controller/proc_cad_formulario.php">
					<div class="col-md-12 mb-3">

						<label><b>Nome do projeto: </b></label><br>
						<input type="text" class="form-control" name="nome_projeto" placeholder="Nome do projeto" required><br><br>
						<div class="invalid-feedback">
							Campo "Nome do projeto" inválido.
						</div>

						<label><b>Nome do produto que será desenvolvido: </b></label>
						<input type="text" class="form-control" name="nome_produto" placeholder="Nome do produto" required><br><br>
						
						<label><b>Descrição do produto: </b></label>
						<textarea type="text" class="form-control" name="descricao_produto" rows="5" cols="80" placeholder="Descrição do produto, suas características e finalidade"/></textarea><br><br>
						
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

						<label><b>Prospectado por: </b></label><br>
						<input type="text" class="form-control" name="nome_pessoa" placeholder="Digite o nome completo" required><br><br>
						<div class="invalid-feedback">
							Campo "Prospectado por" inválido.
						</div>

						<label><b>Email: </b></label><br>
						<input type="email" class="form-control" name="email" placeholder="abcd@email.com" required><br><br>
						<div class="invalid-feedback">
							Campo "Email" inválido.
						</div>

						<label><b>Telefone: </b></label><br>
						<input type="text" class="form-control" name="telefone" placeholder="27888889999" required><br><br>

						<label><b>Riscos: </b></label><br>
						<textarea type="text" class="form-control" name="riscos" rows="5" cols="80" placeholder="Riscos inerentes ao andamento/execução do projeto"/></textarea><br><br>

						<label><b>Partes interessadas: </b></label><br>
						<textarea type="text" class="form-control" name="interessados" rows="5" cols="80" placeholder="Empresas que tem interesse no projeto"/></textarea><br><br>

						<label><b>Viabilidade: </b></label><br>
						<textarea type="text" class="form-control" name="viabilidade" rows="5" cols="80" placeholder="Fatores que propiciam a viabilidade do projeto"/></textarea><br><br>
						
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

						<label><b>Custo: </b></label><br>
						<textarea type="text" class="form-control" name="custo" rows="5" cols="80" placeholder="Custo total e detalhado do projeto"/></textarea><br><br>

						<label><b>Anotações complementares: </b></label><br>
						<textarea type="text" class="form-control" name="anotacoes_complementares" rows="5" cols="80" placeholder="Custo total e detalhado do projeto"/></textarea>

						<div class="py-5 text-center">
							<button class="btn mr-2 btn-outline-dark" href="#">Cadastrar</button>
						</div>
					</div>
				</form>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>