<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: login.php');
    }
}

$inc = include("database.php");
$inc2 = include("medico.php");

//$codigo = $_SESSION['codigo'];
$codigo=$curp;
//echo $codigo;
$consulta = "SELECT * FROM Informacion_Usuario WHERE Us_CURP = '$codigo'";
$consulta1 = "SELECT * FROM Usuario WHERE curp = '$codigo'";
$resultado = mysqli_query($conex, $consulta);
$resultado1 = mysqli_query($conex, $consulta1);
if ($resultado) {
    while($row = $resultado ->fetch_array()){
        $sexo =$row['Sexo'];
        $sangre=$row['Tipo_Sangre'];
        $alergia=$row['Alergia'];
        $cirugias=$row['Cirugias'];
        $farmaco=$row['Farmaco'];
        $telefono_emer = $row['Num_telefono_emer'];
        $uscurp= $row['Us_CURP'];

        while($row = $resultado1->fetch_array()){
            $nombre = $row['Nombre_us'];
            $apellido = $row['Apellido_us'];
            $fecha_nac = $row['Fecha_nac'];
            $curp = $row['curp'];
            $estado = $row['Estado_us'];
            $telefono = $row['Num_telefono_us'];
        ?>
    <!-- HTML -->
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
    <!-- /*
    <header>
        <input type="checkbox" id="btn-menu"/>
      
        <label class="icon-menu"for="btn-menu"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDM4NCAzODQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAxNTQuNjY3OTY5aC0zNTJjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZzNy4xNjc5NjktMTYgMTYtMTZoMzUyYzguODMyMDMxIDAgMTYgNy4xNjc5NjkgMTYgMTZzLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0zNjggMzJoLTM1MmMtOC44MzIwMzEgMC0xNi03LjE2Nzk2OS0xNi0xNnM3LjE2Nzk2OS0xNiAxNi0xNmgzNTJjOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAyNzcuMzMyMDMxaC0zNTJjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZzNy4xNjc5NjktMTYgMTYtMTZoMzUyYzguODMyMDMxIDAgMTYgNy4xNjc5NjkgMTYgMTZzLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+" width="25px" height="25px"/>  </label>
      
       
       <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="https://coronavirus.gob.mx/">Informacion sobre el COVID-19</a></li>
                <li><a href="">Consultar Pasiente</a></li>
                <li><a href="#">Ayuda...</a></li>
                
                
                <li><a href="login.php?cerrar_sesion=1" class="colorverde text-white">Cerrar Sesion</a></li>
            </ul>
            
        </nav>
        
    </header>
    -->
    <table class="clase_table" height="280px">
            <tr>
                <td>
                    <br><h3>Nombre:</h3>
                </td>
                <td>
                    <br><input type="text" name="nombre" class="input" value="<?php echo $nombre ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Apellido:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $apellido ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Sexo:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $sexo ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Fecha de nacimiento:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $fecha_nac ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>CURP:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $curp ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Estado:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $estado ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Tipo de Sangre:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $sangre ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Alergias:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $alergia ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Cirugias:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $cirugias ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Farmaco actual:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $farmaco ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Telefono personal:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $telefono ?>" disabled>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Contacto de emergencia:</h3>
                </td>
                <td>
                    <input type="text" name="nombre" class="input" value="<?php echo $telefono_emer ?>" disabled>
                </td>
            </tr>
        </table>




        <?php
    }
}
}
?>
