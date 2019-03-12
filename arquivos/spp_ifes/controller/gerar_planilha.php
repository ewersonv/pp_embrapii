<?php
	session_start();
	include_once("funcoes.php");
	
	$conn = connect();
			
	// Pega o id de acordo com o que o usuário clicou na página anterior
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	
	// Selecionar todos os itens do formulário
	$projeto = getProjeto($id);

	// Definimos o nome do arquivo que será exportado
	$arquivo = utf8_encode($projeto['nome_projeto']) . '.xls';
	
	// Criamos uma tabela HTML com o formato da planilha
	$html = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="19">Planilha do projeto "' . utf8_encode($projeto['nome_projeto']) . '"</tr>';
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
	$html .= '</tr>';

	/*
	$data = date('d/m/Y H:i:s',strtotime($row_msg_contatos["created"]));
	$html .= '<td>'.$data.'</td>';
	*/
	

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
?>