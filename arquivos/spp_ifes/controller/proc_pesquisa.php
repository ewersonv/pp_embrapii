<?php
include_once("sessao.php");

//Incluir a conexão com banco de dados
include_once("funcoes.php");

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
	$tipo = $_SESSION['tipo'];
	$id_usuario = $_SESSION['id'];

	$conn = connect();

	if(empty($_POST['nome_empresa']) && empty($_POST['nome_usuario']) && empty($_POST['nome_produto']) && empty($_POST['nome_projeto']))
	{
		$nome_empresa = verificaCookie('nome_empresa');
		$nome_usuario = verificaCookie('nome_usuario');
		$nome_produto = verificaCookie('nome_produto');
		$nome_projeto = verificaCookie('nome_projeto');
	}
	else
	{
		$nome_empresa = $_POST['nome_empresa'];
		$nome_usuario = $_POST['nome_usuario'];
		$nome_produto = $_POST['nome_produto'];
		$nome_projeto = $_POST['nome_projeto'];
	}

	setcookie('nome_empresa', $nome_empresa);
	setcookie('nome_usuario', $nome_usuario);
	setcookie('nome_produto', $nome_produto);
	setcookie('nome_projeto', $nome_projeto);

	$string = '';
	if ($nome_empresa != '')
	{
		$string = $string."E.nome LIKE '%".$nome_empresa."%' AND ";
	}
	if ($nome_usuario != '')
	{
		$string = $string."U.nome LIKE '%".$nome_usuario."%' AND "; 
	}
	if ($nome_produto != '')
	{
		$string = $string."PD.nome LIKE '%".$nome_produto."%' AND ";
	}
	if ($nome_projeto != '')
	{
		$string = $string."P.nome LIKE '%".$nome_projeto."%' AND ";
	}
	// remove o ultimo AND com os espaços
	$resposta = substr($string, 0, -5);

	/* Mudar a exbição dos projetos de acordo com o tipo de usuário que está acessando o sistema */
	$qtd_total = qtdProjetosTipoUsuario($conn, $resposta, $tipo, $id_usuario);

	if($qtd_total == 0)
	{
		/* Fecha a conexão com o banco de dados */
		closeConnection($conn);

		echo "Nenhum resultado encontrado.";
	}
	else
	{	
		$result = getPesquisa($conn, $resposta, $tipo, $id_usuario, $inicio, $qnt_result_pg);

		/* Fecha a conexão com o banco de dados */
		closeConnection($conn);
		
		// Nome da página para ser redirecionado
		$nome_pagina = 'pesquisa.php';
		include_once("../controller/exibir_projetos.php");
	}	
}