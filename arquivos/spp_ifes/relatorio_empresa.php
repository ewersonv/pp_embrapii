
<?php
include_once("header.html");
include_once("funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
	
		<h1>Projetos <?php $empresa = empresaMaisProjetos(); echo $empresa; ?></h1>
		</div>

		<?php
			//Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
            
            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 3;

            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $conn = connect();

            /*
            $result_empresa = "SELECT nome_empresa FROM empresa INNER JOIN proposta ON empresa.id_empresa=proposta.fk_id_empresa ORDER BY id_proposta DESC LIMIT $inicio, $qnt_result_pg";
            $resultado_empresa = mysqli_query($conn, $result_empresa); */

            $result = projetosEmpresaMax($inicio, $qnt_result_pg);
            while($row = mysqli_fetch_assoc($result)){
                /* USAR ENCODE AQUI, CASO CONTRÁRIO OS CARACTERES ESPECIAIS NÃO APARECERÃO NA PÁGINA */
                ?>

                <div class="card border-secondary mb-3">
                    <h5 class="card-header"><?php echo utf8_encode($row['nome_projeto']); ?></h5>
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

            //Paginação - Quantidade total de formulários
            $result = numProjetosEmpresa($empresa);
            
            //Quantidade de pagina 
            $quantidade_pg = ceil($result / $qnt_result_pg);
            
            //Limitar os link antes depois
            $max_links = 2;
            echo "<a href='relatorio_empresa.php?pagina=1'>Primeira</a> ";
            
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                    echo "<a href='relatorio_empresa.php?pagina=$pag_ant'>$pag_ant</a> ";
                }
            }
                
            echo "$pagina ";
            
            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                    echo "<a href='relatorio_empresa.php?pagina=$pag_dep'>$pag_dep</a> ";
                }
            }
            
            echo "<a href='relatorio_empresa.php?pagina=$quantidade_pg'>Ultima</a><br><br>";
        ?>
        
	</body>
</html>