/* BOOKING AFFICHER SALLE SELON LIEU*/
function book_print_room(date_now){
    var xhr = getXMLHttpRequest();

    var id_location = document.getElementsByName("place_select")[0].value;
    console.log(id_location);

    var url = "book_print_room.php";
    var param = "location=" + id_location;

    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0) ){
            document.getElementById("print_room").innerHTML = xhr.responseText;
            book_print_date(date_now);
        }
    }

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(param);
}
