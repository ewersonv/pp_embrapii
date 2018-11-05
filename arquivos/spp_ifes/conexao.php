<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "spp_ifes";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}


?>