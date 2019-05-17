<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/product.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<title>SPP - Ifes</title>
		<style>
			#grad1 {
				height: 100%;
				background-color: #F5F5F5; /* For browsers that do not support gradients */
				background-image: linear-gradient(100deg,#F5F5F5,#E0E0E0); /* Standard syntax (must be last) */
			}
		</style>
	</head>
	<body id="grad1">

	<nav role="navigation">
	<div id="menuToggle">
		<!--
		A fake / hidden checkbox is used as click reciever,
		so you can use the :checked selector on it.
		-->
		<input type="checkbox" />
		
		<!--
		Some spans to act as a hamburger.
		
		They are acting like a real hamburger,
		not that McDonalds stuff.
		-->
		<span></span>
		<span></span>
		<span></span>
		
		<!--
		Too bad the menu has to be inside of the button
		but hey, it's pure CSS magic.
		-->
		<ul id="menu">
		<a class="underlineHover" href="index.php"><li>Home</li></a> <br>
		<a class="underlineHover" href="listar.php"><li>Listar</li></a>
		<a class="underlineHover" href="nova_proposta.php"><li>Nova Proposta</li></a>
		<?php
		if ($_SESSION['tipo'] == 1)
		{
			?>
				<a class="underlineHover" href='relatorios.php'><li>Relatórios</li></a>
				<a class="underlineHover" href='../controller/gerar_xls.php?id=-1' onclick="submit()"><li>Baixar propostas</li></a>
			<?php
		}
		?>
		<a class="underlineHover" href="configuracoes.php"><li>Configurações</li></a> <br>
 		<a class="underlineHover" href="sair.php"><li>Sair</li></a>
		</ul>
	</div>
	</nav>
	<script>
		function submit()
		{
			<?php $_SESSION['submit'] = 1; ?>

		}
	</script>
	</body>
</html>