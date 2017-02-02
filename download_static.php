<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 1/31/2017
 * Time: 9:04 PM
 */

    function getStatic($ReportOwner){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "RTT";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM StaticData where CaseOwner ='" . $ReportOwner . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

           while($row = $result->fetch_assoc()) {

               $dbArray[] = array($row);

            }
            //send the array with all the data for given case owner
            echo json_encode($dbArray);


        } else {
            echo "0 results";
        }
        $conn->close();
    }

    $q = $_REQUEST["q"];
    getStatic($q);

?>