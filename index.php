<?php

	//Declara variaveis.
	$idade = 20;
	$nome = "Deywid";
	
	//Verifica se é um int
	if(is_int($idade)){
		echo "Idade:". $idade ."\n";
		echo "Nome:". $nome;
	}else {
		echo $idade ." NÃO é int e '" . $nome . "' é texto, seu otário. ";
	}
?>