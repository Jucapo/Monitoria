<!DOCTYPE HTML>
<?php                                                   
session_start();
if ($_SESSION["autenticado"] != "SI")
    header('Location: ../index.php?mensaje=3');
?>  

<html>
	<head>
		<title>Crear Usuario</title>
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
					<h1><a>Crear Usuario</a></h1>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="agente.php">Agente</a></li>
						<li class="active"><a href="crearUser.php">Crear Usuario</a></li>
						<li><a href="actualizarUser.php">Modificar Usuario</a></li>
						<li><a href="cambiarPassword.php">Cambiar Contraseña</a></li>
					</ul
				</nav>

			</div>
		</div>


		<div id="featured">
			<div class="container">
				<div class="formulario">				
					<form name="contact_form" class="contact_form" action="../funtions/crearUser.php" method="post">
						<ul>
    						<li>
								<h2>Crear Usuario</h2>
								<span class="required_notification">* Datos Requeridos</span>
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
								<input name="nombre"placeholder="Nombre" type="text" required/>
								<span class="required_notification">No usar tildes ni eñes. max-32 caracteres</span>
							</li>
							<li>
								<label for="apellidos">Apellidos:</label>
								<input name="apellidos" placeholder="Apellidos" type="text" required />
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
								<input name="noDoc" placeholder="numero de documento" required type="number" />
							</li>
							<li>
								<label for="codigo">Codigo:</label>
								<input name="codigo" placeholder="Codigo" required type="number" />
								<span class="required_notification">max. 20 caracteres</span>	
							</li>
							<li>
								<label for="login">Login:</label>
								<input name="login" placeholder="Login" type="text" required  />
								<span class="required_notification">max-25 caracteres</span>																	
							</li>
							<li>
								<label for="password">Contraseña:</label>
								<input name="password" placeholder="contraseña" type="text" required  />			
								<span class="required_notification">min-8-->max-32, 1-num, 1-mayus</span>																	
							</li>
							<li>
								<label for="password2">Confirmar Contraseña:</label>
								<input name="password2" placeholder="verificacion contraseña" type="text" required  />
								<span class="required_notification">Debe Coincidir con la anterior</span>										
							</li>			
							<li>
								<label for="fechaNac">Fecha de Nacimiento:</label>
								<input name="fechaNac" placeholder="DD/MM/AAAA" type="date" required  />
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
								<input name="emailAlt" placeholder="Correo Alternativo:" type="email"   />
							</li>
							<li>
								<label for="pais">Pais:</label>
								<input name="pais" placeholder="Pais" type="text" required  />
								<span class="required_notification">max. 32 caracteres</span>		
							</li>
							<li>
								<label for="departamento">Departamento:</label>
								<input name="departamento"  placeholder="Departamento" type="text" required />
								<span class="required_notification">max. 32 caracteres</span>	
							</li>
							<li>
								<label for="municipio">Municipio:</label>
								<input name="municipio" placeholder="Municipio" type="text" required  />
								<span class="required_notification">max. 32 caracteres</span>	
							</li>
							<li>
								<label for="direccion">Direccion:</label>
								<input name="direccion" placeholder="Direccion" type="text" required  />
								<span class="required_notification">max. 32 caracteres</span>	
							</li>
							<li>
								<label for="telefono">Telefono:</label>
								<input name="telefono" placeholder="Telefono" type="number" required  />
							</li>
							<li>
								<label for="oficina">Oficina:</label>
								<input name="oficina" placeholder="Oficina" type="text"   />
								<span class="required_notification">max. 50 caracteres</span>	
							</li>
							<li>
								<button class="submit" type="submit" >Registrar Usuario</button>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>