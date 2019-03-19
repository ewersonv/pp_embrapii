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
}

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

    return $value;
}

function getAllProjetos($inicio, $qnt_result_pg){
    /* Retorna todos os campos referentes à proposta necessários para exibição em "listar.php" */
    $tipo = $_SESSION['tipo'];
    $id_usuario = $_SESSION['id'];

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
    
    $resultado_projeto = mysqli_query(connect(), $result_projeto);
    
    return $resultado_projeto;
}

function getEmpresaProjeto($id_projeto){
    /* retorna o nome da empresa relacionada à proposta em questão */

    $query = "SELECT nome FROM empresa WHERE id IN (SELECT fk_id_empresa FROM projeto WHERE id = $id_projeto)";
    $result = mysqli_query(connect(), $query);

    return $result;
}

function getIdEmpresa($nome)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id
    FROM empresa
    WHERE nome LIKE '$nome'";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    return $valor;
}

function getIdProduto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id
    FROM produto
    WHERE fk_id_projeto = $id_projeto;";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    return $row[0];
}

function getIdProjeto($id_projeto)
{
    /* Retorna o ID da empresa de acordo com a FK registrada na proposta */

    $query = "SELECT id
    FROM projeto
    WHERE id = $id_projeto";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    return $valor;
}

function getIdUsuario($nome)
{
    /* Retorna o ID da usuario de acordo com a FK registrada na proposta */

    $query = "SELECT id
    FROM usuario
    WHERE nome LIKE '$nome'";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $valor = $row[0];

    return $valor;
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

    return $row;
}

function getProjetosEmpresaMax($inicio, $qnt_result_pg)
{
    $nome = empresaMaisProjetos();

    $query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
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

    $result = mysqli_query(connect(), $query);

    return $result;
}

function getProjetosProspectadorMax($inicio, $qnt_result_pg)
{
    $nome = maiorProspectador();

    $query = "SELECT P.id as id_projeto, P.nome as nome_projeto, P.finalizado, U.id as id_usuario, U.nome as nome_usuario, E.nome as nome_empresa, PD.descricao
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

    $result = mysqli_query(connect(), $query);

    return $result;
}

function getSenha($conn, $email)
{
    $query = "SELECT senha FROM usuario WHERE email LIKE '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['senha'];
}

function getUsuario($conn, $email)
{
    $query = "SELECT id, nome, email, senha, tipo FROM usuario WHERE email LIKE '$email' LIMIT 1";
    $resultado = mysqli_query($conn, $query);
    
    return $resultado;
}

function insertEmpresa($conn, $nome_empresa, $cnpj, $tipo_empresa)
{
    $query = "INSERT INTO empresa (nome, cnpj, tipo)
	VALUES ('$nome_empresa', '$cnpj', '$tipo_empresa')";
    $result = mysqli_query($conn, $query);
}

function insertProduto($conn, $nome_produto, $descricao, $id_projeto)
{
    $query = "INSERT INTO produto (nome, descricao, fk_id_projeto)
    VALUES ('$nome_produto', '$descricao', '$id_projeto')";
    $result = mysqli_query($conn, $query);
}

function insertProjeto($conn, $nome_projeto, $riscos, $interessados, $viabilidade, $equipe, $entregas, $cronograma, $premissas, $efeitos, $custo, $anotacoes_complementares, $id_empresa, $id_usuario)
{
    $query = "INSERT INTO projeto (nome, riscos, interessados, viabilidade, equipe, entregas, cronograma, premissas, efeitos, custo, anotacoes_complementares, fk_id_empresa, fk_id_usuario, created)
    VALUES ('$nome_projeto', '$riscos', '$interessados', '$viabilidade', '$equipe', '$entregas', '$cronograma', '$premissas', '$efeitos', '$custo', '$anotacoes_complementares', '$id_empresa', '$id_usuario', NOW())";
    $result = mysqli_query($conn, $query);
}

function insertUsuario($conn, $nome, $telefone, $email, $senha, $tipo)
{
    /* Insere usuário no BD */

    $query = "INSERT INTO usuario (nome, telefone, email, senha, tipo) VALUES ('$nome', '$telefone', '$email', '$senha', '$tipo')";
	$result = mysqli_query($conn, $query);
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

function maiorProspectador()
{
    $query = "SELECT fk_id_usuario, COUNT(fk_id_usuario) FROM projeto GROUP BY fk_id_usuario ORDER BY COUNT(fk_id_usuario) DESC LIMIT 1";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);
    $id_usuario = $row[0];
    $max = $row[1];

    $query = "SELECT nome FROM usuario WHERE id = '$id_usuario'";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);
    $value = $row[0];

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
    $row = mysqli_fetch_row($result);
    $value = $row[0];

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

    return $value;
}

