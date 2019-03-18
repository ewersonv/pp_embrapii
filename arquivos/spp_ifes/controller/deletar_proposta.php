<?php
    
    include_once("funcoes.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    deletarProposta($id);

    /*$_SESSION['msg'] = "Proposta deletada! <br><br>";
	header("Location: ../view/listar.php");*/

?>