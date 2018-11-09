<?php
session_start();
include_once("funcoes.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE pessoa SET nome='$nome', email='$email', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query(connect(), $result_usuario);

if(mysqli_affected_rows(connect())){
	$_SESSION['msg'] = "<p style='color:green;'>Formulário editado com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Formulário não foi editado com sucesso</p>";
	header("Location: listar.php?id=$id");
}
