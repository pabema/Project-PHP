<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="../recursos/css/style.css">

</head>
<body>
    <h1>Inici Projecte PHP Pablo</h1>   
    <div class="amarillo">
        <p>Login Usuari Registrat</p>
        <div class="azul">
            <form action="procesaLogin.php" method="POST">
                <label for="">Email <input type="text" name="email"></label>
                <?php
                    $parametre = "";
                    if(isset($_GET['parametreEmail'])){
                        $parametre = $_GET["parametreEmail"];
                        echo "<br><p id='error'>Error: ".$parametre."</p>";
                    }
                ?>
                <br><br>
                <label for="">Contrasenya <input type="text" name="contrasenya"></label>
                <?php
                $parametre = "";
                    if(isset($_GET['parametreContra'])){
                        $parametre = $_GET["parametreContra"];
                        echo "<br><p id='error'>Error: ".$parametre."</p>";
                    }
                ?>
                <br><br>
                <label for="">Tipus d'usuari 
                    <input type="radio" name="tipo" value="alumnat">Alumno
                    <input type="radio" name="tipo" value="professorat">Professor
                </label>
                <br><br>
                <button type="submit">Envia</button>

            </form>
        </div>
        <p><a href="../index.php" id="tornaInici">Torna a l'inici</a></p>
    </div>
    <footer>
        <p>IES LLuis Simarro</p>
        <p>DAW</p>
        <p>Curs 21/22</p>
    </footer>
</body>
</html>