<?php
    include_once("conexao.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema de Prospecção de Projetos</title>
		<link href="css/bootstrap.min.css" rel="stylesheet"> <!--- link bootstrap4 --->
	</head>
    <body>
        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <h1>Formulário para prospecção</h1>
            </div>
            <form method="POST" action="processa.php">
                <label>Seu nome: </label>
                <input type="text" name="nome" placeholder="Nome completo"><br><br>

                <label>Email: </label>
                <input type="email" name="email" placeholder="abcd@email.com"><br><br>

                <label>Telefone: </label>
                <input type="number" name="telefone" placeholder="2799998888"><br><br>

                <label>Você é representante: </label><br>
                <input type="checkbox" name="cb1" value="Representante da empresa" />da empresa<br>
                <input type="checkbox" name="cb2" value="Representante do Polo de Inovação" />do Polo de Inovação<br><br>

                <label>Nome da empresa: </label>
                <input type="text" name="nome_empresa" placeholder="Nome"><br><br>

                <label>CNPJ: </label>
                <input type="text" name="cnpj" placeholder="Apenas números"><br><br>

                <label>Tipo de empresa: </label><br>
                <input type="checkbox" name="cb3" value="MEI/ME" />MEI/ME<br>
                <input type="checkbox" name="cb4" value="Médio/Grande porte" />Médio/Grande porte<br><br>

                <label>A proposta é uma prestação de serviço ou um projeto de inovação? </label><br>
                <input type="checkbox" name="cb5" value="Projeto de inovação" />Projeto de inovação<br>
                <input type="checkbox" name="cb6" value="Prestação de serviço" />Prestação de serviço<br><br>

                <label>Produto final: </label>
                <input type="text" name="nome_produto" placeholder="Nome do produto"><br><br>

                <label>Justificativa: </label>
                <input type="text" name="justificativa_projeto" placeholder="Justificativa do projeto"><br><br>

                <input type="submit" value="Enviar">
		    </form>