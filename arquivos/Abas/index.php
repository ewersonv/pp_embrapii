<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
<?php 
	include_once("conexao.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Prospecção de Projetos</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Formulário de prospecção</h1>
			</div>			
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$request = md5(implode($_POST));
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){
						echo "Usuário já foi inserido";
					}else{	
						$_SESSION['ultima_request'] = $request;
						$nome = $_POST['nome'];
						$cpf = $_POST['cpf'];
						$email = $_POST['email'];
						$telefone = $_POST['telefone'];
						$tipo_representante = $_POST['tipo_representante'];
						$_SESSION['nome'] = $nome;
						$_SESSION['cpf'] = $cpf;
						$_SESSION['email'] = $email;
						$_SESSION['telefone'] = $telefone;
						$_SESSION['tipo_representante'] = $tipo_representante;					
						$result_dados_prospectador = "INSERT INTO pessoa (nome, cpf, email, telefone) VALUES ('$nome', '$cpf', '$email', '$telefone')"; /* add tipo_representante apenas na tabela prospectador*/
						$resultado_dados_prospectador= mysqli_query($conn, $result_dados_prospectador);
						//ID do usuario inserido
						$ultimo_id = mysqli_insert_id($conn);	
						echo $ultimo_id;
					}
				}
			?>
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#dados_prospectador" aria-controls="home" role="tab" data-toggle="tab">Dados do Prospectador</a></li>
				<li role="presentation"><a href="#dados_da_proposta" aria-controls="dados_da_proposta" role="tab" data-toggle="tab">Dados da Proposta</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="dados_prospectador">
					<div style="padding-top:20px;">
						<form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" name='nome' class="form-control" id="nome" placeholder="Nome Completo" value="<?php if(isset($_SESSION['nome'])){ echo $_SESSION['nome']; }?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CPF</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cpf' class="form-control" id="cpf" placeholder="CPF" value="<?php if(isset($_SESSION['cpf'])){ echo $_SESSION['cpf']; } ?>">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name='email' class="form-control" id="email" placeholder="abcd@email.com" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">Telefone</label>
                                <div class="col-sm-10">
                                    <input type="text" name='telefone' class="form-control" id="telefone" placeholder="2788889999" value="<?php if(isset($_SESSION['telefone'])){ echo $_SESSION['telefone']; } ?>">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">Você é representante:</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name='cb1' id="cb1" value="<?php if(isset($_SESSION['tipo_representante'])){ echo $_SESSION['tipo_representante']; } ?>" /> da empresa<br>
									<input type="checkbox" name='cb2' id="cb2" value="<?php if(isset($_SESSION['tipo_representante'])){ echo $_SESSION['tipo_representante']; } ?>" /> do Polo de Inovação
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Próximo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="dados_da_proposta">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome da empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nome_da_empresa" placeholder="Nome">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">CNPJ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="cnpj" placeholder="CNPJ">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">Tipo de empresa:</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name='cb1' id="cb1" value="<?php if(isset($_SESSION['tipo_representante'])){ echo $_SESSION['tipo_representante']; } ?>" /> MEI/ME<br>
									<input type="checkbox" name='cb2' id="cb2" value="<?php if(isset($_SESSION['tipo_representante'])){ echo $_SESSION['tipo_representante']; } ?>" /> Médio/Grande porte
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">A proposta é uma prestação de serviço ou um projeto de inovação?</label>
                                <div class="col-sm-10">
                                    <br><br><input type="checkbox" name='cb1' id="cb1" value="<?php if(isset($_SESSION['tipo_representante'])){ echo $_SESSION['tipo_representante']; } ?>" /> Projeto de inovação<br>
									<input type="checkbox" name='cb2' id="cb2" value="<?php if(isset($_SESSION['tipo_representante'])){ echo $_SESSION['tipo_representante']; } ?>" /> Prestação de serviço
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Produto final:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="produto_final" placeholder="Nome do produto">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">Justificativa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="justificativa" placeholder="Justificativa do projeto">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="messages">
				
				</div>
			  </div>

			</div>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>