function initMap() {
       myCenter = new google.maps.LatLng(sourceLatitude, sourceLongitude);
       myDestination = new google.maps.LatLng(destinationLatitude, destinationLongitude);
       map = new google.maps.Map(document.getElementById('mapCanvas'), {
        zoom: 5,
        center: myCenter, // New Delhi.
        draggable: true
      });

      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer({
        map: map,
        draggable: false,
        panel: document.getElementById('right-panel')
      });

      directionsDisplay.addListener('directions_changed', function() {
        computeTotalDistance(directionsDisplay.getDirections());
      });

      displayRoute(myCenter, myDestination, directionsService,
          directionsDisplay);
    }
    function displayRoute(origin, destination, service, display) {
      service.route({
        origin: origin,
        destination: destination,
        //waypoints: [{location: 'Agra, India'}, {location: 'Rajasthan, India'}],
        travelMode: mapTravelMode,
        avoidTolls: true
      }, function(response, status) {
        if (status === 'OK') {
          display.setDirections(response);
        } else if(status === 'ZERO_RESULTS'){
           openModal();
        } else {
          openModal();
        }
      });
  }
function computeTotalDistance(result) {
      var total = 0;
      var myroute = result.routes[0];
      for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
      }
      total = (total / 1000).toFixed(2);
      document.getElementById('total').innerHTML = total + ' km';
}
function openModal(){
  var str = 'Sorry, no routes are found, Please choose another travel mode';
  var out = document.getElementsByClassName('alert')[0];
  var modal = document.getElementsByClassName('modal-wrapper')[0];
  modal.className = 'modal-wrapper show';
  out.innerHTML = str;
}
function closeModal(){
  var modal = document.getElementsByClassName('modal-wrapper')[0];
  modal.className = 'modal-wrapper visually-hide';
  setTimeout(vanish, 1000);
  function vanish(){
    modal.className = 'modal-wrapper hide';
  }
}
// create a new option element with value attribute
function CreateElement(elemText,parentName,parentIndex,value){
  var elem = document.createElement('option');
  var txt = document.createTextNode('');
  var parent = document.getElementsByClassName(parentName)[parentIndex];
  var attribute_value = value;
  elem.appendChild(txt);
  parent.appendChild(elem);
  elem.innerHTML = elemText;
  elem.setAttribute("value", attribute_value);
}
function RemoveElement(elemName, elemIndex, parentName, parentIndex) {
  var elem = document.getElementsByClassName(elemName)[elemIndex];
  var parent = document.getElementsByTagName(parentName)[parentIndex];
  parent.removeChild(elem);
}
// Create cities options using AJAX request
function showCity(){
 var xhr;
 if(window.XMLHttpRequest){
   xhr = new XMLHttpRequest();
 } else if(window.ActiveXObject){
   xhr = new ActiveXObject("Microsoft.XMLHTTP");
 } else {
   throw new Error("AJAX is not supported by your browser");
 }
 xhr.onreadystatechange = function(){
   if(xhr.readyState < 4){

   } else if(xhr.readyState == 4) {
     if(xhr.status == 200 && xhr.status < 300){
      var json = JSON.parse(this.responseText);
      for(var i = 0; i < json.Cities.India.length; i++){
         CreateElement(json.Cities.India[i],'source_select_box',0,json.Cities.India[i]);
         CreateElement(json.Cities.India[i],'destination_select_box',0,json.Cities.India[i]);
      }
     }
   }
 }
 xhr.open('GET','data.json?par=345');
 xhr.send('null');
}
function typer(elemClass,text){
  var out = document.getElementsByClassName(elemClass)[0];
  var str = text;
  var arr = str.split("");
  var final = [];
  var len = arr.length;
  var count = 0;
  var id  = setInterval(insert,200);
  function insert(){
    if(count >= len){
      clearInterval(id);
    } else {
      final.push(arr[count]);
      out.innerHTML = final.join("");
      count++;
    }
  }
}
var count = (function () {
  var counter = 0;
  return function(){return counter += 1;}
})();

function showSelect(){
  var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  } else if(window.ActiveXObject){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  } else {
    throw new Error("AJAX is not supported by your browser");
  }
  var count_num = count();
  if(count_num >= 2){
    RemoveElement('data_city',0,'body',0);
  }
  xhr.onreadystatechange = function(){
    if(xhr.readyState < 4){
     //console.log('Loading...');
    } else if(xhr.readyState == 4) {
      if(xhr.status == 200 && xhr.status < 300){
       var json = JSON.parse(this.responseText);
       if(count_num < 2){
         for(var i = 0; i < json.Countries.length; i++){
           CreateElement(json.Countries[i],'data_country',0,json.Countries[i]);
         }
       }
       var select_box = document.createElement('select');
       document.body.appendChild(select_box);
       select_box.setAttribute('class','data_city');
       // get sected country from select box
       var current_country = document.getElementsByClassName('data_country')[0].value;
       var path = "Cities." + current_country;
       // convert string to json dot notaion
       function index(obj,i) {return obj[i]}
       var fin = path.split('.').reduce(index, json)
       var len = fin.length;
       // loop through the selected countrie's cities and create option elements for each
       for(var i = 0; i < len ; i++){
         CreateElement(fin[i],'data_city',0,fin[i]);
        }
      }
    }
  }
  xhr.open('GET','data.json?ver=125');
  xhr.send('null');
}
