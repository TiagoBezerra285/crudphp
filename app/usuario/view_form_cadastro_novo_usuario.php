<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
		<h1>Formulário de cadastro de usuário</h1>
		<form method="POST" action="index.php?r=usuario&p=cadastrar">
			<p>Nome do Usuário:</p>
			<p><input type="text" maxlength="120" name="txtNomeUsuario" /></p>
			
			<p>Idade:</p>
			<p><input type="text" maxlength="120" name="txtIdadeUsuario" /></p>
			
			<p><input type="submit" value="Cadastrar Usuário" /></p>
			
			<input type="hidden" name="frmCadUsuario" />
		</form>
		
		<p></p>
	</body>
</html>