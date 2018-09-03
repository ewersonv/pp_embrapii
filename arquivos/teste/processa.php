<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$checkbox1 = filter_input(INPUT_POST, 'cb1', FILTER_SANITIZE_STRING); /* */
$nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$checkbox2 = filter_input(INPUT_POST, 'cb3', FILTER_SANITIZE_STRING); /* */
$checkbox3 = filter_input(INPUT_POST, 'cb5', FILTER_SANITIZE_STRING); /* */
$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING);
$justificativa_projeto = filter_input(INPUT_POST, 'justificativa_projeto', FILTER_SANITIZE_STRING);

/* Descobrir como pegar apenas 1 checkbox automaticamente */


$insert1 = "INSERT INTO pessoa (tipo_pessoa, nome, email, telefone, created) VALUES ('$checkbox1','$nome', '$email', $telefone, NOW())";
$resultado_insert1 = mysqli_query($conn, $insert1);
if(mysqli_insert_id($conn))
{
	$insert2 = "INSERT INTO pessoa (tipo_pessoa, nome, email, telefone, created) VALUES ('$checkbox','$nome', '$email', $telefone, NOW())";
	$resultado_insert2 = mysqli_query($conn, $insert2);
}
else
{
	/* Retornar o campo em que ocorreu o erro para o usuário consertar */
}


if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Pessoa cadastrada com sucesso</p>";
	header("Location: index.php");
}
else
{
	$_SESSION['msg'] = "<p style='color:red;'>Pessoa não foi cadastrada com sucesso</p>";
	header("Location: index.php");
}