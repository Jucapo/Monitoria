
<?php
// $ds es un identificador de enlace válido para un servidor de directorio

// $person es todo o parte del nombre de una persona, por ejemplo "Jo"

$dn = "dc=unicauca,dc=edu,dc=co";
$filter="(|(sn=$person*)(givenname=$person*))";
$justthese = array("ou", "sn", "givenname", "mail");

$sr=ldap_search($ds, $dn, $filter, $justthese);

$info = ldap_get_entries($ds, $sr);

echo $info["count"]." entradas devueltas\n";
?>
