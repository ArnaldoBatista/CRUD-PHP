<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Redefinir senha</title>
</head>
<body>
<div class="container d-flex h-100 align-items-center justify-content-center">
<div class="w-100 d-flex justify-content-center">
<form method="POST" action="env_email.php">
	<h3 class="text-center">Redefinir senha</h3>
	<div class="form-group">
		<label for="nome">Usuario: </label>
		<input type="text" class="form-control" name="nome" id="nome" size="30" placeholder="Digite seu nome" required>
	</div>
	<div class="form-group">
		<label for="nome">Email: </label>
		<input type="email" class="form-control" name="email" id="email" size="30" placeholder="Digite o email cadastrado" required>
	</div>
	<button type="submit" class="btn btn-sm mb-3 btn-primary">Enviar</button>
	<?php session_start();
		if (isset($_SESSION["env_s"]) && $_SESSION["env_s"] == true){?>
			<h6 class="text-success text-center"> <?php echo $_SESSION["env_s"]; ?></h6>
		<?php unset ($_SESSION["env_s"]);}?>
		<?php if (isset($_SESSION["env_f"]) && $_SESSION["env_f"] == true){?>
			<h6 class="text-danger text-center"> <?php echo $_SESSION["env_f"]; ?></h6>
	<?php unset ($_SESSION["env_f"]);}?>
</form>
</div>
</div>
</body>
</html>