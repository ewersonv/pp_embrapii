<?php
include_once("../controller/sessao_adm.php");
include_once("header.php");
include_once("../controller/funcoes.php");
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
            <h3>Consultar Prospectadores</h3><br>

            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>

            <div class="table-responsive">
                <table class="table responsive">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Permissao</th>
                        <th scope="col">Propostas</th>
                        <th scope="col">Finalizadas</th>
                        <th scope="col">Último acesso</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $result = getProspectadores();
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if($row['permissao'] == 1)
                        {
                            $permissao = "Admin";
                        }
                        else
                        {
                            $permissao = "Comum";
                        }
                        if($row['finalizadas'] < 1)
                        {
                            $finalizadas = 0;
                        }
                        else
                        {
                            $finalizadas = $row['finalizadas'];
                        }
                        echo "<tr>";
                        echo "<th scope='row'>" . utf8_decode($row['nome']) . "</th>";
                        echo "<td>" . utf8_decode($row['email']) . "</td>";
                        echo "<td>" . utf8_decode($row['telefone']) . "</td>";
                        echo "<td>" . utf8_decode($permissao) . "</td>";
                        echo "<td>" . utf8_decode($row['propostas']) . "</td>";
                        echo "<td>" . utf8_decode($finalizadas) . "</td>";
                        echo "<td></td>";

                        ?>
                        <td><a class="btn btn-sm btn-danger" href="" role="button" onclick="confirma(<?php echo $row['id'] ?>)">DELETAR</a></p></td>
                        <?php echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            
                                
            </form>
        </div>
    </div>
    <script>
        function confirma(id)
        {
            var apagar = confirm('Você realmente deseja excluir este prospectador?');
            if (apagar)
            {
                <?php $_SESSION['submit'] = 1; ?>;
                location.href = '../controller/deletar_usuario.php?id='+ id;
            }
        }
    </script>
</body>
</html>