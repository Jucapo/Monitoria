<?php

/*********Modulo para Actualizar Usuarios***********/

  //Variables con las que se creeara el nuevo Usuario
  $uid = $_POST["uid"];
  $noDoc = $_POST["noDoc"];
  $nombre = $_POST["nombre"];
  $apellidos = $_POST["apellidos"];
  $municipio = $_POST["municipio"];
  $direccion = $_POST["direccion"];
  $emailAlt = $_POST["emailAlt"];
  $telefono = $_POST["telefono"];

 //Agente que modifica 
 $ldaphost = "10.200.1.138";  // servidor LDAP
 $ldapport = 389; 		
 $user = "cn=ADMINUP,dc=unicauca,dc=edu,dc=co";
 $pswd = "adminupdate123";


 $ldapconn = ldap_connect($ldaphost, $ldapport)
     or die("Imposible conectar al servidor $ldaphost");

 if ($ldapconn) {

     ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)
         or die ("Imposible asignar el Protocolo LDAP");
     
     $ldapbind = ldap_bind($ldapconn,$user,$pswd);

     if ($ldapbind) {
         //echo "LDAP bind successful...";
         
         $dn = "uid=".$uid.",ou=Pregrado,ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";

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
             header("Location: ../pages/agente.php?mensaje=5");
             }
             else   
             header("Location: ../pages/agente.php?mensaje=6");
     }
 }

?>
