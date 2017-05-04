<?php
	$titulo = "MySQL 01";
	
	$conexao = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if( mysqli_connect_errno($conexao) ){
		$resultado = "A conexão falhou, erro reportado: ".mysqli_connect_error();
	} else {
		$resultado = "Conexão bem sucedida!";
	}
	
	@mysqli_close($conexao);