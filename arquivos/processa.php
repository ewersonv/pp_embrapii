<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$nome_rep = filter_input(INPUT_POST, 'nome_rep', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "CNPJ: $cnpj <br>";
//echo "Nome Representante: $nome_rep <br>";
//echo "E-mail: $email <br>";

$result_empresa = "INSERT INTO empresa (nome, nome_rep, cnpj, email, created) VALUES ('$nome', '$nome_rep', '$cnpj', '$email', NOW())";
$resultado_empresa = mysqli_query($conn, $result_empresa);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Empresa cadastrada com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Empresa não foi cadastrada com sucesso</p>";
	header("Location: index.php");
}