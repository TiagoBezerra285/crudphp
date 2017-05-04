<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
		<p>Efetue login para ter acesso ao sistema!</p>
		<form method="post">
			<p>Usuário:</p>
			<input type="text" name="usuario" />
			
			<p>Senha:</p>
			<input type="password" name="senha" />
			
			<p><input type="checkbox" value="1" name="lembrar"/> Mantenha-me logado </p>
			
			<input type="submit" value="Efetuar login"/>
		</form>
	</body>
</html>