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
               xhttp.close();

            }

        };
        xhttp.open("GET", "download_static.php?q=" + str, false);
        xhttp.send();
        return msg;


}

function resetData() {
    var xhttp;
    var msg = "";

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {


        }

    };
    xhttp.open("GET", "reset_db.php?", false);
    xhttp.send();


}
//returns column names from DB
function getCol() {
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