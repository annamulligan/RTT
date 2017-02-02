/**
 * Created by ajmul on 2/2/2017.
 */
//returns array of data in a database
function getData(str) {
    var xhttp;
    var msg = "";

        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

               msg = JSON.parse(this.responseText);

            }

        };
        xhttp.open("GET", "download_static.php?q=" + str, false);
        xhttp.send();
        return msg;


}
//returns column names from DB
function getCols() {
    var xhttp;
    var msg = [];


    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;

            msg = JSON.parse(this.responseText);
            //alert(msg);


        }

    };
    xhttp.open("GET", "getStaticHeaders.php?", false);
    xhttp.send();
    return msg;



}