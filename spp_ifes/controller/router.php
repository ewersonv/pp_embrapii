<?
$request = $_SERVER['REDIRECT_URL'];

switch ($request) {
    case '/' :
        require __DIR__ . '/index.php';
        break;
    case '' :
        require __DIR__ . '/index.php';
        break;
    case '/alterar_senha' :
        require __DIR__ . '/alterar_senha.php';
        break;
    case '/alterar_telefone' :
        require __DIR__ . '/alterar_telefone.php';
        break;
    case '/cadastrar_prospectador' :
        require __DIR__ . '/cadastrar_prospectador.php';
        break;
    case '/configuracoes' :
        require __DIR__ . '/configuracoes.php';
        break;
    case '/consultar_prospectador' :
        require __DIR__ . '/consultar_prospectador.php';
        break;
    case '/listar' :
        require __DIR__ . '/listar.php';
        break;
    case '/nova_proposta' :
        require __DIR__ . '/nova_proposta.php';
        break;
    case '/pesquisa' :
        require __DIR__ . '/pesquisa.php';
        break;
    case '/relatorio_empresa' :
        require __DIR__ . '/relatorio_empresa.php';
        break;
    case '/relatorio_prospectador' :
        require __DIR__ . '/relatorio_prospectador.php';
        break;
    case '/relatorios' :
        require __DIR__ . '/relatorios.php';
        break;
    case '/sair' :
        require __DIR__ . '/sair.php';
        break;
    default:
        require __DIR__ . '/404.php';
        break;
}
?>