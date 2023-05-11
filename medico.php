<?php //Permiso
include_once 'database.php';
if(!isset($_SESSION)) { 
    session_start(); 
  }

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: login.php');
    }
}

    

    if(isset($_POST['curp'])){
        $curp = $_POST['curp'];
        //************************** 
        
        
        //$_SESSION['codigo']=$curp;
        //************************* 
        }else{
            // no existe el usuario
            echo "Inserte una CURP valida";
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
    <link rel="stylesheet" href="js/script.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="#" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&family=Orbitron&display=swap" rel="stylesheet">
    
</head>
<body>
    <!-- -->
    <header>
        <input type="checkbox" id="btn-menu"/>
      
        <label class="icon-menu"for="btn-menu"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDM4NCAzODQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAxNTQuNjY3OTY5aC0zNTJjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZzNy4xNjc5NjktMTYgMTYtMTZoMzUyYzguODMyMDMxIDAgMTYgNy4xNjc5NjkgMTYgMTZzLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0zNjggMzJoLTM1MmMtOC44MzIwMzEgMC0xNi03LjE2Nzk2OS0xNi0xNnM3LjE2Nzk2OS0xNiAxNi0xNmgzNTJjOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAyNzcuMzMyMDMxaC0zNTJjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZzNy4xNjc5NjktMTYgMTYtMTZoMzUyYzguODMyMDMxIDAgMTYgNy4xNjc5NjkgMTYgMTZzLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+" width="25px" height="25px"/>  </label>
       <!--img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAMUlEQVRIie3SoREAIADDwJT9dy6KCUAAl1dVVQF9L2u07dHjJADj5KnuZEXaZ0V6wATQzQwKQvoBVgAAAABJRU5ErkJggg=="-->
        
       
       <nav class="menu">
            <ul>
                <li><a href="medico.php">Buscar CURP</a></li>
                <li><a href="opcmenumed.php">Registrar Paciente</a></li>
                <li><a href="opcmenumed.php">Editar informacion</a></li>
                <li><a href="opcmenumed.php">Estudios Clínicos</a></li>
                <li><a href="opcmenumed.php">Consultas</a></li>
                
                
                <li><a href="loginmedico.php?cerrar_sesion=1" class="colorverde text-white">Cerrar Sesion</a></li>
            </ul>
            
        </nav>
        
    </header>
    <!-- -->
<!-- -->
<center>
    <img src="./img/medico.jpg" width="200px" height="250px"/>
    <h3>Consultar Paciente </h3>
</center>

<!-- Formulario -->
<form action="vistamedico.php"  method="POST">
        CURP: <br/><input type="text" name="curp" class="form-control" id="curp" Placeholder="C U R P" autofocus onblur="upperCase()"><br/>
        
    <br>
    <center> <input type="submit" class="btn btn-outline-secondary" value="Consultar">
    <br>
    </center>
    </form>


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