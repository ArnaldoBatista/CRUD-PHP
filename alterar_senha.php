<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>alterar senha</title>
</head>
<body>
<?php 
if (isset ($_GET['id'])){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
}?>
<div class="container d-flex h-100 align-items-center justify-content-center">
<div class="w-100 d-flex justify-content-center">
<form method="POST" action="atua_senha.php">
	<h3 class="text-center">Redefinir senha</h3>
	<div class="form-group">
		<input type="hidden" name="id" value="<?php print $id; ?>">
		<label for="senha">Senha: </label>
		<span class="input-group">
		<input type="password" class="form-control" name="senha" id="senha" size="30" placeholder="Digite a nova senha" required>
		<div class="btn btn-secondary" onclick="exibirsenha()"><img src="imagens/eye-black.svg" alt="" class=""/></div>
		</span>
	</div>
	<button type="submit" class="btn btn-sm mb-3 btn-primary">Concluir</button>
	<?php session_start();
		if (isset($_SESSION["erro_s"]) && $_SESSION["erro_s"] == true){?>
			<h6 class="text-success text-center"> <?php echo $_SESSION["erro_s"]; ?></h6>
	<?php unset ($_SESSION["erro_s"]);}?>
</form>
</div>
</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>