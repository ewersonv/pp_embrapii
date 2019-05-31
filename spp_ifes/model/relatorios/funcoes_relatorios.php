<?php

function empresaMaisProjetos()
{
    $conn = connect();

    $query = "SELECT fk_id_empresa, COUNT(fk_id_empresa) FROM projeto GROUP BY fk_id_empresa ORDER BY COUNT(fk_id_empresa) DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_empresa = $row[0];
    $max = $row[1];

    $query = "SELECT nome FROM empresa WHERE id = '$id_empresa'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function getProjetosEmpresaMax($inicio, $qnt_result_pg)
{
    $nome = empresaMaisProjetos();

    $conn = connect();

    $query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, DATE_FORMAT(P.created,'%d/%m/%Y') AS created, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
    FROM projeto P
    INNER JOIN empresa E
    ON P.fk_id_empresa = E.id
    INNER JOIN usuario U
    ON P.fk_id_usuario = U.id
    INNER JOIN produto PD
    ON P.id = PD.fk_id_projeto
    WHERE E.nome LIKE '$nome'
    ORDER BY P.id DESC
    LIMIT $inicio, $qnt_result_pg";

    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $result;
}

function getProjetosProspectadorMax($inicio, $qnt_result_pg)
{
    $nome = maiorProspectador();

    $conn = connect();

    $query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, DATE_FORMAT(P.created,'%d/%m/%Y') AS created, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
    FROM projeto P
    INNER JOIN empresa E
    ON P.fk_id_empresa = E.id
    INNER JOIN usuario U
    ON P.fk_id_usuario = U.id
    INNER JOIN produto PD
    ON P.id = PD.fk_id_projeto
    WHERE U.nome LIKE '$nome'
    ORDER BY P.id DESC
    LIMIT $inicio, $qnt_result_pg";

    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $result;
}

function maiorProspectador()
{
    $conn = connect();

    $query = "SELECT fk_id_usuario, COUNT(fk_id_usuario) FROM projeto GROUP BY fk_id_usuario ORDER BY COUNT(fk_id_usuario) DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_usuario = $row[0];
    $max = $row[1];

    $query = "SELECT nome FROM usuario WHERE id = '$id_usuario'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function numAnalisesFinalizadas()
{
    $conn = connect();

    $query = "SELECT COUNT(id) FROM projeto WHERE finalizado = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function numProjetosEmpresa($nome)
{
    $conn = connect();

    $query = "SELECT id FROM empresa WHERE nome LIKE '$nome'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_empresa = $row[0];

    $query = "SELECT COUNT(fk_id_empresa) FROM projeto WHERE fk_id_empresa = $id_empresa";
    $result = mysqli_query($conn, $query);
    if ($result)
    {
        $row = mysqli_fetch_row($result);
        $value = $row[0];
    }
    else
    {
        $value = 0;
    }

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function numProjetosUsuario($nome)
{
    $conn = connect();

    $query = "SELECT id FROM usuario WHERE nome = '$nome'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_usuario = $row[0];

    $query = "SELECT COUNT(fk_id_usuario) FROM projeto WHERE fk_id_usuario = '$id_usuario'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function projetosEmpresa() /* retorna o número de projetos por empresa */
{
    $conn = connect();

    $query = "SELECT COUNT(P.fk_id_empresa) AS qtd, E.nome as nome_empresa
	FROM projeto P
	INNER JOIN empresa E
	ON E.id = P.fk_id_empresa
	GROUP BY E.nome
	ORDER BY E.nome";
    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);
    
    return $result;
}

function projetosProspectador() /* retorna o número de projetos por prospectador */
{
    $conn = connect();

    $query = "SELECT COUNT(P.fk_id_usuario) AS qtd, U.nome as nome_usuario
	FROM projeto P
	INNER JOIN usuario U
	ON U.id = P.fk_id_usuario
	GROUP BY U.nome
	ORDER BY U.nome";
    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);
    
    return $result;
}

function projetosUltimosMeses() /* retorna o número de projetos por mês, desde o registro do primeiro projeto */
{
    $conn = connect();

    $query = "SELECT COUNT(id) as qtd, MONTH(created) as mes
    FROM projeto
    WHERE DATE(created) BETWEEN CURDATE() - INTERVAL 6 MONTH AND CURDATE()
    GROUP BY MONTH(created)
    ORDER BY created DESC";
    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $result;
}

function projetosTipoEmpresa() /* retorna o número de projetos por tipo de empresa */
{
    $conn = connect();

    $query = "SELECT COUNT(P.fk_id_empresa) AS qtd, E.tipo as tipo_empresa
    FROM projeto P
    INNER JOIN empresa E
    ON E.id = P.fk_id_empresa
    GROUP BY E.tipo
    ORDER BY E.tipo";
    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $result;
}

function totalProdutos() /* retorna o número total de produtos cadastrados no sistema */
{
    $conn = connect();

    $query = "SELECT COUNT(id) FROM produto";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function totalUsuarios() /* retorna o número total de usuários cadastrados no sistema */
{
    $conn = connect();

    $query = "SELECT COUNT(id) FROM usuario";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function totalUsuariosAtivos() /* retorna o número total de usuários ATIVOS cadastrados no sistema */
{
    $conn = connect();

    $query = "SELECT COUNT(id) FROM usuario WHERE status = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

?>