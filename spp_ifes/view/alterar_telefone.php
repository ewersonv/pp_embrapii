<?php
include_once("../model/conexao.php");
include_once("../model/usuarios/funcoes_usuarios.php");
include_once("../controller/sessao.php");
include_once("header.php");
$_SESSION['submit'] = 0;
?>
<!DOCTYPE html>
<html id="grad1">
<head>
    <meta charset="utf-8">
</head>
<body>
    <div class="container">
        <div class="py-5 text-center">
			<h3 class="mb-0">
				<a class="text-dark">Alterar telefone</a>
		    </h3>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="text-left">

                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                    ?>

                    <form name="formulario" class="align center" style="float:center" method="POST" action="../controller/proc_alterar_telefone.php">
                        <label>Telefone atual:</label>
                        <?php echo getTelefone($_SESSION['id']) ?> <br><br>

                        <label>Novo telefone:</label>
                        <input class="form-control" type="text" name="telefone" style="min-width:345px; max-width:450px;" placeholder="27999998888" maxlength="11"> <br>

                        <label>Insira sua senha para confirmar a alteração:</label>
                        <input class="form-control" autocapitalize="off" type="password" name="senha" style="min-width:345px;" placeholder="******"><br><br>
                        
                        <div class="text-center">
                            <button class="btn btn-dark my-2 my-sm-0" type="button" onclick="validate()">Confirmar</button><br>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function validate() {
        var regex = /^(?!.*\s)[0-9]*$/;

        if (formulario.telefone.value == '') {
            formulario.telefone.focus();
            return false;
        }
        if (formulario.senha.value == '') {
            formulario.senha.focus();
            return false;
        }
        if (formulario.telefone.value.length < 11) {
            alert('Número de telefone inválido.');
            formulario.telefone.focus();
            return false;
        }
        else if(!regex.exec(formulario.telefone.value)) {
            alert("Número de telefone inválido");
            formulario.nova.focus();
            return false;
        }
        else {
            <?php $_SESSION['submit'] = 1; ?>
            formulario.submit();
        }
    }
</script>
</body>
</html>