<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pedidos</title>
		<script src="../Include/jquery/jquery-3.5.1.min.js"></script>
		<script src="../Include/jquery/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
		<script>
			$(document).ready(function() {
			$("#peso").mask("#.##0,00", {reverse: true});
			// $('.money').mask('#.##0,00', {reverse: true});
		});
		</script>   
		<link rel="stylesheet" href="../Include/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 
		</head>

	<body>
		
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="../index.php">
					<img src="../Include/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
					PEDIDOS DE RAÇÃO
				</a>
			</div>
		</nav>
        <div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
                        <li class="list-group-item"><a href="../index.php">Pedidos de Hoje</a></li>
						<li class="list-group-item active"><a href="createPedido.php">Novo Pedido</a></li>
						<li class="list-group-item"><a href="createProdutor.php">Novo Produtor</a></li>
                        <li class="list-group-item"><a href="createRacao.php">Novo Tipo de Ração</a></li>  
					</ul>
				</div>
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo Pedido</h4>
								<hr />

								<form>
									<div class="form-group">
									<label>Produtor: </label>
										<select class="custom-select">
											<option selected>Selecione o Produtor</option>
											<option value="1">Terminação</option>
											<option value="2">Creche</option>
											<option value="3">Maternidade</option>
										</select> <br>
										<div class="row">
											<div class="col-lg-9">
												<br><label>Ração: </label>
												<select class="custom-select">
													<option selected>Selecione a Ração</option>
													<option value="1">Terminação</option>
													<option value="2">Creche</option>
													<option value="3">Maternidade</option>
												</select> <br>
											</div>
											<div class="col-lg-3">
												<br><label>Quantidade em KGs: </label>
												<div class="input-group">
													<input type="real" id="peso" class="form-control">
													<div class="input-group-append">
														<span class="input-group-text">kg</span>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6">
												<br><label>Data de entrega: </label>
												<input type="date" class="form-control">
											</div>
											<div class="col-lg-6">
												<br><label>Turno de Entrega: </label>
												<select class="custom-select">
													<option selected>Selecione o turno</option>
													<option value="manha">Manhã</option>
													<option value="tarde">Tarde</option>
													<option value="noite">Noite</option>
											</select> <br>
										</div>	
									</div>
									<br>
									<button class="btn btn-success">Cadastrar</button>
									<button class="btn btn-danger"><a class="abotao" href="../index.php">Cancelar</a></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</body>
</html>
