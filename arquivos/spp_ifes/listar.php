<?php
session_start();
include_once("header.html");
include_once("funcoes.php");
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

		<h1>Propostas para prospecção</h1>
		</div>

		<?php
			include_once("exibir_listar.php")
		?>

		</div>
	</body>
</html>