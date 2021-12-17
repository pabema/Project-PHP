<?php
    session_start();

    $contrasenya = $_POST['contraActual'];
    $contraCanvi = $_POST['contraCanvi'];
    $contraConf = $_POST['contraConf'];

    $tipo = $_SESSION['rol'];
    $user = $_SESSION['usuari'];

    $ip = "192.168.250.219";
    $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");
        
    $sql = "SELECT contrasenya FROM $tipo WHERE email = '$_SESSION[usuari]'";
    $hash = mysqli_query($conexion, $sql);
    
    while($row = mysqli_fetch_assoc($hash)){
        if(password_verify($contrasenya, $row['contrasenya'])){
            if($contraCanvi == $contraConf){
                $hashCanvi = password_hash($contraCanvi, PASSWORD_DEFAULT);
                $modifica = "UPDATE $tipo SET contrasenya = '$hashCanvi' WHERE email = '$user'";
                $modificarContra = mysqli_query($conexion, $modifica);
                header('Location: http://'.$ip.'/php/usuariRegistrat.php?contrasenya=La+contrasenya+ha+sigut+modificada');
            }else{
                header('Location: http://'.$ip.'/php/canviContrasenya.php?confirmacio=Confirmacio+fallida');    
            }
        }else{
            header('Location: http://'.$ip.'/php/canviContrasenya.php?contraActual=La+contrasenya+es+incorrecta');
        }
    }

     
?>