<?php
session_start();
include_once("funcoes.php");

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
	$_SESSION['submit'] = 0;

    $conn = connect();
    $email = $_SESSION['email'];

    $senha = getSenha($conn, $email);

    $atual = filter_input(INPUT_POST, 'atual', FILTER_SANITIZE_STRING);
    $nova = password_hash(filter_input(INPUT_POST, 'nova', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

    if(password_verify($atual, $senha))
    {
        updateSenha($conn, $nova, $email);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Senha alterada com sucesso!</p>";
            header("Location: ../view/configuracoes.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Não foi possível alterar a senha.</p>";
            header("Location: ../view/configuracoes.php");
        }
    }
    else
    {
        $_SESSION['msg'] = "<p style='color:red;'>Senha atual incorreta!</p>";
        header("Location: ../view/alterar_senha.php");
    }
}
?>