<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(empty($_GET["source"])){
    if(isset($_GET["alternate_source"]) && !empty($_GET["alternate_source"])){
     $source = $_GET["alternate_source"];
   } else {
     $source = "New Delhi";
   }
  } else {
    $source = $_GET["source"];
  }
  if(empty($_GET["destination"])){
    if(isset($_GET["alternate_destination"]) && !empty($_GET["alternate_destination"])){
     $destination = $_GET["alternate_destination"];
   } else {
     $destination = "kanpur";
   }
  } else {
    $destination = $_GET["destination"];
  }
}
if(!empty($_GET["travel-mode"])){
  $travel_mode = $_GET["travel-mode"];
} else {
  $travel_mode = 'DRIVING';
}
# If input fields are empty, use default values
# source and destination URL's
function is_connected()
{
    $connected = @fsockopen("www.google.com", 80);
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}
if(is_connected() == true){
  $sourceURL = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($source);
  $destinationURL = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($destination);
  # read data from JSON files
  $sourceJSON = file_get_contents($sourceURL);
  $destinationJSON = file_get_contents($destinationURL);
  # convert data to PHP Array
  $sourceArray = json_decode($sourceJSON,true);
  $destinationArray = json_decode($destinationJSON,true);
  # get latitude and longitude of source
  $source_latitude = $sourceArray["results"][0]["geometry"]["location"]["lat"];
  $source_longitude = $sourceArray["results"][0]["geometry"]["location"]["lng"];
  # get latitude and longitude of destination
  $destination_latitude = $destinationArray["results"][0]["geometry"]["location"]["lat"];
  $destination_longitude = $destinationArray["results"][0]["geometry"]["location"]["lng"];
  # get names
  $source_name = $sourceArray["results"][0]["address_components"][0]["long_name"];
  $destination_name = $destinationArray["results"][0]["address_components"][0]["long_name"];
} else {
   echo "You dont have an active internet connection";
   $source_name = 'New Delhi';
   $destination_name = 'Punjab';
}
?>
<!DOCTYPE html>
<html lang = "en-US" dir = "ltr">
 <head>
   <title>Google | Google Maps API</title>
   <meta charset = "UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0"/>
   <link rel="stylesheet" type = "text/css" href="static/css/layout.css?<?php echo date('l jS \of F Y h:i:s A');?>" media="screen"/>
   <link rel="stylesheet" type = "text/css" href="static/css/style.php?<?php echo date('l jS \of F Y h:i:s A');?>" media="screen"/>
 </head>
 <body>
   <header>
    <h1>D<span class = "logo"></span></h1>
   </header>
  <aside>
    <form method = "GET" name = "google-map-form" action="<?php echo $_SERVER["PHP_SELF"]?>">
     <ul>
       <li>
         <label for="">Source</label>
         <input type = "text" value = ""  name = "source" placeholder = "Enter source or select below" autocomplete="off" spellcheck="false"/>
         <select name="alternate_source" class="source_select_box">
         </select>
       </li>
       <li>
         <label for="">Destination</label>
         <input type = "text" value = ""  name = "destination" placeholder = "Enter destination or select below" autocomplete="off" spellcheck="false"/>
         <select name="alternate_destination" class = "destination_select_box">
         </select>
       </li>
       <li>
        <label for="">Travel Mode</label>
        <select name="travel-mode" id="TM">
          <option value="DRIVING">Driving</option>
          <option value="BICYCLING">Bicycling</option>
          <option value="WALKING">Walking</option>
          <option value="TRANSIT">Transit</option>
        </select>
       </li>
       <li>
         <input type="submit" name = "submit" value = "submit"/>
       </li>
     </ul>
    </form>
  </aside>
  <section>
    <div id = "mapCanvas"></div>
    <div id = "right-panel" class = "hide-on-tablet"></div>
    <div class="distance-measure">
      <div class="circle-left circle-push-left">
       <div class="circle-cover circle-cover-left">
       </div>
      </div>
      <div class="line">
      </div>
      <div class="circle-right circle-push-right">
        <div class="circle-cover circle-cover-right">
        </div>
      </div>
      <div class = "from">
       <h1><?php echo $source_name?></h1>
      </div>
      <div class="distance">
        <h1><span id = "total">500.83 km</span></h1>
      </div>
      <div class="to">
        <h1><?php echo $destination_name?></h1>
      </div>
    </div>
    <footer>
      <p>Made with &hearts; from Amir Saleem<sup>&copy;</sup></p>
    </footer>
   <!-- <img src="http://www.freepngimg.com/download/girl/4-2-girl-png-pic.png" alt=""> -->
  </section>
  <div class = "modal-wrapper hide">
    <div class="modal">
      <h1 class = "alert"></h1>
      <button class = "okay-btn">OKAY</button>
    </div>
  </div>
  <script type = "text/javascript">
   var sourceLatitude = <?php echo json_encode($source_latitude)?>;
   var sourceLongitude = <?php echo json_encode($source_longitude)?>;
   var destinationLatitude = <?php echo json_encode($destination_latitude)?>;
   var destinationLongitude = <?php echo json_encode($destination_longitude)?>;
   var sourceName = <?php echo json_encode($source_name)?>;
   var destinationName = <?php echo json_encode($destination_name)?>;
   var mapTravelMode = <?php echo json_encode($travel_mode)?>;
   document.getElementsByClassName('okay-btn')[0].addEventListener('click',function(){
     closeModal();
   });
    window.addEventListener('load',function(){
      initMap();
      showCity();
      typer('logo','irectionDistance');
    });
  </script>
  <script type = "text/javascript" src = "static/script/script.js?<?php echo date('l jS \of F Y h:i:s A');?>"></script>
  <script type = "text/javascript" src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAwDpm1it1U-jq-tX-v_FSkVlJx0dkqQ0Q&callback=initMap"></script>
 </body>
</html>
