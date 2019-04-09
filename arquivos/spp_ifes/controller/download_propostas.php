<?php
	include_once("sessao_adm.php");
    include_once("../model/conexao.php");
    include_once("../model/propostas/funcoes_propostas.php");

    $conn = connect();

    /* CONTROLE DE ACESSO */
	if($_SESSION['tipo'] != 1){ /* usuário não é administrador e não criou a proposta */
		$_SESSION['msg'] = "Você não tem permissão para acessar essa página.";
		header("Location: ../view/index.php");
    }

    // Definimos o nome do arquivo que será exportado
    $arquivo = 'Propostas.xls';
    
    $query = "SELECT id FROM projeto";
    $result = mysqli_query($conn, $query);

    // Criamos uma tabela HTML com o formato da planilha
    $html = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '</tr>';

    // Cabeçalhos do arquivo
    $html .= '<tr>';
    $html .= '<td><b>Nome do projeto:</b></td>';
    $html .= '<td><b>Nome do produto que será desenvolvido:</b></td>';
    $html .= '<td><b>Descrição do produto:</b></td>';
    $html .= '<td><b>Nome da empresa:</b></td>';
    $html .= '<td><b>CNPJ:</b></td>';
    $html .= '<td><b>Tipo de empresa:</b></td>';
    $html .= '<td><b>Prospectado por:</b></td>';
    $html .= '<td><b>Email:</b></td>';
    $html .= '<td><b>Telefone:</b></td>';
    $html .= '<td><b>Riscos:</b></td>';
    $html .= '<td><b>Partes interessadas:</b></td>';
    $html .= '<td><b>Viabilidade:</b></td>';
    $html .= '<td><b>Equipe do projeto:</b></td>';
    $html .= '<td><b>Entregas:</b></td>';
    $html .= '<td><b>Cronograma:</b></td>';
    $html .= '<td><b>Premissas:</b></td>';
    $html .= '<td><b>Efeitos do projeto:</b></td>';
    $html .= '<td><b>Custo:</b></td>';
    $html .= '<td><b>Anotações complementares:</b></td>';
    $html .= '</tr>';

    while($row = mysqli_fetch_assoc($result))
    {    
        $id = $row['id'];

        // Selecionar todos os itens do formulário
        $projeto = getProjeto($id);
        
        // Inserindo as informações trazidas do banco de dados
        $html .= '<tr>';
        $html .= '<td>'.utf8_encode($projeto['nome_projeto']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['nome_produto']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['descricao']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['nome_empresa']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['cnpj']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['tipo_empresa']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['nome_usuario']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['email']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['telefone']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['riscos']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['interessados']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['viabilidade']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['equipe']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['entregas']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['cronograma']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['premissas']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['efeitos']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['custo']).'</td>';
        $html .= '<td>'.utf8_encode($projeto['anotacoes_complementares']).'</td>';
        $html .= '</tr><br>';
    }
	
	// Configurações header para forçar o download
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );
	// Envia o conteúdo do arquivo
	echo $html;
    exit;
    
    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);
?>