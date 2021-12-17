<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesa Login</title>
</head>
<body>
    <?php 
        $email = trim($_POST['email']);
        $contrasenya = trim($_POST['contrasenya']);
        $tipo = trim($_POST['tipo']);

        $tipoFormat = strtolower($tipo);
        $emailBase = "SELECT * FROM $tipoFormat WHERE email = '$email'";

        $ip = "192.168.250.219";
        $conexion = mysqli_connect($ip, "projectes_pabloBellver", "projectes_pabloBellver", "projectes_pabloBellver");
 
       // $comprovacioAlumneEmail = mysqli_query($conexion, $emailBase);
        
       $sql = "SELECT * FROM $tipoFormat WHERE email = '$email'";
       $result = mysqli_query($conexion, $sql);
       $num = mysqli_num_rows($result);

       if($num == 1){
           echo "Email '$email' encontrado<br>";
           while($row = mysqli_fetch_assoc($result)){
               if(password_verify($contrasenya, $row['contrasenya'])){
                   session_start();
                   $_SESSION["usuari"] = $email;
                   $_SESSION["rol"] = $tipoFormat;
                   header("Location: http://$ip/php/usuariRegistrat.php");
                }else{
                    header("Location: http://$ip/php/loginUsuari.php?parametreContra=Contrasenya+incorrecta");
                }
           }
        }else{
        header("Location: http://$ip/php/loginUsuari.php?parametreEmail=Usuari+no+existeix");
        }
    
    ?>
</body>
</html>