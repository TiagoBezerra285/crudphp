<?php
	
	// verificar se o arquivo log.txt já existe, senão, podemos criar este arquivo
	// file_exists("log.txt")	

	// define uma constante para o nome do nosso arquivo de log
	define("ARQUIVO_LOG","log.txt");
	
	$log = @fopen(ARQUIVO_LOG, "x");
	// se for igual a false, o arquivo de log já existe
	if($log == false){
		// o parâmetro a abre o arquivo e posiciona o ponteiro no final do mesmo
		$log = fopen(ARQUIVO_LOG,"a");
	}
	
	require_once("controller.php");