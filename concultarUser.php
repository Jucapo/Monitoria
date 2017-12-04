
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
            
            
           // _________________________Consultar Usuario__________________________
            
           $dn_consulta = "dc=unicauca,dc=edu,dc=co";
            $filter = "(uid=jcposso)";
            $result = ldap_search($ldapconn,$dn_consulta,$filter) or exit("Unable to search");
            $entries = ldap_get_entries($ldapconn, $result);
            print "<pre>";
            print_r ($entries);
            print "</pre>";
            

        } else {
            echo "LDAP bind anonymous failed...";
        }
    }

?>
