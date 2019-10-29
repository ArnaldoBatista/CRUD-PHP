<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Dados Cadastrados</title>
</head>
<body> 
<div class="container d-flex h-100 align-items-center justify-content-center">
<div class="w-100 d-flex justify-content-center">
<?php 
include_once('valida_cookies.php'); 
include_once('conn.php');
$nome_usuario = $_COOKIE["nome_usuario"];
$senha_usuario = $_COOKIE["senha_usuario"];
$resultado = mysqli_query($conn, "select * from cadastro2 where nome='$nome_usuario' and senha='$senha_usuario'");
?>
<div class="container-fluid">
<div class="row">
<div class="col-12">
<h3 class="text-center mt-3 mb-3">Dados Cadastrados</h3>
<div class="table-responsive">
<table class="table table-sm table-striped" border="1">
<thead>
<tr>
	<th scope="col">ID</th>
	<th scope="col">Nome</th>
	<th scope="col">CPF</th>
	<th scope="col">Data e horário</th>
	<th scope="col">Email</th>
	<th scope="col">Endereço</th>
	<th scope="col">Cidade</th>
	<th scope="col">Estado</th>
	<th scope="col">Imagem</th>
	<th scope="col">Arquivo</th>
	<th scope="col">Sexo</th>
	<th scope="col">interesse</th>
	<th scope="col">Comentários</th>
</tr>
</thead>
<?php while ($rows = mysqli_fetch_array($resultado)){
	 $id=$rows["id"];
	 $nome=$rows["nome"];
	 $cpf=$rows["CPF"];
	 $data=$rows["Data"];
	 $email=$rows["email"];
	 $endereco=$rows["endereco"];
	 $cidade=$rows["cidade"];
	 $estado=$rows["estado"];
	 $url=$rows["imagem"];
	 $arquivo=$rows["pdf"];
	 $sexo=$rows["sexo"];
	 $interesse=$rows["area"];
	 $comentarios=$rows["obs"];
?>
<tbody>
<tr>
	<td><?php print $id; ?></td>
	<td><?php print $nome; ?></td>
	<td><?php print $cpf; ?></td>
	<td><?php print date("d/m/Y H:i",strtotime($data)); ?></td>
	<td><?php print $email; ?></td>
	<td><?php print $endereco; ?></td>
	<td><?php print $cidade; ?></td>
	<td><?php print $estado; ?></td>
	<td><?php echo "<img src='$url' heigth='50' width='50' >"?></td>
	<td><?php echo "<a href='$arquivo' target='_blank'>arquivo</a>"?></td>
	<td><?php print $sexo; ?></td>
	<td><?php print $interesse; ?></td>
	<td><?php print $comentarios; ?></td>
</tr>
</tbody>
<?php } ?>
</table>
</div>
	<div class="form-inline">
	<form method="POST" action="atual_dados_cad.php">
	<input type="hidden" name="id" value="<?php print $id; ?>">
	<button type="" class="btn btn-sm mr-2 btn-primary">Alterar</button>
	</form>
	<form method="POST" action="deleta.php">
	<input type="hidden" name="id" value="<?php print $id; ?>">
	<input type="hidden" name="url" value="<?php print $url; ?>">
	<input type="hidden" name="arquivo" value="<?php print $arquivo; ?>">
	<button type="" class="btn mr-1 btn-sm btn-primary">Excluir conta</button>
	<a href="logout.php"><div class='btn btn-sm btn-primary'>Sair</div></a>
	</form>
	</div>
	<?php mysqli_close($conn); ?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>