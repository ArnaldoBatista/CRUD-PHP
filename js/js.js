//a função mostra a imagem do arquivo de entrada em tempo de execução.
function readURL(input, id) {
   if (input.files && input.files[0]) {
	   var reader = new FileReader();
	   reader.onload = function (e) {
		   $('#'+id).attr('src', e.target.result);
	   }
	   reader.readAsDataURL(input.files[0]);
   }
}
 //Se quiser exibir nome do arquivo e a extension...
var $input = document.getElementById('arquivo'),
	$fileName = document.getElementById('nome-do-arquivo');
	$input.addEventListener('change', function(){
	$fileName.textContent = this.value;
});

function readPDF(inputpdf, id) {
   if (inputpdf.files && inputpdf.files[0]) {
	   var readerpdf = new FileReader();
	   readerpdf.onload = function (e) {
		   $('#'+id).attr('href', e.target.result);
	   }
	   readerpdf.readAsDataURL(input.files[0]);
   }
};

var $inputpdf = document.getElementById('pdf'),
	$fileNamepdf = document.getElementById('nome-do-arquivo-pdf');
	$inputpdf.addEventListener('change', function(){
	$fileNamepdf.textContent = this.value;
});

//exibindo a senha
function exibirsenha(){
	var tipo = document.getElementById("senha");
	if (tipo.type == "password"){
		tipo.type = "text";
	}
	else{
		tipo.type = "password";
	}
};
//data e horário
$('#data').datetimepicker({
    format:'d-m-Y H:i',
});