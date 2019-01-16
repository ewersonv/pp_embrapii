<?php
session_start();
include_once("funcoes.php");

$nome_projeto = utf8_decode(filter_input(INPUT_POST, 'nome_projeto', FILTER_SANITIZE_STRING));
$nome_produto =  utf8_decode(filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING));
$descricao_produto = utf8_decode(filter_input(INPUT_POST, 'descricao_produto', FILTER_SANITIZE_STRING));
$nome_empresa = utf8_decode(filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING));
$cnpj = utf8_decode(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING));
$tipo_empresa = utf8_decode($_POST['tipo_empresa']);
$nome_pessoa = utf8_decode(filter_input(INPUT_POST, 'nome_pessoa', FILTER_SANITIZE_STRING));
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


$conn = connect();

$prequery = "SELECT nome_pessoa FROM pessoa WHERE nome_pesssoa like '$nome_pessoa'";
$result = mysqli_query($conn, $prequery);
if ($result == 0)
{
	$query = "INSERT INTO pessoa (nome_pessoa, email, telefone)
	VALUES ('$nome_pessoa', '$email', '$telefone')";
	$result = mysqli_query($conn, $query);
	$id_pessoa = mysqli_insert_id($conn);
}
else
{
	$id_pessoa = getIdPessoa($nome_pessoa);
}

$prequery = "SELECT nome_empresa FROM empresa WHERE nome_empresa like '$nome_empresa'";
$result = mysqli_query($conn, $prequery);
if ($result == 0)
{
	$query = "INSERT INTO empresa (nome_empresa, cnpj, tipo_empresa)
	VALUES ('$nome_empresa', '$cnpj', '$tipo_empresa')";
	$result = mysqli_query($conn, $query);
	$id_empresa = mysqli_insert_id($conn);
}
else
{
	$id_empresa = getIdEmpresa($nome_empresa);
}


$query = "INSERT INTO projeto (nome_projeto, riscos, interessados, viabilidade, equipe, entregas, cronograma, premissas, efeitos, custo, anotacoes_complementares, id_empresa, id_pessoa)
VALUES ('$nome_projeto', '$riscos', '$interessados', '$viabilidade', '$equipe', '$entregas', '$cronograma', '$premissas', '$efeitos', '$custo', '$anotacoes_complementares', '$id_empresa', '$id_pessoa')";
$result = mysqli_query($conn, $query);
$id_projeto = mysqli_insert_id($conn);


$query = "INSERT INTO produto (nome_produto, descricao_produto, id_projeto)
VALUES ('$nome_produto', '$descricao_produto', '$id_projeto')";
$result = mysqli_query($conn, $query);


if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style = 'color:green;'>Proposta cadastrada com sucesso!</p>";
	header("Location: ../view/listar.php");
}else{
	$_SESSION['msg'] = "<p style = 'color:red;'>Não foi possível cadastrar a proposta.</p>";
	header("Location: ../view/listar.php?id=$id");
}