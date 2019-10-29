<?php
use PHPMailer\PHPMailer\PHPMailer; //importando classes

if (isset($_POST["nome"]) && isset($_POST["email"])){
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	
	include_once "conn.php";
	$resultado = mysqli_query($conn, "select * from cadastro2 where nome='$nome' and email='$email'");
	$resultado_consult = mysqli_fetch_array($resultado);
	
	if ($resultado_consult == 0){
		session_start();
		$_SESSION["env_f"] = "Nome do usuario ou email invalido";
		header("Location: redefinir_senha.php");	
	}
	else{	
		require_once("PHPMailer/PHPMailer.php");
		require_once("PHPMailer/SMTP.php");
		require_once("PHPMailer/Exception.php");
	
		$mail = new PHPMailer();

		try{	
			$id = $resultado_consult["id"];
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com"; //endereço do host do SMTP obg
			$mail->SMTPAuth = true; //define se haverá ou não autenticação obg
			$mail->Username = "1234.teste.email@gmail.com"; //login de autenticação do SMTP obg
			$mail->Password = 'teste-1234-email'; //senha de autenticação do SMTP obg
			$mail->Port = 465; //indica a posta de conexão do gmail obg
			$mail->SMTPSecure = "ssl"; //definindo o mecanismo de segurança obg
			$mail->IsHTML(true); //definindo formato html
			$mail->setFrom ($email, "Teste"); //definindo remetente e nome obg
			$mail->addAddress($email, $nome); //definindo destinatario e nome
			$mail->Subject = "Cadastrar nova senha"; // Titulo obg
			$mail->Body = "Clique no link para alterar a senha <br>
			<a href='http://localhost:8080/form_CRUD_PHP_Arnaldo/alterar_senha.php?id=$id'>alterar senha</a>"; //corpo email obg	
			$mail->ErrorInfo; //verificando msg
			
			if(!$mail->send()){
				session_start();
				$_SESSION["env_f"] = "falha no envio:";
				header("Location: redefinir_senha.php");	
			}
			else{
				session_start();
				$_SESSION["env_s"] = "email enviado com sucesso, <br> acesse seu email e clique no link <br> para redefinir a senha"; 
				header("Location: redefinir_senha.php");
			}
		}
		catch (Exception $e){
			echo 'Ocorreu um problema tente novamente mais tarde';
		}
	}
}
?>