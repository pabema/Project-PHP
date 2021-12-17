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

    <p id="newUser">Modifica usuari registrat</p>
    <form action="processaModificaDadesUsuari.php" method="POST" id="registro">
        <fieldset>
            <legend>Modifica dades usuari</legend>
            <?php
                session_start();
        
                $tipo = "$_SESSION[rol]";
        
        
                $ip = "192.168.250.219";
                $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");
                
                $sql = "SELECT * FROM $tipo WHERE email = '$_SESSION[usuari]'";
                $result = mysqli_query($conexion, $sql);
        
        
                while($row = mysqli_fetch_assoc($result)){
                    echo "<label>Nom: <input type='text' name='nombre' required value=".$row['nom']."></label>";
                    echo "<br><br>";
                    echo "<label>Cognom: <input type='text' name='apellidos' required value=".$row['cognoms']."></label>";
                    echo "<br><br>";
                    echo "<label>Poblacio: <input type='text' name='poblacion' required value=".$row['poblacio']."></label>";
                    echo "<br><br>";
                    echo "<label>Email: <input type='text' name='email' required pattern='[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}' value=".$row['email']." readonly></label>";
                    echo "<br><br>";
                    echo "<label>Contrasenya: <a href="."canviContrasenya.php".">Canvia la contrasenya</a>";
                    $parametre = "";
                    if(isset($_GET['parametreContra'])){
                        $parametre = $_GET["parametreContra"];
                        echo "<br><p id='error'>Error: ".$parametre."</p>";
                    }
                    echo "<br><br>";
                    echo "<label>Tipus d'usuari: <select name'tipo' required disabled>
                    <option>".$row['rol']."</option>
                    </select></label>";
                    echo "<br><br>";
                }
            ?>
            <input type="submit"/>
        </fieldset>
    </form>
    <p><a href="./usuariRegistrat.php" id="tornaInici">Cancela</a></p>
    <p><a href="../index.php" id="tornaInici">Torna a l'inici</a></p>
    <footer>
        <p>IES LLuis Simarro</p>
        <p>DAW</p>
        <p>Curs 21/22</p>
    </footer>
</body>
</html>