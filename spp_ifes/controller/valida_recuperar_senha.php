<?php
session_start();
include_once("../model/conexao.php");
include_once("../model/funcoes.php");
include_once("../model/usuarios/funcoes_usuarios.php");

if($_SESSION['submit'] == 1)
{
    $_SESSION['submit'] = 0;
    
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    //Pesquisar o usuário no BD
    $conn = connect();
    $resultado = getUsuario($conn, $email);
    $row = mysqli_fetch_assoc($resultado);
    
    if($row != "")
    {
        if ($row['status'] == 0)
        {
            $_SESSION['msg'] = "Usuário desativado. Solicite a reativação à um administrador. <br><br>";
			header("Location: ../view/login.php");
        }
        else
        {
            $novaSenha = gerarSenha(8, true, true, true, false);
            $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

            updateSenha($conn, $novaSenhaHash, $email);

            closeConnection($conn);

            sendMailRecuperarSenha($row['nome'], $email, $novaSenha);
        }
    }
    else
    {
        $_SESSION['msg'] = "<p style='color:red;'>Não existe usuário associado ao email inserido.</p><br><br>";
        header("Location: ../view/recuperar_senha.php");
    }
}
else
{
	$_SESSION['msg'] = "Página não encontrada <br><br>";
	header("Location: ../view/login.php");
}
