<?php
session_start();
include_once("funcoes.php");

$conn = connect();

$nome = utf8_decode(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$email = utf8_decode(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
$senha = password_hash('123456', PASSWORD_DEFAULT);
$adm = filter_input(INPUT_POST, 'adm', FILTER_SANITIZE_NUMBER_INT);

/* verificar se email já existe no BD */

$query = "INSERT INTO usuario (nome, email, senha, adm) VALUES ('$nome', '$email', '$senha', '$adm')";
$result = mysqli_query($conn, $query);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Prospectador cadastrado com sucesso!</p>";
	header("Location: ../view/configuracoes.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>As alterações não foram salvas.</p>";
	header("Location: ../view/configuracoes.php");
}

?>