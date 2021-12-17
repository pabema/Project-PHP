<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesa usuari nou</title>
    <link rel="stylesheet" href="../recursos/css/procesaUsuariNou.css">

</head>
<body>
    <h1>Projecte PHP Pablo</h1>
    <p id="procesa">Procesa Registre Usuari Nou</p>   
    <h3>Valors enviats pel formulari</h3>
    <ul>
        <?php
            $nombre = trim($_POST['nombre']);
            $apellidos = trim($_POST['apellidos']);
            $poblacion = trim($_POST['poblacion']);
            $email = trim($_POST['email']);
            $contrasenya = trim($_POST['contrasenya']);
            $confirmacion = trim($_POST['confirmacion']);
            $fecha = date("Y-m-d H:i:s");
            $tipo = $_POST['tipo'];

            $tipoFormat = strtolower($tipo);
            $emailBase = "SELECT email FROM $tipoFormat WHERE email = '$email'";
        
            $ip = "192.168.250.219";
            
            $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");

            $comprovacioAlumneEmail = mysqli_query($conexion, $emailBase);
            

            // if(mysqli_num_rows($comprovacioAlumneEmail)==0){

            // }

            //Confirmació contra + email duplicat
            if($contrasenya == $confirmacion){
                if(mysqli_num_rows($comprovacioAlumneEmail)==0){
                    

                    echo '<li> Nom: '.$nombre.'</li>';
                    echo '<li> Apellidos: '.$apellidos.'</li>';
                    echo '<li> Població: '.$poblacion.'</li>';
                    echo '<li> Email: '.$email.'</li>';
                    echo '<li> Contrasenya: '.$contrasenya.'</li>';
                    echo '<li> Confirmació de contrasesnya: '.$confirmacion.'</li>';
                    echo '<li> Tipus usuari: '.$tipo.'</li>';

                    $hash = password_hash($contrasenya, PASSWORD_DEFAULT);

                    $consulta = "INSERT INTO $tipoFormat (nom, cognoms, email, poblacio, contrasenya, rol, `data`)
                    VALUES ('$nombre', '$apellidos', '$email', '$poblacion', '$hash', '$tipo', '$fecha')";

                    $resultado = mysqli_query($conexion, $consulta);
                }else{
                    header('Location: http://'.$ip.'/php/registreUsuari.php?parametreEmail=Email+duplicado');
                }
            }else{
                header('Location: http://'.$ip.'/php/registreUsuari.php?parametreContra=Contrasenyes+diferents');
            }


            
            
        ?>
    </ul>
    <?php
        //Fotos
        $tipo = $_POST['tipo'];
        $random = rand(1, 15);

        if($tipo == "ALUMNAT"){
            for($i = 0; $i<$random; $i++){
                echo '<img src="../recursos/img/alumnat.png" width="100px" height="150px">';
            }
        }else if($tipo == "PROFESSORAT"){
            for($i = 0; $i<$random; $i++){
                echo '<img src="../recursos/img/prof.png" width="100px" height="150px">';
            }
        }
    ?>
    <p><a href="../index.php" id="tornaInici">Torna a l'inici</a></p>
    
    <div id="footer">
        <p>IES LLuis Simarro</p>
        <p>DAW</p>
        <p>Curs 21/22</p>
    </div>
</body>
</html>