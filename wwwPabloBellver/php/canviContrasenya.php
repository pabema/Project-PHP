<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../recursos/css/style.css">
    
</head>
<body>
<h1>Inici Projecte PHP Pablo</h1>   
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

    <p id="newUser">Canvi de contrasenya</p>
    <form action="procesaCanviContrasenya.php" method="POST" id="registro">
        <fieldset>
            <legend>Canvi de contrasenya</legend>
            <label>Contrasenya actual: <input type="text" name="contraActual" required></label>
            <?php
                $parametre = "";
                if(isset($_GET['contraActual'])){
                    $parametre = $_GET["contraActual"];
                    echo "<br><p id='error'>Error: ".$parametre."</p>";
                }
            ?>
            <br><br>
            <label>Canvi de contraseña: <input type="text" name="contraCanvi" required></label>
            <?php
                $parametre = "";
                if(isset($_GET['confirmacio'])){
                    $parametre = $_GET["confirmacio"];
                    echo "<br><p id='error'>Error: ".$parametre."</p>";
                }
            ?>
            <br><br>
            <label>Confirma canvi: <input type="text" name="contraConf" required></label>
            <input type="submit" name="registro"/>
        </fieldset>
    </form>
    
    <p><a href="../index.php" id="tornaInici">Torna a l'inici</a></p>
    <footer>
        <p>IES LLuis Simarro</p>
        <p>DAW</p>
        <p>Curs 21/22</p>
    </footer>
</body>
</html>