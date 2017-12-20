
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Index</title>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="styles/login.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body >
	<div class="login">
		<h1>INICIAR SESION</h1>
			<form method="POST" action="validar.php">
			<input type="text" name="login" placeholder="Usuario" />
			<input type="password" name="pswd" placeholder="Contraseña" />
			<button class="btn btn-primary btn-block btn-large" type="submit">Iniciar Sesion</button>
		</form>
	</div>

	<?php
	if (isset($_GET["mensaje"])){
	$mensaje = $_GET["mensaje"];
	if ($_GET["mensaje"]!=""){              
		if ($mensaje == 1)
			echo "<h1>Login no se encuentra registrado</h1>";
		if ($mensaje == 2)
			echo " <h1>Contraseña Incorrecta.</h1>";
		if ($mensaje == 2)
			echo " <h1>DEBE INICIAR SESION PARA ACCEDER.</h1>";
	}
	}
	?>
	</div>
	
</body>
</html>
