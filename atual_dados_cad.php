<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css">
    <title>Atualização dos dados</title>
</head>
<body>
<?PHP 
	include_once('valida_cookies.php');
	include_once "conn.php";
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$resultado = mysqli_query($conn, "select * from cadastro2 where id='$id'");
	$row = mysqli_fetch_array($resultado);
	$interesse = $row["area"];
	//explode - Divide uma string em strings e forma um array formada pela divisão do delimitador ",";
	$interesse = explode(",",$interesse);
	//array_push — Adiciona um ou mais elementos no final de um array
	array_push($interesse, "", "", "");
?>
<div class="container">
	<form name="form1" method="POST" action="conf_dados_atu.php" enctype="multipart/form-data">
	<?php 
	if (isset($_COOKIE["erro_1"])){
		echo $_COOKIE["erro_1"];
		setcookie ("erro_1");
	}
	?>
	<legend>Atualização dos dados.</legend>
	<input type="hidden" name="id" value="<?php print $id; ?>">
	<div class="form-group">
		<label for="nome">Nome: </label>
		<input type="text" class="form-control" name="nome" id="nome"  value="<?php print $row["nome"]; ?>" required>
	</div>
	<div class="form-group">
		<label for="cpf">CPF: </label>
		<input type="text" class="form-control" name="CPF" id="cpf"  placeholder="000.000.000-00"  value="<?php print $row["CPF"]; ?>" required>
	</div>
	<div class="form-group">
		<label for="data">Data e horário: </label>
		<input type="text" class="form-control" name="data" id="data" value="<?php print date("d-m-Y H:i", strtotime($row["Data"])); ?>" required>
	</div>
	<div class="form-group">
		<label for="email">Email: </label>
		<input type="email" class="form-control" name="email" id="email"  placeholder="exemplo@exemplo.com" value="<?php print $row["email"]; ?>" required>
	</div>
	<div class="form-group">
		<label for="endereco">Endereço: </label>
		<input type="text" class="form-control" name="endereco" id="endereco"  placeholder="Rua Bairro 00" value="<?php print $row["endereco"]; ?>" required>
	</div>
	<div class="form-group">
		<label for="cidade">Cidade: </label>
		<input type="text" class="form-control" name="cidade" id="cidade" value="<?php print $row["cidade"]; ?>"  required>
	</div>
	<div class="form-group">
		<label for="uf">Estado: </label>
		<select id="uf" name="uf" class="form-control" required>
			<option selected placeholder="Selecione um Estado"></option>
			<option <?php echo ($row["estado"] == "ES") ? "selected" : null; ?> value="ES">Espírito Santo</option>
			<option <?php echo ($row["estado"] == "MG") ? "selected" : null; ?> value="MG">Minas Gerais</option>
			<option <?php echo ($row["estado"] == "RJ") ? "selected" : null; ?> value="RJ">Rio de Janeiro</option>
			<option <?php echo ($row["estado"] == "SP") ? "selected" : null; ?> value="SP">São Paulo</option>
		</select>
	</div>
	<div class="form-group">
		<!--o atributo for de um label associa um rótulo para o input de seleção de arquivo (que estará oculto). Quando o usuário clicar no label, será como clicar no input de arquivo.-->
		<label class="input btn btn-sm btn-primary mr-4" for='arquivo'>Selecionar nova imagem</label><span id='nome-do-arquivo'><!--aqui será exibido o nome do arquivo selecionado--></span>
		<p for="arquivo">tamanho máximo 2MB: </p>
		<!--O evento onchange ocorre quando a imagem selecionada foi alterada.-->
		<input type="file" class="form-control d-none" name="arquivo" id="arquivo" value='' onchange="readURL(this,'update');">
	</div>		
	<!--exibe a imagem selecionada-->
	<div class="container d-flex mt-2 mb-2 h-100 align-items-center justify-content-center">
		<span class=" w-100 d-flex justify-content-center"><img id="update" class="h-75 w-25 img-fluid"></span>
	</div>
	<!--Por questão de segurança não é possível definir um value="" para o input nesse caso foi criado tag para exibir a imagem armazenada-->
	<span class="w-100 d-flex">Ultima imagem salva:</span>
	<img id="update" src="<?php print $row["imagem"]; ?>" class="h-75 w-25 mt-2 mb-3 img-fluid">
	<div class="form-group">
		<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
		<label class="input btn btn-sm btn-primary mr-4" for='pdf'>Selecionar novo arquivo</label><span id="nome-do-arquivo-pdf"></span>
		<p for="pdf">tamanho máximo 2MB:</p>
		<input type="file" class="form-control d-none" name="pdf" id="pdf" value='' onchange="readPDF(this,'updatepdf');">
	</div>
	<label for="pdf" class="mr-2">Ultimo arquivo salvo: </label><a id="updatepdf" href="<?php print $row["pdf"]; ?>" target="_blank">arquivo</a>
	<div class="form-group">
	<legend>Sexo: </legend>
	<div class="form-check-inline">
		<input class="form-check-input" type="radio" name="sexo" value="Masculino" <?php echo ($row["sexo"] == "Masculino") ? "checked" : null; ?> >
		<label class="form-check-label" for="gridRadios1"/>Masculino</label>
	</div>
	<div class="form-check-inline">
		<input class="form-check-input" type="radio" name="sexo" value="Feminino" <?php echo ($row["sexo"] == "Feminino") ? "checked" : null; ?>>
		<label class="form-check-label" for="gridRadios2"/>Feminino</label>
	</div>
	</div>
	<div class="form-group">
		<legend>Área de interesse</legend>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[0]" id="computacao" value="computacao" <?php echo ($interesse[0] == "computacao") ? "checked" : null; ?>>
			<label class="form-check-label" for="area">Computação</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[1]" id="biologia" value="biologia" <?php echo ($interesse[0] == "biologia" || $interesse[1] == "biologia") ? "checked" : null; ?>>
			<label class="form-check-label" for="area">Biologia</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[2]" id="meio_ambiente" value="meio_ambiente" <?php echo ($interesse[0] == "meio_ambiente" || $interesse[1] == "meio_ambiente" || $interesse[2] == "meio_ambiente") ? "checked" : null; ?>>
			<label class="form-check-label" for="area">Meio Ambiente</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[3]" id="engenharia" value="engenharia" <?php echo ($interesse[0] == "engenharia" || $interesse[1] == "engenharia" || $interesse[2] == "engenharia" || $interesse[3] == "engenharia") ? "checked" : null; ?>>
			<label class="form-check-label" for="area">Engenharia</label>
		</div>
	</div>
	<div class="form-group">
		<label for="obs">Comentários</label>
		<textarea class="form-control" name="obs" id="obs" rows="3">
		<?php echo $row["obs"]; ?>
		</textarea>
	</div>
	<div class="form-group was-validated">
		<label for="nome">Confirmar senha: </label>
		<span class="input-group">
		<input type="password" class="form-control is-invalid" name="senha" id="senha" size="30" placeholder="*****" required>
		<div class="btn btn-secondary" onclick="exibirsenha()"><img src="imagens/eye-black.svg" alt="" class=""/></div>
		</span>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-sm btn-primary">Alterar</button>
	</div>
	</form>
</div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>