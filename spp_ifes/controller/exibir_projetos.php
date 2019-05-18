<?php

if ($_SESSION['submit'] != 1) /* se a página foi acessada via url */
{
	header("Location: ../view/index.php");
}
else /* se a página foi acessada via submit da página anterior */
{
    include_once("../model/funcoes.php");
    include_once("../model/propostas/funcoes_exibicao.php");
    $_SESSION['submit'] = 0;

    $id_usuario = $_SESSION['id'];
    $tipo = $_SESSION['tipo'];

    while($row = mysqli_fetch_assoc($result)){
        /* USAR ENCODE AQUI, CASO CONTRÁRIO OS CARACTERES ESPECIAIS NÃO APARECERÃO NA PÁGINA */
        ?>

        <div class="card border-secondary mb-3">
            <h5 class="card-header"><?php echo "<b>" . utf8_encode($row['nome_projeto']) . "</b>" ?></h5>
                <div class="card-body">
                        
                        <b>Empresa: </b> <?php echo utf8_encode($row['nome_empresa']) ?> <br>
                        <b>Prospectado por: </b> <?php echo utf8_encode($row['nome_usuario']) ?> <br>
                        <b>Descrição do produto: </b> <?php echo utf8_encode(limita_caracteres($row['descricao'], 280)) ?> <br><br>
                        
                        <?php acessarProposta($tipo, $id_usuario, $row['id_usuario'], $row['finalizado'], $row['id_projeto']); ?>

                        <br><br>

                        <a class="btn btn-sm mr-2 btn-outline-danger" href="../controller/gerar_pdf.php?id='<?php echo $row['id_projeto'] ?>'" role="button">PDF</a>
                        <a class="btn btn-sm mr-2 btn-outline-success" href="../controller/gerar_csv.php?id='<?php echo $row['id_projeto'] ?>'" role="button">CSV</a>
                        <a class='btn btn-sm btn-danger' href="#" role='button' onclick="confirma(<?php echo $row['id_projeto']; ?>)">DELETAR PROPOSTA</a>
                        
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
} 
?>
<script>
function confirma(id)
{
    var apagar = confirm('Você realmente deseja excluir esta proposta?');
    if (apagar)
    {
        <?php $_SESSION['submit'] = 1; ?>;
        location.href = '../controller/deletar_proposta.php?id='+ id;
    }
}
</script>