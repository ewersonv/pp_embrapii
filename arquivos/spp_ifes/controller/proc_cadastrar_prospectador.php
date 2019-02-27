<?php
session_start();
include_once("funcoes.php");

$conn = connect();

$nome = utf8_decode(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$email = utf8_decode(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
$senha = password_hash(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
$adm = filter_input(INPUT_POST, 'adm', FILTER_SANITIZE_NUMBER_INT);

$query = "INSERT INTO usuario (nome, email, senha, adm) VALUES ('$nome', '$email', '$senha', '$adm')";
$result = mysqli_query($conn, $query);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Prospectador cadastrado com sucesso! $adm</p>";
	header("Location: ../view/configuracoes.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>As alterações não foram salvas.</p>";
	header("Location: ../view/configuracoes.php");
}

?>