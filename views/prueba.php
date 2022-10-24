

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>TRATTOSA</title>

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="styleinicio.css">

    </head>

    <style>

         #ocultar-mapa:checked ~ #mapa {

  display: block;

}

#ocultar-mapa1:checked ~ #imagen-mapa{

  display: block;

}

.boton_1{

    text-decoration: none;

    padding: 5px 10px;

    padding-left: 10px;

    padding-right: 10px;

    font-family: helvetica;

    font-weight: 300;

    font-size: 15px;

    font-style: italic;

    color:white ;

    background-color:#4caf50;

    border-radius: 8px;

    border: 3px double white;

  }

  .boton_1:hover{

    opacity: 0.6;

    text-decoration: none;

  }

  .boton_2{

    text-decoration: none;

    padding: 10px 10px;

    padding-left: 10px;

    padding-right: 15px;

    font-family: helvetica;

    font-weight: 300;

    font-size: 15px;

    font-style: italic;

    color: white;

    background-color:#4caf50;

    border-radius: 8px;

    border: 3px double white;

  }

  .boton_2:hover{

    opacity: 0.6;

    text-decoration: none;

  }

  @media (max-width: 2000px) {

    #mapa{

height:92%;

width: 100%;

left:25px;

right:5px;

}

.map-responsive {

    display:none;

  overflow:hidden;

  padding-bottom:43%; /*Reduce este valor si el mapa fuera muy alto, por ejemplo 250px, puedes usar porcentajes, 50%*/

  position:static;

  height: 550px;

  top:0px;

  margin-left:-15px;

  margin-right:-15px;

}

#imagen-mapa{

    display:none;

  position: absolute;

  top: calc(78% );

  right: 15px;

  z-index: 10000 !important;

}

}

    </style>

<!-- https://bootstrapious.com/p/bootstrap-sidebar -->

<body>

    <div class="wrapper">

        <!-- Sidebar  -->

        <nav id="sidebar" >

            <div class="sidebar-header">

                <h3 style="font-size:25px; margin-left:25px;color:white;">TRATTOSA</h3>

            </div>

            <h6 style="font-size:20px; margin-top: 10px; margin-left:50px;color:white;">ACTIVOS:</h6>

                <p id = "demo" style="font-size:25px; margin-top: -42px; margin-left:145px;color:white;"></p>

                <script>

                    const marcadores =([<?php include('/xampp/htdocs/nafta/code/marcadores.php'); ?> ]);

                    let length = marcadores.length;

                    document.getElementById("demo").innerHTML= length;

                </script>

                    <div class="divtabla" style=" font-size:15px;color:black; margin-top:10px; width: 295px;">

                        <table>

                        <?php  include ("/xampp/htdocs/nafta/code/sidebar.php"); ?> 

                        </table>

        </nav>

        <!-- Page Content  -->

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top:-15px; height: 50px; background-color: #360;">

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn text-sidebar bg-turbo-yellow">

                    <i class='bx bx-layer' style="color:white; size:25;"></i>

                        <span></span>

                    </button>

                    <button class="btn btn-green d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <i class='bx bxs-food-menu' style="color:#4caf50; font-size:25px;"></i>

                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item"  style="padding: 5px 10px;">

                            <a href="complet.php" class="nav-link" ><button class="boton_1"><i class='bx bxs-map'></i>Unidades</button></a>

                            </li>

                            <li class="nav-item"  style="padding: 5px 10px;">

                            <a href="alerts.php" class="nav-link" ><button class="boton_1"><i class='bx bxs-error'></i></button></a>

                            </li>

                            <li class="nav-item"  style="padding: 5px 10px;">

                            <a href="javascript:location.reload()" class="nav-link"><button class="boton_1"><i class='bx bx-loader'></i>Actualizar</button></a>

                            </li>                                 

                            <li class="nav-item"  style="padding: 5px 10px;">

                            <a href="index.html" class="nav-link"><button class="boton_1"><i class='bx bx-loader'></i>SALIR</button></a>

                            </li>    

                            <li class="nav-item" >

                                <a class="nav-link" href="#">

                                <form action="routmap.php" method="POST">

        <td style="padding: 5px 0px;">

          <!-- CREA EL SELECT DEL NO CAJA-->

          <select value="" name="auto" class="boton_1"  >

                <option value="">UNIDAD</option>

                <?php

                include('/xampp/htdocs/nafta/code/connection.php');

                $query="SELECT  assetid FROM naftaactual";

                $result=mysqli_query($con, $query) or die (mysqli_error());

                while ($row=mysqli_fetch_array($result)){

                echo '<option value="'.$row['assetid'].'">'.$row['assetid'].'</option>';

                }?>

                </select>

        </td>

          </select>

        </td>

        <td style="padding: 5px 10px;">

        <select name="hrs" value="" class="boton_1" >

        <option selected>HORAS</option>

        <option>2</option>

        <option>4</option>

        <option>8</option>

        <option>12</option>

        <option>24</option>

        </select>

        </td>

        <td>

          <input class="boton_2" type="submit" name="enviar" value="Trazar Ruta"/>

        </td>

    </form>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

