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
    
    if($order == 0)
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
    else
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

function getEmpresaProjeto($id_projeto){
    /* retorna o nome da empresa relacionada à proposta em questão */

    $result_empresa = "SELECT nome_empresa
    FROM empresa
    INNER JOIN projeto
    ON empresa.id_empresa=projeto.id_empresa
    WHERE projeto.id_projeto = $id_projeto";
    $resultado_empresa = mysqli_query(connect(), $result_empresa);

    return $resultado_empresa;
}

function getIdEmpresa($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id_empresa
    FROM projeto
    WHERE id_projeto = $id_projeto";
    $resultado = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($resultado);

    $valor = $row[0];

    return $valor;
}

function getIdPessoa($id_projeto)
{
    /* Retorna o ID da pessoa de acordo com a FK registrada na proposta */

    $query = "SELECT id_pessoa
    FROM projeto
    WHERE id_projeto = $id_projeto";
    $resultado = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($resultado);

    $valor = $row[0];

    return $valor;
}

function getIdProduto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id_produto
    FROM produto
    WHERE id_projeto = $id_projeto;";
    $resultado = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($resultado);

    return $row[0];
}

function getIdProjeto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id_projeto
    FROM projeto
    WHERE id_projeto = $id_projeto";
    $resultado = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($resultado);

    $valor = $row[0];

    return $valor;
}

?>