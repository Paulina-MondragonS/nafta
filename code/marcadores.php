<?php
  include('connection.php');
    $result = mysqli_query($con, "SELECT assetid, latitude, longitude,speed_icons from naftaactual");
  while ($row = mysqli_fetch_array($result)) {
      echo '["' . $row['assetid'] . '", ' . $row['latitude'] . ', ' . $row['longitude'] . ', "' . $row['speed_icons'] . '"],';}
?>