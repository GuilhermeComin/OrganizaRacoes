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
						<li class="list-group-item active"><a href="createProdutor.php">Novo Produtor</a></li>
						<li class="list-group-item"><a href="../Cidade/createCidade.php">Nova Cidade</a></li>
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
								<h4>Novo Produtor</h4>
								<hr />
								<!-- Form de criar um novo produtor -->
								<form action="../../Controller/ProdutorController.php?operation=cadastrar" method="post" name="formProdutor">
									<div class="form-group">
										<label>Nome do Produtor: </label>
										<input required type="text" name="txtprodutor" class="form-control" placeholder="Exemplo: Gustavo da Silva"> <br>
										<label>Cidade: </label>
										<select required name="txtcidade" class="custom-select">
												<option value="" disabled selected>Selecione a Cidade</option>
												<?php 
													include_once 'Dao/CidadeDAO.php';
													include_once 'Model/Cidade.php';

													$cidadeDao = new CidadeDAO();
													$cidades = $cidadeDao->search();
													//loop para listar as cidades no select
													foreach($cidades as $c) { 															
														$idc = $c['idcidade'];
														$nomec = $c['nomecidade'];

														echo "<option value='$idc'>$nomec</option>";														
													} 
												?>												
											</select> <br>
										<br><label>Tipo de suino que aloja: </label>
										<select required name="txtsuino" class="custom-select">
											<option value="" disabled selected>Selecione o tipo de suino</option>
											<option value="1">Terminação</option>
											<option value="2">Creche</option>
											<option value="3">Maternidade</option>
										</select>
									</div>
									<button type="submit" class="btn btn-success">Cadastrar</button>
									<button class="btn btn-danger"><a class="abotao" href="../app.php">Cancelar</a></button>
									<button class="btn btn-info float-right"><a class="abotao" href="../../Controller/ProdutorController.php?operation=listar">Listar Todos</a></button>
								</form>
								<!-- Verificação do GET para saber se é para editar ou criar -->
								<?php } else if (isset($_GET['editar'])) {
								$nome = $_GET['nome'];
								$id = $_GET['id']; ?>
								<h4>Editar Produtor</h4>
								<hr />
								<!-- Form de editar um produtor -->
								<form action="../../Controller/ProdutorController.php?operation=editar&id=<?php echo "".$id ?>" method="post" name="formProdutor">
									<div class="form-group">
										<label>Nome do Produtor: </label>
										<input required type="text" name="txtprodutor" class="form-control" value="<?php echo $nome?>"> <br>
										<label>Cidade: </label>
										<select required name="txtcidade" class="custom-select">
												<option value="" disabled selected>Selecione a Cidade</option>
												<?php 
													include_once 'Dao/CidadeDAO.php';
													include_once 'Model/Cidade.php';

													$cidadeDao = new CidadeDAO();
													$cidades = $cidadeDao->search();
													//loop para listar as cidades no loop
													foreach($cidades as $c) { 															
														$idc = $c['idcidade'];
														$nomec = $c['nomecidade'];

														echo "<option value='$idc'>$nomec</option>";														
													} 
												?>												
											</select> <br>
										<br><label>Tipo de suino que aloja: </label>
										<select required name="txtsuino" class="custom-select">
											<option value="" disabled selected>Selecione o tipo de suino</option>
											<option value="1">Terminação</option>
											<option value="2">Creche</option>
											<option value="3">Maternidade</option>
										</select>
									</div>
									<button type="submit" class="btn btn-info">Editar</button>
									<button class="btn btn-danger"><a class="abotao" href="../../Controller/ProdutorController.php?operation=listar">Cancelar</a></button>
								</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

    </body>
</html>