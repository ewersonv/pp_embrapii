<?php
include_once("funcoes.php");
    $conn = connect();

    while($row = mysqli_fetch_assoc($result)){
        /* USAR ENCODE AQUI, CASO CONTRÁRIO OS CARACTERES ESPECIAIS NÃO APARECERÃO NA PÁGINA */
        ?>

        <div class="card border-secondary mb-3">
            <h5 class="card-header"><?php echo "<b></b>" . utf8_encode($row['nome_projeto']); ?></h5>
                <div class="card-body">
                    <?php
                        
                        echo "<b>Número do projeto: </b>" . utf8_encode($row['id_projeto']) . "<br>";
                        echo "<b>Empresa: </b>" . utf8_encode($row['nome_empresa']) . "<br>";
                        echo "<b>Prospectado por: </b>" . utf8_encode($row['nome_pessoa']) . "<br>";
                        echo "<b>Descrição do produto: </b>" . utf8_encode(limita_caracteres($row['descricao_produto'], 250)) . "<br><br>";
                        echo "<p><a class='btn btn-sm btn-outline-secondary' href='edit_formulario.php?id=" . $row['id_projeto'] . "' role='button'>Preencher proposta</a></p>";
                    ?>
                </div>
        </div>

        <?php
    }
    
    //Quantidade de pagina 
    $quantidade_pg = ceil($qtd_total_paginas / $qnt_result_pg);
    
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
    
    echo "<a href='$nome_pagina?pagina=$quantidade_pg'>Ultima</a><br><br>";
    
?>