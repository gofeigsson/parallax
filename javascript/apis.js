//GOOGLE MAPS
//Initialize and add the map
function initMap() {
  // The location of Uluru
  var alp = {lat: 55.862881, lng: -4.213910};
  // The map, centered at alp
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: alp});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: alp, map: map});
}
//ICONS
feather.replace()
//HTML5 geolocation
x = navigator.geolocation;
x.getCurrentPosition(success, failure);
function success(position) {
  var mylat = position.coords.latitude;
  var mylong = position.coords.longitude;
  $('#lat').html(mylat);
  $('#long').html(mylong);
}