<?php
include_once("../controller/sessao.php");
include_once("header.php");
$_SESSION['submit'] = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h2 class="mb-0">
					<a class="text-dark">Nova proposta</a>
				</h2>
			</div>

				<form name="formulario" method="POST" action="../controller/proc_nova_proposta.php">
					<div class="col-md-12 mb-3">
						<small>*Campo obrigatório</small><br><br>

						<label><b>Nome do projeto*: </b></label><br>
						<input type="text" class="form-control" name="nome_projeto" placeholder="Nome do projeto" maxlength="100" required><br><br>

						<label><b>Nome do produto que será desenvolvido*: </b></label>
						<input type="text" class="form-control" name="nome_produto" placeholder="Nome do produto" maxlength="100" required><br><br>
						
						<label><b>Descrição do produto: </b></label>
						<textarea type="text" class="form-control" name="descricao" rows="5" cols="80" placeholder="Descrição do produto, suas características e finalidade" maxlength="4000"/></textarea><br><br>
						
						<label><b>Nome da empresa*: </b></label><br>
						<input type="text" class="form-control" name="nome_empresa" placeholder="Nome da empresa" maxlength="100" required><br><br>

						<label><b>CNPJ*: </b></label><br>
						<input type="text" class="form-control" name="cnpj" placeholder="Apenas números" maxlength="14" required><br><br>

						<label><b>Tipo de empresa*: </b></label><br>
						<div class="custom-control custom-radio">
							<input id="MEI/ME" name="tipo_empresa" type="radio" class="custom-control-input" value="MEI/ME">
							<label class="custom-control-label" for="MEI/ME">MEI/ME</label> <br>
						</div>
						<div class="custom-control custom-radio">
							<input id="EPP" name="tipo_empresa" type="radio" class="custom-control-input" value="EPP">
							<label class="custom-control-label" for="EPP">EPP</label> <br>
						</div>
						<div class="custom-control custom-radio">
							<input id="Médio/Grande porte" name="tipo_empresa" type="radio" class="custom-control-input" value="Médio/Grande porte">
							<label class="custom-control-label" for="Médio/Grande porte">Médio/Grande porte</label> <br><br>
						</div>

						<label><b>Riscos: </b></label><br>
						<textarea type="text" class="form-control" name="riscos" rows="5" cols="80" placeholder="Riscos inerentes ao andamento/execução do projeto" maxlength="2000"/></textarea><br><br>

						<label><b>Partes interessadas: </b></label><br>
						<textarea type="text" class="form-control" name="interessados" rows="5" cols="80" placeholder="Empresas que têm interesse no projeto" maxlength="2000"/></textarea><br><br>

						<label><b>Viabilidade: </b></label><br>
						<textarea type="text" class="form-control" name="viabilidade" rows="5" cols="80" placeholder="Fatores que propiciam a viabilidade do projeto" maxlength="2000"/></textarea><br><br>
						
						<label><b>Equipe do projeto: </b></label><br>
						<textarea type="text" class="form-control" name="equipe" rows="5" cols="80" placeholder="Pessoas envolvidas no projeto" maxlength="2000"/></textarea><br><br>

						<label><b>Entregas: </b></label><br>
						<textarea type="text" class="form-control" name="entregas" rows="5" cols="80" placeholder="Entregas do projeto" maxlength="2000"/></textarea><br><br>

						<label><b>Cronograma: </b></label><br>
						<textarea type="text" class="form-control" name="cronograma" rows="5" cols="80" placeholder="Datas para realização das entregas" maxlength="2000"/></textarea><br><br>

						<label><b>Premissas: </b></label><br>
						<textarea type="text" class="form-control" name="premissas" rows="5" cols="80" placeholder="Pontos de partida para realização do projeto" maxlength="2000"/></textarea><br><br>

						<label><b>Efeitos do projeto: </b></label><br>
						<textarea type="text" class="form-control" name="efeitos" rows="5" cols="80" placeholder="Efeitos do projeto ao ser implementado com sucesso" maxlength="2000"/></textarea><br><br>

						<label><b>Custo: </b></label><br>
						<textarea type="text" class="form-control" name="custo" rows="5" cols="80" placeholder="Custo total e detalhado do projeto" maxlength="2000"/></textarea><br><br>

						<label><b>Anotações complementares: </b></label><br>
						<textarea type="text" class="form-control" name="anotacoes_complementares" rows="5" cols="80" placeholder="Informações adicionais sobre o projeto" maxlength="2000"/></textarea>

						<div class="py-5 text-center">
							<button class="btn mr-2 btn-dark" type="button" onclick="validate()">Cadastrar</button>
						</div>
					</div>
				</form>
		</div>
	<script>
		function validate() {
			var regex = /^(?!.*\s)[0-9]*$/;

			if (formulario.nome_projeto.value == '') {
				formulario.nome_projeto.focus();
				return false;
			}
			if (formulario.nome_produto.value == '') {
				formulario.nome_produto.focus();
				return false;
			}
			if (formulario.nome_empresa.value == '') {
				formulario.nome_empresa.focus();
				return false;
			}
			if (formulario.cnpj.value == '') {
				formulario.cnpj.focus();
				return false;
			}
			if (formulario.tipo_empresa.value == '') {
				alert('Escolha um tipo de empresa.');
				return false;
			}
			if (formulario.cnpj.value.length < 14) {
				alert('Número de CNPJ inválido.');
				formulario.cnpj.focus();
				return false;
			}
			else if(!regex.exec(formulario.cnpj.value)) {
				alert("Número de CNPJ inválido");
				formulario.cnpj.focus();
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