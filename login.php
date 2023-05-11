<?php
    include_once 'database.php';

    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
            header('location: medico.php');
            break;

            case 2:
            header('location: paramedico.php');
            break;

            case 3:
            header('location: informacionusuario.php');
            break;

            default:
        }
    }

    if(isset($_POST['curp']) && isset($_POST['password_us'])){
        
        
        $curp = $_POST['curp'];
        $password_us = $_POST['password_us'];
        //************************** 
            session_start(); 
        $_SESSION['codigo']=$curp;
        //************************* 
        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM Usuario WHERE curp= :curp AND password_us = :password_us');
        $query->execute(['curp' => $curp, 'password_us' => $password_us]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            // validar rol
            $rol = $row[7];//este numero importa mucho demaciado pero demasiado
            $_SESSION['rol'] = $rol;
            echo $rol;

            switch($_SESSION['rol']){
                case 1:
                header('location: medico.php');
                break;
    
                case 2:
                header('location: paramedico.php');
                break;

                case 3:
                header('location: informacionusuario.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }

    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="js/script.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="#" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&family=Orbitron&display=swap" rel="stylesheet">
    
</head>
<body>

<center><img src="./img/logo.png" width="300px" height="300px"/></center>

<center>
<table class="clase_table" width="400px" height="300px">

  <tr>

  <td>
    <br>
        <center><h2> Bienvenido a SAUN </h2></center>
        <center><h3> Ingrese sus datos Usuario</h3></center>

    <!-- Formulario -->
    <center>
    
    <form action="#"  method="POST">
        <br>
            <input type="text" id="curp" name="curp" class="input" placeholder="Ingresa tu CURP" autofocus onblur="upperCase()"><br/>
        <br/>
        <input type="password" id="password" name="password_us" class="input" placeholder="Ingresa tu contraseña" width="250px" height="40px">
        <button type="button" style="border:none;" class="button_ojo" onclick="mostrarContrasena()">
            <img src="./img/ojo.png"/>
        </button>
        </center>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="opswuser.php" class="olv_contrasena">¿Olvidaste tu contraseña?</a>
        <center>
        <br/>
    <br>
     <input type="submit" class="button_iniciar" value="Iniciar sesión">
    <br><br>
    </center>
    <button type="button" class="button_registrarte" style="float: right;">
        <a href="registro.php" class="button_registrarte">Registrate</a>
    </button>
    <center>
    <br><br>
    <button type="button" class="button_otro" style="border:none;">
        <a href="tipopersonal.php" class="button_otro">Iniciar como personal médico</a>
    </button>


    </center>
    </form>

  </td>

  </tr>

</table> </center>



<!-- -->


    
</body>

    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }

        function upperCase(){
            var x = document.getElementById("curp").value
            document.getElementById("curp").value = x.toUpperCase()
        }
    </script>

</html>

<!-- http://localhost/PNUS/php/login.php?cerrar_sesion=1 -->