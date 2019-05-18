<?php
include_once("sessao.php");
include_once("../model/conexao.php");
include_once("../model/propostas/funcoes_propostas.php");

$conn = connect();

/* CONTROLE DE ACESSO */
if($_SESSION['submit'] != 1){ /* usuário inseriu URL diretamente no navegador */
    $_SESSION['msg'] = "Você não tem permissão para acessar essa página.";
    header("Location: ../view/index.php");
}

// Pega o id de acordo com o que o usuário clicou na página anterior
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Definimos o nome do arquivo que será exportado
$id == -1 ? $arquivo = 'Propostas' : $arquivo = getNomeProjeto($id);

header("Content-Type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=$arquivo.xls");

$saida = fopen("php://output", 'w');

fputcsv($saida, array('Nome do projeto', 'Nome do produto que será desenvolvido', 'Descrição do produto', 'Nome da empresa', 'CNPJ', 'Tipo de empresa', 'Prospectado por', 'Email', 'Telefone', 'Riscos', 'Partes interessadas', 'Viabilidade', 'Equipe do projeto', 'Entregas', 'Cronograma', 'Premissas', 'Efeitos do projeto', 'Custo', 'Anotações complementares'));

if($id == -1) // Download de todas as propostas
{
    $query = "SELECT id FROM projeto";
    $result = mysqli_query($conn, $query);
}
else // Download da proposta clicada na página anterior
{
    $query = "SELECT id FROM projeto WHERE id = $id";
    $result = mysqli_query($conn, $query);
}

while($row = mysqli_fetch_assoc($result))
{
    $id = $row['id'];

    // Selecionar todos os itens do formulário
    $projeto = getProjeto($id);

    $linha = array(utf8_encode($projeto['nome_projeto']),
    utf8_encode($projeto['nome_produto']),
    utf8_encode($projeto['descricao']),
    utf8_encode($projeto['nome_empresa']),
    utf8_encode($projeto['cnpj']),
    utf8_encode($projeto['tipo_empresa']),
    utf8_encode($projeto['nome_usuario']),
    utf8_encode($projeto['email']),
    utf8_encode($projeto['telefone']),
    utf8_encode($projeto['riscos']),
    utf8_encode($projeto['interessados']),
    utf8_encode($projeto['viabilidade']),
    utf8_encode($projeto['equipe']),
    utf8_encode($projeto['entregas']),
    utf8_encode($projeto['cronograma']),
    utf8_encode($projeto['premissas']),
    utf8_encode($projeto['efeitos']),
    utf8_encode($projeto['custo']),
    utf8_encode($projeto['anotacoes_complementares']));

    fputcsv($saida, $linha);
}

?>