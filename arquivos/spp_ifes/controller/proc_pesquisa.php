<?php
//Incluir a conexão com banco de dados
include_once("funcoes.php");

$conn = connect();

$nome_empresa = $_POST['nome_empresa'];
$nome_pessoa = $_POST['nome_pessoa'];
$nome_produto = $_POST['nome_produto'];
$nome_projeto = $_POST['nome_projeto'];

if(empty($_POST['nome_empresa']) && empty($_POST['nome_pessoa']) && empty($_POST['nome_produto']) && empty($_POST['nome_projeto']))
{
	echo "Nenhum campo foi preenchido na pesquisa.";
}
else
{
	$string = '';
	if ($nome_empresa != '')
	{
		$string = $string."nome_empresa LIKE '%".$nome_empresa."%' AND ";
	}
	if ($nome_pessoa != '')
	{
		$string = $string."nome_pessoa LIKE '%".$nome_pessoa."%' AND "; 
	}
	if ($nome_produto != '')
	{
		$string = $string."nome_produto LIKE '%".$nome_produto."%' AND ";
	}
	if ($nome_projeto != '')
	{
		$string = $string."nome_projeto LIKE '%".$nome_projeto."%' AND ";
	}
	// remove o ultimo AND com os espaços
	$resposta = substr($string, 0, -5);


	$query = "SELECT P.id_projeto, P.nome_projeto, PS.nome_pessoa, E.nome_empresa, PD.descricao_produto
	FROM PROJETO P
	INNER JOIN EMPRESA E
	ON P.id_empresa = E.id_empresa
	INNER JOIN PESSOA PS
	ON P.id_pessoa = PS.id_pessoa
	INNER JOIN PRODUTO PD
	ON P.id_projeto = PD.id_projeto
	WHERE ($resposta)
	ORDER BY id_projeto DESC";
	$result = mysqli_query($conn, $query);
	$qtd_total = mysqli_num_rows($result);

	$query = "SELECT P.id_projeto, P.nome_projeto, PS.nome_pessoa, E.nome_empresa, PD.descricao_produto
	FROM PROJETO P
	INNER JOIN EMPRESA E
	ON P.id_empresa = E.id_empresa
	INNER JOIN PESSOA PS
	ON P.id_pessoa = PS.id_pessoa
	INNER JOIN PRODUTO PD
	ON P.id_projeto = PD.id_projeto
	WHERE ($resposta)
	ORDER BY id_projeto DESC
	LIMIT $inicio, $qnt_result_pg";
	$result = mysqli_query($conn, $query);
	
	
	// Nome da página para ser redirecionado
	$nome_pagina = 'pesquisa.php';
	include_once("../controller/exibir_projetos.php");
}

