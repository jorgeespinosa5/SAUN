<!-- Crear una cuenta -->
<?php
include_once 'database.php';
if (isset($_POST['register'])) {
    //verifica que el formulario este completo
    if (strlen($_POST['username'])>= 1 && strlen($_POST['apellido'])>= 1 && strlen($_POST['sexo']) >= 1 && strlen($_POST['fnacimiento']) >= 1 && strlen($_POST['cedula']) >= 1 && strlen($_POST['institucion']) >= 1 && strlen($_POST['estado'])>= 1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['password']) >= 1) {

        $nombre= trim ($_POST['username']);
        $apellido= trim ($_POST['apellido']);
        $sexo= trim ($_POST['sexo']);
        $fnacimiento= trim ($_POST['fnacimiento']);
        $cedula= trim ($_POST['cedula']);
        $institucion= trim ($_POST['institucion']);
        $estado= trim ($_POST['estado']);
        $telefono= trim ($_POST['telefono']);
        $password= trim($_POST['password']);
       

        // $consulta = "INSERT INTO usuario (CURP, Nombre_us, Num_telefono_us, Password_us, rol_id ) VALUES ('$curp','$nombre','$telefono','$password','3')";
        $consulta = "INSERT INTO Medico (Cedula, Nombre_med, Apellido_med, Sexo_med, Fecha_nac_med, Institucion_med,Estado_med, Num_telefono_med, Password_med, rol_id) VALUES ('$cedula','$nombre','$apellido', '$sexo','$fnacimiento', '$institucion','$estado','$telefono','$password','1')";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            ?>
            <h3>!Te has registrado correctamente!</h3>
            <?php
            header('Location: http://localhost/SAUN/loginmedico.php');
        }
        else{
            ?>
            <h3>!A ocurrido un error!</h3> 
            <?php
        }

    }
}

