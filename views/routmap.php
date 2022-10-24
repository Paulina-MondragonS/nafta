
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>RUTAS</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/rutas.css">
    </head>
    <style>
                     #ocultar-mapa:checked ~ #sidebar{
                      display:block;
                margin-left: 0px;
                
}

#sidebar {
  position: absolute;
  z-index: 10000 !important;
    margin-left: -300px;
    max-width: 300px;
    height: 350px;
    background: #4caf50;
    color: #d5d7df;
    transition: all 0.3s;
}
#divtabla {
  display: list-item;
  overflow: auto;
  scrollbar-color: rgb(228, 235, 237) transparent;
  height: 350px;
  width: 290px;
  top:-50;
  margin-left: 0px;
  font-size: 14px;
}
#divtabla .table {
  width: 500px;
  font-size: 14px;
  background-color: #248ad2;
  color: white;
  border-collapse: collapse;
}
         @media (max-width: 100px) {
          #mapa {
    height: 550px;
    width:100%;
    top: 150px;
}
.map-responsive {
overflow:hidden;
padding-bottom:35%; /*Reduce este valor si el mapa fuera muy alto, por ejemplo 250px, puedes usar porcentajes, 50%*/
position:static;
top:25px;

}
}  
    </style>
    <body>
    <form >
    <table>
        <tr>
          <th colspan="7"><h1>RUTA DE UNIDAD</h1></th>
        </tr>
        <tr>
        <td>
          <a href="inicio.php"><i class='bx bx-home-smile'></i>Ir al Inicio</a>
        </td>
        </tr>
      </table>
      </form>
      <table>
        <thead>
        <tr>
            <th>No de Unidad</th>
            <th>Ultima Actividad</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Ciudad</th>
        </tr>
      </thead>
     
    <tbody>
    <?php 
    if(isset($_POST['enviar'])){
      include('/xampp/htdocs/naftat/code/connection.php');
              $assetid = $_POST['auto'];
              $hrs = $_POST['hrs'];
          if(empty($_POST['auto']) || empty($_POST['hrs'])){
            echo "<script language='JavaScript'>
                  alert('NO SE PUEDE REALIZAR LA BUSQUEDA INGRESA LOS DATOS  DE FORMA CORRECTA');
                  location.assign('inicio.php');
                  </script>";
          }
          else{
            if(empty($_POST['auto'])){
              echo "<script language='JavaScript'>
                  alert('INGRESA UNA UNIDAD PARA COMPLETAR LA BUSQUEDA');
                  location.assign('inicio.php');
                  </script>";
            }
            if(empty($_POST['hrs'])){
              echo "<script language='JavaScript'>
                  alert('INGRESA LAS HORAS PARA COMPLETAR LA BUSQUEDA');
                  location.assign('inicio.php');
                  </script>";
            }
            if(!empty($_POST['auto']) || !empty($_POST['hrs'])){
              $assetid = $_POST['auto'];
              include('/xampp/htdocs/naftat/code/connection.php');
              $result = mysqli_query($con, "SELECT assetid, time, latitude, longitude, street from naftaactual where assetid='" . $assetid . "'");
              while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td scope='col'>" . $row['assetid'] . "</td>";
                  echo "<td scope='col'>" . $row['time'] . "</td>";
                  echo "<td scope='col'>" . $row['latitude'] . "</td>";
                  echo "<td scope='col'>" . $row['longitude'] . "</td>";
                  echo "<td scope='col'>" . $row['street'] . "</td>";
                  echo "</tr>";
              }
            }
          }
    }else{
      
    }

    ?>
    </tbody>
    </table>
    <input id="ocultar-mapa" type="checkbox"><i class='bx bx-spreadsheet' style='color:blue; font-size: 15px;'></i>
<label for="ocultar-mapa">INFORMACION DE RUTA</label>
<!-- <input id="ocultar-mapa1" type="checkbox" ><i class='bx bxs-map-pin' style='color:blue; font-size: 15px;'></i>
<label for="ocultar-mapa1">MOSTRAR RUTA</label> -->
    <nav id="sidebar" >
            <div class="sidebar-header">
            </div>
                </script>
                    <div id="divtabla" style=" font-size:15px;color:black; margin-top:10px; width: 295px; height:350px;">
                        <table>
                        <?php
                          include('/xampp/htdocs/naftat/code/connection.php');
                          $assetid = $_POST['auto'];
                          $hrs = $_POST['hrs'];
                          // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
                          $result = mysqli_query($con, "SELECT assetid,street, time from nafta where assetid='" . $assetid . "' and (time> DATE_SUB(NOW(), INTERVAL $hrs HOUR)) ");
                          // Creamos una tabla para listar los datos 
                          echo "<div class='table-responsive'>";
                          echo "<table rules='all'; style='border-collapse: collapse; display: block;
                          overflow-x: auto;'>
                                  <thead class='thead-light'>
                                    <tr>
                                      <th colspan='4' rowspan='4' scope='col'><h4  align='center'>RUTA NAFTA</h4></th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                          while ($row = mysqli_fetch_array($result)) {
                              echo "<tr'>";
                              echo "<td style='background-color:gainsboro; font-size:15;width:70px;  align='center'; 'scope='row'><i class='bx bxs-been-here'  style='color:green; font-size: 25px;'></i>". $row['assetid'] ."</td>";
                              echo "<td style='background-color:gainsboro; font-size:9;' scope='row'>" . "<a  target='_blank'>Ubicado en: " . $row['street'] . "</a></br>
                             Hora: ". $row['time'] . "</td>";
                              echo "</tr>";
                          }
                          echo "</tbody></table>";
                          echo "</div>"; ?>    
                        </table>
        </nav>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkM6xXAh6AY3xCjNd9twJAbBdsuwEb5Bc&libraries=places&callback=initMap"  async defer></script>
