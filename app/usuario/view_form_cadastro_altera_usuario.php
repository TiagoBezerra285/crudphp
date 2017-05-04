<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
		<h1>Formulário de alteração de usuário</h1>
		<form method="POST" action="index.php?r=usuario&p=alterar">
			<p>Nome do Usuário:</p>
			<p><input type="text" maxlength="120" name="txtNomeUsuario" value="<?=$dados['nome']?>" /></p>
			
			<p>Idade:</p>
			<p><input type="text" maxlength="120" name="txtIdadeUsuario" value="<?=$dados['idade']?>" /></p>
			
			<p><input type="submit" value="Alterar Usuário" /></p>
			
			<input type="hidden" name="idusuario" value="<?=$dados['id']?>" />
		</form>
		
		<p></p>
	</body>
</html>