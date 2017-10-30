<?php                                                   
session_start();
if ($_SESSION["autenticado"] != "SI")
    header('Location: ../index.php?mensaje=3');
?>  

<!DOCTYPE HTML>

<html>
	<head>
		<title>AGENTE UNICAUCA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>	
        <link rel="stylesheet" href="../styles/skel-noscript.css" />
        <link rel="stylesheet" href="../styles/style.css" />
	</head>

	<body class="homepage">

		<!-- Header --> 
		<div id="header">
			<div class="container">

				<!-- Logo -->
				<div id="logo">
					<h1><a>UNIVERSIDAD DEL CAUCA</a></h1>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="agente.php">Agente</a></li>
						<li><a href="crearUser.php">Crear Usuario</a></li>
						<li><a href="actualizarUser.php">Modificar Usuario</a></li>
						<li><a href="cambiarPassword.php">Cambiar Contraseña</a></li>
					</ul>
				</nav>

			</div>
		</div>


		<div id="featured">
			<div class="container">
				<div text-center>		

				<?php
				if (isset($_GET["mensaje"])){
				$mensaje = $_GET["mensaje"];
				if ($_GET["mensaje"]!=""){              
					if ($mensaje == 1)
						echo "<h1>USUARIO REGISTRADO CORRECTAMENTE</h1>";
					if ($mensaje == 2)
						echo "<h1>ERROR AL REGISTRAR USUARIO</h1>";
					if ($mensaje == 3)
						echo "<h1>CONTRASEÑA ACTUALIZADA CORRECTAMENTE</h1>";
					if ($mensaje == 4)
						echo "<h1>ERROR AL ACTUALIZAR CONTRASEÑA</h1>";
					if ($mensaje == 5)
						echo "<h1>USUARIO ACTUALIZADO CORRECTAMENTE</h1>";
					if ($mensaje == 6)
						echo "<h1>ERROR AL ACTUALIZAR USUARIO</h1>";
	
				}	
				}
					?>		
				</div>
			</div>
		</div>
		

	</body>
</html>