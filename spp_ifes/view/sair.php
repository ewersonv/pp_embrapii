<?php
include_once("../controller/sessao.php");

session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['adm']);

header("Location: login.php");

?>