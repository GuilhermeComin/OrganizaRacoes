<?php
	session_start();
	//Verifica se o usuário está logado
	if (empty($_SESSION['usuario']) && empty($_SESSION['senha'])) {
		header("location:../../index.php");
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pedidos</title>

		<!-- JQUERY -->
		<script src="../../Include/jquery/jquery-3.5.1.min.js"></script>
		<script src="../../Include/jquery/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
		<!-- Função Jquery de máscara -->
		<script>
			$(document).ready(function() {
			$("#peso").mask("#0.00", {reverse: true});
		});
		</script> 

		<!-- CSS/BOOTSTRAP/FONT AWESOME -->
		<link rel="stylesheet" href="../../Include/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		</head>

	<body>
		
		<!-- "header" do app -->
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="../app.php">
					<img src="../../Include/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
					PEDIDOS DE RAÇÃO
				</a>
			</div>
		</nav>
		
		<!-- Feedback de inserção concluída -->
		<?php 	if (isset($_GET['inserir']) && ($_GET['inserir'] == 1)) { ?>
					<div class="bg-success pt-2 text-white d-flex justify-content-center">
					<h5>Inserido com sucesso!</h5>
				  </div>
		<?php 	} ?>

        <div class="container app">
			<div class="row">
				<!-- Menu -->
				<div class="col-md-3 menu">
					<ul class="list-group">
                        <li class="list-group-item"><a href="../app.php">Pedidos de Hoje</a></li>
						<li class="list-group-item"><a href="../Pedido/createPedido.php">Novo Pedido</a></li>
						<li class="list-group-item"><a href="../Produtor/createProdutor.php">Novo Produtor</a></li>
						<li class="list-group-item active"><a href="createCidade.php">Nova Cidade</a></li>
                        <li class="list-group-item"><a href="../Racao/createRacao.php">Novo Tipo de Ração</a></li> 
						<li class="list-group-item" id="logout"><a href="../../Controller/AuthController.php?operation=logout">Sair</a></li>  
					</ul>
				</div>

				<!-- Tela do form -->
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<!-- Verificação do GET para saber se é para editar ou criar -->
								<?php if (empty($_GET) or (isset($_GET['inserir']))) { ?>
								<h4>Nova Cidade</h4>
								<hr />
								<!-- Form de criar uma nova cidade -->
								<form action="../../Controller/CidadeController.php?operation=cadastrar" method="post" name="formCidade">
									<div class="form-group">
										<label>Nome da Cidade: </label>
										<input required type="text" name="txtcidade" class="form-control" placeholder="Exemplo: Passo Fundo"> <br>									
										<br><label>Estado: </label>
										<select required name="txtestado" class="custom-select">
											<option value="" disabled selected>Selecione o Estado</option>
											<option value="Acre">Acre</option>
											<option value="Alagoas">Alagoas</option>
											<option value="Amapá">Amapá</option>
											<option value="Amazonas">Amazonas</option>
											<option value="Bahia">Bahia</option>
											<option value="Ceará">Ceará</option>
											<option value="Distrito Federal">Distrito Federal</option>
											<option value="Espírito Santo">Espírito Santo</option>
											<option value="Goiás">Goiás</option>
											<option value="Maranhão">Maranhão</option>
											<option value="Mato Grosso">Mato Grosso</option>
											<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
											<option value="Minas Gerais">Minas Gerais</option>
											<option value="Pará">Pará</option>
											<option value="Paraíba">Paraíba</option>
											<option value="Paraná">Paraná</option>
											<option value="Pernambuco">Pernambuco</option>
											<option value="Piauí">Piauí</option>
											<option value="Rio de Janeiro">Rio de Janeiro</option>
											<option value="Rio Grande do Norte">Rio Grande do Norte</option>
											<option value="Rio Grande do Sul">Rio Grande do Sul</option>
											<option value="Rondônia">Rondônia</option>
											<option value="Roraima">Roraima</option>
											<option value="Santa Catarina">Santa Catarina</option>
											<option value="São Paulo">São Paulo</option>
											<option value="Sergipe">Sergipe</option>
											<option value="Tocantins">Tocantins</option>
										</select> <br>
										<br>
										<button type="submit" class="btn btn-success">Cadastrar</button>
										<button class="btn btn-danger"><a class="abotao" href="../app.php">Cancelar</a></button>
										<button class="btn btn-info float-right"><a class="abotao" href="../../Controller/CidadeController.php?operation=listar">Listar Todos</a></button>
									</div>
								</form>
								<!-- Verificação do GET para saber se é para editar ou criar -->
								<?php } else if (isset($_GET['editar'])) {
								$nome = $_GET['nome'];
								$id = $_GET['id'] ?>
								<h4>Editar Cidade</h4>
								<hr />
								<!-- Form de editar uma cidade -->
								<form action="../../Controller/CidadeController.php?operation=editar&id=<?php echo "".$id ?>" method="post" name="formCidade">
									<div class="form-group">
										<label>Nome da Cidade: </label>
										<input required type="text" name="txtcidade" class="form-control" value="<?php echo $nome?>"> <br>									
										<br><label>Estado: </label>
										<select required name="txtestado" class="custom-select" id="selectedit">
											<option value="" disabled selected>Selecione o Estado</option>
											<option value="Acre">Acre</option>
											<option value="Alagoas">Alagoas</option>
											<option value="Amapá">Amapá</option>
											<option value="Amazonas">Amazonas</option>
											<option value="Bahia">Bahia</option>
											<option value="Ceará">Ceará</option>
											<option value="Distrito Federal">Distrito Federal</option>
											<option value="Espírito Santo">Espírito Santo</option>
											<option value="Goiás">Goiás</option>
											<option value="Maranhão">Maranhão</option>
											<option value="Mato Grosso">Mato Grosso</option>
											<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
											<option value="Minas Gerais">Minas Gerais</option>
											<option value="Pará">Pará</option>
											<option value="Paraíba">Paraíba</option>
											<option value="Paraná">Paraná</option>
											<option value="Pernambuco">Pernambuco</option>
											<option value="Piauí">Piauí</option>
											<option value="Rio de Janeiro">Rio de Janeiro</option>
											<option value="Rio Grande do Norte">Rio Grande do Norte</option>
											<option value="Rio Grande do Sul">Rio Grande do Sul</option>
											<option value="Rondônia">Rondônia</option>
											<option value="Roraima">Roraima</option>
											<option value="Santa Catarina">Santa Catarina</option>
											<option value="São Paulo">São Paulo</option>
											<option value="Sergipe">Sergipe</option>
											<option value="Tocantins">Tocantins</option>
										</select> <br>
										<br>
										<button type="submit" class="btn btn-info">Editar</button>
										<button class="btn btn-danger"><a class="abotao" href="../../Controller/CidadeController.php?operation=listar">Cancelar</a></button>
									</div>
								</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
		//Função para fazer um GET na url em JS
		const urlParams = new URLSearchParams(window.location.search);
		var estado = urlParams.get('estado');

		// //Setar o select com o valor recebido
		document.getElementById('selectedit').value = estado;
	</script>
</html>
