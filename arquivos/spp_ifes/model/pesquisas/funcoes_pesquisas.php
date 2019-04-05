<?php

function verificaCookie($nome)
{
    if (isset($_COOKIE[$nome]))
	{
		$aux = $_COOKIE[$nome];
	}
	else
	{
		$aux = '';
    }
    
    return $aux;
}

function qtdProjetosTipoUsuario($conn, $resposta, $tipo, $id_usuario)
{
    if($tipo == 1) /* caso o usuário seja um administrador */
    {
        $query = "SELECT P.id as id_projeto, P.nome as nome_projeto, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
        FROM projeto P
        INNER JOIN empresa E
        ON P.fk_id_empresa = E.id
        INNER JOIN usuario U
        ON P.fk_id_usuario = U.id
        INNER JOIN produto PD
        ON P.id = PD.fk_id_projeto
        WHERE ($resposta)
        ORDER BY P.id DESC";
        $result = mysqli_query($conn, $query);
        $qtd_total = mysqli_num_rows($result);
    }
    else
    {
        $query = "SELECT P.id as id_projeto, P.nome as nome_projeto, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
        FROM projeto P
        INNER JOIN empresa E
        ON P.fk_id_empresa = E.id
        INNER JOIN usuario U
        ON P.fk_id_usuario = U.id
        INNER JOIN produto PD
        ON P.id = PD.fk_id_projeto
        WHERE ($resposta) AND P.fk_id_usuario = $id_usuario
        ORDER BY P.id DESC";
        $result = mysqli_query($conn, $query);
        $qtd_total = mysqli_num_rows($result);
    }

    return $qtd_total;
}

function getPesquisa($conn, $resposta, $tipo, $id_usuario, $inicio, $qnt_result_pg)
{
    if($tipo == 1) /* caso o usuário seja um administrador */
	{
		$query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
		FROM projeto P
		INNER JOIN empresa E
		ON P.fk_id_empresa = E.id
		INNER JOIN usuario U
		ON P.fk_id_usuario = U.id
		INNER JOIN produto PD
		ON P.id = PD.fk_id_projeto
		WHERE ($resposta)
		ORDER BY P.id DESC
		LIMIT $inicio, $qnt_result_pg";
		$result = mysqli_query($conn, $query);
	}
	else
	{
		$query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
		FROM projeto P
		INNER JOIN empresa E
		ON P.fk_id_empresa = E.id
		INNER JOIN usuario U
		ON P.fk_id_usuario = U.id
		INNER JOIN produto PD
		ON P.id = PD.fk_id_projeto
		WHERE ($resposta) AND P.fk_id_usuario = $id_usuario
		ORDER BY P.id DESC
		LIMIT $inicio, $qnt_result_pg";
		$result = mysqli_query($conn, $query);
    }
    
    return $result;
}


?>