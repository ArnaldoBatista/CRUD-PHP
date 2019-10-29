<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Login</title>
</head>
<body>
<div class="container d-flex h-100 align-items-center justify-content-center">
<div class="w-100 d-flex justify-content-center">
<form method="POST" action="login.php">
	<h3 class="text-center">Login</h3>
	<?php 
	session_start(); 
	if (isset($_SESSION["erro_1"]) && $_SESSION["erro_1"] == 1){?>
	<h6 class="text-danger text-center">Usuario invalido</h6>
	<?php 
	unset ($_SESSION["erro_1"]);
	} 
	else if (isset($_SESSION["erro_2"])){?>
	<h6 class="text-danger text-center">Senha invalido</h6>
	<?php 
	unset ($_SESSION["erro_2"]);
	}
	else if (isset($_SESSION["atual_s"])){?>
	<h6 class="text-success text-center">Senha alterado com sucesso faça <br>login com a nova senha</h6>
	<?php 
	unset ($_SESSION["atual_s"]);
	} 
	?>
	<div class="form-group">
		<label for="nome">Usuário: </label>
		<input type="text" class="form-control" name="username" id="nome" size="30" placeholder="Digite seu nome" required>
	</div>
	<div class="form-group">
		<label for="nome">Senha: </label>
		<span class="input-group">
		<input type="password" class="form-control" name="senha" id="senha" size="30" placeholder="Didite sua senha" required>
		<div class="btn btn-secondary" onclick="exibirsenha()"><img src="imagens/eye-black.svg" alt="" class=""/></div>
		</span>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-sm btn-primary">Entrar</button>
		<a href="cadastro.php"><div class="btn btn-sm btn-primary">Cadastrar</div></a>
		<a href="redefinir_senha.php"><div class="btn btn-sm btn-primary">Esqueci a senha</div></a>
	</div>
</form>
</div>
</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>