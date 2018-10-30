<?php
session_start();
include_once("conexao.php");
include_once("funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
		<link href="css/product.css" rel="stylesheet">
		<title>SPP - IFES</title>		
	</head>
	<body>
		<nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
				<a class="py-2 d-none d-md-inline-block" href="index.php">Início</a>
				<a class="py-2 d-none d-md-inline-block"href="cadastrar.php">Nova Proposta</a>
				<a class="py-2 d-none d-md-inline-block" href="#">Relatórios</a>
			</div>
		</nav>

		<h1>Propostas para prospecção</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 10;

		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_proposta = "SELECT * FROM proposta ORDER BY id_proposta DESC LIMIT $inicio, $qnt_result_pg";
		$resultado_proposta = mysqli_query($conn, $result_proposta);

		$result_empresa = "SELECT nome_empresa FROM empresa INNER JOIN proposta ON empresa.id_empresa=proposta.id_proposta ORDER BY id_proposta DESC LIMIT $inicio, $qnt_result_pg";
		$resultado_empresa = mysqli_query($conn, $result_empresa);

		while($row_proposta = mysqli_fetch_assoc($resultado_proposta) and $row_empresa = mysqli_fetch_assoc($resultado_empresa)){
			/* USAR ENCODE AQUI, CASO CONTRÁRIO OS CARACTERES ESPECIAIS NÃO APARECERÃO NA PÁGINA */

			echo "<b>Código: </b>" . utf8_encode($row_proposta['id_proposta']) . "<br>";
			echo "<b>Tipo: </b>" . utf8_encode($row_proposta['tipo_proposta']) . "<br>";
			echo "<b>Empresa: </b>" . utf8_encode($row_empresa['nome_empresa']) . "<br>";
			echo "<b>Resumo: </b>" . utf8_encode(limita_caracteres($row_proposta['resumo_proposta'], 50)) . "<br>";
			echo "<a href='edit_formulario.php?id=" . $row_proposta['id_proposta'] . "'>Preencher proposta</a><br><hr>";
		}

		//Paginação - Somar a quantidade de formulários
		$result_pg = "SELECT COUNT(id_proposta) AS num_result FROM proposta";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='listar.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='listar.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>