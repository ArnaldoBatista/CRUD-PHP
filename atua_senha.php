<?php
	include_once('conn.php');
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

	if (empty($senha) || strstr($senha, ' ') == true){
		session_start();
		$_SESSION["erro_s"] = "Senha invalido";
		header("Location: alterar_senha.php");	
    }
	else{
		$senha_crip = password_hash($senha, PASSWORD_DEFAULT);
		
		$query = mysqli_query($conn, "UPDATE cadastro2 SET senha = '$senha_crip' where id = '$id'");
		mysqli_close($conn);
		
		session_start();
		$_SESSION["atual_s"] = 3;
		header("Location: index.php");	
	} 
	
?>