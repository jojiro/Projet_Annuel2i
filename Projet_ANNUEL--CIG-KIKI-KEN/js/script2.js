var map;
var coordinates = [];
var contentString = "<center><div><p>PRIX : </p></div></center>";

function initialize(){
	var mapOptions={
		zoom: 6, // 0 à 21
		center: new google.maps.LatLng(47,2), // centre de la carte
		mapTypeId: google.maps.MapTypeId.ROADMAP, // ROADMAP, SATELLITE, HYBRID, TERRAIN
	}
	map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

	for(var i = 0; i < coordinates.length; i++) {
		var marker = new google.maps.Marker({
	    position: coordinates[i],
	    map: map,
	    title: 'ESGi <3'
	    //coordinate.img et rajouter une ligne dna sle php pour aller chercher le chemin de limage 
	  });





		var infowindow = new google.maps.InfoWindow({
			
    content: contentString,
    hideCloseButton: true


     
    
 
   
  });

	marker.addListener('click', function(data) {
    infowindow.open(this.getmap, this);
  });
	}




}

function addCoord(x, y){
	coordinates.push({
	    	lat: x,
	    	lng: y
	    	
	 });
}