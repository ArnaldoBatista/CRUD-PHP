<?php
function verifica($CPF){
	$erro = false;
	$aux_cpf = "";
	for($j = 0; $j < strlen($CPF); $j++)
		if (substr($CPF, $j, 1)>= "0" and substr($CPF, $j, 1) <= "9")
			$aux_cpf .= substr($CPF, $j, 1);
		if (strlen($aux_cpf)!=11)
			$erro = true;
		else{
			$CPF1 = $aux_cpf;
			$CPF2 = substr($CPF, -2);
			$controle = "";
			$start = 2;
			$end = 10;
			for($i = 1; $i <= 2; $i++){
				$soma = 0;
				for($j = $start; $j <= $end; $j++)
					$soma +=substr($CPF1, ($j-$i-1), 1)*($end+1+$i-$j);
				if ($i == 2)
					$soma += $digito * 2;
				$digito = ($soma * 10) % 11;
				if ($digito == 10)
					$digito = 0;
				$controle .= $digito;
				$start = 3;
				$end = 11;
			}
			if ($controle != $CPF2)
				$erro = true;
			
		}
		return $erro;
}
?>

