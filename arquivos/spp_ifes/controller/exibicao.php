<?php

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
    $_SESSION['submit'] = 0;
        
    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    //Setar a quantidade de itens por pagina
    $qnt_result_pg = 3;

    //calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    // Ordem de impressão: 0 Crescente | 1 Decrescente
    $order = 1;
}
?>