//Esto esta de prueba
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
            header('location: usuario.php');
            break;

            default:
        }
    }
    
    if(isset($_POST['curp']) && isset($_POST['password'])){
        $curp = $_POST['curp'];
        $password_us = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM Usuario WHERE curp= :curp AND password_us = :password_us');
        $query->execute(['curp' => $curp, 'password_us' => $password_us]);

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
                header('location: usuario.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "Completa el registro correctamente";
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
        <!--img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAMUlEQVRIie3SoREAIADDwJT9dy6KCUAAl1dVVQF9L2u07dHjJADj5KnuZEXaZ0V6wATQzQwKQvoBVgAAAABJRU5ErkJggg=="-->
        <!--
        <input type="checkbox" id="btn-menu"/>
      
        <label class="icon-menu"for="btn-menu"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDM4NCAzODQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAxNTQuNjY3OTY5aC0zNTJjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZzNy4xNjc5NjktMTYgMTYtMTZoMzUyYzguODMyMDMxIDAgMTYgNy4xNjc5NjkgMTYgMTZzLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0zNjggMzJoLTM1MmMtOC44MzIwMzEgMC0xNi03LjE2Nzk2OS0xNi0xNnM3LjE2Nzk2OS0xNiAxNi0xNmgzNTJjOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAyNzcuMzMyMDMxaC0zNTJjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZzNy4xNjc5NjktMTYgMTYtMTZoMzUyYzguODMyMDMxIDAgMTYgNy4xNjc5NjkgMTYgMTZzLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+" width="25px" height="25px"/>  </label>
       
       
       <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="https://coronavirus.gob.mx/">Informacion sobre el COVID-19</a></li>
                <li><a href="loginmedico.php">Consultar Pasiente</a></li>
                <li><a href="#">Ayuda...</a></li>
                
                
                <li><a href="login.php" class="colorverde text-white">Iniciar Sesion</a></li>
            </ul>
            
        </nav>
-->
    </header>
    <!-- -->
<!-- -->
<table width= "400" height="30">
    <tr>
        <td><a href="loginmedico.php"><img src="./img/izquierda.png" width="50px" height="50px"/></a></td>
        <td><img src="./img/logo.png" width="50px" height="50px" align="right"/></td>
    </tr>
</table>

        <center><h2> Bienvenido a SAUN </h2></center>
        <center><h3> Ingrese sus datos Médico</h3></center>

        <br>

    <form action="#" method="POST">
    <center><table class="clase_table">
            <tr>
                <td>
                    <br><h3>Nombre:</h3>
                </td>
                <td>
                    <br><input type="text" name="username" class="input" autofocus id="name"  onblur="upperCaseName()">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Apellido:</h3>
                </td>
                <td>
                    <input type="text" name="apellido" class="input" id="apellido"  onblur="upperCaseAp()">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Sexo:</h3>
                </td>
                <td>
                    <br/><select name="sexo" id="sexo" class="input" autofocus>
                    <option>Seleccionar ...</option>
	                <option value="HOMBRE">Hombre</option>
                    <option value="MUJER">Mujer</option>
                    </select>
                    <br/>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Fecha de nacimiento:</h3>
                </td>
                <td>
                    <input type="date" id="fnacimiento" name="fnacimiento" class="input">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Cedula Profesional:</h3>
                </td>
                <td>
                    <input type="text" name="cedula" class="input" id="cedula"  onblur="upperCase()">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Contraseña:</h3>
                </td>
                <td>
                    <input type="text" name="password" class="input">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Institucion:</h3>
                </td>
                <td>
                    <input type="text" name="institucion" class="input" id="institucion"  onblur="upperCaseIns()">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Estado:</h3>
                </td>
                <td>
                <select name="estado" id="estado">
            <option>Seleccionar ...</option>
	        <option value="DIF">Distrito Federal</option>
	        <option value="AGS">Aguascalientes</option>
	        <option value="BCN">Baja California</option>
	        <option value="BCS">Baja California Sur</option>
	        <option value="CAM">Campeche</option>
	        <option value="CHP">Chiapas</option>
	        <option value="CHI">Chihuahua</option>
	        <option value="COA">Coahuila</option>
	        <option value="COL">Colima</option>
	        <option value="DUR">Durango</option>
	        <option value="GTO">Guanajuato</option>
	        <option value="GRO">Guerrero</option>
	        <option value="HGO">Hidalgo</option>
	        <option value="JAL">Jalisco</option>
	        <option value="MEX">Mexico</option>
	        <option value="MIC">Michoacan</option>
	        <option value="MOR">Morelos</option>
	        <option value="NAY">Nayarit</option>
	        <option value="NLE">Nuevo Leon</option>
	        <option value="OAX">Oaxaca</option>
	        <option value="PUE">Puebla</option>
	        <option value="QRO">Queretaro</option>
	        <option value="ROO">Quintana Roo</option>
	        <option value="SLP">San Luis Potosi</option>
	        <option value="SIN">Sinaloa</option>
	        <option value="SON">Sonora</option>
	        <option value="TAB">Tabasco</option>
	        <option value="TAM">Tamaulipas</option>
	        <option value="TLX">Tlaxcala</option>
	        <option value="VER">Veracruz</option>
	        <option value="YUC">Yucatan</option>
	        <option value="ZAC">Zacatecas</option>
                </select>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Telefono personal:</h3>
                </td>
                <td>
                    <input type="number" name="telefono" class="input">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <br>
                    <Center>
                    <input type="submit" name="register" value="Guardar" class="button_iniciar">
                </td>
            </tr>
        </table></center>
    </form>
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
            var x = document.getElementById("cedula").value
            document.getElementById("cedula").value = x.toUpperCase()
        }
        function upperCaseName(){
            var x = document.getElementById("name").value
            document.getElementById("name").value = x.toUpperCase()
        }
        function upperCaseAp(){
            var x = document.getElementById("apellido").value
            document.getElementById("apellido").value = x.toUpperCase()
        }
        function upperCaseIns(){
            var x = document.getElementById("institucion").value
            document.getElementById("institucion").value = x.toUpperCase()
        }
    </script>
</html>