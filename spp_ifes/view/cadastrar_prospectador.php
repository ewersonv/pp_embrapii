<?php
include_once("../controller/sessao_adm.php");
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
				<a class="text-dark">Cadastrar Prospectador</a>
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

                    <form name="formulario" class="align center" style="float:center" method="POST" action="../controller/proc_cadastrar_prospectador.php">
                        <label>Nome:</label>
                        <input class="form-control" type="text" name="nome" style="min-width:345px; max-width:450px;" placeholder="João Silva"><br>

                        <label>Telefone:</label>
                        <input class="form-control" type="text" name="telefone" style="min-width:345px; max-width:450px;" placeholder="27999998888" maxlength="11"><br>
                    
                        <label>Email:</label>
                        <input class="form-control" type="email" name="email" style="min-width:345px; max-width:450px;" placeholder="exemplo@email.com"><br>

                        <label>Permissões de administrador?</label>
                        <div class="custom-control custom-radio">
                            <input id="sim" name="adm" type="radio" class="custom-control-input" value="1" required>
                            <label class="custom-control-label" for="sim">Sim</label> <br>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="nao" name="adm" type="radio" class="custom-control-input" value="0">
                            <label class="custom-control-label" for="nao">Não</label> <br><br>
                        </div>
                        
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

        if (formulario.nome.value == '') {
            formulario.nome.focus();
            return false;
        }
        if (formulario.telefone.value == '') {
            formulario.telefone.focus();
            return false;
        }
        if (formulario.email.value == '') {
            formulario.email.focus();
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