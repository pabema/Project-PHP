<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../recursos/css/style.css">
</head>
<body>
    <h1>Visitant</h1>
    <h3>Pagina en obras</h3>
    <?php
    session_start();

    if(!isset($_SESSION['usuari'])){
        echo "<div id='menu' style='display: flex; justify-content: space-around; flex-direction:row; background-color:lightgrey; padding:1em'>
            <div id='index'><a href='../index.php' style='text-decoration: none'>Inici</a></div>
            <div id='visitant'><a href='/php/visitant.php' style='text-decoration: none'>Visitant</a></div>
            <div id='login'><a href='/php/loginUsuari.php' style='text-decoration: none'>Login</a></div>
            <div id='registre'><a href='/php/registreUsuari.php' style='text-decoration: none'>Registra't</a></div>
            <div id='admin'><a href='/php/admin.php' style='text-decoration: none'>Administracio</a></div>
        </div>";
        echo "<br>";
    }else{
        echo "<div id='menu' style='display: flex; justify-content: space-around; flex-direction:row; background-color:lightgrey; padding:1em'>
            <div id='index'><a href='../index.php' style='text-decoration: none'>Inici</a></div>
            <div id='visitant'><a href='/php/visitant.php' style='text-decoration: none'>Visitant</a></div>
            <div id='login'><a href='/php/usuariRegistrat.php' style='text-decoration: none'>Usuari Registrat</a></div>
            <div id='registre'><a href='/php/registreUsuari.php' style='text-decoration: none'>Registra't</a></div>
            <div id='admin'><a href='/php/admin.php' style='text-decoration: none'>Administracio</a></div>
        </div>";
        echo "<p style='background-color: white; color: red'>Hola $_SESSION[usuari], estas registrat com a $_SESSION[rol] <a href='/php/desconecta.php'>Desconecta't</a></p>";
    }
    ?>
    <footer>
        <p>IES LLuis Simarro</p>
        <p>DAW</p>
        <p>Curs 21/22</p>
    </footer>
</body>
</html>