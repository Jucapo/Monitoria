<?php

/*********Modulo para Actualizar Usuarios***********/

  //Variables con las que se creeara el nuevo Usuario
  $id = $_POST["idUser"];
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

  //Insertar datos en la Base de Datos
  include ("../conexion.php");
  $mysqli = new mysqli($host, $user, $pw, $db);    


  $sql = "UPDATE usuarios SET 
            login = '$login',
            noDoc = '$noDoc',
            tipoUsuario = '$tipoUsuario',
            nombre = '$nombre',
            apellidos = '$apellidos',
            codigo = '$codigo',
            tipoDoc ='$tipoDoc',
            fechaNac = '$fechaNac',
            sexo =  '$sexo',
            pais = '$pais',
            departamento = '$departamento',
            municipio = '$municipio',
            direccion = '$direccion',
            emailAlt = '$emailAlt',
            estadoCivil = '$estadoCivil',
            oficina = '$oficina',
            telefono= '$telefono'
         WHERE (id = '$id')";

  $result = $mysqli->query($sql);

  //Verificacion 
  if ($result){
    header("Location: ../pages/agente.php?mensaje=5");
  }
  else   
    header("Location: ../pages/agente.php?mensaje=6");

?>
