<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 2/2/2017
 * Time: 8:01 PM
 */getStaticHeaders();

function getStaticHeaders(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RTT";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SHOW COLUMNS FROM StaticData";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {

            //echo($row['Field']);
            $columnNameArray[] = array($row['Field']);


        }

        echo json_encode($columnNameArray);
    } else {
        echo "0 results";
    }


    //send the array with all the data for given case owner
    // echo json_encode($goo);



    $conn->close();


}

?>