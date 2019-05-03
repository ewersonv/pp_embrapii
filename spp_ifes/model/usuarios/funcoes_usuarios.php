<?php

function getUsuario($conn, $email)
{
    $query = "SELECT id, nome, email, senha, tipo, status FROM usuario WHERE email LIKE '$email' LIMIT 1";
    $resultado = mysqli_query($conn, $query);
    
    return $resultado;
}

function getProspectadores()
{
    $conn = connect();

    $query = "SELECT u.id, u.nome, u.email, u.telefone, u.tipo AS permissao, u.status, DATE_FORMAT(u.last_access,'%d/%m/%Y') AS acesso,
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

function insertUsuario($conn, $nome, $telefone, $email, $senha, $tipo)
{
    /* Insere usuário no BD */

    $query = "INSERT INTO usuario (nome, telefone, email, senha, tipo, status, created, last_access) VALUES ('$nome', '$telefone', '$email', '$senha', '$tipo', 1, NOW(), NULL)";
	$result = mysqli_query($conn, $query);
}

function sendMail($nome, $email, $telefone, $senha, $tipo)
{
    require '/usr/share/php/libphp-phpmailer/PHPMailerAutoload.php';
    if ($tipo == 1)
    {
        $permissao = "permissão de acesso de administrador";
    }
    else
    {
        $permissao = "permissão de acesso de usuario comum";
    }
    $mail = new PHPMailer(); //PHPMailer(true) habilita throw excepetion usando $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'ewersonv@gmail.com';
    $mail->Password = 'IronMan23';
    $mail->Port = 587;
    $mail->setFrom('ewersonv@gmail.com', utf8_decode('Plataforma de prospecção'));
    
    $mail->isHTML(true);

    // Endereço do e-mail do destinatário
    //$mail->addAddress("$email");
    $mail->addAddress("ewersonv@gmail.com");
    
    $mail->Subject = utf8_decode('Confirmação de cadastro na plataforma de prospecção');
    $mail->Body    = utf8_decode("
    Nome: $nome<br>
    Login: $email<br>
    Telefone: $telefone<br>
    Senha*: <b>$senha</b><br>
    Nível de acesso: $permissao<br><br>
    Seu cadastro foi confirmado. Link para acessar a plataforma: http://localhost/pp_embrapii/arquivos/spp_ifes/view/login.php <br>
    *Você pode alterar sua senha na aba 'Configurações'
    ");
    if(!$mail->send())
    {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    }
    else
    {
        echo 'Mensagem enviada.';
    }
}

function sendMailRecuperarSenha($nome, $email, $senha)
{
    require '/usr/share/php/libphp-phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer(); //PHPMailer(true) habilita throw excepetion usando $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'ewersonv@gmail.com';
    $mail->Password = 'IronMan23';
    $mail->Port = 587;
    $mail->setFrom('ewersonv@gmail.com', utf8_decode('Plataforma de prospecção'));
    
    $mail->isHTML(true);

    // Endereço do e-mail do destinatário
    //$mail->addAddress("$email");
    $mail->addAddress("ewersonv@gmail.com");
    
    $mail->Subject = utf8_decode('Recuperação de senha');
    $mail->Body    = utf8_decode("
    Olá $nome,<br>
    Sua nova senha é: <b>$senha</b>.<br>
    Você pode alterar sua senha na aba 'Configurações' em http://localhost/pp_embrapii/arquivos/spp_ifes/view/login.php.
    ");
    if(!$mail->send())
    {
        $_SESSION['msg'] = "Não foi possível enviar a mensagem.<br>";
        header("Location: ../view/recuperar_senha.php");
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

    $query = "SELECT status, nome FROM usuario WHERE usuario.id = $id";
    $result = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_assoc($result);
    $aux = $resultado['status'];
    $nome = $resultado['nome'];

    if($aux == 1)
    {
        $status = 0;
        $_SESSION['msg'] = "<p style='color:red;'>Prospectador $nome desativado!</p>";
    }
    else
    {
        $status = 1;
        $_SESSION['msg'] = "<p style='color:green;'>Prospectador $nome ativado!</p>";
    }

    $query = "UPDATE usuario SET status = $status WHERE usuario.id = $id";
    $result = mysqli_query($conn, $query);

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