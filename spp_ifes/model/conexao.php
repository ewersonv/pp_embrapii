<?php

function connect()
{
    /* Conecta ao banco de dados */

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "spp_ifes";

    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    return $conn;
}

function closeConnection($conn)
{
    /* Fecha a conexão com o banco de dados */

    if ($conn)
    {
        mysqli_close($conn);
    }
}

?>