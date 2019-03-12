<?php
session_start();
include_once("funcoes.php");

$conn = connect();

$nome = utf8_decode(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$telefone = utf8_decode(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$email = utf8_decode(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
$senha = password_hash('123456', PASSWORD_DEFAULT);
$adm = filter_input(INPUT_POST, 'adm', FILTER_SANITIZE_NUMBER_INT);

/* verificar se o nome do usuário já existe no BD */
$prequery = "SELECT nome FROM usuario WHERE nome LIKE '$nome'";
$result = mysqli_query($conn, $prequery);
$row_nome = mysqli_fetch_assoc($result);

/* verificar se email já existe no BD */
$prequery = "SELECT id FROM usuario WHERE email LIKE '$email'";
$result = mysqli_query($conn, $prequery);
$row_email = mysqli_fetch_assoc($result);

if ($row_nome > 0)
{
	$_SESSION['msg'] = "<p style='color:red;'>Este usuário já foi cadastrado anteriormente.</p>";
	header("Location: ../view/cadastrar_prospectador.php");
}
elseif ($row_email > 0)
{
	$_SESSION['msg'] = "<p style='color:red;'>O email inserido já está em uso.</p>";
	header("Location: ../view/cadastrar_prospectador.php");
}
else
{
	$query = "INSERT INTO usuario (nome, telefone, email, senha, adm) VALUES ('$nome', '$telefone', '$email', '$senha', '$adm')";
	$result = mysqli_query($conn, $query);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Prospectador cadastrado com sucesso!</p>";
		header("Location: ../view/configuracoes.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar o prospectador.</p>";
		header("Location: ../view/configuracoes.php");
	}
}

?>