<?php
$request = $_SERVER['REQUEST_URI'];
$aux = explode("/", $request);
$pasta = $aux[count($aux)-3];
$mvc = $aux[count($aux)-2];
$request = $aux[count($aux)-1];

switch ($request) {
    case '' :
        header('../view/index.php');
        break;
    case '/alterar_senha' :
        require '../view/alterar_senha.php';
        break;
    case '/alterar_telefone' :
        require '../view/alterar_telefone.php';
        break;
    case '/cadastrar_prospectador' :
        require '../view/cadastrar_prospectador.php';
        break;
    case '/configuracoes' :
        require '../view/configuracoes.php';
        break;
    case '/consultar_prospectador' :
        require '../view/consultar_prospectador.php';
        break;
    case '/listar' :
        require '../view/listar.php';
        break;
    case '/nova_proposta' :
        require '../view/nova_proposta.php';
        break;
    case '/pesquisa' :
        require '../view/pesquisa.php';
        break;
    case '/relatorio_empresa' :
        require '../view/relatorio_empresa.php';
        break;
    case '/relatorio_prospectador' :
        require '../view/relatorio_prospectador.php';
        break;
    case '/relatorios' :
        require '../view/relatorios.php';
        break;
    case '/sair' :
        require '../view/sair.php';
        break;
    default:
        header('../view/index.php');
        break;
}
?>