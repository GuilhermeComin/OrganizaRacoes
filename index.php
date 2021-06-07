<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pedidos</title>

		<link rel="stylesheet" href="Include/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="Include/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
					PEDIDOS DE RAÇÃO
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Pedidos de Hoje</a></li>
						<li class="list-group-item"><a href="/View/Pedido/createPedido.php">Novo Pedido</a></li>
						<li class="list-group-item"><a href="/View/Produtor/createProdutor.php">Novo Produtor</a></li>
                        <li class="list-group-item"><a href="/View/Racao/createRacao.php">Novo Tipo de Ração</a></li>   
						<li class="list-group-item" id="logout"><a href="login.php">Sair</a></li>                 
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Pedidos: </h4>
								<hr />

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-3">Delvino Lorenzetti</div>
                                    <div class="col-sm-3">28 - Alojamento</div>
                                    <div class="col-sm-4">4.000,00 KGs</div>
									<div class="col-sm-2 mt-2 d-flex justify-content-between">
										<i class="fas fa-edit fa-lg text-info"></i>
										<i class="fas fa-trash-alt fa-lg text-danger"></i>
									</div>
								</div>

								<div class="row mb-3 d-flex align-items-center tarefa">
                                    <div class="col-sm-3">Delvino Lorenzetti</div>
                                    <div class="col-sm-3">28 - Alojamento</div>
                                    <div class="col-sm-4">4.000,00 KGs</div>
									<div class="col-sm-2 mt-2 d-flex justify-content-between">
										<i class="fas fa-edit fa-lg text-info"></i>
										<i class="fas fa-trash-alt fa-lg text-danger"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>