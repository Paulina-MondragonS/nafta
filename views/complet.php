<?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['cliente'])){
        $cliente = $_SESSION['cliente'];
    }else{
 header('Location: index.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
?>
<?php 
include('/xampp/htdocs/tratt0s4/code/connection.php');
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GUIAS</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/complet.css">
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <table>
        <tr>
          <th colspan="11"><h1>NAFTA UNIDADES</h1></th>
        </tr>
        <tr>
        <td>
          <label>N° DE UNIDAD:</label>
          <input type="text" name="remolque"/>
        </td>
        <td>
          <input type="submit" name="enviar" value="Buscar"/>
        </td>
        <td>
          <a href="complet.php"><i class='bx bx-loader'></i>Actualizar</a>
        </td>
        <td>
          <a href="inicio.php"><i class='bx bx-home-smile'></i>Ir al Inicio</a>
        </td>
        </tr>
      </table>
    </form>
    <table>
        <thead>
            <tr>
                <th><h2>N° de unidad</h2></th>
                <th><h2>Vin</h2></th>
                <th><h2>Geopunto</h2></th>
                <th><h2>Ubicacion</h2></th>
                <th><h2>Ultima ubicacion enviada</h2></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['enviar'])){
                $remolque = $_POST['remolque'];
                if(empty($_POST['remolque'])){
                  echo "<script language='JavaScript'>
                  alert('Ingrese Numero de Remolque');
                  location.assign('complet.php');
                  </script>";
                }else{
                if(!empty($_POST['remolque'])){
                  $result = mysqli_query($con, "SELECT assetid,vin, latitude, longitude, street,time from naftaactual where assetid like '%".$remolque."%'");
                }
                }
                $result = mysqli_query($con, "SELECT assetid,vin, latitude, longitude, street,time from naftaactual where assetid like '%".$remolque."%'");
                while ($row = mysqli_fetch_array($result)){
                  $url = "http://maps.google.com/?q=" .$row['latitude']."," .$row['longitude'];
                  echo "<tr>";
                  echo "<td scope='col'>" . $row['assetid'] . "</td>";
                  echo "<td scope='col'>" . $row['vin'] . "</td>";
                  echo "<td>" . "<i class='bx bx-world' style='color:green'></i><a href='".$url."' target='_blank'>" . $row['latitude'] ." " . $row['longitude'] . "</a>" . "</td>";
                  echo "<td scope='col'>" . $row['street'] . "</td>";
                  echo "<td scope='col'>" . $row['time'] . "</td>";
                  echo "</tr>";
              }

            } else{
              $result = mysqli_query($con, "SELECT assetid,vin, latitude, longitude, street,time from naftaactual");
                while ($row = mysqli_fetch_array($result)) {
                  $url = "http://maps.google.com/?q=" .$row['latitude']."," .$row['longitude'];
                    echo "<tr>";
                    echo "<td scope='col'>" . $row['assetid'] . "</td>";
                    echo "<td scope='col'>" . $row['vin'] . "</td>";
                    echo "<td>" . "<i class='bx bx-world' style='color:green'></i><a href='".$url."' target='_blank'>" . $row['latitude'] ." " . $row['longitude'] . "</a>" . "</td>";
                    echo "<td scope='col'>" . $row['street'] . "</td>";
                    echo "<td scope='col'>" . $row['time'] . "</td>";
                    echo "</tr>";
                }
              }
            ?>
        </tbody>
    </table>

  </body>
</html>
