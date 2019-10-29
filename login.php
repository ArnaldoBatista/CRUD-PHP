<?php
// obtém os valores digitados
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
//acesso ao banco de dados
include_once "conn.php";
$resultado = mysqli_query($conn, "select * from cadastro2 where nome='$username'");
$linhas = mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$senha_bd = $row["senha"];
if ($linhas == 0) //testa se a consulta retornou algum registro
{
	session_start();
	$_SESSION["erro_1"] = "1"; 
	header("Location: index.php");
}
else
{
	if (password_verify($senha, $senha_bd)) //confere senha 
	{
		setcookie("nome_usuario", $username);
		setcookie("senha_usuario",  $senha_bd);
		// direciona para página principal
		header ("Location: dados_cadastrados.php");
	}
	else //usuario e senha corretos criando cookies
	{
		session_start();
		$_SESSION["erro_2"] = "2";
		header("Location: index.php");
	}
}
mysqli_close($conn);
?>
