<?php
	include_once("sessao.php");
	include_once("../model/conexao.php");
	include_once("../model/propostas/funcoes_propostas.php");
	
	// Pega o id de acordo com o que o usuário clicou na página anterior
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	
	// Selecionar todos os itens do formulário
	$projeto = getProjeto($id);
	
	/* CONTROLE DE ACESSO */
	if($_SESSION['tipo'] != 1 AND $_SESSION['id'] != $projeto['id_usuario']){ /* usuário não é administrador e não criou a proposta */
		$_SESSION['msg'] = "Você não tem permissão para acessar essa página.";
		header("Location: ../view/index.php");
    }

    $html = '';
	$html .= '<b>Nome do projeto: </b><br>';
	$html .= utf8_encode($projeto['nome_projeto']) . "<br><br>";

	$html .= '<b>Nome do produto que será desenvolvido: </b><br>';
	$html .= utf8_encode($projeto['nome_produto']) . "<br><br>";
	
	$html .= '<b>Descrição do produto: </b><br>';
	$html .= utf8_encode($projeto['descricao']) . "<br><br>";
	
	$html .= '<b>Nome da empresa: </b><br>';
	$html .= utf8_encode($projeto['nome_empresa']) . "<br><br>";
	
	$html .= '<b>CNPJ: </b><br>';
	$html .= utf8_encode($projeto['cnpj']) . "<br><br>";
	
	$html .= '<b>Tipo de empresa: </b><br>';
	$html .= utf8_encode($projeto['tipo_empresa']) . "<br><br>";

	$html .= '<b>Prospectado por: </b><br>';
	$html .= utf8_encode($projeto['nome_usuario']) . "<br><br>";

	$html .= '<b>Email: </b><br>';
	$html .= utf8_encode($projeto['email']) . "<br><br>";

	$html .= '<b>Telefone: </b><br>';
	$html .= utf8_encode($projeto['telefone']) . "<br><br>";
	
	$html .= '<b>Riscos: </b><br>';
	$html .= utf8_encode($projeto['riscos']) . "<br><br>";

	$html .= '<b>Partes interessadas: </b><br>';
	$html .= utf8_encode($projeto['interessados']) . "<br><br>";

	$html .= '<b>Viabilidade: </b><br>';
	$html .= utf8_encode($projeto['viabilidade']) . "<br><br>";

	$html .= '<b>Equipe do projeto: </b><br>';
	$html .= utf8_encode($projeto['equipe']) . "<br><br>";

	$html .= '<b>Entregas: </b><br>';
	$html .= utf8_encode($projeto['entregas']) . "<br><br>";

	$html .= '<b>Cronograma: </b><br>';
	$html .= utf8_encode($projeto['cronograma']) . "<br><br>";

	$html .= '<b>Premissas: </b><br>';
	$html .= utf8_encode($projeto['premissas']) . "<br><br>";

	$html .= '<b>Efeitos do projeto: </b><br>';
	$html .= utf8_encode($projeto['efeitos']) . "<br><br>";
	
	$html .= '<b>Custo: </b><br>';
	$html .= utf8_encode($projeto['custo']) . "<br><br>";

	$html .= '<b>Anotações complementares: </b><br>';
	$html .= utf8_encode($projeto['anotacoes_complementares']) . "<br><br>";

	$nome_projeto = $projeto['nome_projeto'];
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	$dompdf->set_paper('a4', 'portrait');
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">' . utf8_encode($projeto['nome_projeto']) . '</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	ob_end_clean(); /* função para exibir corretamente o PDF no linux */

	//Exibibir a página
	$dompdf->stream(
		"$nome_projeto", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>