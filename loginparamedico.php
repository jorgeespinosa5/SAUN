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

    if(isset($_POST['Cedula_par']) && isset($_POST['Password_par'])){
        
        
        $curp = $_POST['Cedula_par'];
        $password_us = $_POST['Password_par'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM Paramedico WHERE Cedula_par= :Cedula_par AND Password_par = :Password_par');
        $query->execute(['Cedula_par' => $curp, 'Password_par' => $password_us]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            // validar rol
            $rol = $row[4];//este numero importa mucho demaciado pero demasiado
            $_SESSION['rol'] = $rol;

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
    <title>PNUS</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="#" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&family=Orbitron&display=swap" rel="stylesheet">
    
    
</head>
<body>
<table width= "400" height="30">
    <tr>
        <td><a href="tipopersonal.php"><img src="./img/izquierda.png" width="50px" height="50px"/></a></td>      
    </tr>
</table>
<center><img src="./img/logo.png" width="300px" height="300px"/></center>

<center>
<table class="clase_table" width="400px" height="300px">

  <tr>

  <td>
    <br>
        <center><h2> Bienvenido a SAUN </h2></center>
        <center><h3> Ingrese sus datos Paramédico</h3></center>

    <!-- Formulario -->
    <center>
    
    <form action="#"  method="POST">
        <br>
        <input type="text" name="Cedula_par" id="cedula_par" class="input" Placeholder="Ingresa tu Cédula" autofocus onblur="upperCase()"><br/>
        <br/>
        <input type="password" id="password" name="Password_par" class="input" placeholder="Ingresa tu contraseña" width="250px" height="40px">
        <button type="button" style="border:none;" class="button_ojo" onclick="mostrarContrasena()">
            <img src="./img/ojo.png"/>
        </button>
        </center>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="opswpara.php" class="olv_contrasena">¿Olvidaste tu contraseña?</a>
        <center>
        <br/>
    <br>
     <input type="submit" class="button_iniciar" value="Iniciar sesión">
    <br><br>
    </center>

 
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
            var x = document.getElementById("cedula_par").value
            document.getElementById("cedula_par").value = x.toUpperCase()
        }
    </script>

</html>