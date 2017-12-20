<?php     
include("../usuario.php");                                              

if ($_SESSION["autenticado"] != "SI")
	header('Location: ../index.php?mensaje=3');
	
?>  

<!DOCTYPE HTML>

<html>
	<head>
		<title>Graficos Administrador</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>	
        <link rel="stylesheet" href="../styles/skel-noscript.css" />
        <link rel="stylesheet" href="../styles/style.css" />
		<link rel="stylesheet" href="../styles/perfil.css" />
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
						<li><a href="admin.php">Administrador</a></li>
						<li><a href="crearUser_admin.php">Crear Usuario</a></li>
						<li><a href="actualizarUser_admin.php">Modificar Usuario</a></li>
                        <li><a href="cambiarPassword_admin.php">Cambiar Contraseña</a></li>
                        <li class="active"><a href="graficos_admin.php">Graficos</a></li>
					</ul>
				</nav>

			</div>
		</div>
		<div id="featured">
			<div class="container">
				

			</div>
		</div>
		

	</body>
</html>