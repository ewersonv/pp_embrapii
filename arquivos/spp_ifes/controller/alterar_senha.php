<?php
session_start();
include_once("funcoes.php");

$conn = connect();
$email = $_SESSION['email'];

$query = "SELECT senha FROM usuario WHERE email LIKE '$email' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


$atual = filter_input(INPUT_POST, 'atual', FILTER_SANITIZE_STRING);
$nova = password_hash(filter_input(INPUT_POST, 'nova', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

if(password_verify($atual, $row['senha']))
{
    $query = "UPDATE usuario SET senha = '$nova' WHERE email LIKE '$email'";
    $result = mysqli_query($conn, $query);

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
    $_SESSION['msg'] = "Senha atual incorreta!";
	header("Location: ../view/configuracoes.php");
}

?>