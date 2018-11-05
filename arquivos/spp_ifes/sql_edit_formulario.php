<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
/* TABELA PROPOSTA */
$result_proposta = "SELECT * FROM proposta WHERE id_proposta = '$id'";
$resultado_proposta = mysqli_query($conn, $result_proposta);
$row_proposta = mysqli_fetch_assoc($resultado_proposta);

/* TABELA EMPRESA */
$result_empresa = "SELECT * FROM empresa WHERE id_empresa = '$id'";
$resultado_empresa = mysqli_query($conn, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

/* TABELA PROJETO */
$result_projeto = "SELECT * FROM projeto WHERE id_projeto = '$id'";
$resultado_projeto = mysqli_query($conn, $result_projeto);
$row_projeto = mysqli_fetch_assoc($resultado_projeto);

/* TABELA PESSOA */
$result_pessoa = "SELECT * FROM pessoa WHERE id_pessoa = '$id'";
$resultado_pessoa = mysqli_query($conn, $result_pessoa);
$row_pessoa = mysqli_fetch_assoc($resultado_pessoa);

/* TABELA PRODUTO */
$result_produto = "SELECT * FROM produto WHERE id_produto = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);

?>