/* FUNÇÕES PARA GERAR GRÁFICOS EM relatorio.php */
function projetosEmpresa()
{
    $query = "SELECT COUNT(P.fk_id_empresa) AS qtd, E.nome as nome_empresa
	FROM projeto P
	INNER JOIN empresa E
	ON E.id = P.fk_id_empresa
	GROUP BY E.nome
	ORDER BY E.nome";
    $result = mysqli_query(connect(), $query);
    
    return $result;
}

function projetosProspectador()
{
    $query = "SELECT COUNT(P.fk_id_usuario) AS qtd, U.nome as nome_usuario
	FROM projeto P
	INNER JOIN usuario U
	ON U.id = P.fk_id_usuario
	GROUP BY U.nome
	ORDER BY U.nome";
    $result = mysqli_query(connect(), $query);
    
    return $result;
}

function projetosTempo()
{
    $query = "SELECT COUNT(id) AS qtd, MONTH(created) as mes
	FROM projeto
	WHERE created >= (SELECT created FROM projeto ORDER BY created LIMIT 1)
	GROUP BY MONTH(created)
    ORDER BY created";
    $result = mysqli_query(connect(), $query);

    return $result;
}

function projetosTipoEmpresa()
{
    $query = "SELECT COUNT(P.fk_id_empresa) AS qtd, E.tipo as tipo_empresa
    FROM projeto P
    INNER JOIN empresa E
    ON E.id = P.fk_id_empresa
    GROUP BY E.tipo
    ORDER BY E.tipo";
    $result = mysqli_query(connect(), $query);

    return $result;
}
/* - - - - - - - - - - - - - - - - - - - - - - */

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

function totalProdutos()
{
    $query = "SELECT COUNT(id) FROM produto";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    return $value;
}

function totalProjetos()
{
    $tipo = $_SESSION['tipo'];
    $id_usuario = $_SESSION['id'];

    if($tipo == 1)
    {
        $query = "SELECT COUNT(id) FROM projeto";
        $result = mysqli_query(connect(), $query);
        $row = mysqli_fetch_row($result);
    }
    else
    {
        $query = "SELECT COUNT(id) FROM projeto WHERE fk_id_usuario = '$id_usuario'";
        $result = mysqli_query(connect(), $query);
        $row = mysqli_fetch_row($result);
    }

    $value = $row[0];

    return $value;
}

function totalUsuarios()
{
    $query = "SELECT COUNT(id) FROM usuario";
    $result = mysqli_query(connect(), $query);
    $row = mysqli_fetch_row($result);

    $value = $row[0];

    return $value;
}

function trocaMes($mes)
{
    if ($mes == 1)
	{
		$mes = "Janeiro";
	}
	elseif ($mes == 2)
	{
		$mes = "Fevereiro";
	}
	elseif ($mes == 3)
	{
		$mes = "Março";
	}
	elseif ($mes == 4)
	{
		$mes = "Abril";
	}
	elseif ($mes == 5)
	{
		$mes = "Maio";
	}
	elseif ($mes == 6)
	{
		$mes = "Junho";
	}
	elseif ($mes == 7)
	{
		$mes = "Julho";
	}
	elseif ($mes == 8)
	{
		$mes = "Agosto";
	}
	elseif ($mes == 9)
	{
		$mes = "Setembro";
	}
	elseif ($mes == 10)
	{
		$mes = "Outubro";
	}
	elseif ($mes == 11)
	{
		$mes = "Novembro";
	}
	else
	{
		$mes = "Dezembro";
    }
    
    return $mes;
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

function updateSenha($conn, $nova, $email)
{
    $query = "UPDATE usuario SET senha = '$nova' WHERE email LIKE '$email'";
    $result = mysqli_query($conn, $query);
}

function updateTelefone($conn, $telefone, $id_usuario)
{
    $query = "UPDATE usuario SET telefone = '$telefone' WHERE id LIKE '$id_usuario'";
    $result = mysqli_query($conn, $query);
}

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

function verificaEmailUsuario($conn, $email)
{
    /* Verifica se o email informado já existe no BD */

    $query = "SELECT id FROM usuario WHERE email LIKE '$email'";
    $result = mysqli_query($conn, $query);
    $row_email = mysqli_fetch_assoc($result);

    return $row_email;
}

function verificaNomeEmpresa($conn, $nome_empresa)
{
    $query = "SELECT nome FROM empresa WHERE nome like '$nome_empresa'";
    $result = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_assoc($result);

    return $resultado;
}

function verificaNomeUsuario($conn, $nome)
{
    /* Verifica se o nome do usuário já existe no BD */

    $query = "SELECT nome FROM usuario WHERE nome LIKE '$nome'";
    $result = mysqli_query($conn, $query);
    $row_nome = mysqli_fetch_assoc($result);

    return $row_nome;
}

?>