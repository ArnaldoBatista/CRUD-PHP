<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css">
    <title>Cadastro</title>
</head>
<body>
<div class="container">
<form name="form1" method="POST" action="conf_dados_cad.php" enctype="multipart/form-data">
	<?php 
	if (isset($_COOKIE["erro_1"])){
		echo $_COOKIE["erro_1"];
		setcookie ("erro_1");
	}
	?>
	<legend>Cadastro.</legend>
	<div class="form-group">
		<label for="nome">Nome: </label>
		<input type="text" class="form-control" name="nome" id="nome"  required>
	</div>
	<div class="form-group">
		<label for="CPF">CPF: </label>
		<input type="text" class="form-control" name="CPF" id="CPF" placeholder="000.000.000-00" maxlength="14" required>
	</div>
	<div class="form-group">
		<label for="data">Data e horário: </label>
		<input type="text" class="form-control" name="data" id="data" required>
	</div>
	<div class="form-group">
		<label for="email">Email: </label>
		<input type="email" class="form-control" name="email" id="email"  placeholder="exemplo@exemplo.com" required multiple>
	</div>
	<div class="form-group">
		<label for="nome">Senha: </label>
		<span class="input-group">
		<input type="password" class="form-control" name="senha" id="senha" size="15" placeholder="*****" required>
		<div class="btn btn-secondary" onclick="exibirsenha()"><img src="imagens/eye-black.svg" alt="" class=""/>
		</div>
		<small id="passwordHelpInline" class="ml-3 text-muted">
			Deve ter entre 8 e 15 caracteres.
		</small>
		</span>
	</div>
	<div class="form-group">
		<label for="endereco">Endereço: </label>
		<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua Bairro 00" required>
	</div>
	<div class="form-group">
		<label for="cidade">Cidade: </label>
		<input type="text" class="form-control" name="cidade" id="cidade" required>
	</div>
	<div class="form-group">
		<label for="uf">Estado: </label>
		<select id="uf" name="uf" class="form-control" required>
			<option selected placeholder="Selecione um Estado"></option>
			<option value="ES">Espírito Santo</option>
			<option value="MG">Minas Gerais</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="SP">São Paulo</option>
		</select>
	</div>
	<div class="form-group">
		<!--o atributo for de um label associa um rótulo para o input de seleção de arquivo (que estará oculto). Quando o usuário clicar no label, será como clicar no input de arquivo.-->
		<label class="input btn btn-sm btn-primary mr-4" for='arquivo'>Selecionar imagem</label><span id='nome-do-arquivo'><!--aqui será exibido o nome do arquivo selecionado--></span>
		<p for="arquivo">tamanho maximo 2MB </p>
		<!--O evento onchange ocorre quando a imagem selecionada foi alterada.-->
		<input type="file" class="form-control d-none" name="arquivo" id="arquivo" value="2097152" onchange="readURL(this,'update');">
	</div>		
	<!--exibe a imagem selecionada-->
	<div class="container d-flex mt-2 mb-2 h-100 align-items-center justify-content-center">
		<span class=" w-100 d-flex justify-content-center"><img id="update" class="h-75 w-25 img-fluid"></span>
	</div>
	<div class="form-group">
		<input type="hidden" name="upload_max_filesize" value="2097152"/>
		<label class="input btn btn-sm btn-primary mr-4" for='pdf'>Selecionar arquivo</label><span id="nome-do-arquivo-pdf"></span>
		<p for="pdf">tamanho maximo 2MB: </p>
		<input type="file" class="form-control d-none" name="pdf" id="pdf" onchange="readPDF(this,'updatepdf');">
	</div>
	<div class="form-group">
	<legend>Sexo: </legend>
		<div class="form-check-inline">
			<input class="form-check-input" type="radio" name="sexo" value="Masculino" checked>
			<label class="form-check-label" for="gridRadios1">Masculino</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="radio" name="sexo" value="Feminino">
			<label class="form-check-label" for="gridRadios2">Feminino</label>
		</div>
	</div>   
	<div class="form-group">
	<legend>Área de interesse</legend>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[0]" id="computacao" value="computacao">
			<label class="form-check-label" for="area">Computação</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[1]" id="biologia" value="biologia">
			<label class="form-check-label" for="area">Biologia</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[2]" id="meio_ambiente" value="meio_ambiente">
			<label class="form-check-label" for="area">Meio Ambiente</label>
		</div>
		<div class="form-check-inline">
			<input class="form-check-input" type="checkbox" name="interesse[3]" id="engenharia" value="engenharia">
			<label class="form-check-label" for="area">Engenharia</label>
		</div>
	</div>
	<div class="form-group">
		<label for="obs">Comentários</label>
		<textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
		<button type="reset" class="btn btn-sm btn-primary">Limpar</button>
	</div>
</form>
</div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/modernizr-custom.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>