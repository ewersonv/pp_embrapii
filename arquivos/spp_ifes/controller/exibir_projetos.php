<?php
include_once("funcoes.php");
    $conn = connect();

    $id_usuario = $_SESSION['id'];
    $tipo = $_SESSION['tipo'];

    while($row = mysqli_fetch_assoc($result)){
        /* USAR ENCODE AQUI, CASO CONTRÁRIO OS CARACTERES ESPECIAIS NÃO APARECERÃO NA PÁGINA */
        ?>

        <div class="card border-secondary mb-3">
            <h5 class="card-header"><?php echo "<b></b>" . utf8_encode($row['nome_projeto']); ?></h5>
                <div class="card-body">
                    <?php
                        
                        echo "<b>Número do projeto: </b>" . utf8_encode($row['id_projeto']) . "<br>";
                        echo "<b>Empresa: </b>" . utf8_encode($row['nome_empresa']) . "<br>";
                        echo "<b>Prospectado por: </b>" . utf8_encode($row['nome_usuario']) . "<br>";
                        echo "<b>Descrição do produto: </b>" . utf8_encode(limita_caracteres($row['descricao'], 250)) . "<br><br>";
                        if($tipo == 1) /* se o usuário é um administrador */
                        {
                            if($row['id_usuario'] == $id_usuario)  /* se a proposta ainda não foi finalizada */
                            {
                                if($row['finalizado'] == 0)
                                {
                                    echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='edit_proposta.php?id=" . $row['id_projeto'] . "' role='button'>Preencher proposta</a>";
                                }
                                else
                                {
                                    echo "<p style='color:green;'>Proposta finalizada.</p>";
                                    echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='visualizar_proposta.php?id=" . $row['id_projeto'] . "' role='button'>Visualizar proposta</a>";
                                }
                            }
                            else
                            {
                                if($row['finalizado'] == 1)
                                {
                                    echo "<p style='color:green;'>Proposta finalizada.</p>";
                                }
                                echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='visualizar_proposta.php?id=" . $row['id_projeto'] . "' role='button'>Visualizar proposta</a>";
                            }
                        }
                        else /* se o usuário NÃO é um administrador */
                        {
                            if($row['id_usuario'] == $id_usuario) /* se o usuário pode preencher a proposta */
                            {
                                if($row['finalizado'] == 0) /* se a proposta não foi finalizada */
                                {
                                    echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='edit_proposta.php?id=" . $row['id_projeto'] . "' role='button'>Preencher proposta</a>";
                                }
                                else /* proposta finalizada */
                                {
                                    echo "<p style='color:green;'>Proposta finalizada.</p>";                                    
                                    echo "<p><a class='btn btn-sm mr-2 btn-outline-dark' href='visualizar_proposta.php?id=" . $row['id_projeto'] . "' role='button'>Visualizar proposta</a>";
                                }
                            }    
                        }
                        echo "<a class='btn btn-sm mr-2 btn-outline-danger' href='../controller/gerar_pdf.php?id=" . $row['id_projeto'] . "' role='button'>PDF</a>";
                        echo "<a class='btn btn-sm btn-outline-success' href='../controller/gerar_planilha.php?id=" . $row['id_projeto'] . "' role='button'>XLS</a></p>";

                    ?>
                </div>
        </div>

        <?php
    }
    
    //Quantidade de pagina 
    $quantidade_pg = ceil($qtd_total / $qnt_result_pg);
    
    //Limitar os link antes depois
    $max_links = 2;
    echo "<a href='$nome_pagina?pagina=1'>Primeira</a> ";
    
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo "<a href='$nome_pagina?pagina=$pag_ant'>$pag_ant</a> ";
        }
    }
        
    echo "$pagina ";
    
    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){
            echo "<a href='$nome_pagina?pagina=$pag_dep'>$pag_dep</a> ";
        }
    }
    
    echo "<a href='$nome_pagina?pagina=$quantidade_pg'>Última</a><br><br>";
    
?>