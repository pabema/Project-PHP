<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuari Registrat</title>
    <link rel="stylesheet" href="../recursos/css/style.css">
</head>
<body>
    <h1>Projecte PHP Pablo</h1>
    <div>Usuari Registrat</div>
    <?php
        session_start();

        $tipo = "$_SESSION[rol]";


        $ip = "192.168.250.219";
        $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");
        
        $sql = "SELECT * FROM $tipo WHERE email = '$_SESSION[usuari]'";
        $result = mysqli_query($conexion, $sql);

        echo "<p style='background-color: white; color: red'>Hola $_SESSION[usuari], estas registrat com a $_SESSION[rol] <a href='desconecta.php'>Desconecta't</a></p>";

        while($row = mysqli_fetch_assoc($result)){
            echo "<ul>";
            echo "<li>Nom: ".$row['nom']."</li>";
            echo "<br>";
            echo "<li>Cognoms: ".$row['cognoms']."</li>";
            echo "<br>";
            echo "<li>Email: ".$row['email']."</li>";
            echo "<br>";
            echo "<li>Poblacio: ".$row['poblacio']."</li>";
            echo "<br>";
            echo "<li>Contrasenya: ".$row['contrasenya']."</li>";
            echo "<br>";
            echo "<li>Rol: ".$row['rol']."</li>";
            echo "<br>";
            echo "<li>Data: ".$row['data']."</li>";
            echo "<br>";
            echo "<ul>";
        }
    ?>
    <?php
        $parametre = "";
        if(isset($_GET['contrasenya'])){
            $parametre = $_GET["contrasenya"];
            echo "<br><p id='error'>".$parametre."</p>";
        }
    ?>
    <?php
        $parametre = "";
        if(isset($_GET['dades'])){
            $parametre = $_GET["dades"];
            echo "<br><p id='error'>".$parametre."</p>";
        }
    ?>
    <p><a href="modificaDadesUsuari.php">Modifica les teues Dades</a> <a href="processaBaixaUsuari.php">Dona't de baixa</a></p>
    <p><a href="../index.php" id="tornaInici">Torna a l'inici</a></p>
</body>
</html>