<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
/* TABELA PROPOSTA */
$result_proposta = "SELECT * FROM l15kp_proposta WHERE id_proposta = '$id'";
$resultado_proposta = mysqli_query($conn, $result_proposta);
$row_proposta = mysqli_fetch_assoc($resultado_proposta);

/* TABELA EMPRESA */
$result_empresa = "SELECT * FROM l15kp_empresa WHERE id_empresa = '$id'";
$resultado_empresa = mysqli_query($conn, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

/* TABELA PROJETO */
$result_projeto = "SELECT * FROM l15kp_projeto WHERE id_projeto = '$id'";
$resultado_projeto = mysqli_query($conn, $result_projeto);
$row_projeto = mysqli_fetch_assoc($resultado_projeto);

/* TABELA PESSOA */
$result_pessoa = "SELECT * FROM l15kp_pessoa WHERE id_pessoa = '$id'";
$resultado_pessoa = mysqli_query($conn, $result_pessoa);
$row_pessoa = mysqli_fetch_assoc($resultado_pessoa);

/* TABELA PRODUTO */
$result_produto = "SELECT * FROM l15kp_produto WHERE id_produto = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>SPP - IFES</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Preencher proposta</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $row_proposta['id_proposta']; ?>">
			
			<label>Descrição do produto: </label><br>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_proposta['resumo_proposta']; ?>"><br><br>

			<label>Justificativa: </label><br>
			<br><br>

			<label>Nome da empresa: </label><br>
			<br><br>

			<label>CNPJ: </label><br>
			<br><br>

			<label>Tipo de empresa: </label><br>
			<br><br>

			<label>Proposta de: </label><br>
			<br><br>

			<label>Prospectado por: </label><br>
			<br><br>

			<label>Representante do(a): </label><br>
			<br><br>

			<label>Email: </label><br>
			<input type="email" name="email" value="<?php echo $row_pessoa['email']; ?>"><br><br>

			<label>Telefone: </label><br>
			<br><br>

			<label>Riscos: </label><br>
			<br><br>

			<label>Restrições: </label><br>
			<br><br>

			<label>Partes interessadas: </label><br>
			<br><br>

			<label>Equipe do projeto: </label><br>
			<br><br>

			<label>Entregas: </label><br>
			<br><br>

			<label>Cronograma: </label><br>
			<br><br>

			<label>Premissas: </label><br>
			<br><br>

			<label>Efeitos do projeto: </label><br>
			<br><br>

			<label>Requisitos: </label><br>
			<br><br>

			<label>Custos: </label><br>
			<br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>