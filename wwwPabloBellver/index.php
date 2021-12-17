<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/css/style.css">
</head>
<body>
    <h1>Inici Projecte PHP Pablo</h1>
    <?php
        session_start();

        // $ip = "192.168.240.219";
        // $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");
        
        // $sql = "SELECT * FROM $tipo WHERE email = '$_SESSION[usuari]'";
        // $result = mysqli_query($conexion, $sql);

        if(!isset($_SESSION['usuari'])){
            echo "<div id='menu' style='display: flex; justify-content: space-around; flex-direction:row; background-color:lightgrey; padding:1em'>
                <div id='index'><a href='index.php' style='text-decoration: none'>Inici</a></div>
                <div id='visitant'><a href='/php/visitant.php' style='text-decoration: none'>Visitant</a></div>
                <div id='login'><a href='/php/loginUsuari.php' style='text-decoration: none'>Login</a></div>
                <div id='registre'><a href='/php/registreUsuari.php' style='text-decoration: none'>Registra't</a></div>
                <div id='admin'><a href='http://192.168.250.219:5000' style='text-decoration: none'>Administracio</a></div>
            </div>";
            echo "<br>";
        }else{
            echo "<div id='menu' style='display: flex; justify-content: space-around; flex-direction:row; background-color:lightgrey; padding:1em'>
                <div id='index'><a href='index.php' style='text-decoration: none'>Inici</a></div>
                <div id='visitant'><a href='/php/visitant.php' style='text-decoration: none'>Visitant</a></div>
                <div id='login'><a href='/php/usuariRegistrat.php' style='text-decoration: none'>Usuari Registrat</a></div>
                <div id='registre'><a href='/php/registreUsuari.php' style='text-decoration: none'>Registra't</a></div>
                <div id='admin'><a href='http://192.168.250.219:5000' style='text-decoration: none'>Administracio</a></div>
            </div>";
            echo "<p style='background-color: white; color: red'>Hola $_SESSION[usuari], estas registrat com a $_SESSION[rol] <a href='/php/desconecta.php'>Desconecta't</a></p>";
        }
    ?>
    <div id="contenedor">
        <a href="./php/visitant.php" id="visitant">
            <div id="visitor">
                <p>Visitant</p>
                <img src="recursos/img/visitor.jpg" alt="" width="200px" heigth="200px">
            </div>
        </a>
        <div id="usuario">
            <p>Usuario</p>
            <img src="recursos/img/user.png" alt="" width="200px" heigth="200px">
            <div id="links"><a href="./php/loginUsuari.php">Acceder</a> - <a href="./php/registreUsuari.php">Registro</a></div>
        </div>
        <a href='http://192.168.250.219:5000' id="admin">
            <div id="administrador">
                <p>Administracio</p>
                <img src="recursos/img/admin.jpg" alt="" width="200px" heigth="200px">
            </div>
        </a>
    </div>
    <footer>
        <p>IES LLuis Simarro</p>
        <p>DAW</p>
        <p>Curs 21/22</p>
    </footer>
</body>
</html>