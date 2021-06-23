<?php
session_start();
//Verifica se o usuário está logado
if (empty($_SESSION['usuario']) && empty($_SESSION['senha'])) {
	header("location:../../index.php");
}
date_default_timezone_set('America/Sao_Paulo');
?>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pedidos</title>
	<!-- JQUERY -->
	<script src="../../Include/jquery/jquery-3.5.1.min.js"></script>
	<script src="../../Include/jquery/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
	<!-- Função de máscara Jquery -->
	<script>
		$(document).ready(function() {
			$("#peso").mask("#0.00", {
				reverse: true
			});
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
	<?php 		} ?>

	<div class="container app">
		<div class="row">
			<!-- Menu -->
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="../app.php">Pedidos de Hoje</a></li>
					<li class="list-group-item active"><a href="createPedido.php">Novo Pedido</a></li>
					<li class="list-group-item"><a href="../Produtor/createProdutor.php">Novo Produtor</a></li>
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
							<?php if (empty($_GET) or (isset($_GET['inserir']))) {
								$hoje = date('Y-m-d'); ?>
								<h4>Novo Pedido</h4>
								<hr />
								<!-- Form de criar um novo pedido -->
								<form action="../../Controller/PedidoController.php?operation=cadastrar" method="post" name="formPedido">
									<div class="form-group">
										<label>Produtor: </label>
										<select required name="txtprodutor" class="custom-select">
											<option value="" disabled selected>Selecione o Produtor</option>
											<?php
											include_once 'Dao/ProdutorDAO.php';
											include_once 'Model/Produtor.php';

											$produtorDao = new ProdutorDAO();
											$produtores = $produtorDao->search();
											//loop para listar os produtores no select
											foreach ($produtores as $p) {
												$idp = $p['idprodutor'];
												$nomep = $p['nomeprodutor'];

												echo "<option value='$idp'>$nomep</option>";
											}
											?>
										</select> <br>
										<div class="row">
											<div class="col-lg-9">
												<br><label>Ração: </label>
												<select required name="txttipoRacao" class="custom-select">
													<option value="" disabled selected>Selecione a Ração</option>
													<?php
													include_once 'Model/TipoRacao.php';

													$racaoDao = new ProdutorDAO();
													$racoes = $racaoDao->searchRacao();
													//loop para listar as rações no select
													foreach ($racoes as $r) {
														$idr = $r['idracao'];
														$nomer = $r['nomeracao'];

														echo "<option value='$idr'>$nomer</option>";
													}
													?>
												</select> <br>
											</div>
											<div class="col-lg-3">
												<br><label>Quantidade em KGs: </label>
												<div class="input-group">
													<input name="txtpeso" required type="real" id="peso" class="form-control">
													<div class="input-group-append">
														<span class="input-group-text">kg</span>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6">
												<br><label>Data de entrega: </label>
												<input required type="date" name="txtdata" min="<?php echo $hoje ?>" class="form-control">
											</div>
											<div class="col-lg-6">
												<br><label>Turno de Entrega: </label>
												<select required name="txtturno" class="custom-select">
													<option value="" disabled selected>Selecione o turno</option>
													<option value="1">Manhã</option>
													<option value="2">Tarde</option>
													<option value="3">Noite</option>
												</select> <br>
											</div>
										</div>
										<br>
										<button type="submit" class="btn btn-success">Cadastrar</button>
										<button class="btn btn-danger"><a class="abotao" href="../app.php">Cancelar</a></button>
										<button class="btn btn-info float-right"><a class="abotao" href="../../Controller/PedidoController.php?operation=listar">Listar Todos</a></button>
									</div>
								</form>
								<!-- Verificação do GET para saber se é para editar ou criar -->
								<?php } else if (isset($_GET['editar'])) {
									$peso = $_GET['peso'];
									$id = $_GET['id'];
									$data = $_GET['data'];
									$hoje = date('Y-m-d'); ?>
								<h4>Editar Pedido</h4>
								<hr />
								<!-- Form de editar um pedido -->
								<form action="../../Controller/PedidoController.php?operation=editar&id=<?php echo "" . $id ?>" method="post" name="formPedido">
									<div class="form-group">
										<label>Produtor: </label>
										<select required name="txtprodutor" class="custom-select">
											<option value="" disabled selected>Selecione o Produtor</option>
											<?php
											include_once 'Dao/ProdutorDAO.php';
											include_once 'Model/Produtor.php';

											$produtorDao = new ProdutorDAO();
											$produtores = $produtorDao->search();
											//loop para listar os produtores no select
											foreach ($produtores as $p) {
												$idp = $p['idprodutor'];
												$nomep = $p['nomeprodutor'];

												echo "<option value='$idp'>$nomep</option>";
											}
											?>
										</select> <br>
										<div class="row">
											<div class="col-lg-9">
												<br><label>Ração: </label>
												<select required name="txttipoRacao" class="custom-select">
													<option value="" disabled selected>Selecione a Ração</option>
													<?php
													include_once 'Model/TipoRacao.php';

													$racaoDao = new ProdutorDAO();
													$racoes = $racaoDao->searchRacao();
													//loop para listar as rações no select
													foreach ($racoes as $r) {
														$idr = $r['idracao'];
														$nomer = $r['nomeracao'];

														echo "<option value='$idr'>$nomer</option>";
													}
													?>
												</select> <br>
											</div>
											<div class="col-lg-3">
												<br><label>Quantidade em KGs: </label>
												<div class="input-group">
													<input name="txtpeso" required type="real" id="peso" class="form-control" value="<?php echo $peso ?>">
													<div class="input-group-append">
														<span class="input-group-text">kg</span>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6">
												<br><label>Data de entrega: </label>
												<input required type="date" name="txtdata" min="<?php echo $hoje ?>" class="form-control" value="<?php echo $data ?>">
											</div>
											<div class="col-lg-6">
												<br><label>Turno de Entrega: </label>
												<select required name="txtturno" class="custom-select">
													<option value="" disabled selected>Selecione o turno</option>
													<option value="1">Manhã</option>
													<option value="2">Tarde</option>
													<option value="3">Noite</option>
												</select> <br>
											</div>
										</div>
										<br>
										<button type="submit" class="btn btn-info">Editar</button>
										<button class="btn btn-danger"><a class="abotao" href="../../Controller/PedidoController.php?operation=listar">Cancelar</a></button>
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

</html>