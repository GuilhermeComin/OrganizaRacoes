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
					<img src="../../Include/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo" >
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
						<li class="list-group-item"><a href="../Cidade/createCidade.php">Nova Cidade</a></li>
                        <li class="list-group-item active"><a href="createRacao.php">Novo Tipo de Ração</a></li> 
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
								<h4>Nova Ração</h4>
								<hr />		
								<!-- Form de criar uma nova ração -->						
								<form action="../../Controller/RacaoController.php?operation=cadastrar" method="post" name="formRacao">
									<div class="form-group">
										<label>ID da ração:</label>
										<input required type="number" name="txtidracao" class="form-control" placeholder="Exemplo: 28"><br>
										<label>Nome da ração:</label>
										<input required type="text" name="txtnomeracao" class="form-control" placeholder="Exemplo: Alojamento"><br>
										<label>Destino:</label>
										<select required name="txtdestino" class="custom-select">
											<option value="" disabled selected>Selecione o tipo de Destino</option>
											<option value="1">Terminação</option>
											<option value="2">Creche</option>
											<option value="3">Maternidade</option>
										</select>
									</div>
									<button type="submit" class="btn btn-success">Cadastrar</button>
									<button class="btn btn-danger"><a class="abotao" href="../app.php">Cancelar</a></button>
									<button class="btn btn-info float-right"><a class="abotao" href="../../Controller/RacaoController.php?operation=listar">Listar Todos</a></button>
								</form>
								<!-- Verificação do GET para saber se é para editar ou criar -->
								<?php } else if (isset($_GET['editar'])) {
									$nome = $_GET['nome'];
									$id = $_GET['id'];  ?>
									<h4>Editar Ração</h4>
								<hr />			
								<!-- Form de editar uma ração -->					 	 
								<form action="../../Controller/RacaoController.php?operation=editar&id=<?php echo "".$id ?>" method="post" name="formRacao">
									<div class="form-group">
										<label>ID da ração:</label>
										<input required type="number" name="txtidracao" class="form-control" value="<?php echo "$id" ?>"><br>
										<label>Nome da ração:</label>
										<input required type="text" name="txtnomeracao" class="form-control" value="<?php echo "$nome" ?>"><br>
										<label>Destino:</label>
										<select required name="txtdestino" class="custom-select" id="selectedit">
											<option value="" disabled>Selecione o tipo de Destino</option>
											<option value="1">Terminação</option>
											<option value="2">Creche</option>
											<option value="3">Maternidade</option>
										</select>
									</div>
									<button type="submit" class="btn btn-info">Editar</button>
									<button class="btn btn-danger"><a class="abotao" href="../../Controller/RacaoController.php?operation=listar">Cancelar</a></button>
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
		const descricao = urlParams.get('descricao');

		//Setar o select com o valor recebido
		document.getElementById('selectedit').value = descricao;
	</script>
</html>