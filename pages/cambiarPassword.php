<!DOCTYPE HTML>

<?php                                                                                                       
session_start();
include "../conexion.php";
if ($_SESSION["autenticado"] != "SI")
    {
      header('Location: index.php?mensaje=3');
    }
?> 

<html>
	<head>
		<title>Cambiar Password</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="../styles/formulario.css" />
        <link rel="stylesheet" href="../styles/skel-noscript.css" />
        <link rel="stylesheet" href="../styles/style.css" />
        <link rel="stylesheet" href="../styles/style-desktop.css" />
	</head>

	<body class="homepage">

		<!-- Header --> 
		<div id="header">
			<div class="container">

				<!-- Logo -->
				<div id="logo">
					<h1><a>Cambiar Contraseña</a></h1>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="agente.php">Agente</a></li>
						<li><a href="crearUser.php">Crear Usuario</a></li>
						<li><a href="actualizarUser.php">Modificar Usuario</a></li>
						<li class="active"><a href="cambiarPassword.php">Cambiar Contraseña</a></li>
					</ul>
				</nav>

			</div>
		</div>

		<div id="featured">
		<div class="container">
			<div class="formulario">
				<?php
           			if (!(isset($_POST["enviado"]))){?>	
						<form name="contact_form" class="contact_form" action="cambiarPassword.php" method="post">
							<ul>
								<li>
									<h2>Buscar Usuario</h2>
								</li>							
								<li>
									<label for="login">Login:</label>
									<input name="login" placeholder="Login" type="text" />
								</li>
								<li>
									<label for="codigo">Codigo:</label>
									<input name="codigo" placeholder="Codigo" type="text"  />																
								</li>							
								<li>
									<label for="noDoc">Documento:</label>
									<input name="noDoc" placeholder="numero de documento"  type="number" />
								</li>
								<li>
									<input type=hidden value="1" name="enviado">
									<input type=submit value="Buscar" name="Enviar">
								</li>
							</ul>
						</form>	
						<?php
					}
					else{
						$enviado = $_POST["enviado"];
						$login = $_POST["login"];
						$codigo = $_POST["codigo"];
						$noDoc = $_POST["noDoc"];
									
						if ($enviado == 1)
						{										
							$mysqli = new mysqli($host, $user, $pw, $db);
							$sql = "SELECT * FROM usuarios WHERE (login='$login' || codigo='$codigo' || noDoc ='$noDoc')";
							$result1 = $mysqli->query($sql);
							while($row1 = $result1->fetch_array(MYSQLI_NUM))
								{			
									$password = $row1[3];								
									$nombre = $row1[5];
									$apellidos = $row1[6];
								}
							
							$numero_filas = $result1->num_rows;
							if ($numero_filas > 0)
							{
											
								echo '
								<form name="contact_form" class="contact_form" action="cambiarPassword.php" method="post">
									<ul>
										<li>
											<h2>USUARIO A MODIFICAR CONTRASEÑA</h2>
										</li>	
										<li>
											<label for="nombre">Nombre:</label>
											<input name="nombre" readonly="readonly" value="'.$nombre.'" " type="text" required/>	
										</li>
										<li>
											<label for="apellidos">Apellidos:</label>
											<input name="apellidos"readonly="readonly"  value="'.$apellidos.'" " type="text" required/>	
										</li>	
										<li>
											<label for="password">Contraseña:</label>
											<input name="password" value="'.$password.'" " type="text" required/>	
										</li>		
										<li>
											<label for="passwordc">Confirmar Contraseña:</label>
											<input name="passwordc" value="" " type="text" required/>	
										</li>																																
									<ul>
								</form>';
							}
							else{
								echo'
								<h1>Usuario no Encontrado</h1>';
							
							}						
						}

					}?>	
				</div>
			</div>
		</div>
		
	</body>
</html>