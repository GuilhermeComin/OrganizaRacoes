<?php
session_start();
//Verifica se o usuário está logado
if (empty($_SESSION['usuario']) && empty($_SESSION['senha'])) {
	header("location:../../index.php");
}
//Verifica se a variável de sessão está vazia
if (empty($_SESSION['racoes'])) {
	header("location:../../Controller/RacaoController.php?operation=listar");
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
			<a class="navbar-brand" href="../../index.php">
				<img src="../../Include/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
				PEDIDOS DE RAÇÃO
			</a>
		</div>
	</nav>

	<!-- Div que define o espaço que o aplicativo irá operar -->
	<div class="container app">
		<div class="row">
			<div class="col-md-2 menu">
				<ul class="list-group">
					<li class="list-group-item" id="voltar"><a href="../Racao/createRacao.php">Voltar</a></li>
					<li class="list-group-item" id="logout"><a href="../../Controller/AuthController.php?operation=logout">Sair</a></li>
				</ul>
			</div>

			<!-- Tabela de listagem -->
			<div class="col-md-10">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Todas as Rações: </h4>
							<hr />

							<!-- Títulos das colunas -->
							<div class="row mb-3 d-flex align-items-center tarefa">
								<div class="col-sm-2 font-weight-bold">ID</div>
								<div class="col-sm-4 font-weight-bold">Ração</div>
								<div class="col-sm-4 font-weight-bold">Destino</div>
								<div class="col-sm-2 mt-2 d-flex justify-content-between">
								</div>
							</div>

							<?php
							//Verificação se a variável de sessão está setada
							if (isset($_SESSION['racoes'])) {
								include_once 'Model/TipoRacao.php';

								$racoes = unserialize($_SESSION['racoes']);

								//Loop de apresentação de dados
								foreach ($racoes as $r) {
									$id = $r['idracao']; ?>

									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-2"><?php echo $id ?></div>
										<div class="col-sm-4"><?php echo $r['nomeracao'] ?></div>
										<div class="col-sm-4"><?php echo $r['descricao'] ?></div>
										<div class="col-sm-2 mt-2 d-flex justify-content-between">
											<a href="createRacao.php?editar&id=<?php echo "" . $id . "&nome=" . $r['nomeracao'] . "&descricao=" . $r['tipodestino'] ?>"><i class="fas fa-edit fa-lg text-info"></i>
												<a href="../../Controller/RacaoController.php?operation=deletar&id=<?php echo "" . $id ?>" onclick="return confirm('Deseja excluir esse registro ?')"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
										</div>
									</div>
							<?php	}
								//Limpa a variável de sessão para os valores não ficarem setados nas outras telas do app
								unset($_SESSION['racoes']);
							}
							?>

						</div>
					</div>
				</div>
			</div>



		</div>
	</div>
</body>

</html>