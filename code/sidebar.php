<?php
  // Archivo de Conexión a la Base de Datos 
  include('connection.php');
  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $result = mysqli_query($con, "SELECT assetid, latitude, longitude,street, speed_limit, SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF( NOW(),time) ) ) as total FROM naftaactual");
  // Creamos una tabla para listar los datos 
  echo "<div class='table-responsive'>";
  echo "<table rules='all'; style='border-collapse: collapse; display: block;
  overflow-x: auto;'>
          <thead class='thead-light'>
            <tr>
              <th colspan='4' rowspan='4' scope='col'><h4  align='center' style='color:white;'>Vehiculos NAFTA</h4></th>
            </tr>
            </thead>
            <tbody>";
  while ($row = mysqli_fetch_array($result)) {
    $url = "http://maps.google.com/?q=" .$row['latitude']."," .$row['longitude'];
      echo "<tr'>";
      echo "<td style='background-color:gainsboro; font-size:15;width:70px;  align='center'; 'scope='row'><i class='bx bxs-been-here'  style='color:green; font-size: 30px;'></i>". $row['assetid'] ."</td>";
      echo "<td style='background-color:gainsboro; font-size:9;' scope='row'>" . "<a href='".$url."' target='_blank'>Ubicado en:" . $row['street'] . "<i class='bx bx-world' style='color:green; font-size: 20px;'></i>
      </a>" . " </br>Hace " . $row['total'] . " hrs</br>
      Velocidad: ". $row['speed_limit'] . "Km/hr </td>";
      echo "</tr>";
  }
  echo "</tbody></table>";
  echo "</div>";
 ?> 

 