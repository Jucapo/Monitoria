<?php
/*********Modulo para Actualizar Contraseña***********/

    include ("../usuario.php");
    include ("../conexion.php"); 

    //Variables de usuario y contraseña
    $uid = $_POST["uid"];
    $password = $_POST["password"];

    $ldapconn = ldap_connect($ldaphost, $ldapport)
        or die("Imposible conectar al servidor $ldaphost");

    if ($ldapconn) {

        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)
            or die ("Imposible asignar el Protocolo LDAP");
        
        $ldapbind = ldap_bind($ldapconn,$user,$pswd);

        if ($ldapbind) {
            //echo "LDAP bind successful...";
            
            $dn = "uid=".$uid.",ou=Pregrado,ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";
            $info["userpassword"] = $password; // Tipo de usuario       
            $add = ldap_modify($ldapconn, $dn, $info);

          //Verificacion
          if ($add){ //Se modifico usuario correctamente 
             
            $mysqli = new mysqli($host, $userB, $pw, $db);    
            
            $sql = "INSERT INTO modificacionpass(login, fecha, hora, ip, correcto, uid_modificado)
                     VALUES  ('$uidLogin',CURDATE(),CURTIME(),'$ip','1' ,'$uid' )";
            
            $result = $mysqli->query($sql);
            
            header("Location: ../pages/agente.php?mensaje=3");              
            }
            else {  //Error al modificar usuario
                $mysqli = new mysqli($host, $userB, $pw, $db);

                $sql = "INSERT INTO modificacionpass( login, fecha, hora, ip, correcto, uid_modificado)
                         VALUES  ('$uidLogin',CURDATE(),CURTIME(),'$ip','0' ,'$uid' )";

                $result = $mysqli->query($sql);    

                header("Location: ../pages/agente.php?mensaje=4");              
            }
        }
    }

?>
