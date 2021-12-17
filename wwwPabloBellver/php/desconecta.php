<?php
    session_start();

    unset($_SESSION['usuari']);
    unset($_SESSION['rol']);

    session_destroy();
    header("Location: http://192.168.250.219/index.php");
?>