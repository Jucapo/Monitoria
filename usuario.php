<?php

session_start();

    //Variables de usuario y contraseña
    $login = $_SESSION["login"];
    $paswd = $_SESSION["password"];

    //Agente que modifica 
    $ldaphost = "10.200.1.138";  // servidor LDAP
    $ldapport = 389; 		
    $user = "cn=".$login.",dc=unicauca,dc=edu,dc=co";
    
?>
