<?php
session_start();
include_once("site.html");
include_once("funcoes.php");
include_once("exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
	
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<<<<<<< HEAD
	<div class="container">
		<div class="py-5 text-center">
=======
		<h1>Propostas para prospecção</h1>
		</div>

		<?php
			// Resultados a serem exibidos na página
			$result = getProjetos($inicio, $qnt_result_pg, $order);

			// Paginação - Somar a quantidade de formulários
			$qtd_total_paginas = totalProjetos();

			// Nome da página para ser redirecionado
			$nome_pagina = 'listar.php';
			include_once("exibir_projetos.php")
		?>
>>>>>>> relatorio prospec + separar exibir_projetos

			<h1>Propostas para prospecção</h1>
			</div>
			<?php
				include_once("exibir_listar.php")
			?>
			</div>
		</div>
	</div>
	
	</body>
</html>