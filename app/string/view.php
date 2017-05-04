<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
		<?php foreach($array as $linha){ ?>
			<p><?=$linha?></p>
		<?php } ?>
		
		<p><?php print_r($str_split); ?></p>
		
		<p><?php print_r($explode); ?></p>
		
		<p><?php echo $implode; ?></p>
		
	</body>
</html>