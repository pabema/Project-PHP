<?php

    session_start();

    $tipo = "$_SESSION[rol]";
        
        
    $ip = "192.168.250.219";
    $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");
                
    $sql = "DELETE FROM $tipo WHERE email = '$_SESSION[usuari]'";
    $result = mysqli_query($conexion, $sql);

    unset($_SESSION['usuari']);
    unset($_SESSION['rol']);

    session_destroy();
    header("Location: http://192.168.250.219/index.php");

?>