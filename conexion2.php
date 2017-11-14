
<?php

    // Variables del servidor LDAP
    $ldaphost = "10.200.1.138";  // servidor LDAP
    $ldapport = 389;            // puerto del servidor LDAP

    $user = "ADMINUP";
    $pswd = "adminupdate123";
    $dn = "cn=ADMINUP,dc=unicauca,dc=edu,dc=co";

    // Conexión al servidor LDAP
    $ldapconn = ldap_connect($ldaphost, $ldapport)
        or die("Imposible conectar al servidor $ldaphost");

    if ($ldapconn) {

        // Especifico la versión del protocolo LDAP
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)
            or die ("Imposible asignar el Protocolo LDAP");
        
        // autenticación anónima
        $ldapbind = ldap_bind($ldapconn);

        // autentificacion con credenciales 
        //$ldapbind = ldap_bind($ldapconn,$user,$pswd)
    
        if ($ldapbind) {
            echo "LDAP bind anonymous successful...";
        } else {
            echo "LDAP bind anonymous failed...";
        }
    }

?>
