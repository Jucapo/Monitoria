
<?php

    // Variables del servidor LDAP
    $ldaphost = "10.200.1.138";  // servidor LDAP
    $ldapport = 389;            // puerto del servidor LDAP

    $user = "cn=ADMINUP,dc=unicauca,dc=edu,dc=co";
    $pswd = "adminupdate123";

    // Conexión al servidor LDAP
    $ldapconn = ldap_connect($ldaphost, $ldapport)
        or die("Imposible conectar al servidor $ldaphost");

    if ($ldapconn) {

        // Especifico la versión del protocolo LDAP
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)
            or die ("Imposible asignar el Protocolo LDAP");
        
        // autenticación con usuario
        $ldapbind = ldap_bind($ldapconn,$user,$pswd);


        if ($ldapbind) {
            echo "LDAP bind successful...";
            
            //________________________Añadir Usuario________________________
            
            
            //______________________ Prueba 1 _____________________________

            // $dn = "uid=prueba4,ou=Funcionarios,dc=unicauca,dc=edu,dc=co";

            // $info["objectClass"][0] = "inetOrgPerson";
            // $info["objectClass"][1] = "organizationalPerson";
            // $info["objectClass"][2] = "person";
            // $info["cn"] = "prueba11";
            // $info["sn"] = "prueba1";
            // $info["description"] = "este es un nuevo funcionario";
            // $info["uid"] = "prueba4";
            // $info["userPassword"] = "dsfgs55@";

            // $add = ldap_add($ldapconn, $dn, $info);

             //______________________ Prueba 2 _____________________________

            $dn = "uid=prueba4,ou=Pregrado,ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";

            //$info["mailLocalAddress"] = "prueba2@unicauca.edu.co";
            //$info["loginShell"] = "/bin/false";
            $info["uidNumber"] = "100612";
            $info["gidNumber"] = "336699";  
            $info["mail"] = "prueba22@unicauca.edu.co"; 
            $info["uid"] = "prueba4";

            $info["objectClass"][0] = "inetLocalMailRecipient";
            $info["objectClass"][1] = "person";
            $info["objectClass"][2] = "organizationalPerson";
            $info["objectClass"][3] = "posixAccount";
            $info["objectClass"][4] = "top";
            $info["objectClass"][5] = "shadowAccount";
            $info["objectClass"][6] = "serviciosUnicauca";
            $info["objectClass"][7] = "qmailUser";

           // $info["mailHost"] = "afrodita.unicauca.edu.co";
            //$info["mailRoutingAddress"] = "jcposso@afrodita.unicuca.edu.co";
            $info["homeDirectory"] = "/home/Pregrado/2";
            //$info["host"] = "afrodita.unicauca.edu.co";
            //$info["docNumber"] = "1006120201"; 
            //$info["gecos"] = "Juan Camilo Posso ";
            //$info["givenName"] = "Juan Camilo";
            $info["userPassword"] = "Juc@po0512";                  
            $info["sn"] = "Posso Ponce";
            $info["cn"] = "Juan Camilo Posso Ponce";

            $add = ldap_add($ldapconn, $dn, $info);

            
             //______________________ Prueba 3 _____________________________

             $dn = "uid=prueba3,ou=Pregrado,ou=Estudiantes,ou=Usuarios,dc=unicauca,dc=edu,dc=co";

             $info["objectClass"][0] = "posixAccount";
             $info["objectClass"][1] = "inetOrgPerson";
             $info["objectClass"][4] = "organizationlPerson";
             $info["objectClass"][2] = "person";
             $info["objectClass"][3] = "qmailUser";
 
             $info["homeDirectory"] = "/home/jcposso";
             $info["loginShell"] = "/bin/bash";
             $info["uid"] = "prueba3";
             $info["cn"] = "prueba3";           
             $info["uidNumber"] = "100612";
             $info["gidNumber"] = "336699"; 
             $info["description"] = "nuevo estudiante";
             $info["sn"] = "prueba31";
             $info["givenName"] = "juan Camilo ";
             $info["mail"] = "jcposso@unicauca.edu.co"; 
             $info["telephoneNumber"] = "3155418508";
             $info["mobile"] = "12345"; 
             $info["street"] = "6454645 ";
             $info["postalAddress"] = "4245445";
             $info["l"] = "1234"; 
             $info["st"] = "1234";   
        
             $add = ldap_add($ldapconn, $dn, $info);
            
           // _________________________Consultar Usuario__________________________
            
        //    $dn_consulta = "dc=unicauca,dc=edu,dc=co";
        //     $filter = "(uid=jcposso)";
        //     $result = ldap_search($ldapconn,$dn_consulta,$filter) or exit("Unable to search");
        //     $entries = ldap_get_entries($ldapconn, $result);
        //     print "<pre>";
        //     print_r ($entries);
        //     print "</pre>";
            

        } else {
            echo "LDAP bind anonymous failed...";
        }
    }

?>
