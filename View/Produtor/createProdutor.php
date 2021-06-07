<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pedidos</title>

		<link rel="stylesheet" href="../../Include/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="../../index.php">
					<img src="../../Include/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
					PEDIDOS DE RAÇÃO
				</a>
			</div>
		</nav>
        <div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
                        <li class="list-group-item"><a href="../../index.php">Pedidos de Hoje</a></li>
						<li class="list-group-item"><a href="../Pedido/createPedido.php?operation=cadastrar">Novo Pedido</a></li>
						<li class="list-group-item active"><a href="createProdutor.php?operation=cadastrar">Novo Produtor</a></li>
                        <li class="list-group-item"><a href="../Racao/createRacao.php?operation=cadastrar">Novo Tipo de Ração</a></li>
						<li class="list-group-item" id="logout"><a href="../../login.php">Sair</a></li>   
					</ul>
				</div>
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo Produtor</h4>
								<hr />

								<form action="../../Controller/ProdutorController.php?operation=cadastrar" method="post" name="formProdutor">
									<div class="form-group">
										<label>Nome do Produtor: </label>
										<input required type="text" name="txtprodutor" class="form-control" placeholder="Exemplo: Gustavo da Silva"> <br>
										<label>Cidade: </label>
										<input required type="text" name="txtcidade" class="form-control" placeholder="Exemplo: Marau"> <br>
										<label>Tipo de suino que aloja: </label>
										<select required name="txtsuino" class="custom-select">
											<option value="" disabled selected>Selecione o tipo de suino</option>
											<option value="1">Terminação</option>
											<option value="2">Creche</option>
											<option value="3">Maternidade</option>
										</select>
									</div>
									<button type="submit" class="btn btn-success">Cadastrar</button>
									<button class="btn btn-danger"><a class="abotao" href="../../index.php">Cancelar</a></button>
									<button class="btn btn-info float-right"><a class="abotao" href="../../Controller/ProdutorController.php?operation=listar">Listar Todos</a></button>
								</form>
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