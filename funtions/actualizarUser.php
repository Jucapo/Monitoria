<?php

/*********Modulo para Actualizar Usuarios***********/
    include ("../usuario.php");
    include ("../conexion.php");

  //Variables con las que se creeara el nuevo Usuario
  $uid = $_POST["uid"];
  $noDoc = $_POST["noDoc"];
  $nombre = $_POST["nombre"];
  $apellidos = $_POST["apellidos"];
  $municipio = $_POST["municipio"];
  $direccion = $_POST["direccion"];
  $emailAlt = $_POST["emailAlt"];
  $telefono = $_POST["telefono"];
  $tipoUsuario = $_POST["tipoUsuario"];

 $ldapconn = ldap_connect($ldaphost, $ldapport)
     or die("Imposible conectar al servidor $ldaphost");

 if ($ldapconn) {

     ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)
         or die ("Imposible asignar el Protocolo LDAP");
     
     $ldapbind = ldap_bind($ldapconn,$user,$pswd);

     if ($ldapbind) {
         //echo "LDAP bind successful...";
         
         if($tipoUsuario=="Pregrado" || $tipoUsuario=="Posgrado" ){
            $dn = "uid=".$uid.",ou=".$tipoUsuario.",ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";
        }
        else {
            $dn = "uid=".$uid.",ou=".$tipoUsuario.",ou=Usuarios,dc=unicauca,dc=edu,dc=co";
        }


         $info["givenname"] = $nombre; 
         $info["sn"] = $apellidos;         
         $info["employeenumber"] = $noDoc;          
         $info["l"] = $municipio;                 
         $info["street"] = $direccion; 
         $info["mailalternateaddress"] = $emailAlt; 
         $info["mobile"] = $telefono; 
         $info["gecos"] =  $nombre." ".$apellidos; // Nombre completo
         $info["cn"] =  $nombre." ".$apellidos; // Nombre completo

         $add = ldap_modify($ldapconn, $dn, $info);

         //Verificacion
         if ($add){
            $mysqli = new mysqli($host, $userB, $pw, $db);    
            
            $sql = "INSERT INTO modificacion(login, fecha, hora, ip, correcto)
                     VALUES  ('$login',CURDATE(),CURTIME(),'$ip','1' )";
            
            $result = $mysqli->query($sql);
             header("Location: ../pages/agente.php?mensaje=5");
        }
        else  {
            $mysqli = new mysqli($host, $userB, $pw, $db);
            
            $sql = "INSERT INTO modificacion( login, fecha, hora, ip, correcto)
                        VALUES  ('$login',CURDATE(),CURTIME(),'$ip','0' )";

            $result = $mysqli->query($sql);

            header("Location: ../pages/agente.php?mensaje=6");
        } 
             
     }else {
        echo "LDAP bind anonymous failed...";
    }
 }

?>
