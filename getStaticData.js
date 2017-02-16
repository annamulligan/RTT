/**
 * Created by ajmul on 2/2/2017.
 */
//returns array of data in a database

var form = document.getElementById("COform"); function handleForm(event) { event.preventDefault();
setCOData();} form.addEventListener('submit', handleForm);

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

//update comment

function setCOData() {
    var xhttp;
    var pcComm = document.forms["COform"].elements["PCcomm"].value;
    var savd = new Date();
    savd = savd.getDate() + "/" + (savd.getMonth()+1) + "/" + savd.getFullYear();
    var vuln = document.forms["COform"].elements["vuln"].value;
    var reason = document.forms["COform"].elements["reason"].value;
    var jobstat = document.forms["COform"].elements["jobstat"].value;
    var evid = document.forms["StaticField"].elements["evid"].value;

    xhttp = new XMLHttpRequest();




    xhttp.open("GET", "update_co.php?q=" + pcComm + "&r=" + evid + "&s="+savd + "&t=" + vuln + "&u="+reason + "&v=" + jobstat, false);
    xhttp.send();



}