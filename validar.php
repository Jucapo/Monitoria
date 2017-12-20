<?php

$login = $_POST["login"];
$pswd = $_POST["pswd"];

session_start();

    $ldaphost = "10.200.1.138";  // servidor LDAP
    $ldapport = 389;            // puerto del servidor LDAP

    $user = "cn=".$login.",dc=unicauca,dc=edu,dc=co";
  
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
            $_SESSION["login"] = $login;     
            $_SESSION["pswd"] = $pswd; 
            header("Location: pages/agente.php");

        } 
        else{
            header('Location: index.php?mensaje=2');
        }
    }
    else {
        header('Location: index.php?mensaje=1');
    }


?>
