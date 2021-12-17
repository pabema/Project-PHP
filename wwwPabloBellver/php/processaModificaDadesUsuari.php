<?php
    session_start();

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $poblacio = $_POST['poblacion'];

    $tipo = $_SESSION['rol'];
    $user = $_SESSION['usuari'];

    $ip = "192.168.250.219";
    $conxion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");

    $sql = "SELECT * FROM $tipo WHERE email = '$_SESSION[usuari]'";
    $result = mysqli_query($conxion, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $modificaNom = "UPDATE $tipo SET nom = '$nombre' WHERE email = '$user'";
        $consulta1 = mysqli_query($conxion, $modificaNom);
        $modificaCognoms = "UPDATE $tipo SET cognoms = '$apellidos' WHERE email = '$user'";
        $consulta2 = mysqli_query($conxion, $modificaCognoms);
        $modificaPoblacio = "UPDATE $tipo SET poblacio = '$poblacio' WHERE email = '$user'";
        $consulta3 = mysqli_query($conxion, $modificaPoblacio);
        header('Location: http://'.$ip.'/php/usuariRegistrat.php?dades=Les+teues+dades+han+sigut+modificades');
    }
?>