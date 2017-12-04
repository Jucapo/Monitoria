<?php
    $ldaphost = "10.200.1.138";
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
            
            //
            $dn = "uid=jcposso,ou=Pregrado,ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";
            
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
            $info["uid"] = "jcposso";     //Login  
            $info["employeeNumber"] = "1115083690"; // No Documento
      
            //Obligatorias
            $info["uidNumber"] = "100612"; //AU
            $info["gidNumber"] = "336699";            
            $info["homeDirectory"] = "/home/Pregrado/";   //   home/$employeeType/$uid
  
            //atributos
            $info["employeeType"] = "3"; // Tipo de usuario
            $info["givenName"] = "Juan Camilo";  //nombre
            $info["sn"] = "Posso Ponce"; // Apellidos
            $info["cn"] = "Juan Camilo Posso Ponce"; // Nombre completo
            $info["gecos"] = "Juan Camilo Posso Ponce"; // Nombre completo           
            $info["docNumber"] = "100612020201"; //codigo                                
            $info["host"] = "atenea.unicauca.edu.co"; //host
            $info["loginShell"] = "/bin/false"; // si es pregrado o posgrado afrodita.unicauca.edu.co     
            $info["mail"] = "jcposso@unicauca.edu.co";  // $uid@unicauca.edu.co
            $info["mailLocalAddress"] = "jcposso@unicauca.edu.co";     // $uid@unicauca.edu.co      
            $info["mailAlternateAddress"] = "jucapo05@gmail.com"; //mail alternatico
            $info["mailHost"] = "atenea.unicauca.edu.co"; // igual al host          
            $info["mailRoutingAddress"] = "jcposso@atenea.unicauca.edu.co";  // $iud@mailHost
            $info["userPassword"] = "Juc@po0512"; // Password cifrado
            //$info["gender"] = "Masculino";  // Genero
            //$info["co"] = "co"; // pais solo se ponen 2 letras dependiendo del pais
            $info["streetAddress"] = "Carrera 2A no 3n-55"; //direccion 
            $info["l"] = "Popayan"; //ciudad       
            //$info["accountExpires"] = "";
            $info["mobile"] = "3155418508";
            $info["telephoneNumber"] = "8233639"; // numero de telefono  
                                    
            //    gidNumber
            //  30000-Pregrado
            //  30001-Posgrado
            //  30002-Egresados
            //  30003-Funcionarios
            //  30004-Contratistas
            //  30005-Docentes
            //  30006-GruposL
            //  30007-GruposA
            //  30008-Dependencias
            //  30009-Eventos
            //  30010-Adscritas
            //  30011-Especiales
            //  30012-
            //  30013-PencionadosF
        
            $add = ldap_add($ldapconn, $dn, $info);

        } else {
            echo "LDAP bind anonymous failed...";
        }
    }

?>
