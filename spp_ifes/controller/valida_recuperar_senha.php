<?php
session_start();
include_once("../model/conexao.php");
include_once("../model/funcoes.php");
include_once("../model/usuarios/funcoes_usuarios.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin)
{
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    //Pesquisar o usuário no BD
    $conn = connect();
    $resultado = getUsuario($conn, $email);
    
    if($resultado)
    {
        $row = mysqli_fetch_assoc($resultado);

        $novaSenha = gerarSenha(8, true, true, true, false);
        $novaSenhaHash = password_hash($novaSenha);

        updateSenha($conn, $novaSenhaHash, $email);

        sendMailRecuperarSenha($row['nome'], $email, $novaSenha);     
    }
    else
    {
        $_SESSION['msg'] = "<p style='color:red;'>Não existe usuário associado ao email inserido.</p><br><br>";
        header("Location: ../view/login.php");
    }
}
else
{
	$_SESSION['msg'] = "Página não encontrada <br><br>";
	header("Location: ../view/login.php");
}
