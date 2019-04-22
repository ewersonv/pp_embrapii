<?php

function verificaNomeEmpresa($conn, $nome_empresa)
{
    $query = "SELECT nome FROM empresa WHERE nome like '$nome_empresa'";
    $result = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_assoc($result);

    return $resultado;
}

function insertEmpresa($conn, $nome_empresa, $cnpj, $tipo_empresa)
{
    $query = "INSERT INTO empresa (nome, cnpj, tipo)
	VALUES ('$nome_empresa', '$cnpj', '$tipo_empresa')";
    $result = mysqli_query($conn, $query);
}

function getIdEmpresa($nome)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $conn = connect();

    $query = "SELECT id
    FROM empresa
    WHERE nome LIKE '$nome'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $valor;
}

function insertProjeto($conn, $nome_projeto, $riscos, $interessados, $viabilidade, $equipe, $entregas, $cronograma, $premissas, $efeitos, $custo, $anotacoes_complementares, $finalizado, $id_empresa, $id_usuario)
{
    $query = "INSERT INTO projeto (nome, riscos, interessados, viabilidade, equipe, entregas, cronograma, premissas, efeitos, custo, anotacoes_complementares, finalizado, fk_id_empresa, fk_id_usuario, created)
    VALUES ('$nome_projeto', '$riscos', '$interessados', '$viabilidade', '$equipe', '$entregas', '$cronograma', '$premissas', '$efeitos', '$custo', '$anotacoes_complementares', '$finalizado', '$id_empresa', '$id_usuario', NOW())";
    $result = mysqli_query($conn, $query);
}

function insertProduto($conn, $nome_produto, $descricao, $id_projeto)
{
    $query = "INSERT INTO produto (nome, descricao, fk_id_projeto)
    VALUES ('$nome_produto', '$descricao', '$id_projeto')";
    $result = mysqli_query($conn, $query);
}

function getIdProduto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $conn = connect();

    $query = "SELECT id
    FROM produto
    WHERE fk_id_projeto = $id_projeto;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $row[0];
}

function updateProduto($conn, $nome_produto, $descricao, $id_produto)
{
    $query = "UPDATE produto SET nome='$nome_produto', descricao='$descricao' WHERE id ='$id_produto'";
    $result = mysqli_query($conn, $query);
}

function updateProjeto($conn, $id_projeto, $nome_projeto, $riscos, $interessados, $viabilidade, $equipe, $entregas, $cronograma, $premissas, $efeitos, $custo, $anotacoes_complementares, $finalizado)
{
    $query = "UPDATE projeto SET nome='$nome_projeto', riscos='$riscos', interessados='$interessados', viabilidade='$viabilidade', equipe='$equipe', entregas='$entregas', cronograma='$cronograma', premissas='$premissas', efeitos='$efeitos', custo='$custo', anotacoes_complementares='$anotacoes_complementares', finalizado='$finalizado', modified=NOW() WHERE id ='$id_projeto'";
    $result = mysqli_query($conn, $query);
}

function deletarProposta($id)
{
    $conn = connect();

    // Deletar produto relacionado à proposta
    $query = "DELETE FROM produto WHERE fk_id_projeto = $id";
    $result = mysqli_query($conn, $query);

    // Seleciona o id da empresa relacionada ao projeto em questão
    $query = "SELECT fk_id_empresa FROM projeto WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_empresa = $row[0];

    // Pesquisa quantos projetos estão relacionados à esta empresa
    $query = "SELECT id FROM projeto WHERE fk_id_empresa = $id_empresa";
    $result = mysqli_query($conn, $query);
    $num_proj_empresa = mysqli_num_rows($result);

    // Caso o número de projetos seja 1 ou 0 a empresa será deletada juntamente com o projeto
    if ($num_proj_empresa <= 1)
    {
        // Deletar empresa
        $query = "DELETE FROM empresa WHERE id = $id_empresa";
        $result = mysqli_query($conn, $query);
    }

    // Deletar proposta
    $query = "DELETE FROM projeto WHERE id = $id";
    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);
}

function getProjeto($id)
{
    /* RETORNA TODOS OS DADOS REFERENTES À PROPOSTA CLICADA */
    $conn = connect();

    $result_all = "SELECT E.id as id_empresa, E.nome as nome_empresa, E.cnpj, E.tipo as tipo_empresa,
    PD.id as id_produto, PD.nome as nome_produto, PD.descricao,
    P.id as id_projeto, P.nome as nome_projeto, P.viabilidade, P.efeitos, P.equipe, P.riscos, P.entregas, P.premissas, P.cronograma, P.custo, P.interessados, P.anotacoes_complementares,
    U.id as id_usuario, U.nome as nome_usuario, U.telefone, U.email
    FROM projeto P
    INNER JOIN empresa E
    ON P.fk_id_empresa = E.id
    INNER JOIN usuario U
    ON P.fk_id_usuario = U.id
    INNER JOIN produto PD
    ON P.id = PD.fk_id_projeto
    WHERE P.id = $id";

    $resultado_all = mysqli_query($conn, $result_all);
    $row = mysqli_fetch_assoc($resultado_all);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $row;
}

function getNomeProjeto($id)
{
    $conn = connect();

    $query = "SELECT nome FROM projeto WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    /* Fecha a conexao com o banco de dados */
    closeConnection($conn);

    return $row[0];
}

?>