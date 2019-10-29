<?php
if (isset($_COOKIE["nome_usuario"]))
	$nome_usuario = $_COOKIE["nome_usuario"];
if (isset($_COOKIE["senha_usuario"]))
	$senha_usuario = $_COOKIE["senha_usuario"];
if (!(empty($nome_usuario) || empty($senha_usuario)))
{
	include_once "conn.php";
	$resultado_cookie = mysqli_query($conn, "select * from cadastro2 where nome='$nome_usuario'");
	$row_cookie = mysqli_fetch_array($resultado_cookie);
	if (mysqli_num_rows($resultado_cookie) == 1)
	{
		if ($senha_usuario != $row_cookie["senha"])
		{
			//exclui os cookies se forem inválidos
			setcookie("nome_usuario");
			setcookie("senha_usuario");
			echo "<div class='form-group'><p>Ops ocorreu um erro faça login novamente!</p>";
			echo "<a href='index.php'><button type='button' class='btn btn-sm btn-primary'>Sair</button></a></div>";
			exit;
		}
	}
	else
	{
		setcookie("nome_usuario");
		setcookie("senha_usuario");
		echo "<div class='form-group'><p>Ops ocorreu um erro faça login novamente!</p>";
		echo "<a href='index.php'><button type='button' class='btn btn-sm btn-primary'>Sair</button></a></div>";
		exit;
	}
}
else
{
	echo "<div class='form-group'><p>Ops ocorreu um erro faça login novamente!</p>";
	echo "<a href='index.php'><button type='button' class='btn btn-sm btn-primary'>Sair</button></a></div>";
	exit;
}
?>