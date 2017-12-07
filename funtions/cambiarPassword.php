<?php
/*********Modulo para Actualizar Contraseña***********/

    //Variables de usuario y contraseña
    $uid = $_POST["uid"];
    $password = $_POST["password"];


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
            $info["userpassword"] = $password; // Tipo de usuario       
            $add = ldap_modify($ldapconn, $dn, $info);

            //Verificacion
            if ($add){
                header("Location: ../pages/agente.php?mensaje=3");
                }
                else   
                header("Location: ../pages/agente.php?mensaje=4");
        }
    }

?>
