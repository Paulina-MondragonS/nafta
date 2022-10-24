
<?php 
include('/xampp/htdocs/tratt0s4/code/connection.php');
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GUIAS</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/alerts.css">
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <table>
        <tr>
          <th colspan="11"><h1>Unidades Detenidas</h1></th>
        </tr>
        <tr>
        <td>
        <select value="" name="remolque">
                <option value="">Seleccione una Unidad</option>
                <?php
                include('/xampp/htdocs/naftat/code/connection.php');
                $query="SELECT  assetid FROM naftaactual";
                $result=mysqli_query($con, $query) or die (mysqli_error());
                while ($row=mysqli_fetch_array($result)){
                echo '<option value="'.$row['assetid'].'">'.$row['assetid'].'</option>';
                }?>
                </select>
        </td>
        <td>
          <input type="submit" name="enviar" value="Buscar"/>
        </td>
        <td>
          <a href="javascript:location.reload()"><i class='bx bx-loader'></i>Actualizar</a>
        </td>
        <td>
          <a href="alerts.php"><i class='bx bx-task'></i>Todos</a>
        </td>
        <td>
          <a href="inicio.php"><i class='bx bx-home-smile'></i>Ir al Inicio</a>
        </td>
        <td>
        <p >Cajas Detenidas:</p>
      <p id = "demo3" style=" margin-left:145px; font-size:20px; margin-top:-38px; color: black;" ></p>
                <script>
                    const marcadores1 =([
                        <?php
  include('/xampp/htdocs/tratt0s4/code/connection.php');
    $result = mysqli_query($con, "SELECT assetid, latitude, longitude, time from naftaactual where age_minutes >5 group by assetid ");
  while ($row = mysqli_fetch_array($result)) {
      echo '["' . $row['assetid'] . ', ' . $row['time'] . '", ' . $row['latitude'] . ', ' . $row['longitude'] . '],';}
?>]);
                    let length1 = marcadores1.length;
                    document.getElementById("demo3").innerHTML= length1;</script>
        </td>
        </tr>
      </table>
    </form>
    <table>
        <thead>
            <tr>
                <th>N° de Unidad</th> 
                <th>Latitude</th>
                <th>Longitud</th>
                <th>Ciudad</th>
                <th><i class='bx bx-error' style='color:red;'></i>Status</th>
                <th>Ultima Ubicacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['enviar'])){
                $remolque = $_POST['remolque'];
                if(empty($_POST['remolque'])){
                  echo "<script language='JavaScript'>
                  alert('Ingrese Numero de Remolque');
                  location.assign('alerts.php');
                  </script>";
                }else{
                if(!empty($_POST['remolque'])){
                  $result = mysqli_query($con, "SELECT assetid, latitude, longitude, street, speed_label, time from naftaactual where age_minutes >5 group by assetid");
                }
                }
                $result = mysqli_query($con, "SELECT assetid, latitude, longitude, street, speed_label, time  from naftaactual where assetid like '%".$remolque."%' AND age_minutes> 5  ");
                while ($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td scope='col'>" . $row['assetid'] . "</td>";
                  echo "<td scope='col'>" . $row['latitude'] . "</td>";
                  echo "<td scope='col'>" . $row['longitude'] . "</td>";
                  echo "<td scope='col'>" . $row['street'] . "</td>";
                  echo "<td scope='col'>" . $row['speed_label'] . "
                  <i aria-hidden='true' class='v-icon material-icons theme--light' style='font-size: 16px; color: rgb(255, 82, 82); caret-color: rgb(255, 82, 82);'>
                    error_outline
                  </i>
                </td>";
                  echo "<td scope='col'>" . $row['time'] . "</td>";
                  echo "</tr>";
              }
            } else{
                $result1 = mysqli_query($con, "SELECT assetid, latitude, longitude, street, speed_label, time from naftaactual where age_minutes >5 group by assetid");
                while ($row = mysqli_fetch_array($result1)){
                  echo "<tr>";
                  echo "<td scope='col'>" . $row['assetid'] . "</td>";
                  echo "<td scope='col'>" . $row['latitude'] . "</td>";
                  echo "<td scope='col'>" . $row['longitude'] . "</td>";
                  echo "<td scope='col'>" . $row['street'] . "</td>";
                  echo "<td scope='col'>" . $row['speed_label'] . "
                  <i aria-hidden='true' class='v-icon material-icons theme--light' style='font-size: 16px; color: rgb(255, 82, 82); caret-color: rgb(255, 82, 82);'>
                    error_outline
                  </i>
                </td>";
                  echo "<td scope='col'>" . $row['time'] . "</td>";
                  echo "</tr>";
              }
              }
            ?>
        </tbody>
    </table>
  </body>
</html>