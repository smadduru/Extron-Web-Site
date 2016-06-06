function init(){

    var el = document.getElementById('map');
    var myLocation = new google.maps.LatLng(41.839178,-87.6186794)
	var mapOptions = {
		center : myLocation,
		zoom : 15
	};
	var myHome = new google.maps.Map(el, mapOptions);


	 var marker = new google.maps.Marker({
      position: myLocation,
      map: myHome,
      title: 'We live Here xD'
  });
	
var contentString = '<h1>Course-Ra</h1><p>We Live Here xD</p>';
 var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(myHome, marker);
  });







}

  google.maps.event.addDomListener(window, 'load', init);
