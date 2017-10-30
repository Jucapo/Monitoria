<?php

include ("../conexion.php");


// PROGRAMA PARA REGISTRAR USUARIOS
$login = $_POST["login"];
$noDoc = $_POST["noDoc"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$tipoUsuario = $_POST["tipoUsuario"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$codigo = $_POST["codigo"];
$tipoDoc= $_POST["tipoDoc"];
$fechaNac = $_POST["fechaNac"];
$sexo = $_POST["sexo"];
$pais = $_POST["pais"];
$departamento = $_POST["departamento"];
$municipio = $_POST["municipio"];
$direccion = $_POST["direccion"];
$emailAlt = $_POST["emailAlt"];
$estadoCivil = $_POST["estadoCivil"];
$oficina = $_POST["oficina"];
$telefono = $_POST["telefono"];


$mysqli = new mysqli($host, $user, $pw, $db);    

  $sql = "INSERT INTO usuarios( login, noDoc, password, tipoUsuario, nombre, apellidos, codigo, tipoDoc, fechaNac, sexo, pais, departamento, municipio, direccion, emailAlt, estadoCivil, oficina, telefono)
          VALUES  ('$login','$noDoc','$password','$tipoUsuario','$nombre','$apellidos','$codigo','$tipoDoc','$fechaNac','$sexo','$pais','$departamento','$municipio','$direccion','$emailAlt','$estadoCivil','$oficina' ,'$telefono' )";
 
 echo "sql es...   ".$sql;

 $result1 = $mysqli->query($sql);

 if ($result1){
  echo "<br><br>DATOS INGRESADOS CORRECTAMENTE<br><br><br>" ;
  header("Location: ../pages/agente.php?mensaje=1");
}
else   
   echo "<br><br>ERROR AL INGRESAR DATOS<br><br><br>";



?>
