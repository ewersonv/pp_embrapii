<?php
session_start();
include_once("funcoes.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING);
$resumo_proposta = filter_input(INPUT_POST, 'resumo_proposta', FILTER_SANITIZE_STRING);
$justificativa = filter_input(INPUT_POST, 'justificativa', FILTER_SANITIZE_STRING);
$nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$tipo_empresa = filter_input(INPUT_POST, 'tipo_empresa', FILTER_SANITIZE_STRING);
$tipo_proposta = filter_input(INPUT_POST, 'tipo_proposta', FILTER_SANITIZE_STRING);
$nome_pessoa = filter_input(INPUT_POST, 'nome_pessoa', FILTER_SANITIZE_STRING);
$tipo_representante = filter_input(INPUT_POST, 'tipo_representante', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'tipo_representante', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$riscos = filter_input(INPUT_POST, 'riscos', FILTER_SANITIZE_STRING);
$restricoes = filter_input(INPUT_POST, 'restricoes', FILTER_SANITIZE_STRING);
$partes_interessadas = filter_input(INPUT_POST, 'partes_interessadas', FILTER_SANITIZE_STRING);
$equipe = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_STRING);
$entregas = filter_input(INPUT_POST, 'entregas', FILTER_SANITIZE_STRING);
$cronograma = filter_input(INPUT_POST, 'cronograma', FILTER_SANITIZE_STRING);
$premissas = filter_input(INPUT_POST, 'premissas', FILTER_SANITIZE_STRING);
$efeitos = filter_input(INPUT_POST, 'efeitos', FILTER_SANITIZE_STRING);
$requisitos = filter_input(INPUT_POST, 'requisitos', FILTER_SANITIZE_STRING);
$custo = filter_input(INPUT_POST, 'custo', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$id_empresa = getIdEmpresa($id);
$id_pessoa = getIdPessoa($id);
$id_projeto = getIdProjeto($id);
$id_produto = getIdProduto($id);


$result_pessoa = "UPDATE pessoa
SET nome_pessoa='$nome_pessoa', email='$email', telefone='$telefone', tipo_representante='$tipo_representante', cargo='$cargo'
WHERE id_pessoa ='$id_pessoa'";
$resultado_pessoa = mysqli_query(connect(), $result_pessoa);


$result_produto = "UPDATE produto
SET nome_produto='$nome_produto', justificativa='$justificativa'
WHERE id_produto ='$id_produto'";
$resultado_produto = mysqli_query(connect(), $result_produto);


$result_empresa = "UPDATE empresa
SET nome_empresa='$nome_empresa', cnpj='$cnpj', tipo_empresa='$tipo_empresa'
WHERE id_empresa ='$id_empresa'";
$resultado_empresa = mysqli_query(connect(), $result_empresa);


$result_projeto = "UPDATE projeto
SET riscos='$riscos', restricoes='$restricoes', partes_interessadas='$partes_interessadas', entregas='$entregas', premissas='$premissas', efeitos='$efeitos', requisitos='$requisitos', custo='$custo', cronograma='$cronograma', equipe='$equipe'
WHERE id_projeto ='$id_projeto'";
$resultado_projeto = mysqli_query(connect(), $result_projeto);


$result_proposta = "UPDATE proposta
SET tipo_proposta='$tipo_proposta', resumo_proposta='$resumo_proposta'
WHERE id_proposta ='$id'";
$resultado_proposta = mysqli_query(connect(), $result_proposta);

if(mysqli_affected_rows(connect())){
	$_SESSION['msg'] = "<p style='color:green;'>Formulário editado com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Formulário não foi editado com sucesso</p>";
	header("Location: listar.php?id=$id");
}
