<?php

function connect()
{
    /* Conecta ao banco de dados */

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "spp_ifes";

    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    return $conn;
}

function limita_caracteres($texto, $limite, $quebra = true){
    /* Limita o número de caracteres exibidos e adiciona "..." ao final */

   $tamanho = strlen($texto);
   if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
      $novo_texto = $texto;
   }else{ // Se o tamanho do texto for maior que o limite
      if($quebra == true){ // Verifica a opção de quebrar o texto
         $novo_texto = trim(substr($texto, 0, $limite))."...";
      }else{ // Se não, corta $texto na última palavra antes do limite
         $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
         $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
      }
   }
   return $novo_texto; // Retorna o valor formatado
}

function getProjetos($inicio, $qnt_result_pg, $order){ // $order == 0 ASC | $order == 1 DESC
    /* Retorna todos os campos referentes à proposta necessários para exibição em "listar.php" */
    
    if($order == 0) /* exibição dos resultados em ordem crescente */
    {
        $result_projeto = "SELECT P.id_projeto, P.nome_projeto, PS.nome_pessoa, E.nome_empresa, PD.descricao_produto
        FROM PROJETO P
        INNER JOIN EMPRESA E
        ON P.id_empresa = E.id_empresa
        INNER JOIN PESSOA PS
        ON P.id_pessoa = PS.id_pessoa
        INNER JOIN PRODUTO PD
        ON P.id_projeto = PD.id_projeto
        ORDER BY id_projeto
        LIMIT $inicio, $qnt_result_pg";
        
        $resultado_projeto = mysqli_query(connect(), $result_projeto);
    }
    else /* exibição dos resultados em ordem decrescente */
    {
        $result_projeto = "SELECT P.id_projeto, P.nome_projeto, PS.nome_pessoa, E.nome_empresa, PD.descricao_produto
        FROM PROJETO P
        INNER JOIN EMPRESA E
        ON P.id_empresa = E.id_empresa
        INNER JOIN PESSOA PS
        ON P.id_pessoa = PS.id_pessoa
        INNER JOIN PRODUTO PD
        ON P.id_projeto = PD.id_projeto
        ORDER BY id_projeto DESC
        LIMIT $inicio, $qnt_result_pg";
        
        $resultado_projeto = mysqli_query(connect(), $result_projeto);
    }
    return $resultado_projeto;
}

function getProjetosEmpresaMax($inicio, $qnt_result_pg)
{
    $nome = empresaMaisProjetos();

    $query = "SELECT P.id_projeto, P.nome_projeto, PS.nome_pessoa, E.nome_empresa, PD.descricao_produto
    FROM PROJETO P
    INNER JOIN EMPRESA E
    ON P.id_empresa = E.id_empresa
    INNER JOIN PESSOA PS
    ON P.id_pessoa = PS.id_pessoa
    INNER JOIN PRODUTO PD
    ON P.id_projeto = PD.id_projeto
    WHERE e.nome_empresa LIKE '$nome'
    ORDER BY id_projeto DESC
    LIMIT $inicio, $qnt_result_pg";

    $result = mysqli_query(connect(), $query);

    return $result;
}

function getProjetosProspectadorMax($inicio, $qnt_result_pg)
{
    $nome = maiorProspectador();

    $query = "SELECT P.id_projeto, P.nome_projeto, PS.nome_pessoa, E.nome_empresa, PD.descricao_produto
    FROM PROJETO P
    INNER JOIN EMPRESA E
    ON P.id_empresa = E.id_empresa
    INNER JOIN PESSOA PS
    ON P.id_pessoa = PS.id_pessoa
    INNER JOIN PRODUTO PD
    ON P.id_projeto = PD.id_projeto
    WHERE PS.nome_pessoa LIKE '$nome'
    ORDER BY id_projeto DESC
    LIMIT $inicio, $qnt_result_pg";

    $result = mysqli_query(connect(), $query);

    return $result;
}

function getEmpresaProjeto($id_projeto){
    /* retorna o nome da empresa relacionada à proposta em questão */

    $query = "SELECT nome_empresa FROM empresa WHERE id_empresa IN (SELECT id_empresa FROM projeto WHERE id_projeto = $id_projeto)";
    $result = mysqli_query(connect(), $query);

    return $result;
}

function getIdEmpresa($nome)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id_empresa
    FROM empresa
    WHERE nome_empresa LIKE '$nome'";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    return $valor;
}

function getIdPessoa($nome)
{
    /* Retorna o ID da pessoa de acordo com a FK registrada na proposta */

    $query = "SELECT id_pessoa
    FROM pessoa
    WHERE nome_pessoa LIKE '$nome'";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    return $valor;
}

function getIdProduto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id_produto
    FROM produto
    WHERE id_projeto = $id_projeto;";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    return $row[0];
}

function getIdProjeto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id_projeto
    FROM projeto
    WHERE id_projeto = $id_projeto";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    return $valor;
}

function totalProjetos()
{
    $query = "SELECT COUNT(id_projeto) FROM projeto";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    return $value;
}

function totalProdutos()
{
    $query = "SELECT COUNT(id_produto) FROM produto";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    return $value;
}

function empresaMaisProjetos()
{
    $conn = connect();

    $query = "SELECT id_empresa, COUNT(id_empresa) FROM projeto GROUP BY id_empresa ORDER BY COUNT(id_empresa) DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_empresa = $row[0];
    $max = $row[1];

    $query = "SELECT nome_empresa FROM empresa WHERE id_empresa = '$id_empresa'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    return $value;
}

function numProjetosEmpresa($nome)
{
    $conn = connect();

    $query = "SELECT id_empresa FROM empresa WHERE nome_empresa LIKE '$nome'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_empresa = $row[0];

    $query = "SELECT COUNT(id_empresa) FROM projeto WHERE id_empresa = $id_empresa";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    return $value;
}

function maiorProspectador()
{
    $query = "SELECT id_pessoa, COUNT(id_pessoa) FROM projeto GROUP BY id_pessoa ORDER BY COUNT(id_pessoa) DESC LIMIT 1";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);
    $id_pessoa = $row[0];
    $max = $row[1];

    $query = "SELECT nome_pessoa FROM pessoa WHERE id_pessoa = '$id_pessoa'";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    return $value;
}

function numProjetosPessoa($nome)
{
    $conn = connect();

    $query = "SELECT id_pessoa FROM pessoa WHERE nome_pessoa = '$nome'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id_pessoa = $row[0];

    $query = "SELECT COUNT(id_pessoa) FROM projeto WHERE id_pessoa = '$id_pessoa'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

    return $value;
}

function exibirProjetos($result, $qtd_total, $nome_pagina)
{
    
}

?>