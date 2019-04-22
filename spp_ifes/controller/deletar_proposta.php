<?php
    include_once("sessao.php");
    include_once("../model/conexao.php");
    include_once("../model/propostas/funcoes_propostas.php");
    
    if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
    {
        header("Location: ../view/index.php");
    }
    else /* se a página foi acessada via submit da página anterior */
    {
        $_SESSION['submit'] = 0;

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        deletarProposta($id);

        $_SESSION['msg'] = "Proposta deletada! <br><br>";
        header("Location: ../view/listar.php");
    }

?>