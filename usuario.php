<?php
session_start();

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 3){
        header('location: login.php');
    }
}

//añadir registro
include_once 'database.php';
if (isset($_POST['almacenar'])) {
    //verifica que el formulario este completo

    
    if (strlen($_POST['sexo']) >= 1 && strlen($_POST['tsangre']) >= 1 && strlen($_POST['alergias']) >= 1 && strlen($_POST['cirugias']) >= 1 && strlen($_POST['farmaco']) >= 1 && strlen($_POST['telemergencia']) >= 1 && strlen($_POST['curp_c'])>= 1 ) {

    //$ultimoid = "SELECT MAX(Id) FROM Informacion_Usuario";
    //$resul = mysqli_query($conex, $ultimoid);
    //$int = intval($resul);

        $sexo = trim ($_POST['sexo']);
        $tsangre= trim ($_POST['tsangre']);
        $alergias= trim ($_POST['alergias']);
        $cirugias= trim ($_POST['cirugias']);
        $farmaco= trim ($_POST['farmaco']);
        $telemergencia= trim ($_POST['telemergencia']);
        $curp_c= trim ($_POST['curp_c']);
        
        $consulta = "INSERT INTO Informacion_Usuario (Sexo, Tipo_Sangre, Alergia, Cirugias, Farmaco, Num_telefono_emer, Us_CURP) VALUES ('$sexo','$tsangre','$alergias','$cirugias','$farmaco','$telemergencia','$curp_c')";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            ?>
            <center><p>!Has completado el registro correctamente! </p></center> 
            <?php
            header('Location: http://localhost/SAUN/login.php?cerrar_sesion=1');
        }
        else{
            ?>
            <center><p>!A ocurrido un error!</p></center> 
            <?php
        }

    }
}
//header('location: informacionusuario.php');
?>



<!-- Crear una cuenta -->
<?php



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
        <td><img src="./img/logo.png" width="50px" height="50px" align="right"/></td>
    </tr>
</table>
<br><br>
<center><h3 class="olvpsw"> Completa el Registro </h3></center>

    <form action="#" method="POST">
    <center><table class="clase_table">
            <tr>
                <td>
                    <br><h3>Sexo:</h3>
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
                    <br><h3>Tipo de Sangre:</h3>
                </td>
                <td>
                    <br><input type="text" name="tsangre" class="input" placeholder="Tipo de Sangre"  id="sangre"  onblur="upperCaseSan()" >
                </td>
            </tr>
            <tr>
                <td>
                    <br><h3>Alergias:</h3>
                </td>
                <td>
                    <br><input type="text" name="alergias" class="input" placeholder="Menciona tus alergias" id="alergia"  onblur="upperCaseAl()">
                </td>
            </tr>
            <tr>
                <td>
                    <br><h3>Cirugias:</h3>
                </td>
                <td>
                    <br><input type="text" name="cirugias" class="input" placeholder="Ultima Cirugia si no existe N/A" id="cirugia"  onblur="upperCaseCir()">
                </td>
            </tr>
            <tr>
                <td>
                    <br><h3>Farmaco:</h3>
                </td>
                <td>
                    <br><input type="text" name="farmaco" class="input" placeholder="Medicamentos de control actuales" id="farmaco"  onblur="upperCaseFar()">
                </td>
            </tr>
            <tr>
                <td>
                    <br><h3>Numero de telefono de emergencia:</h3>
                </td>
                <td>
                    <br><input type="number" name="telemergencia" class="input" placeholder="Llamar en caso de una emergencia">
                </td>
            </tr>
            <tr>
                <td>
                    <br><h3>CURP:</h3>
                </td>
                <td>
                    <br><input type="text" name="curp_c" class="input" id="curp"  onblur="upperCase()" placeholder="Ingresa tu CRUP para validar"><br/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <Center>
                    <input type="submit" name="almacenar" value="Capturar Datos" class="button_iniciar">
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
            var x = document.getElementById("curp").value
            document.getElementById("curp").value = x.toUpperCase()
        }
        function upperCaseSan(){
            var x = document.getElementById("sangre").value
            document.getElementById("sangre").value = x.toUpperCase()
        }
        function upperCaseAl(){
            var x = document.getElementById("alergia").value
            document.getElementById("alergia").value = x.toUpperCase()
        }
        function upperCaseCir(){
            var x = document.getElementById("cirugia").value
            document.getElementById("cirugia").value = x.toUpperCase()
        }
        function upperCaseFar(){
            var x = document.getElementById("farmaco").value
            document.getElementById("farmaco").value = x.toUpperCase()
        }
    </script>
</html>
