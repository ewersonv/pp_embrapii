<?php
session_start();
include_once("../model/conexao.php");
include_once("../model/usuarios/funcoes_usuarios.php");

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
	$_SESSION['submit'] = 0;

    $conn = connect();
    $id_usuario = $_SESSION['id'];
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $email = $_SESSION['email'];
    $senha_banco = getSenha($conn, $email);

    if(password_verify($senha, $senha_banco))
    {
        updateTelefone($conn, $telefone, $id_usuario);

        if(mysqli_affected_rows($conn)){
            /* Fecha a conexão com o banco de dados */
            closeConnection($conn);
            
            $_SESSION['msg'] = "<p style='color:green;'>Telefone alterado com sucesso!</p>";
            header("Location: ../view/configuracoes.php");
        }else{
            /* Fecha a conexão com o banco de dados */
            closeConnection($conn);
            
            $_SESSION['msg'] = "<p style='color:red;'>Não foi possível alterar o telefone.</p>";
            header("Location: ../view/alterar_telefone.php");
        }
    }
    else
    {
        $_SESSION['msg'] = "<p style='color:red;'>Senha incorreta.</p>";
        header("Location: ../view/alterar_telefone.php");
    }
}

?>