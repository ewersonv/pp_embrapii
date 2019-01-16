<?php
include_once("funcoes.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/* RETORNA TODOS OS DADOS REFERENTES À PROPOSTA CLICADA */

$conn = connect();

$result_all = "SELECT *
FROM PROJETO P
INNER JOIN EMPRESA E
ON P.id_empresa = E.id_empresa
INNER JOIN PESSOA PS
ON P.id_pessoa = PS.id_pessoa
INNER JOIN PRODUTO PD
ON P.id_projeto = PD.id_projeto
WHERE P.id_projeto = $id";

$resultado_all = mysqli_query($conn, $result_all);
$row = mysqli_fetch_assoc($resultado_all);

?>