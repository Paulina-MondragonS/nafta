<?php
  include('connection.php');
    $result = mysqli_query($con, "SELECT assetid,latitude,longitude, street,speed_label, time from naftaactual");
  while ($row = mysqli_fetch_array($result)) {
    $url = "http://maps.google.com/?q=" .$row['latitude']."," .$row['longitude'];
    echo '["<h2 >UNIDADES NAFTA<h2><h6>UNIDAD:' . $row['assetid'] . ' ,<br/><a href='.$url.' > UBICADO EN: ' . $row['street'] . '</a>,<br/> VELOCIAD: ' . $row['speed_label'] . ',<br/> ULTIMA CONEXION: ' . $row['time'] . ',<br/></h6>"],';}
    ?>