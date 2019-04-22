<?php
session_start();
if(empty($_SESSION['id'])){
	$_SESSION['msg'] = "Faça login para acessar a plataforma";
	header("Location: login.php");
}
if($_SESSION['tipo'] != 1){
	$_SESSION['msg'] = "Apenas administradores tem acesso à essa página";
	header("Location: index.php");
}
?>