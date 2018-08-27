<?php
session_start();
include_once("conexao.php");

$checkbox = filter_input(INPUT_POST, 'cb1', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

//echo "Nome: $nome <br>";
//echo "CNPJ: $cnpj <br>";
//echo "Nome Representante: $nome_rep <br>";
//echo "E-mail: $email <br>";

$result_pessoa = "INSERT INTO pessoa (tipo_pessoa, nome, email, telefone, created) VALUES ('$checkbox','$nome', '$email', $telefone, NOW())";
$resultado_pessoa = mysqli_query($conn, $result_pessoa);

/*if($_POST['checkbox'] != "")
{
	if(is_array($_POST['checkbox']))
	{
		while(list($key, $value) = each($_POST['checkbox']))
		{
			$sql = mysqli_query("INSERT INTO pessoa (tipo_pessoa) VALUES ('$value')");
		}
	}
}*/

if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Pessoa cadastrada com sucesso</p>";
	header("Location: index.php");
}
else
{
	$_SESSION['msg'] = "<p style='color:red;'>Pessoa não foi cadastrada com sucesso</p>";
	header("Location: index.php");
}