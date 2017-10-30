<?php
/*********Modulo para Actualizar Contraseña***********/

    //Variables de usuario y contraseña
    $id = $_POST["idUser"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    // Actualizar Contraseña en la Base de Datos
    include ("../conexion.php");
    $mysqli = new mysqli($host, $user, $pw, $db);           
    $sql = "UPDATE usuarios SET password = '$password' WHERE (id = '$id')";
    $result= $mysqli->query($sql);

    //Verificacion
    if ($result){
    header("Location: ../pages/agente.php?mensaje=3");
    }
    else   
    header("Location: ../pages/agente.php?mensaje=4");
?>
