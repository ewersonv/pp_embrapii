<?php
include_once('conexao.php');

function limita_caracteres($texto, $limite, $quebra = true){
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

function getPropostas($inicio, $qnt_result_pg, $order){ // $order == 0 ASC | $order == 1 DESC
    /* Retorna todos os campos referentes à proposta necessários para exibição em "listar.php" */

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "spp_ifes";

    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if($order == 0)
    {
        $result_proposta = "SELECT P.id_proposta, P.tipo_proposta, P.resumo_proposta, E.nome_empresa
        FROM proposta P
        INNER JOIN empresa E
        ON E.id_empresa = P.fk_id_empresa
        ORDER BY id_proposta
        LIMIT $inicio, $qnt_result_pg";
        
        $resultado_proposta = mysqli_query($conn, $result_proposta);
    }
    else
    {
        $result_proposta = "SELECT P.id_proposta, P.tipo_proposta, P.resumo_proposta, E.nome_empresa
        FROM proposta P
        INNER JOIN empresa E
        ON E.id_empresa = P.fk_id_empresa
        ORDER BY id_proposta DESC
        LIMIT $inicio, $qnt_result_pg";
        
        $resultado_proposta = mysqli_query($conn, $result_proposta);
    }
    return $resultado_proposta;
}

function getEmpresaProposta($id_proposta){

    $result_empresa = "SELECT nome_empresa FROM empresa INNER JOIN proposta ON empresa.id_empresa=proposta.fk_id_empresa WHERE proposta.id_proposta = $id_proposta";
    $resultado_empresa = mysqli_query($conn, $result_empresa);

    return $resultado_empresa;
}

?>