<?php

    include ("../usuario.php");
    include ("../conexion.php");

/*********Modulo para la Creacion de  nuevos Usuarios LDAP***********/

    // ATRIBUTOS DEL FORMULARIO

    $uid = $_POST["login"];
    $noDoc = $_POST["noDoc"];
    $password = $_POST["password"];
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

    $ldapconn = ldap_connect($ldaphost, $ldapport)
        or die("Imposible conectar al servidor $ldaphost");

    if ($ldapconn) {

        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)
            or die ("Imposible asignar el Protocolo LDAP");
        
        $ldapbind = ldap_bind($ldapconn,$user,$pswd);

        if ($ldapbind) {
            //echo "LDAP bind successful...";
            
            //Ruta del directorio del  usuario que se agrega
            if($tipoUsuario=="Pregrado" || $tipoUsuario=="Posgrado" ){
                $dn = "uid=".$uid.",ou=".$tipoUsuario.",ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";
            }
            else {
                $dn = "uid=".$uid.",ou=".$tipoUsuario.",ou=Usuarios,dc=unicauca,dc=edu,dc=co";
            }
          
            //ObjectClass
            $info["objectClass"][0] = "inetLocalMailRecipient";
            $info["objectClass"][1] = "person";
            $info["objectClass"][2] = "organizationalPerson";
            $info["objectClass"][3] = "inetOrgPerson";            
            $info["objectClass"][4] = "posixAccount";
            $info["objectClass"][5] = "top";
            $info["objectClass"][6] = "shadowAccount";
            $info["objectClass"][7] = "serviciosUnicauca";
            $info["objectClass"][8] = "qmailUser";

            // Unicos
            $info["uid"] = $uid;     //Login  
            $info["employeeNumber"] = $noDoc; // No Documento

            if($tipoUsuario == "Pregrado")
                $info["gidNumber"] = "30000";  
            elseif ($tipoUsuario == "Posgrado") 
                $info["gidNumber"] = "30001"; 
            elseif ($tipoUsuario == "Egresados") 
                $info["gidNumber"] = "30002";     
            elseif ($tipoUsuario == "Funcionarios") 
                $info["gidNumber"] = "30003";
            elseif ($tipoUsuario == "Contratistas") 
                $info["gidNumber"] = "30004";
            elseif ($tipoUsuario == "Docentes") 
                $info["gidNumber"] = "30005";
            elseif ($tipoUsuario == "Grupos de Investigacion") 
                $info["gidNumber"] = "30006";
            elseif ($tipoUsuario == "Grupos de Actividades") 
                $info["gidNumber"] = "30007";
            elseif ($tipoUsuario == "Dependancias") 
                $info["gidNumber"] = "30008";
            elseif ($tipoUsuario == "Eventos") 
                $info["gidNumber"] = "30009";
            elseif ($tipoUsuario == "Entidades Adscritas") 
                $info["gidNumber"] = "30010";
            elseif ($tipoUsuario == "Especiales") 
                $info["gidNumber"] = "30011";
            elseif ($tipoUsuario == "Funcionarios Pensionados") 
                $info["gidNumber"] = "30013";
        
            if($tipoUsuario == "Pregrado" ||$tipoUsuario == "Posgrado" )
                $info["loginShell"] = "afrodita.unicauca.edu.co"; 
            else
                $info["loginShell"] = "/bin/false"; 
      
            //Obligatorias
            $info["uidNumber"] = "100612"; //AU          
            $info["homeDirectory"] = "/home/".$employeeType."/".$uid;   //   home/$employeeType/$uid
  
            //atributos
            $info["employeeType"] = $tipoUsuario; // Tipo de usuario
            $info["givenName"] = $nombre;  //nombre
            $info["sn"] = $apellidos; // Apellidos
            $info["cn"] =  $nombre." ".$apellidos; // Nombre completo
            $info["gecos"] = $nombre." ".$apellidos;; // Nombre completo           
            $info["docNumber"] = $codigo ; //codigo                                
            $info["host"] = "atenea.unicauca.edu.co"; //host         
            $info["mail"] = $uid."@unicauca.edu.co";  // $uid@unicauca.edu.co
            $info["mailLocalAddress"] =  $uid."@unicauca.edu.co";     // $uid@unicauca.edu.co      
            $info["mailAlternateAddress"] = $emailAlt; //mail alternatico
            $info["mailHost"] = "atenea.unicauca.edu.co"; // igual al host          
            $info["mailRoutingAddress"] = "jcposso@atenea.unicauca.edu.co";  // $iud@mailHost
            $info["userPassword"] = $password; // Password cifrado
            //$info["country"] = "co"; // pais solo se ponen 2 letras dependiendo del pais
            $info["streetAddress"] = $direccion; //direccion 
            $info["l"] = $municipio; //ciudad       
            $info["mobile"] = $telefono;
            $info["telephoneNumber"] = "8233639"; // numero de telefono  

            $add = ldap_add($ldapconn, $dn, $info);

            if ($add){

                $mysqli = new mysqli($host, $userB, $pw, $db);                    
                $sql = "INSERT INTO registro(login, fecha, hora, ip, correcto, uid_creado)
                         VALUES  ('$uidLogin',CURDATE(),CURTIME(),'$ip','1', '$uid' )";             
                $result = $mysqli->query($sql);
                header("Location: ../pages/agente.php?mensaje=1");
              }
              else{
                $mysqli = new mysqli($host, $userB, $pw, $db);
                
                $sql = "INSERT INTO registro( login, fecha, hora, ip, correcto, uid_creado)
                            VALUES  ('$uidLogin',CURDATE(),CURTIME(),'$ip','0', '$uid' )";

                $result = $mysqli->query($sql);

                header("Location: ../pages/agente.php?mensaje=2");
              }   
                
        } else {
            echo "LDAP bind anonymous failed...";
        }
    }

?>
