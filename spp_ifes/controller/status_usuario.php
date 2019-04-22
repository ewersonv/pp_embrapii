<?php
    include_once("sessao_adm.php");
    include_once("../model/conexao.php");
    include_once("../model/usuarios/funcoes_usuarios.php");
    
    if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
    {
        header("Location: ../view/index.php");
    }
    else /* se a página foi acessada via submit da página anterior */
    {
        $_SESSION['submit'] = 0;

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        updateStatusUsuario($id);

        header("Location: ../view/consultar_prospectadores.php");
    }

?>