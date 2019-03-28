<?php
include_once("../controller/sessao.php");
include_once("header.php");
include_once("../controller/exibicao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
		<div class="container">
			<div class="py-5 text-center">

				<h1>Resultados</h1>
			
			</div>
			
            <?php
				$_SESSION['submit'] = 1;
                // Processamento da pesquisa
				include_once("../controller/proc_pesquisa.php");
			?>

		</div>
	</body>
</html>