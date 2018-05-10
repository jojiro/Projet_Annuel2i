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











//ABONNEMENT SIMPLE

function valid_abo(){

var value = document.getElementById('choix_engagement1').value;

var url ='abonnement.php?abo='+value;
console.log(url);
	var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
	   if(value == ""){
		   alert("Selectionnez un engagement");
	   }
	   else{
	       //document.innerHTML=xhttp.responseText;
		   $("#abonnement_simple").modal("hide");
	   }
    }
};
xhttp.open("GET", url, true);
xhttp.send();

}



//ABONNEMENT RESIDENT


function valid_resid(){

var value = document.getElementById('choix_engagement').value;

var url ='abonnement.php?abo='+value;
console.log(url);
	var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
	   if(value == ""){
		   alert("Selectionnez un engagement");
	   }
	   else{
	       //document.innerHTML=xhttp.responseText;
		   $("#abonnement_resident").modal("hide");
	   }
    }
};
xhttp.open("GET", url, true);
xhttp.send();

}



// AFFICHAGE Abonnement

function type_abo(){
	var value = document.getElementById('type_abonnement').value

	var url='aff_abonnement.php?type=' + value
}
