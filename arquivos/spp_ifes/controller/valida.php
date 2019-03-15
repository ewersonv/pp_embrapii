<?php
session_start();
include_once("funcoes.php");
$conn = connect();

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin)
{
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

	if((!empty($email)) AND (!empty($senha)))
	{
		//Pesquisar o usuário no BD
		$resultado = getUsuario($conn, $email);
		
		if($resultado)
		{
			$row = mysqli_fetch_assoc($resultado);

			if(password_verify($senha, $row['senha']))
			{
				$_SESSION['id'] = $row['id'];
				$_SESSION['nome'] = $row['nome'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['tipo'] = $row['tipo'];
				header("Location: ../view/index.php");
			}
			else
			{
				$_SESSION['msg'] = "Login ou senha incorretos! <br><br>";
				header("Location: ../view/login.php");
			}
		}
	}
	else
	{
		$_SESSION['msg'] = "Login ou senha incorretos! <br><br>";
		header("Location: ../view/login.php");
	}
}
else
{
	$_SESSION['msg'] = "Página não encontrada <br><br>";
	header("Location: ../view/login.php");
}
