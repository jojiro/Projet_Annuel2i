function getXMLHttpRequest(){
  var xhr = null;

  if(window.getXMLHttpRequest || window.ActiveXObject){
    if(window.ActiveXObject){
      try {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
    } else {
       xhr = new XMLHttpRequest();
    }
  } else {
    alert("Le navigateur ne supporte pas AJAX");
    return null;
  }
  return xhr;
}

function printf_room(){
  var xml = getXMLHttpRequest();

  var id_location = document.getElementsByName("place_select")[0].value;
  console.log(id_location); //test

  var url = "getreservation.php";
  var param = 'location=' + id_location;
  console.log(param);

  xml.onreadystatechange= function(){
    if(xml.readyState == 4 && (xml.status == 200 || xml.status == 0)){
        var res = JSON.parse(xml.responseText);
        var destination = document.getElementsByName("select_room")[0];
        destination.innerHTML = "";
        var p;

        res.forEach(function(element){
          p = document.createElement("option");
          p.value = element.id_room;
          p.innerHTML = element.type_room;
          destination.appendChild(p);
        });

      }
    }

  xml.open("GET", url+"?"+param, true);
  xml.send();
}