<input id="ocultar-mapa" type="checkbox">

<label for="ocultar-mapa">MOSTRAR MAPA</label>

<input id="ocultar-mapa1" type="checkbox">

<label for="ocultar-mapa1">INFO</label>

            </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkM6xXAh6AY3xCjNd9twJAbBdsuwEb5Bc&libraries=places&callback=initMap"  async defer></script>

<div id="mapa" class="map-responsive">  

<script>

        function initMap() {

    let map;

    let bounds = new google.maps.LatLngBounds();

    let mapOptions = {

    center: new google.maps.LatLng(23.634501,-102.552784),

    zoom: 5,

    mapTypeId: google.maps.MapTypeId.ROADMAP

}

map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

map.setTilt(50);

var url = "http://maps.google.com/mapfiles/ms/micons/";

let marcadores =[

    <?php include('/xampp/htdocs/naftat/code/marcadores.php'); ?> 

    ];

    let infomarcadores =[

      <?php include('/xampp/htdocs/naftat/code/infomarcadores.php'); ?> 

    ];

    let mostrarMarcadores= new google.maps.InfoWindow();

    let markers=[];

    let pin;

    

    for(i=0; i<marcadores.length; i++){

        pin = url + marcadores[i][3] + ".png";

        let position = new google.maps.LatLng(marcadores[i][1], marcadores[i][2]);

        bounds.extend(position);

        marker = new google.maps.Marker({

            position: position,

            map: map,

           icon:pin,

            litle: marcadores[i][0],

            label: {color: 'magenta',

    fontSize: "15px",

    fontWeight: 'bold',

    text: marcadores[i][0],

  },



        });

        markers.push(marker);

        google.maps.event.addListener(marker, 'click',(function(marker, i){

            return function(){

                mostrarMarcadores.setContent(infomarcadores[i][0]);

                mostrarMarcadores.open(map, marker);

            }

        })(marker, i));

        google.maps.event.addListener(map, 'click',(function(marker, i){

            return function(){

                mostrarMarcadores.setContent(infomarcadores[i][0]);

                mostrarMarcadores.close(map, marker);

                

            }

        })(marker, i));

        map.fitBounds(bounds)

    }

    const imagePath = "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m";

    const markerClusterer = new MarkerClusterer(map, markers, {imagePath: imagePath});

// Aplicamos el evento 'bounds_changed' que detecta cambios en la ventana del Mapa de Google, tambiÃ©n le configramos un zoom de 14 

    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {

              this.setZoom(5);

              google.maps.event.removeListener(boundsListener);

          });

        }

    </script>

        </div>

        <img src="../imagenes/colores1.png" width="150px" id = "imagen-mapa"></img>

    </div>



    <!-- jQuery CDN - Slim version (=without AJAX) -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>



    <script type="text/javascript">

        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {

                $('#sidebar').toggleClass('active');

            });

        });

    </script>

</body>



</html>