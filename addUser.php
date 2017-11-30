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

            //atributos
            $info["employeeType"] = "3"; // Tipo de usuario
            $info["givenName"] = "Juan Camilo";  //nombre
            $info["sn"] = "Posso Ponce"; // Apellidos
            $info["cn"] = "Juan Camilo Posso Ponce"; // Nombre completo
            $info["employeeNumber"] = "1115083690"; // No Documento
            $info["docNumber"] = "100612020201"; //codigo  
            $info["uid"] = "jcposso";     //Login                     
            $info["userPassword"] = "Juc@po0512"; // Password
            //$info["birthDate"] = "05/12/94";     //Fecha de nacimiento
            //$info["gender"] = "Masculino";  // Genero
            //$info["co"] = "Colombia";  // Pais  
            $info["mail"] = "prueba22@unicauca.edu.co";
            $info["mailLocalAddress"] = "prueba2@unicauca.edu.co";           
            $info["mailAlternateAddress"] = "jucapo05@gmail.com"; //mail alternatico
            //$info["streetAddress"] = "Carrera 2A no 3n-55"; //direccion 
            $info["mobile"] = "3155418508";
            //$info["telephoneNumber"] = "3155418508"; // numero de telefono  
            $info["l"] = "Popayan"; //ciudad       
            //$info["accountExpires"] = "31/12/2017"; // expiracion de cuenta  

            //Obligatorias
            $info["uidNumber"] = "100612"; //AU
            $info["gidNumber"] = "336699";            
            $info["homeDirectory"] = "/home/Pregrado/";   
                
            //Atributos adicionales
            // $info["homeDirectory"] = "/home/Pregrado/2";    
            // $info["loginShell"] = "false";             
            // $info["description"] = "nuevo estudiante";  
            // $info["postalAddress"] ="123455";        
            // $info["st"] = "123455";                        
            //$info["mailLocalAddress"] = "prueba2@unicauca.edu.co";          
            //$info["mailHost"] = "afrodita.unicauca.edu.co";
            //$info["mailRoutingAddress"] = "jcposso@afrodita.unicuca.edu.co";
            //$info["host"] = "afrodita.unicauca.edu.co";
            //$info["gecos"] = "Juan Camilo Posso ";
        
            $add = ldap_add($ldapconn, $dn, $info);

        } else {
            echo "LDAP bind anonymous failed...";
        }
    }

?>
