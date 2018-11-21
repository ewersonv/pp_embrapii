<?php
session_start();
include_once("funcoes.php");

$nome_produto = utf8_decode(filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING));
$resumo_proposta = utf8_decode(filter_input(INPUT_POST, 'resumo_proposta', FILTER_SANITIZE_STRING));
$justificativa = utf8_decode(filter_input(INPUT_POST, 'justificativa', FILTER_SANITIZE_STRING));
$nome_empresa = utf8_decode(filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING));
$cnpj = utf8_decode(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING));
$tipo_empresa = utf8_decode(filter_input(INPUT_POST, 'tipo_empresa', FILTER_SANITIZE_STRING));
$tipo_proposta = utf8_decode(filter_input(INPUT_POST, 'tipo_proposta', FILTER_SANITIZE_STRING));
$nome_pessoa = utf8_decode(filter_input(INPUT_POST, 'nome_pessoa', FILTER_SANITIZE_STRING));
$tipo_representante = utf8_decode(filter_input(INPUT_POST, 'tipo_representante', FILTER_SANITIZE_STRING));
$cargo = utf8_decode(filter_input(INPUT_POST, 'tipo_representante', FILTER_SANITIZE_STRING));
$email = utf8_decode(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$telefone = utf8_decode(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
$riscos = utf8_decode(filter_input(INPUT_POST, 'riscos', FILTER_SANITIZE_STRING));
$restricoes = utf8_decode(filter_input(INPUT_POST, 'restricoes', FILTER_SANITIZE_STRING));
$partes_interessadas = utf8_decode(filter_input(INPUT_POST, 'partes_interessadas', FILTER_SANITIZE_STRING));
$equipe = utf8_decode(filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_STRING));
$entregas = utf8_decode(filter_input(INPUT_POST, 'entregas', FILTER_SANITIZE_STRING));
$cronograma = utf8_decode(filter_input(INPUT_POST, 'cronograma', FILTER_SANITIZE_STRING));
$premissas = utf8_decode(filter_input(INPUT_POST, 'premissas', FILTER_SANITIZE_STRING));
$efeitos = utf8_decode(filter_input(INPUT_POST, 'efeitos', FILTER_SANITIZE_STRING));
$requisitos = utf8_decode(filter_input(INPUT_POST, 'requisitos', FILTER_SANITIZE_STRING));
$custo = utf8_decode(filter_input(INPUT_POST, 'custo', FILTER_SANITIZE_STRING));

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

/*$result_usuario = "INSERT INTO pessoa (nome, email, created) VALUES ('$nome', '$email', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Proposta cadastrada com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Proposta não foi cadastrada com sucesso</p>";
	header("Location: cadastrar.php");
}*/

$result_proposta = "INSERT INTO proposta (tipo_proposta, resumo_proposta)
VALUES ('$tipo_proposta', '$resumo_proposta')";
$resultado_proposta = mysqli_query(connect(), $result_proposta);


$result_pessoa = "INSERT INTO pessoa (nome_pessoa, email, telefone, tipo_representante, cargo)
VALUES ('$nome_pessoa', '$email', '$telefone', '$tipo_representante', '$cargo')";
$resultado_pessoa = mysqli_query(connect(), $result_pessoa);


$result_produto = "INSERT INTO produto (nome_produto, justificativa)
VALUES ('$nome_produto', '$justificativa')";
$resultado_produto = mysqli_query(connect(), $result_produto);


$result_empresa = "INSERT INTO empresa (nome_empresa, cnpj, tipo_empresa)
VALUES ('$nome_empresa', '$cnpj', '$tipo_empresa')";
$resultado_empresa = mysqli_query(connect(), $result_empresa);


$result_projeto = "INSERT INTO projeto (riscos, restricoes, partes_interessadas, entregas, premissas, efeitos, requisitos, custo, cronograma, equipe)
VALUES ('$riscos', '$restricoes', '$partes_interessadas', '$entregas', '$premissas', '$efeitos', '$requisitos', '$custo', '$cronograma', '$equipe')";
$resultado_projeto = mysqli_query(connect(), $result_projeto);

if(mysqli_insert_id(connect())){
	$_SESSION['msg'] = "<p style='color:green;'>Proposta cadastrada com sucesso!</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar a proposta.</p>";
	header("Location: listar.php?id=$id");
}