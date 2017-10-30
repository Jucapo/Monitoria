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
		<title>AGENTE UNICAUCA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>		
		<link rel="stylesheet" href="../styles/formulario.css" />
        <link rel="stylesheet" href="../styles/skel-noscript.css" />
        <link rel="stylesheet" href="../styles/style.css" />     
	</head>
	<body class="homepage">

		<!-- Header --> 
		<div id="header">
			<div class="container">

				<!-- Logo -->
				<div id="logo">
					<h1><a>Actualizar Usuario</a></h1>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="agente.php">Agente</a></li>
						<li><a href="crearUser.php">Crear Usuario</a></li>
						<li class="active"><a href="actualizarUser.php">Modificar Usuario</a></li>
						<li><a href="cambiarPassword.php">Cambiar Contraseña</a></li>
					</ul>
				</nav>

			</div>
		</div>


		<div id="featured">
			<div class="container">
				<div class="formulario">
					<?php
						if (!(isset($_POST["enviado"]))){?>	
							<form name="contact_form" class="contact_form" action="actualizarUser.php" method="post">
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
										<button class="submit" type="submit" >Buscar</button>
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
										$id = $row1[0];
										$login = $row1[1];
										$noDoc = $row1[2];
										$tipoUsuario =$row1[4];
										$nombre = $row1[5];
										$apellidos = $row1[6];
										$codigo = $row1[7];
										$tipoDoc= $row1[8];
										$fechaNac = $row1[9];
										$sexo = $row1[10];
										$pais = $row1[11];
										$departamento = $row1[12];
										$municipio = $row1[13];
										$direccion = $row1[14];
										$emailAlt = $row1[15];
										$estadoCivil = $row1[16];
										$oficina = $row1[17];
										$telefono = $row1[18];
									}
								
								$numero_filas = $result1->num_rows;
								if ($numero_filas > 0)
								{
												
									echo '
									<form name="contact_form" class="contact_form" action="../funtions/actualizarUser.php" method="post">
										<ul>
											<li>
												<h2>USUARIO A MODIFICAR</h2>
											</li>	
											<li>
											<label for="tipoUsuario">Tipo de Usuario:</label>
											<select name="tipoUsuario" required>
												<option selected value="">Elegir un tipo de Usuario</option>
												<option value="Estudiante pregrado">Estudiante pregrado</option>
												<option value="Estudiante posgrado">Estudiante posgrado</option>
												<option value="Exalumno">Exalumno</option>
												<option value="Docente">Docente</option>
												<option value="Docente pensionado">Docente pensionado</option>
												<option value="Funcionario">Funcionario</option>
												<option value="Funcionario pensionado">Funcionario pensionado</option>
												<option value="Contratista">Contratista</option>									
												<option value="Dependencia">Dependencia</option>
												<option value="Grupo Investigacion">Grupo Investigacion</option>
												<option value="Grupo Actividades">Grupo Actividades</option>
												<option value="Eventos">Eventos</option>
												<option value="EntidadAdscrita">EntidadAdscrita</option>
												<option value="Caso Especial">Caso Especial</option>									
											</select>
										</li>
										<li>
											<label for="nombre">Nombre:</label>
											<input name="nombre" value="'.$nombre.'" type="text" required/>
											<span class="required_notification">No usar tildes ni eñes. max-32 caracteres</span>
										</li>
										<li>
											<label for="apellidos">Apellidos:</label>
											<input name="apellidos"value="'.$apellidos.'" type="text" required />
											<span class="required_notification">No usar tildes ni eñes. max-32 caracteres</span>								
										</li>
										<li>
											<label for="tipoDoc">Tipo de Documento:</label>
											<select name="tipoDoc"required >
												<option selected value="">Elegir un tipo de Documento</option>
												<option value="Cedula ">Cedula de Ciudadania</option>
												<option value="Tarjeta Identidad">Tarjeta de identidad</option>
												<option value="Pasaporte">Pasaporte</option>																
											</select>
										</li>
										<li>
											<label for="noDoc">Documento:</label>
											<input name="noDoc" value="'.$noDoc.'" required type="number" />
										</li>
										<li>
											<label for="codigo">Codigo:</label>
											<input name="codigo" value="'.$codigo.'" required type="number" />
											<span class="required_notification">max. 20 caracteres</span>	
										</li>
										<li>
											<label for="login">Login:</label>
											<input name="login" value="'.$login.'" type="text" required  />
											<span class="required_notification">max-25 caracteres</span>																	
										</li>												
										<li>
											<label for="fechaNac">Fecha de Nacimiento:</label>
											<input name="fechaNac" value="'.$fechaNac.'" type="date" required  />
										</li>
										<li>
											<label for="sexo">Sexo:</label>
											<select name="sexo" required >
												<option selected value="">Elegir sexo</option>
												<option value="Femenino">Femenino</option>
												<option value="Masculino">Masculino</option>															
											</select>
										</li>
										<li>
											<label for="estadoCivil">Estado Civil:</label>
											<select name="estadoCivil" required >
												<option selected value="">Elegir Estado Civil</option>
												<option value="Soltero">Soltero(a)</option>
												<option value="Casado">Casado(a)</option>	
												<option value="Union libre">Union libre</option>
												<option value="Divorciado">Divorciado(a)</option>		
												<option value="Viudo">Viudo(a)</option>													
											</select>
										</li>
										<li>
											<label for="emailAlt">Correo Alternativo:</label>
											<input name="emailAlt" value="'.$emailAlt.'" type="email"   />
										</li>
										<li>
											<label for="pais">Pais:</label>
											<input name="pais" value="'.$pais.'" type="text" required  />
											<span class="required_notification">max. 32 caracteres</span>		
										</li>
										<li>
											<label for="departamento">Departamento:</label>
											<input name="departamento" value="'.$departamento.'" type="text" required />
											<span class="required_notification">max. 32 caracteres</span>	
										</li>
										<li>
											<label for="municipio">Municipio:</label>
											<input name="municipio" value="'.$municipio.'" type="text" required  />
											<span class="required_notification">max. 32 caracteres</span>	
										</li>
										<li>
											<label for="direccion">Direccion:</label>
											<input name="direccion" value="'.$direccion.'" type="text" required  />
											<span class="required_notification">max. 32 caracteres</span>	
										</li>
										<li>
											<label for="telefono">Telefono:</label>
											<input name="telefono" value="'.$telefono.'" type="number" required  />
										</li>
										<li>
											<label for="oficina">Oficina:</label>
											<input name="oficina" value="'.$oficina.'" type="text"   />
											<span class="required_notification">max. 50 caracteres</span>	
										</li>	
										<li>
											<input type=hidden value="'.$id.'" name="idUser">
											<button class="submit" type="submit">Actualizar Usuario</button>
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