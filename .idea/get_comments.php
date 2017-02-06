<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 2/5/2017
 * Time: 8:29 AM
 */
function getComments($eventid){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RTT_2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM commentdata where EventId ='" . $eventid . "' AND EventId not in (select EventId from transactions)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {

            $dbArray[] = $row;

        }
        //send the array with all the data for given case owner
        echo json_encode($dbArray);


    } else {
        echo "0 results";
    }
    $conn->close();
}

$q = $_REQUEST["q"];
getComments($q);

?>