<?php

function acessarProposta($tipo, $id_usuario, $row_id_usuario, $row_finalizado, $row_id_projeto)
{
    if($tipo == 1) /* se o usuário é um administrador */
    {
        if($row_id_usuario == $id_usuario)  /* se a proposta ainda não foi finalizada */
        {
            if($row_finalizado == 0)
            {
                echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='edit_proposta.php?id=" . $row_id_projeto . "' role='button'>Preencher proposta</a>";
            }
            else
            {
                echo "<p style='color:green;'>Proposta finalizada.</p>";
                echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='visualizar_proposta.php?id=" . $row_id_projeto . "' role='button'>Visualizar proposta</a>";
            }
        }
        else
        {
            if($row_finalizado == 1)
            {
                echo "<p style='color:green;'>Proposta finalizada.</p>";
            }
            echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='visualizar_proposta.php?id=" . $row_id_projeto . "' role='button'>Visualizar proposta</a>";
        }
    }
    else /* se o usuário NÃO é um administrador */
    {
        if($row_id_usuario == $id_usuario) /* se o usuário pode preencher a proposta */
        {
            if($row_finalizado == 0) /* se a proposta não foi finalizada */
            {
                echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='edit_proposta.php?id=" . $row_id_projeto . "' role='button'>Preencher proposta</a>";
            }
            else /* proposta finalizada */
            {
                echo "<p style='color:green;'>Proposta finalizada.</p>";                                    
                echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='visualizar_proposta.php?id=" . $row_id_projeto . "' role='button'>Visualizar proposta</a>";
            }
        }    
    }
}

function getAllProjetos($inicio, $qnt_result_pg){
    /* Retorna todos os campos referentes à proposta necessários para exibição em "listar.php" */
    $tipo = $_SESSION['tipo'];
    $id_usuario = $_SESSION['id'];

    $conn = connect();

    if($tipo == 1) /* Se o usuário for um adm, pode ver todos os projetos*/
    {
        $result_projeto = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao as descricao
        FROM projeto P
        INNER JOIN empresa E
        ON P.fk_id_empresa = E.id
        INNER JOIN usuario U
        ON P.fk_id_usuario = U.id
        INNER JOIN produto PD
        ON P.id = PD.fk_id_projeto
        ORDER BY P.id DESC
        LIMIT $inicio, $qnt_result_pg";
    }
    else
    {
        $result_projeto = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao as descricao
        FROM projeto P
        INNER JOIN empresa E
        ON P.fk_id_empresa = E.id
        INNER JOIN usuario U
        ON P.fk_id_usuario = U.id
        INNER JOIN produto PD
        ON P.id = PD.fk_id_projeto
        WHERE P.fk_id_usuario = $id_usuario
        ORDER BY P.id DESC
        LIMIT $inicio, $qnt_result_pg";
    }
    
    $resultado_projeto = mysqli_query($conn, $result_projeto);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);
    
    return $resultado_projeto;
}
?>