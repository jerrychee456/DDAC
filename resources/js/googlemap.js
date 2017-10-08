
/* global google */

//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
var currentLocation;
var lat;
var lng;
        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function myMap() {
 
    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(4.2105, 101.9758);
 
    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 8 //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('googleMap'), options);
 
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    lat = currentLocation.lat(); //latitude
    lng = currentLocation.lng(); //longtitude
}