<?php
    session_start();

    include ("conexion.php");

    $login = $_POST["login"];
    $pswd = $_POST["pswd"];

    $mysqli = new mysqli($host, $userB, $pw, $db);  
    $sql = "SELECT * from perfiles where uid = '$login'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array(MYSQLI_NUM);
    $numero_filas = $result->num_rows;

    if ($numero_filas > 0)
    {
        $cargo = $row[1];
        $uidLogin = $row[2]; 
        $pswLogin = $row[3]; 
        $nombre  = $row[4];
        $apellido  = $row[5];
      
        if($pswLogin == $pswd){
            $_SESSION["login"] = "ADMINUP";     
            $_SESSION["pswd"] =  "adminupdate123"; 
            $_SESSION["uidLogin"] = $uidLogin;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["apellido"] = $apellido;
            $_SESSION["autenticado"] ="SI";
            if($cargo == "admin"){
                header("Location: pages/admin.php");
            }
            else {
                header("Location: pages/agente.php");
            }        
        }
        else{
            header('Location: index.php?mensaje=2');
        }
    }
    else {
        header('Location: index.php?mensaje=1');
    }
?>
