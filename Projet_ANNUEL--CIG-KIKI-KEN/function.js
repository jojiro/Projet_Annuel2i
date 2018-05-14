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
       xhr = new getXMLHttpRequest();
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
  console.log(id_location);

  var url = "reservation.php";
  var param = "location=" + id_location;

  xml.onreadystatechange= function(){
    if(xml.readyState == 4 && (xml.status == 200 || xml.status == 0)){
      document.getElementsById("print_room").innerHTML = xml.responseText;
      if(id_location != "place_default"){
        book_display();
      }
    }
  }
  xml.open("POST", url , true);
  xml.setRequestHeader("Content-type","application/x-www-forms-urlencoded");
  xml.send(param);
}

function book_display(){
  var select = document.getElementsByName("");
}
