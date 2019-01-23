<?php
include_once("header.html");
include_once("../controller/funcoes.php");
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
                // Processamento da pesquisa
				include_once("../controller/proc_pesquisa.php");
			?>

		</div>
	</body>
</html>