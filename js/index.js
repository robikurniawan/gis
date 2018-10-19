//var myPolygon;
function initialize() {
  // Map Center
  var myLatLng = new google.maps.LatLng(-3.7947856,102.2596498);
  // General Options
  var mapOptions = {
    zoom: 13,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.RoadMap
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  // Polygon Coordinates
  var triangleCoords = [
    // new google.maps.LatLng(-5.332127, 120.122312),
    // new google.maps.LatLng(-5.318248, 120.135085),
    // new google.maps.LatLng(-5.328467, 120.135980)
    new google.maps.LatLng(-3.7932106,102.2513903),
    new google.maps.LatLng(-3.767696, 102.289079),
    new google.maps.LatLng(-3.797639, 102.284741)
    // new google.maps.LatLng(-4.66942,120.28934),
    // new google.maps.LatLng(-4.72518,120.19366)

    // -4.71242,120.169 -4.60829,120.13968 -4.54248,120.25044 -4.66942,120.28934 -4.72518,120.19366

  ];
  // Styling & Controls
  myPolygon = new google.maps.Polygon({
    paths: triangleCoords,
    draggable: true, // turn off if it gets annoying
    editable: true,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });

  myPolygon.setMap(map);
  //google.maps.event.addListener(myPolygon, "dragend", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
  //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
}

//Display Coordinates below map
function getPolygonCoords() {
  var len = myPolygon.getPath().getLength();
  var htmlStr = "";
  for (var i = 0; i < len; i++) {
    htmlStr += myPolygon.getPath().getAt(i).toUrlValue(5) + " ";
    //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
    //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
  }
  document.getElementById('info').innerHTML = htmlStr;
}
function copyToClipboard(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}