<div id="mapa" class="map-responsive">  
    <script>
        function initMap() {
          let marcadores = [
              <?php 
              include('/xampp/htdocs/naftat/code/connection.php');
              $assetid=$_POST['auto'];
              $hrs=$_POST['hrs'];
              $result = mysqli_query($con, "SELECT latitude, longitude from nafta where assetid='".$assetid."' and (time> DATE_SUB(NOW(), INTERVAL $hrs HOUR))");
              while ($row = mysqli_fetch_array($result)) {
              echo '[ ' . $row['latitude'] . ', ' . $row['longitude'] . '],';
              }
                ?>
          ];
    let map;
    let bounds = new google.maps.LatLngBounds();
    let mapOptions = {
    center: new google.maps.LatLng(marcadores[0][0], marcadores[0][1]), 
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
map = new google.maps.Map(document.getElementById("mapa"), mapOptions);
          map.setTilt(50);
          // Crear múltiples marcadores desde la Base de Datos 
          let marcadorescerca = [
              <?php 
              include('/xampp/htdocs/naftat/code/connection.php');
              $assetid=$_POST['auto'];
              $result = mysqli_query($con, "SELECT latitude, longitude from naftaactual where assetid='".$assetid."'");
              while ($row = mysqli_fetch_array($result)) {
              echo '[ ' . $row['latitude'] . ', ' . $row['longitude'] . '],';
              }
                ?>
          ];
          let infomarcadores =[
            <?php 
              include('/xampp/htdocs/naftat/code/connection.php');
              $assetid=$_POST['auto'];
              $hrs=$_POST['hrs'];
              $result = mysqli_query($con, "SELECT assetid, time, latitude,street, longitude from nafta where assetid='".$assetid."' and (time> DATE_SUB(NOW(), INTERVAL $hrs HOUR))");
              while ($row = mysqli_fetch_array($result)) {
                echo '["<h2 >UNIDADES NAFTA<h2><h5>UNIDAD:' . $row['assetid'] . ' ,<br/>UBICADO EN:' . $row['street'] . ',<br/> ULTIMA CONEXION: ' . $row['time'] . ',<br/></h5>"],';}
                ?>
    ];
    let infomarcadoresactual =[
            <?php 
              include('/xampp/htdocs/naftat/code/connection.php');
              $assetid=$_POST['auto'];
              $result = mysqli_query($con, "SELECT assetid, time, latitude,street,speed_label, longitude from naftaactual where assetid='".$assetid."'");
              while ($row = mysqli_fetch_array($result)) {
                echo '["<h2 >UBICACCION ACTUAL<h2><h5>UNIDAD:' . $row['assetid'] . ' ,<br/>UBICADO EN:' . $row['street'] . ',<br>VELOCIDAD:' . $row['speed_label'] . ', <br/> ULTIMA CONEXION: ' . $row['time'] . ',<br/></h5>"],';}
                ?>
    ];
    let markers=[];
    let mostrarMarcadores= new google.maps.InfoWindow();
          // Colocamos los marcadores en el Mapa de Google 
          for (i = 0; i < marcadores.length; i++) {
              var position = [new google.maps.LatLng(marcadores[i][0], marcadores[i][1])];   
      }
      var flightPlanCoordinates = new Array();
      var lineSymbol = {
    path: google.maps.SymbolPath.CIRCLE,
    fillOpacity: 1,
    strokeOpacity: 1,
    strokeWeight: 1,
    fillColor: 'white',
    strokeColor: '#3b89db',
    scale: 4
  };
for(i=0;i<marcadores.length;i++)
{  
  var point =new google.maps.LatLng(marcadores[i][0], marcadores[i][1]);
  flightPlanCoordinates.push(point);   
}   
var flightPath = new google.maps.Polyline({
 path: flightPlanCoordinates,
 geodesic: true,
 strokeColor: '#3b89db',
 strokeOpacity: 1.0,
 strokeWeight:4
 });
 for(i=0; i<marcadores.length; i++){
        let position = new google.maps.LatLng(marcadores[i][0], marcadores[i][1]);
        bounds.extend(position);  
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon:lineSymbol,
            litle: marcadores[i][0],
        });markers.push(marker);
     marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(marcadorescerca[0][0], marcadorescerca[0][1]),
        map: map,
        icon:"../imagenes/tracto_verde.png",
        draggable: false,
        visible: true,
    }); markers.push(marker1);

    marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(marcadores[0][0], marcadores[0][1]),
        map: map,
        icon:"http://maps.google.com/mapfiles/ms/micons/blue-dot.png",
        draggable: false,
        visible: true,
    }); markers.push(marker2);       
        google.maps.event.addListener(marker, 'click',(function(marker, i){
            return function(){
                mostrarMarcadores.setContent(infomarcadores[i][0]);
                mostrarMarcadores.open(map, marker);
            }
        })(marker, i));
        google.maps.event.addListener(marker1, 'click',(function(marker1, i){
            return function(){
                mostrarMarcadores.setContent(infomarcadoresactual[0][0]);
                mostrarMarcadores.open(map, marker1);
            }
        })(marker1, i));
        google.maps.event.addListener(marker2, 'click',(function(marker2, i){
            return function(){
                mostrarMarcadores.setContent(infomarcadores[0][0]);
                mostrarMarcadores.open(map, marker2);
            }
        })(marker2, i));

      google.maps.event.addListener(map, 'click',(function(marker, i){
            return function(){
                mostrarMarcadores.setContent(infomarcadores[i][0]);
                mostrarMarcadores.close(map, marker);
            }
        })(marker, i));
      }
        flightPath.setMap(map); 
}
    </script>
</div>
    </body>
</html>