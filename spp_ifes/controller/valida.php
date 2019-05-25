<?php
session_start();
include_once("../model/conexao.php");
include_once("../model/usuarios/funcoes_usuarios.php");

if($_SESSION['submit'] == 1)
{
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

	if((!empty($email)) AND (!empty($senha)))
	{
		//Pesquisar o usuário no BD
		$conn = connect();
		$resultado = getUsuario($conn, $email);
		$row = mysqli_fetch_assoc($resultado);
		
		if($row != "")
		{

			if($row['status'] == 0)
			{
				/* Fecha a conexão com o banco de dados */
				closeConnection($conn);

				$_SESSION['msg'] = "<p style='color:red;'>Usuário desativado. Solicite a reativação à um administrador.</p><br><br>";
				header("Location: ../view/login.php");
			}
			elseif(password_verify($senha, $row['senha']))
			{
				updateAcessoUsuario($conn, $row['id']);

				/* Fecha a conexão com o banco de dados */
				closeConnection($conn);
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['nome'] = $row['nome'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['tipo'] = $row['tipo'];
				$_SESSION['submit'] = 0;
				header("Location: ../view/index.php");
			}
			else
			{
				/* Fecha a conexão com o banco de dados */
				closeConnection($conn);

				$_SESSION['msg'] = "<p style='color:red;'>Senha incorreta.</p><br><br>";
				header("Location: ../view/login.php");
			}
		}
		else
		{
			$_SESSION['msg'] = "<p style='color:red;'>Não existe usuário associado ao email inserido.</p><br><br>";
			header("Location: ../view/login.php");
		}
	}
	else
	{
		$_SESSION['msg'] = "<p style='color:red;'>Preencha todos os campos.</p><br><br>";
		header("Location: ../view/login.php");
	}
}
else
{
	$_SESSION['msg'] = "Página não encontrada <br><br>";
	header("Location: ../view/login.php");
}
