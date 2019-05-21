<?php
include_once("../controller/sessao.php");
include_once("header.php");
$_SESSION['submit'] = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body id="grad1">
    <div class="container">
        <div class="py-5 text-center">
			<h3 class="mb-0">
				<a class="text-dark">Alterar senha</a>
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

                    <form name="formulario" class="align center" style="float:center" method="POST" action="../controller/proc_alterar_senha.php">
                        <label>Senha atual:</label>
                        <input class="form-control" type="password" name="atual" style="min-width:345px;" placeholder="******"><br>

                        <label>Nova senha:</label>
                        <input class="form-control" type="password" name="nova" style="min-width:345px;" placeholder="******">
                        <small>A senha deve conter no mínimo 8 caracteres, sendo 2 maiúsculos e 1 número.</small> <br><br>
                        
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
        var regex = /^(?=(?:.*?[A-Z]){2})(?=(?:.*?[0-9]){1})(?!.*\s)[0-9a-zA-Z!@#$%;*(){}_+^&]*$/;

        if (formulario.atual.value == '' || formulario.nova.value == '') {
            alert('Por favor, preencha todos os campos.');
            return false;
        }
        if (formulario.nova.value.length < 8) {
            alert('A senha precisa ter no mínimo 8 caracteres.');
            formulario.nova.focus();
            return false;
        }
        else if(!regex.exec(formulario.nova.value)) {
            alert("A senha deve conter no mínimo 2 caracteres em maiúsculo e 1 número");
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