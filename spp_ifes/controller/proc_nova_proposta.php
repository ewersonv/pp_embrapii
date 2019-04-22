<?php
session_start();
include_once("../model/conexao.php");
include_once("../model/propostas/funcoes_propostas.php");

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
	$_SESSION['submit'] = 0;

	$nome_projeto = utf8_decode(filter_input(INPUT_POST, 'nome_projeto', FILTER_SANITIZE_STRING));
	$nome_produto =  utf8_decode(filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING));
	$descricao = utf8_decode(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
	$nome_empresa = utf8_decode(filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING));
	$cnpj = utf8_decode(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING));
	$tipo_empresa = utf8_decode($_POST['tipo_empresa']);
	$nome_usuario = utf8_decode(filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING));
	$email = utf8_decode(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
	$telefone = utf8_decode(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
	$riscos = utf8_decode(filter_input(INPUT_POST, 'riscos', FILTER_SANITIZE_STRING));
	$interessados = utf8_decode(filter_input(INPUT_POST, 'interessados', FILTER_SANITIZE_STRING));
	$viabilidade = utf8_decode(filter_input(INPUT_POST, 'viabilidade', FILTER_SANITIZE_STRING));
	$equipe = utf8_decode(filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_STRING));
	$entregas = utf8_decode(filter_input(INPUT_POST, 'entregas', FILTER_SANITIZE_STRING));
	$cronograma = utf8_decode(filter_input(INPUT_POST, 'cronograma', FILTER_SANITIZE_STRING));
	$premissas = utf8_decode(filter_input(INPUT_POST, 'premissas', FILTER_SANITIZE_STRING));
	$efeitos = utf8_decode(filter_input(INPUT_POST, 'efeitos', FILTER_SANITIZE_STRING));
	$custo = utf8_decode(filter_input(INPUT_POST, 'custo', FILTER_SANITIZE_STRING));
	$anotacoes_complementares = utf8_decode(filter_input(INPUT_POST, 'anotacoes_complementares', FILTER_SANITIZE_STRING));
	$finalizado = 0; /* 0 pois a proposta acabou de ser criada */


	$conn = connect();

	$id_usuario = $_SESSION['id'];

	$resultado = verificaNomeEmpresa($conn, $nome_empresa);
	if ($resultado < 1) /* se a empresa não existe no BD */
	{
		insertEmpresa($conn, $nome_empresa, $cnpj, $tipo_empresa);
		$id_empresa = mysqli_insert_id($conn);
	}
	else
	{
		$id_empresa = getIdEmpresa($nome_empresa);
	}


	insertProjeto($conn, $nome_projeto, $riscos, $interessados, $viabilidade, $equipe, $entregas, $cronograma, $premissas, $efeitos, $custo, $anotacoes_complementares, $finalizado, $id_empresa, $id_usuario);
	$id_projeto = mysqli_insert_id($conn);

	insertProduto($conn, $nome_produto, $descricao, $id_projeto);


	if(mysqli_affected_rows($conn)){
		/* Fecha a conexão com o banco de dados */
		closeConnection($conn);

		$_SESSION['msg'] = "<p style = 'color:green;'>Proposta cadastrada com sucesso!</p>";
		header("Location: ../view/listar.php");
	}else{
		/* Fecha a conexão com o banco de dados */
		closeConnection($conn);
		
		$_SESSION['msg'] = "<p style = 'color:red;'>Não foi possível cadastrar a proposta.</p>";
		header("Location: ../view/listar.php?id=$id");
	}
}

?>