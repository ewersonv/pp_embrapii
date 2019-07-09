<?php

function getUsuario($conn, $email)
{
    $query = "SELECT * FROM usuario WHERE email LIKE '$email' LIMIT 1";
    $resultado = mysqli_query($conn, $query);
    
    return $resultado;
}

function getProspectadores()
{
    $conn = connect();

    $query = "SELECT u.id, u.nome, u.cpf, u.email, u.telefone, u.tipo AS permissao, u.status, DATE_FORMAT(u.last_access,'%d/%m/%Y') AS acesso,
    COUNT(p.id) AS propostas, SUM(p.finalizado) AS finalizadas
    FROM usuario u
    LEFT JOIN projeto p
    ON u.id = p.fk_id_usuario
    GROUP BY u.nome
    ORDER BY u.nome";

    $result = mysqli_query($conn, $query);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $result;
}

function getSenha($conn, $email)
{
    $query = "SELECT senha FROM usuario WHERE email LIKE '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['senha'];
}

function getTelefone($id_usuario)
{
    $conn = connect();

    $query = "SELECT telefone FROM usuario WHERE id = $id_usuario";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $row['telefone'];
}

function insertUsuario($conn, $nome, $cpf, $telefone, $email, $senha, $tipo)
{
    /* Insere usuário no BD */

    $query = "INSERT INTO usuario (nome, cpf, telefone, email, senha, tipo, status, created, last_access) VALUES ('$nome', '$cpf','$telefone', '$email', '$senha', '$tipo', 1, NOW(), NULL)";
	$result = mysqli_query($conn, $query);
}

function sendMail($nome, $email, $telefone, $senha, $tipo)
{
    $to = $email;
    $subject = utf8_decode('Confirmação de cadastro na plataforma de prospecção');

    $path = 'https://prospeccao.polo.ifes.edu.br';
    
    $headers = 'From: polodeinovacao@ifes.edu.br' . "\r\n" .
               'Reply-To: polodeinovacao@ifes.edu.br';
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
    if ($tipo == 1)
    {
        $permissao = utf8_decode("permissão de acesso de administrador");
    }
    else
    {
        $permissao = utf8_decode("permissão de acesso de usuário comum");
    }
    
    $message = utf8_decode("
        Nome: $nome<br>
        Login: $email<br>
        Telefone: $telefone<br>
        Senha*: <b>$senha</b><br>
        Nível de acesso: $permissao<br><br>
        Seu cadastro foi confirmado. Link para acessar a plataforma: '$path' <br>
        *Você pode alterar sua senha na aba 'Configurações'
    ");

    $success = mail($to, $subject, $message, $headers);
    if(!$success)
    {
        $_SESSION['msg'] = "Não foi possível enviar email de confirmação para o usuário";
    }
    else
    {
        $_SESSION['msg'] = "Um email de confirmação foi enviado para o usuário cadastrado.";
    }
}

function sendMailRecuperarSenha($nome, $email, $senha)
{
    $path = 'https://prospeccao.polo.ifes.edu.br';
    $to = $email;
    $subject = utf8_decode('Recuperação de senha');
    
    $headers = 'From: polodeinovacao@ifes.edu.br' . "\r\n" .
               'Reply-To: polodeinovacao@ifes.edu.br';
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $message = utf8_decode("
        Olá $nome,<br>
        Sua nova senha é: <b>$senha</b>.<br>
        Você pode alterá-la na aba 'Configurações' em '$path'.
    ");

    $success = mail($to, $subject, $message, $headers);
    if(!$success)
    {
        $_SESSION['msg'] = "Não foi possível enviar email de confirmação para o usuário. <br><br>";
        return 0;
    }
    else
    {
        $_SESSION['msg'] = "Uma mensagem contendo a nova senha de acesso foi enviada para o email informado. <br><br>";
        header("Location: ../view/login.php");
    }
}

function updateAcessoUsuario($conn, $id)
{
    $query = "UPDATE usuario SET last_access = NOW() WHERE usuario.id = $id";
    $result = mysqli_query($conn, $query);
}

function updateSenha($conn, $nova, $email)
{
    $query = "UPDATE usuario SET senha = '$nova' WHERE email LIKE '$email'";
    $result = mysqli_query($conn, $query);
}

function updateStatusUsuario($id)
{
    /* troca o status do usuário, ativando-o ou desativando-o */
    $conn = connect();

    /* verifica quantos administradores ativados existem no banco */
    $query = "SELECT COUNT(id) AS qtd FROM usuario WHERE tipo = 1 AND status = 1";
    $result = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_assoc($result);
    $qtd = $resultado['qtd'];

    $query = "SELECT status, nome FROM usuario WHERE usuario.id = $id";
    $result = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_assoc($result);
    $status_antigo = $resultado['status'];
    $nome = $resultado['nome'];

    if($status_antigo == 1)
    {
        if ($qtd > 1)
        {
            $status = 0;

            $query = "UPDATE usuario SET status = $status WHERE usuario.id = $id";
            $result = mysqli_query($conn, $query);

            $_SESSION['msg'] = "<p style='color:red;'>Prospectador $nome desativado!</p>";
        }
        else
        {
            $_SESSION['msg'] = "<p style='color:red;'>Prospectador $nome não pode ser desativado pois é o único administrador do sistema.</p>";
        }
    }
    else
    {
        $status = 1;

        $query = "UPDATE usuario SET status = $status WHERE usuario.id = $id";
        $result = mysqli_query($conn, $query);
        
        $_SESSION['msg'] = "<p style='color:green;'>Prospectador $nome ativado!</p>";
    }

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);
}

function updateTelefone($conn, $telefone, $id_usuario)
{
    $query = "UPDATE usuario SET telefone = '$telefone' WHERE id LIKE '$id_usuario'";
    $result = mysqli_query($conn, $query);
}

function verificaNomeUsuario($conn, $nome)
{
    /* Verifica se o nome do usuário já existe no BD */

    $query = "SELECT nome FROM usuario WHERE nome LIKE '$nome'";
    $result = mysqli_query($conn, $query);
    $row_nome = mysqli_fetch_assoc($result);

    return $row_nome;
}

function verificaEmailUsuario($conn, $email)
{
    /* Verifica se o email informado já existe no BD */

    $query = "SELECT id FROM usuario WHERE email LIKE '$email'";
    $result = mysqli_query($conn, $query);
    $row_email = mysqli_fetch_assoc($result);

    return $row_email;
}

?>