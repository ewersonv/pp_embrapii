<?php
include_once("funcoes.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/* RETORNA TODOS OS DADOS REFERENTES À PROPOSTA CLICADA */

$result_all = "SELECT *
FROM proposta
INNER JOIN empresa
ON proposta.fk_id_empresa = empresa.id_empresa
INNER JOIN projeto
ON proposta.fk_id_projeto = projeto.id_projeto
INNER JOIN pessoa
ON proposta.fk_id_pessoa = pessoa.id_pessoa
INNER JOIN produto
ON proposta.fk_id_produto = produto.id_produto
WHERE proposta.id_proposta = $id";
$resultado_all = mysqli_query(connect(), $result_all);
$row = mysqli_fetch_assoc($resultado_all);

?>