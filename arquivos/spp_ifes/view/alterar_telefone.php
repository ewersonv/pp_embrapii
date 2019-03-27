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
		<div class="text-left">
            <br><br><br><br>
            <h3>Alterar telefone</h3><br>

            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>

            <form name="formulario" class="align center" style="float:center" method="POST" action="../controller/proc_alterar_telefone.php">
                <label>Insira o novo telefone:</label>
                <input class="form-control" type="text" name="telefone" style="max-width:400px;" placeholder="27999998888" maxlength="11"><br>
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="validate()">Confirmar</button><br>
                
            </form>
        </div>
    </div>
    <script>
        function validate() {
            var regex = /^(?!.*\s)[0-9]*$/;

            if (formulario.telefone.value == '') {
                formulario.telefone.focus();
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