<?php
session_start();
if(empty($_SESSION['id'])){
	$_SESSION['msg'] = "Faça login para acessar a plataforma";
	header("Location: login.php");
}
include_once("header.html");
include_once("../controller/funcoes.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$row = getProjeto($id);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Preencher proposta</h1>
				<div class="py-2 text-right">
					<?php
						echo "<p><a class='btn btn-sm mr-4 btn-outline-danger' href='../controller/gerar_pdf.php?id=". $id . "' role='button'>Gerar PDF</a>";
						echo "<a class='btn btn-sm mr-4 btn-outline-success' href='../controller/gerar_planilha.php?id=". $id . "' role='button'>Gerar XLS</a></p>";
					?>
				</div>
			</div>
			
			<!-- USAR ENCODE NO FORM PARA OS DADOS SEREM EXIBIDOS CORRETAMENTE -->

			<form method="POST" action="../controller/proc_edit_proposta.php">
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
						<label class="custom-control-label" for="MEI/ME" value="MEI/ME" <?php echo (utf8_encode($row['tipo_empresa'])=='MEI/ME')?'checked':''?>>MEI/ME</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="EPP" name="tipo_empresa" type="radio" class="custom-control-input">
						<label class="custom-control-label" for="EPP" value="EPP"<?php echo (utf8_encode($row['tipo_empresa'])=='EPP')?'checked':''?>>EPP</label> <br>
					</div>
					<div class="custom-control custom-radio">
						<input id="Médio/Grande porte" name="tipo_empresa" type="radio" class="custom-control-input">
						<label class="custom-control-label" for="Médio/Grande porte" value="Médio/Grande porte"<?php echo (utf8_encode($row['tipo_empresa'])=='Médio/Grande porte')?'checked':''?>>Médio/Grande porte</label> <br><br>
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
						<label class="custom-control-label" for="checkbox">Análise finalizada?</label>
					</div>

					<div class="py-5 text-center">
						<button class="btn mr-2 btn-outline-dark" href="../controller/proc_edit_proposta.php">Preencher</button>
					</div>
				</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>