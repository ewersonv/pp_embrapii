<?php
session_start();
include_once("funcoes.php");
$conn = connect();

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin){
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($email)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$query = "SELECT id, nome, email, senha, adm FROM usuario WHERE email LIKE '$email' LIMIT 1";
		$resultado = mysqli_query($conn, $query);
		if($resultado){
			$row = mysqli_fetch_assoc($resultado);
			if(password_verify($senha, $row['senha'])){
				$_SESSION['id'] = $row['id'];
				$_SESSION['nome'] = $row['nome'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['adm'] = $row['adm'];
				header("Location: ../view/index.php");
			}else{
				$_SESSION['msg'] = "Login ou senha incorretos!";
				header("Location: ../view/login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login ou senha incorretos!";
		header("Location: ../view/login.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: ../view/login.php");
}
