<?php
session_start();
include_once("funcoes.php");

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
	$_SESSION['submit'] = 0;

	$conn = connect();

	$nome = utf8_decode(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
	$telefone = utf8_decode(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
	$email = utf8_decode(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
	$senha_sem_hash = gerarSenha(8, true, true, true, false);  /* $tamanho, $maiusculas, $minusculas, $numeros, $simbolos */
	$senha = password_hash($senha_sem_hash, PASSWORD_DEFAULT); /* senha automática para primeiro acesso */
	$tipo = filter_input(INPUT_POST, 'adm', FILTER_SANITIZE_NUMBER_INT);

	/* verificar se o nome do usuário já existe no BD */
	$row_nome = verificaNomeUsuario($conn, $nome);

	/* verificar se email já existe no BD */
	$row_email = verificaEmailUsuario($conn, $email);

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
		insertUsuario($conn, $nome, $telefone, $email, $senha, $tipo);

		if(mysqli_affected_rows($conn)){

			sendMail($nome, $email, $telefone, $senha_sem_hash, $tipo);

			$_SESSION['msg'] = "<p style='color:green;'>Prospectador cadastrado com sucesso!</p>";
			header("Location: ../view/configuracoes.php");
		}else{
			$_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar o prospectador.</p>";
			header("Location: ../view/configuracoes.php");
		}
	}
}

?>