<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pedidos</title>

        <!-- CSS/BOOTSTRAP/FONT AWESOME/JQUERY -->
		<link rel="stylesheet" href="Include/css/styleLogin.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	</head>

	<body>
        <!-- Tela de login -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <form action="/Controller/AuthController.php?operation=login" class="box" name="formLogin" method="POST">
                            <h1>Login</h1>
                            <p class="text-muted"> Por favor insira seu usuário e senha!</p>
                            <input required type="text" name="txtusuario" placeholder="Usuário"> 
                            <input required type="password" name="txtsenha" placeholder="Senha"> 
                            <input type="submit" value="Login">                           
                        </form>
                    </div>
                </div>
            </div>
        </div>

	</body>
</html>