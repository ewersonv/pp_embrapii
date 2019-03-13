<?php
//Incluir a conexão com banco de dados
include_once("funcoes.php");

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

if($tipo == 1) /* caso o usuário seja um administrador */
{
	$query = "SELECT P.id as id_projeto, P.nome as nome_projeto, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
	FROM PROJETO P
	INNER JOIN EMPRESA E
	ON P.fk_id_empresa = E.id
	INNER JOIN USUARIO U
	ON P.fk_id_usuario = U.id
	INNER JOIN PRODUTO PD
	ON P.id = PD.fk_id_projeto
	WHERE ($resposta)
	ORDER BY P.id DESC";
	$result = mysqli_query($conn, $query);
	$qtd_total = mysqli_num_rows($result);
}
else
{
	$query = "SELECT P.id as id_projeto, P.nome as nome_projeto, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
	FROM PROJETO P
	INNER JOIN EMPRESA E
	ON P.fk_id_empresa = E.id
	INNER JOIN USUARIO U
	ON P.fk_id_usuario = U.id
	INNER JOIN PRODUTO PD
	ON P.id = PD.fk_id_projeto
	WHERE ($resposta) AND P.fk_id_usuario = $id_usuario
	ORDER BY P.id DESC";
	$result = mysqli_query($conn, $query);
	$qtd_total = mysqli_num_rows($result);
}

if($qtd_total == 0)
{
	echo "Nenhum resultado encontrado.";
}
else
{	
	if($tipo == 1) /* caso o usuário seja um administrador */
	{
		$query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
		FROM PROJETO P
		INNER JOIN EMPRESA E
		ON P.fk_id_empresa = E.id
		INNER JOIN USUARIO U
		ON P.fk_id_usuario = U.id
		INNER JOIN PRODUTO PD
		ON P.id = PD.fk_id_projeto
		WHERE ($resposta)
		ORDER BY P.id DESC
		LIMIT $inicio, $qnt_result_pg";
		$result = mysqli_query($conn, $query);
	}
	else
	{
		$query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
		FROM PROJETO P
		INNER JOIN EMPRESA E
		ON P.fk_id_empresa = E.id
		INNER JOIN USUARIO U
		ON P.fk_id_usuario = U.id
		INNER JOIN PRODUTO PD
		ON P.id = PD.fk_id_projeto
		WHERE ($resposta) AND P.fk_id_usuario = $id_usuario
		ORDER BY P.id DESC
		LIMIT $inicio, $qnt_result_pg";
		$result = mysqli_query($conn, $query);
	}
	
	// Nome da página para ser redirecionado
	$nome_pagina = 'pesquisa.php';
	include_once("../controller/exibir_projetos.php");
}

