<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 1/31/2017
 * Time: 9:04 PM
 */

function reset_db(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RTT";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "bumfluff";


    $conn->close();
}


reset_db();

?>