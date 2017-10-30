<?php
include ("conexion.php");
                                                       
$login = $_POST["login"];
$password = $_POST["password"];

session_start();

$mysqli = new mysqli($host, $user, $pw, $db);
$sql = "SELECT * from usuarios where login = '$login'";

$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_NUM);
$numero_filas = $result->num_rows;

if ($numero_filas > 0)
  {
    $passwdc = $row[3];
    if ($password==$passwdc)
      {
        $_SESSION["autenticado"]= "SI";  
		$id=$row[0];
        $login = $row[1];
		$documento=$row[2];
        $tipoUser = $row[4];	
        if($tipoUser=="admin"){
            header("Location: pages/admin.php");	
        }
        elseif($tipoUser=="agente"){
            header("Location: pages/agente.php");	
        }       	  	
      } 
      else{
     header('Location: index.php?mensaje=1');
      }
  }
else{
    header('Location: index.php?mensaje=2');
    }  
?>
