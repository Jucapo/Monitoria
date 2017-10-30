
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
			<input type="password" name="password" placeholder="Contraseña" />
			<button class="btn btn-primary btn-block btn-large" type="submit">Iniciar Sesion</button>
		</form>
	</div>

	<?php
	if (isset($_GET["mensaje"])){
	$mensaje = $_GET["mensaje"];
	if ($_GET["mensaje"]!=""){              
		if ($mensaje == 1)
			echo "¡¡ERROR!! La contraseña es erronea.";
		if ($mensaje == 2)
			echo "No hay usuarios con el login ingresado.";
		if ($mensaje == 3)
			echo "NO HA INICIADO SESION";
	}
	}
	?>
	</div>
	
</body>
</html>
