<!DOCTYPE HTML>


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
							//Inofrmacion del Agente
							$ldaphost = "10.200.1.138";  
							$ldapport = 389; 		
							$user = "cn=ADMINUP,dc=unicauca,dc=edu,dc=co";
							$pswd = "adminupdate123";
	
							$ldapconn = ldap_connect($ldaphost, $ldapport)
								or die("Imposible conectar al servidor $ldaphost");
					
							if ($ldapconn) {
					
								// Especifico la versión del protocolo LDAP
								ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("Imposible asignar el Protocolo LDAP");
							
								// autenticación con usuario
								$ldapbind = ldap_bind($ldapconn,$user,$pswd);
					
					
								if ($ldapbind) {
	
									$enviado = $_POST["enviado"];
									$login = $_POST["login"];
									//$codigo = $_POST["codigo"];
									//$noDoc = $_POST["noDoc"];
											
									if ($enviado == 1)
									{							
										$dn_consulta = "dc=unicauca,dc=edu,dc=co";
										$filter = "(uid=".$login.")";
										$result = ldap_search($ldapconn,$dn_consulta,$filter) or exit("Unable to search");
										$entries = ldap_get_entries($ldapconn, $result);
										
										$uid = $entries[0]["uid"][0];							
										$nombre = $entries[0]["givenname"][0];
										$apellidos = $entries[0]["sn"][0];
										$noDoc = $entries[0]["employeenumber"][0];
										$municipio = $entries[0]["l"][0];
										$direccion = $entries[0]["street"][0];
										$emailAlt = $entries[0]["mailalternateaddress"][0];
										$telefono = $entries[0]["mobile"][0];
										$tipoUsuario = $entries[0]["employeetype"][0];
										
										echo '
										<form name="contact_form" class="contact_form" action="../funtions/actualizarUser.php" method="post">
											<ul>
												<li>
													<h2>USUARIO A MODIFICAR</h2>
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
												<label for="noDoc">Documento:</label>
												<input name="noDoc" value="'.$noDoc.'" required type="number" />
											</li>																							
											<li>
												<label for="emailAlt">Correo Alternativo:</label>
												<input name="emailAlt" value="'.$emailAlt.'" type="email"   />
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
												<input type=hidden value="'.$tipoUsuario.'" name="tipoUsuario">
												<input type=hidden value="'.$uid.'" name="uid">
												<button class="submit" type="submit">Actualizar Usuario</button>
											</li>																																
											<ul>
										</form>';
									}
													
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